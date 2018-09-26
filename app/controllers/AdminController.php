<?php
/**
 * Created by PhpStorm.
 * User: dimka1c
 * Date: 25.09.2018
 * Time: 18:38
 */

namespace app\controllers;


use app\models\TaskModel;
use app\models\UserModel;
use vendor\core\AppController;

class AdminController extends AppController
{

    public $layout = 'admin';

    public function actionIndex()
    {
        if(UserModel::isAdmin()) {
            header("Location: /admin/tasks");
        }
        if(!empty($_POST['login']) && !empty($_POST['psw'])) {
            $model = new UserModel();
            $user = $model->findUser($_POST['login']);
            if (!empty($user)) {
                if (password_verify($_POST['psw'], $user[0]['psw'])) {
                    foreach ($user[0] as $key => $val) {
                        if ($key != 'psw') {
                            $_SESSION['user'][$key] = $val;
                        }
                    }
                    header("Location: /admin/tasks");
                }
            }
        }
    }

    public function actionTasks()
    {
        if (UserModel::isAdmin()) {
            $model = new TaskModel();
            $task = $model->getTask(0, 'user', 0);
            $this->setDataView(['task' => $task]);
        } else {
            header("Location: /admin/index");
        }
    }

    public function actionEditTask()
    {
        if (UserModel::isAdmin()) {
            $model = new TaskModel();
            $id = $this->route['param'];
            if (!empty($id)) {
                $task = $model->getOneTask($id);
                $this->setDataView(compact('task'));
            }
        } else {
            header("Location: /admin/index");
        }
    }

    public function actionSaveEditTask()
    {
        if (UserModel::isAdmin()) {
            if (isset($_POST['save-edit-task'])) {
                $id = $_POST['id'];
                $text = htmlspecialchars($_POST['content']);
                $status = $_POST['status'] == 'on' ? 1 : 0;
                $model = new TaskModel();
                $res = $model->updateRecord($id, $text, $status);
                if ($res) {
                    header("Location: /admin/tasks");
                }
            }
        }
    }

}