<?php

namespace Georges\Models;

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
        "variationId": {
            "field": "variation_id",
            "fieldType": "int",
            "type": "int",
            "default":null
        },
        "createdAt": {
            "field": "created_at",
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
        "triggerEvent": {
            "field": "trigger_event",
            "fieldType": "json",
            "type": "array",
            "default":"[]"
        },
        "triggerUrl": {
            "field": "trigger_url",
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
