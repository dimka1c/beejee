<?php
/**
 * Created by PhpStorm.
 * User: dimka1c
 * Date: 25.09.2018
 * Time: 19:14
 */

namespace app\models;


use vendor\core\AppModel;

class UserModel extends AppModel
{
    public $table = 'user';

    public function findUser(string $login):array
    {
        $sql = "SELECT * FROM user WHERE login = '{$login}'";
        return $this->findAll($sql);
    }

    public static function isAdmin(): bool
    {
        if(isset($_SESSION['user'])) {
            if($_SESSION['user']['admin'] == 1) {
                return true;
            }
        }
        return false;
    }

}