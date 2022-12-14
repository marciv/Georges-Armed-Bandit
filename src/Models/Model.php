<?php

namespace Georges\Models;

use stdClass;
use Throwable;

class Model
{

    private object  $connection;
    private array   $schema;
    private string  $tableName;
    private string  $tableIndex;

    public function __construct(array $data = [], string $schema, string $tableName,  string $tableIndex)
    {
        $this->tableName = $tableName;
        $this->tableIndex = $tableIndex;
        if (empty($this->connection)) {
            try {
                $this->connection = Database::getInstance(); // use of a singleton pattern see more information here https://apprendre-php.com/tutoriels/tutoriel-45-singleton-instance-unique-d-une-classe.html        
            } catch (Throwable $e) {
                // Georges cannot be instantiated
                throw new \Exception('Database connection error, Georges cannot be instantiated');
                return false;
            }
        }
        try {
            $this->schema = json_decode($schema, true, 512, JSON_THROW_ON_ERROR);
            foreach ($this->schema as $property => $propertySet) {
                $this->$property = $propertySet['default'] ?? null;
                $type = (is_null($propertySet['default'])) ? 'null' : $propertySet['type'];
                settype($this->$property, $type);
            }
        } catch (\JsonException $exception) {
            throw new \Exception('JSON schema error');
        }
    }

    public function hydrate(array $data = [])
    {
        foreach ($this->schema as $property => $propertySet) {
            if (!empty($data[$propertySet['field']])) {
                $value  = $data[$propertySet['field']];
                $method = 'set' . ucfirst($property);
                if (is_callable([$this, $method])) {
                    $this->$method($value);
                } else {
                    $type = (is_null($propertySet['default']) and is_null($value)) ? 'null' : $propertySet['type'];
                    $this->$property = $this->convertType($value, $propertySet['fieldType'], $propertySet['type']);
                    settype($this->$property, $type);
                }
            } else {
                $default_value  = $propertySet['default'] ?? null;
                $this->$property = $default_value;
            }
        }
        return $this;
    }

    private function convertType($v, $fromType, $toType)
    {
        if ($toType == "json") {
            return json_encode($v);
        }

        if ($fromType == "json" && $toType == "array") {
            try {
                $jd = json_decode($v, false, 512, JSON_THROW_ON_ERROR);
            } catch (\JsonException $exception) {
                $jd = false;
            }
            return ($jd !== FALSE) ? json_decode($v, true) : [];
        }
        return $v;
    }

    public function get(int $id)
    {
        if (empty($id)) {
            return false;
        }
        $sqlParameters =   ['name' => $this->tableIndex, 'agrega' => '=', 'value' => $id];
        $results = $this->connection->fetch($this->tableName, 1, $sqlParameters);

        if (!empty($results[0])) {
            return $this->hydrate($results[0]);
        } else {
            $this->hydrate();
            return false;
        }
    }


    public function getList(int $limit = 10000, array $sqlParameters = null)
    {
        $results = $this->connection->fetch($this->tableName, $limit, $sqlParameters);
        if (!empty($results)) {
            return $results;
        } else {
            return false;
        }
    }

    public function save()
    {
        $data = [];
        foreach ($this as $k => $v) {
            if (array_key_exists($k, $this->schema)) {
                $data[$this->schema[$k]['field']] = $this->convertType($v, gettype($v), $this->schema[$k]['fieldType']);
            }
        }
        $this->index = $this->tableName . 'Id';
        if (!empty($this->index)) {

            $whereParameter = [$this->tableIndex => $data[$this->tableIndex]];
            $sqlParameters =  $data;
            echo '<pre>';
            print_r($whereParameter);
            echo '<br/>';
            print_r($sqlParameters);
            echo '</pre>';
            return $this->connection->updateOrInsert($this->tableName, $whereParameter, $sqlParameters);
        } else {
            echo 'empty table index <br/>';
        }
    }

    public function delete(int $id)
    {
        if (empty($id)) {
            return false;
        }

        $sqlParameters =   ['name' => $this->tableIndex, 'agrega' => '=', 'value' => $id];
        return $this->connection->delete($this->tableName, $sqlParameters);
    }
}
