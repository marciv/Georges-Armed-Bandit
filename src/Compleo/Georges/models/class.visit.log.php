<?php

namespace  Compleo\Georges\Models;

// use Throwable;

class VisitLog extends Model
{
    const TABLE_NAME = 'visit_log';
    const TABLE_INDEX = 'visit_log_id';
    const SCHEMA = '{
        "visitLogId": {
            "field": "visit_id",
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
            "fieldType": "timestamp",
            "type": "string",
            "default":""
        },
        "device": {
            "field": "visit_ip",
            "fieldType": "string",
            "type": "string",
            "default":""
        },
        "visitInformations": {
            "field": "visit_informations",
            "fieldType": "json",
            "type": "array",
            "default":"[]"
        },    
    }';

    public function __construct($data = [])
    {
        parent::__construct($data, Visit::SCHEMA, Visit::TABLE_NAME, Visit::TABLE_INDEX);
    }
}
