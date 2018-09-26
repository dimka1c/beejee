<?php
/**
 * Created by PhpStorm.
 * User: dimka1c
 * Date: 24.09.2018
 * Time: 20:35
 */

namespace app\models;


use vendor\core\AppModel;

class TaskModel extends AppModel
{
    public $table = 'task';

    public $task = [];

    public $img = '';

    protected function verifyPostData(): bool
    {
        if (!empty($_POST)){
            foreach ($_POST as $key => $val) {
                if (empty($val)) return false;
                $this->task[$key] = htmlspecialchars($val);
            }
            return true;
        }
        return false;
    }

    protected function escape(string $value): string
    {
        $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
        $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");
        return str_replace($search, $replace, $value);
    }

    public function saveTask(): bool
    {
        if ($this->verifyPostData()) {
            $sql = "INSERT INTO {$this->table} (user, email, task_text, img, status) 
                    VALUES ('{$this->task['user-name']}', 
                            '{$this->task['user-email']}', 
                            '{$this->escape($this->task['content'])}', 
                            '{$this->img}',
                             '0')";
            return $this->query($sql);
        }
    }

    public function getTask(int $page = 0, string $sort = 'user', int $status = 0): array
    {
        if ($page == 0) {
            $sql = "SELECT * FROM {$this->table} ORDER BY {$sort} ASC";
            return $this->findAll($sql);
        }
        $page = ($page-1)*3;
        $sql = "SELECT * FROM {$this->table} ORDER BY {$sort} ASC  LIMIT {$page}, 3";
        return $this->findAll($sql);
    }

    public function getCountTask(): array
    {
        $sql = "SELECT COUNT(id) as records FROM {$this->table}";
        return $this->findAll($sql);
    }

    public function getOneTask(int $id): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = '{$id}'";
        return $this->findAll($sql);
    }

    public function updateRecord(int $id, string $text, int $status): bool
    {
        $sql = "UPDATE task SET task_text='{$text}', status='$status' WHERE  id={$id}";
        return $this->query($sql);
    }
}