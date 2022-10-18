<?php

namespace  Georges\Models;

use Illuminate\Database\Capsule\Manager as Capsule;
use Throwable;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../Config/');
$dotenv->load();

class Database
{
    public $DB;
    private static $instance = null;

    private function __construct()
    {
        $this->DB = new Capsule;
        $this->DB->addConnection([
            'driver'    => $_ENV['DB_DRIVER'],
            'host'      => $_ENV['DB_HOST'],
            'port'      => $_ENV['DB_PORT'],
            'database'  => $_ENV['DB_NAME'],
            'username'  => $_ENV['DB_USER'],
            'password'  => $_ENV['DB_PASSWORD'],
            'charset'   => $_ENV['DB_CHARSET'],
            'collation' => $_ENV['DB_COLLATION']
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

    public function fetch(string $table, int $limit, array $sqlParameters = null, array $jointure = null, string $anotherSql = "", string $groupBy = "")
    {
        $results = [];
        if (!empty($sqlParameters) && !empty($jointure)) {
            if (!empty($jointure[1])) {
                $stmt = $this->DB::table($table)
                    ->where($sqlParameters['name'], $sqlParameters['agrega'], $sqlParameters['value'])
                    ->leftjoin($jointure[0]['table'], $jointure[0]['firstColumn'], $jointure[0]['agrega'], $jointure[0]['secondColumn'])
                    ->leftjoin($jointure[1]['table'], $jointure[1]['firstColumn'], $jointure[1]['agrega'], $jointure[1]['secondColumn'])
                    ->select($this->DB::raw($anotherSql))
                    ->groupBy($groupBy)
                    ->limit($limit)
                    ->get();
            } else {
                $stmt = $this->DB::table($table)
                    ->where($sqlParameters['name'], $sqlParameters['agrega'], $sqlParameters['value'])
                    ->leftjoin($jointure['table'], $jointure['firstColumn'], $jointure['agrega'], $jointure['secondColumn'])
                    ->select($this->DB::raw($anotherSql))
                    ->groupBy($groupBy)
                    ->limit($limit)
                    ->get();
            }
        } else if (!empty($sqlParameters)) {
            $stmt = $this->DB::table($table)
                ->where($sqlParameters['name'], $sqlParameters['agrega'], $sqlParameters['value'])
                ->limit($limit)
                ->get();
        } else {
            $stmt = $this->DB::table($table)
                ->limit($limit)
                ->get();
        }
        if (!empty($stmt[0])) {
            for ($i = 0; $i < count($stmt); $i++) {
                foreach (get_object_vars($stmt[$i]) as $key => $value) {
                    $result[$key] = $value;
                }
                array_push($results, $result);
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
