<?php

namespace  Georges;


// use Throwable;

class Test  extends Model{
    CONST TABLE_NAME = 'test';
    CONST TABLE_INDEX = 'test_id';
    CONST SCHEMA = '{
        "testId": {
            "field": "test_id",
            "fieldType": "int",
            "type": "int",
            "default":null
        },
        "startDate": {
            "field": "start_date",
            "fieldType": "timestamp",
            "type": "string",
            "default":""
        },
        "name": {
            "field": "name",
            "fieldType": "string",
            "type": "string",
            "default":""
        },
        "description": {
            "field": "description",
            "fieldType": "string",
            "type": "string",
            "default":""
        },
        "filters": {
            "field": "filters",
            "fieldType": "json",
            "type": "array",
            "default":"[]"
        },
        "trackingVars": {
            "field": "tracking_vars",
            "fieldType": "json",
            "type": "array",
            "default":"[]"
        },
        "discoveryRate": {
            "field": "discovery_rate",
            "fieldType": "float",
            "type": "float",
            "default":"0.1"
        },
        "options": {
            "field": "options",
            "fieldType": "json",
            "type": "array",
            "default":"[]"
        },
        "statut": {
            "field": "statut",
            "fieldType": "string",
            "type": "string",
            "default":"off"
        },
        "variations": {
            "field": "variations",
            "fieldType": "json",
            "type": "array",
            "default":"[]"
        },                        
        "uriRegex": {
            "field": "uri_regex",
            "fieldType": "string",
            "type": "string",
            "default":""
        }                        
    }';

    public function __construct($data = []){
        parent::__construct($data,Test::SCHEMA,Test::TABLE_NAME,Test::TABLE_INDEX);
    }

}



?>

