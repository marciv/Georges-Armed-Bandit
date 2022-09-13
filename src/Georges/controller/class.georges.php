<?php

namespace  Compleo\Georges;
use        Compleo\Models;

use Throwable;

class Test extends Models {


    public int $testId;
    public string $startDate;
    public string $name;
    public string $description;
    public array $filters;
    public array $trackingVars;
    public float $discoveryRate;
    public array $options;
    public string $statut;
    public array $variations;
    public string $uriRegex;
    private object $connection;
    private array $_log;
    

    CONST DISCOVERY_RATE_DEFAULT = 0.1;

    public function __construct($data = []){
        if(empty($this->connection)){
            try{
                $this->connection = Database::getInstance(); // use of a singleton pattern see more information here https://apprendre-php.com/tutoriels/tutoriel-45-singleton-instance-unique-d-une-classe.html        
            }  catch(Throwable $e){
                // Georges cannot be instantiated
                $_log[] = 'Database connection error, Georges cannot be instantiated';
                return false;
            }
        }

        $this->testId       =   $data['id']??0;
        $this->startDate    =   $data['startDate']??'';
        $this->name         =   $data['name']??'';
        $this->description  =   $data['description']??'';
        $this->filters      =   $data['filters']??[];
        $this->trackingVars =   $data['trackingVars']??[];
        $this->discoveryRate=   $data['discoveryRate']??Test::DISCOVERY_RATE_DEFAULT;
        $this->options      =   $data['options']??[];
        $this->statut       =   $data['statut']??'';
        $this->variations   =   $data['variations']??[];
        $this->uriRegex    =    $data['uri_regex']??'';

    }

    public function hydrate(array $data=[])  { 
        if(is_iterable($data) && !empty($data)){
            foreach($data as $attribut => $value){
                $method = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $attribut)));            
                if(is_callable([$this,$method])) {
                    $this->$method($value);
                } else {
                    $property = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $attribut))));
                    // if(gettype($data[$attribut]) == 'string' && @gettype( $this->$property) == 'array') {
                    //         $this->$property = @json_decode($value,true);
                    //     } else {
                            $this->$property = $value;
                        // }
                }
            }
        } else {
            $obj = new Test();
            foreach($obj as $property=>$value){
                $this->$property = $obj->$property;
            }
        }
        return $this;
    }
    
    private function to_array($v){
        switch(gettype($v)){
            case 'string':
                try {  
                    $jd = json_decode($v, false, 512, JSON_THROW_ON_ERROR);  
                }  
                catch (\JsonException $exception) {  
                    $jd = false;                    
                }                
                return ($jd !== FALSE)?json_decode($v,true):[$v];
            break; 
            case 'array':
                return $v;
            default:
                return [];
        }
    }

    private function to_json($v){
        switch(gettype($v)){
            case 'string':
                try {  
                    $jd = json_decode($v, false, 512, JSON_THROW_ON_ERROR);  
                }  
                catch (\JsonException $exception) {  
                    $jd = false;                    
                }                 
                return ( $jd !== FALSE)?$v:json_encode($v);
            break;
            case 'array':
                return json_encode($v);
            default:
                return "{}";
        
        }
        
    }    

    public function setTrackingVars($trackingVars){
        $this->trackingVars=$this->to_array($trackingVars);
    }

    public function setFilters($setFilters){
        $this->setFilters=$this->to_array($setFilters);
    }   
    
    public function setOptions($setOptions){
        $this->setOptions=$this->to_array($setOptions);
    }     

    public function setVariations($setVariations){
        $this->setVariations=$this->to_array($setVariations);
    }


    public function getTest(int $id)  {
        if(empty($id)){return false;}
        $sqlQuery      =   "SELECT * FROM `test` WHERE test_id = :id  ";
        $sqlParameters =   ['id' => $id];
        $results = $this->connection->fetch( $sqlQuery, $sqlParameters);    
        if(!empty($results[0])){            
            return $this->hydrate($results[0]);
        } else {            
            $this->hydrate();
            return false;
        }
    }

    public function save(){
        $data =(array)$this;
        foreach($data as $k=>$v){
            if(gettype($v) == 'array'){
                $data[$k]=$this->to_json($v);
            } else {
                $data[$k]=$v;
            }
        }
        // var_dump($data);
        var_dump($this->to_json([]));
        if(!empty($this->testId)){
        $sqlQuery="UPDATE `test` SET  ";
        foreach($this as $property => $value){
            $fieldName = strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1_', $property));
            $sqlQuery.=" $fieldName=:$property,";
        }
        $sqlQuery=trim( $sqlQuery,',');
        $sqlQuery.=" WHERE  test_id = :test_id  ";
        $sqlParameters =  $data;
        // return $this->connection->InsertOrUpdate( $sqlQuery, $sqlParameters);

        } else {


        }
    }    

    public function deleteTest(){

    }    

    public function getVariation(){

    }        

    public function setVariation(){

    }
    
    public function deleteVariation(){


    }
    
    public function addVisit(){

    }

    public function getAllVisit(){


    }
    
    public function addGoal(){

    }    

    public function getAllGoal(){

    } 


}



?>

