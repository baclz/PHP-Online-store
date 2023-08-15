<?php

namespace myfrx;

use PDO;
use PDOException;
use PDOStatement;

class Db
{
    private $connection;
    private PDOStatement $stmt;
    private static $instanse = null;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public function __wakeup()
    {
    }

    public static function getInstanse()
    {
        if (self::$instanse === null) {
            self::$instanse = new self();
        }
        return self::$instanse;
    }

    public function getConnection(array $db_config)
    {
        if ($this->connection instanceof PDO) {
            return $this;
        }

        $dsn = "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset={$db_config['charset']}";
        try {
            $this->connection = new PDO($dsn, $db_config['username'], $db_config['password'], $db_config['options']);
            return $this;
        } catch (PDOException $e) {
            abort(500);
        }
    }

    public function query($query, $params = [])
    {
        try {
            $this->stmt = $this->connection->prepare($query);
            $this->stmt->execute($params);
        } catch (PDOException $e) {
            return false;
        }
        return $this;
    }

    public function findAll()
    {
        return $this->stmt->fetchAll();
    }

    public function find()
    {
        return $this->stmt->fetch();
    }

    public function findOrFail()
    {
        $res = $this->find();
        if (!$res) {
            abort();
        } else {
            return $res;
        }
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function getColumn()
    {
        return $this->stmt->fetchColumn();
    }
}
