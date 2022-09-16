<?php

namespace  Compleo\Georges\Models;

class Database
{
    public $pdo;
    private static $instance = null;

    private function __construct()
    {

        $dsn = 'mysql:host=' . Config::read('db.host') . ';dbname='    . Config::read('db.basename') . ';port='      . Config::read('db.port') . ';connect_timeout=15';
        $user = Config::read('db.user');
        $password = Config::read('db.password');
        try {
            $this->pdo = new \PDO($dsn, $user, $password);
            $this->pdo->exec("SET CHARACTER SET utf8");
        } catch (\PDOException $e) {
            throw new \Exception('I cannot connect to the database. Please edit configuration.php with your database configuration.');
        }
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }

    public function fetch(string $sqlQuery, array $sqlParameters)
    {
        $results    =   [];
        $stmt       =   $this->pdo->prepare($sqlQuery);
        $stmt->execute($sqlParameters);
        while (($row = $stmt->fetch($this->pdo::FETCH_ASSOC)) !== false) {
            array_push($results, $row);
        }
        return $results;
    }

    public function InsertOrUpdate(string $sqlQuery, array $sqlParameters)
    {
        $results    =   [];
        $stmt       =   $this->pdo->prepare($sqlQuery);
        $stmt->execute($sqlParameters);
        return $this->pdo->lastInsertId();
    }
    
}
