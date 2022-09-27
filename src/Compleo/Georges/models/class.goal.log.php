<?php

namespace  Compleo\Georges\Models;

// use Throwable;

class GoalLog extends Model
{
    const TABLE_NAME = 'goal_log';
    const TABLE_INDEX = 'goal_log_id';
    const SCHEMA = '{
        "goalLogId": {
            "field": "goal_log_id",
            "fieldType": "int",
            "type": "int",
            "default":null
        },
        "date": {
            "field": "date",
            "fieldType": "timestamp",
            "type": "string",
            "default":""
        },
        "sessionId": {
            "field": "session_id",
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
