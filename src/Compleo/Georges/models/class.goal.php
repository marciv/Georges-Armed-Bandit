<?php

namespace  Compleo\Georges\Models;

// use Throwable;

class Goal extends Model
{
    const TABLE_NAME = 'goal';
    const TABLE_INDEX = 'goal_id';
    const SCHEMA = '{
        "goalId": {
            "field": "goal_id",
            "fieldType": "int",
            "type": "int",
            "default":null
        },
        "testId": {
            "field": "test_id",
            "fieldType": "int",
            "type": "int",
            "default":null
        },
        "variationId": {
            "field": "variation_id",
            "fieldType": "string",
            "type": "string",
            "default":null
        },
        "goalDate": {
            "field": "goal_date",
            "fieldType": "timestamp",
            "type": "string",
            "default":""
        },
        "deviceDetected": {
            "field": "device_detected",
            "fieldType": "string",
            "type": "string",
            "default":""
        },
        "goalIp": {
            "field": "goal_ip",
            "fieldType": "string",
            "type": "string",
            "default":""
        }            
    }';

    public function __construct($data = [])
    {
        parent::__construct($data, Goal::SCHEMA, Goal::TABLE_NAME, Goal::TABLE_INDEX);
    }
}
