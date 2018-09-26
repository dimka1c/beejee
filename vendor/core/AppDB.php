<?php

namespace vendor\core;


class AppDB
{
    protected $pdo;

    public static $instance;

    public static $countQuery;

    public static $queryes = [];

    protected function __construct()
    {
        $db = require APP . '/config/db.php';
        $option = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        ];
        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['psw'], $option);
    }

    protected function __clone(){}

    public static function instance()
    {
        if (self::$instance === null) {
            return self::$instance = new self;
        }
        return self::$instance;
    }

    public function execute(string $sql): bool
    {
        self::$queryes[] = $sql;
        //$sql = $this->escape($sql);
        //$sql = $this->pdo->quote($sql);
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }

    public function query($sql)
    {
        self::$queryes[] = $sql;
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute();
        if ($result !== false) {
            return $stmt->fetchAll();
        }
        return [];
    }
}