<?php

namespace Georges\Models;

// use Throwable;

class VisitLog extends Model
{
    const TABLE_NAME = 'visit_log';
    const TABLE_INDEX = 'visit_log_id';
    const SCHEMA = '{
        "visitLogId": {
            "field": "visit_log_id",
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
        "sessionId": {
            "field": "session_id",
            "fieldType": "string",
            "type": "string",
            "default":""
        },
        "device": {
            "field": "device",
            "fieldType": "string",
            "type": "string",
            "default":""
        },
        "visitInformations": {
            "field": "visit_information",
            "fieldType": "json",
            "type": "array",
            "default":"[]"
        },
        "date": {
            "field": "date",
            "fieldType": "timestamp",
            "type": "string",
            "default":""
        }
    }';

    public function __construct($data = [])
    {
        parent::__construct($data, VisitLog::SCHEMA, VisitLog::TABLE_NAME, VisitLog::TABLE_INDEX);
    }
}
