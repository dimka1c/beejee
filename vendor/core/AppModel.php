<?php

namespace vendor\core;

abstract class AppModel
{

    protected $table;

    protected $pdo;

    public function __construct()
    {
        $this->pdo = AppDB::instance();
    }

    public function query(string $sql): bool
    {
        return $this->pdo->execute($sql);
    }

    public function findAll(string $sql): array
    {
        return $this->pdo->query($sql);
    }

    public function generatePasswordHash(string $psw): string
    {
        return password_hash($psw, PASSWORD_DEFAULT);
    }

}