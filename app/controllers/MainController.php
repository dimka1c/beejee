<?php

namespace app\controllers;


use app\models\TaskModel;
use Spatie\Image\Image;
use vendor\core\AppController;

class MainController extends AppController
{

    public $layout = 'default';

    public $countPage = 0;

    public $currentPage = 1;

    public $nextPage = 1;

    public $sort = 'user';

    public function actionIndex()
    {
        if(isset($this->route['param']) && is_int((int) $this->route['param'])) {
            $this->nextPage = $this->route['param'];
        }
        if (isset($_SESSION['sort']) && !empty($_SESSION['sort'])) {
            $this->sort = $_SESSION['sort'];
        }
        //$this->sort = $_SESSION['sort'] ? $_SESSION['sort'] : 'user';
        $model = new TaskModel();
        $countTask = $model->getCountTask();
        $this->countPage = ceil($countTask[0]['records']/PAGINATION);
        if ($this->nextPage > $this->countPage) $this->nextPage = $this->countPage;
        $task = $model->getTask($this->nextPage, $this->sort);
        $this->setDataView(['task' => $task,
                            'countPages' => $this->countPage,
                            'nextPage' => $this->nextPage,
                            'currentPage' => $this->currentPage,
                            'sort' => $this->sort]);
    }


    public function actionAddNewTask()
    {
        $imgName = '';
        if (!empty($_POST) && isset($_POST['submit-task'])) {
            if (!empty($_FILES)) {
                $imgFile = $_FILES['file'];
                if (!empty($imgFile)) {
                    if (move_uploaded_file($imgFile['tmp_name'], IMG . '/' . $imgFile['name'])) {
                        $imgName = date('dms') . substr(session_id(), 0, 10) . '.jpg';
                        Image::load(IMG . '/' . $imgFile['name'])
                            ->width(320)
                            ->height(240)
                            ->save(IMG . '/' . $imgName);
                    }
                }
            }
            $model = new TaskModel();
            $model->img = $imgName;
            if ($model->saveTask()) {
                $this->setFlash('saveOk', 'Ваша задача успешно сохранена');
                header("Location: /main/index");
            }
        }

    }

    public function actionPreview()
    {
        if ($this->isAjax()) {
            $this->layout = false;
            $content = $_POST['content'];
            if (!empty($_SESSION['img_preview'])) {
                $content .= "<hr><img src=\"/public/images/preview/{$_SESSION['img_preview']}\">";
                unset($_SESSION['img_preview']);
            }
            echo $content;
        }
    }

    public function actionSaveImage()
    {
        if ($this->isAjax()) {
            $this->layout = false;
            if (isset($_SESSION['img_preview'])) {
                unlink(IMG_PREVIEW . '/' . $_SESSION['img_preview']);
                unset($_SESSION['img_preview']);
            }
            if (isset($_POST['img_file_upload'])) {
                $imgFile = $_FILES['upfile'];
                if (!empty($imgFile)) {
                    if (move_uploaded_file($imgFile['tmp_name'], IMG_PREVIEW . '/' . $imgFile['name'])) {
                        $newFileName = date('dms') . substr(session_id(), 0, 10);
                        Image::load(IMG_PREVIEW . '/' . $imgFile['name'])
                            ->width(320)
                            ->height(240)
                            ->save(IMG_PREVIEW . '/' . $newFileName . '.jpg');
                        $_SESSION['img_preview'] = $newFileName . '.jpg';
                        unlink(IMG_PREVIEW . '/' . $imgFile['name']);
                        return "<hr><img src=\"{$_SESSION['img_preview']}\">";
                    }
                }
            }
            return '';
        }
    }

    public function actionChangeSort()
    {
        $this->layout = false;
        if ($this->isAjax()) {
            if(!empty($_POST['sort'])) {
                $_SESSION['sort'] = $_POST['sort'];
                echo json_encode('ok');
                die;
            }
            echo json_encode('err'); die;
        }
    }
}
