<?php

namespace  Compleo\Georges\Models;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public $DB;
    private static $instance = null;

    private function __construct()
    {
        $this->DB = new Capsule;

        $this->DB->addConnection([
            'driver'    => 'mysql',
            'host'      => Config::read('db.host'),
            'database'  => Config::read('db.basename'),
            'username'  => Config::read('db.user'),
            'password'  => Config::read('db.password'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        // Make this Capsule instance available globally via static methods... (optional)
        $this->DB->setAsGlobal();

        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $this->DB->bootEloquent();
    }

    // public $pdo;
    // private static $instance = null;

    // private function __construct()
    // {

    //     $dsn = 'mysql:host=' . Config::read('db.host') . ';dbname='    . Config::read('db.basename') . ';port='      . Config::read('db.port') . ';connect_timeout=15';
    //     $user = Config::read('db.user');
    //     $password = Config::read('db.password');
    //     try {
    //         $this->pdo = new \PDO($dsn, $user, $password);
    //         $this->pdo->exec("SET CHARACTER SET utf8");
    //     } catch (\PDOException $e) {
    //         throw new \Exception('I cannot connect to the database. Please edit configuration.php with your database configuration.');
    //     }
    // }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }

    public function fetch(string $table, int $limit = 10000, array $sqlParameters = null)
    {
        $results = [];
        if (!empty($sqlParameters)) {
            $stmt = $this->DB::table($table)
                ->where($sqlParameters['name'], $sqlParameters['agrega'], $sqlParameters['value'])
                ->limit($limit)
                ->get();
        } else {
            $stmt = $this->DB::table($table)
                ->limit($limit)
                ->get();
        }
        // var_dump($stmt);
        if (!empty($stmt[0])) {
            foreach (get_object_vars($stmt[0]) as $key => $value) {
                $results[$key] = $value;
            }
        }

        // var_dump($results);
        return $results;
    }

    public function updateOrInsert(string $table, array $whereParameters, array $sqlParameters)
    {
        if (!empty($sqlParameters[$table . '_id'])) {
            $result = @$this->DB::table($table)->where($whereParameters)->update($sqlParameters);
        } else {
            $result = @$this->DB::table($table)->insert($sqlParameters);
        }
        return $result;
    }

    public function delete(string $table, array $sqlParameters)
    {
        $deleted = $this->DB::table($table)
            ->where($sqlParameters['name'], $sqlParameters['agrega'], $sqlParameters['value'])
            ->delete();
        return $deleted;
    }
}
