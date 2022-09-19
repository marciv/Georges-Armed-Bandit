<?php

namespace  Compleo\Georges\Models;

// use Throwable;

class Visit extends Model
{
    const TABLE_NAME = 'visit';
    const TABLE_INDEX = 'visit_id';
    const SCHEMA = '{
        "visitId": {
            "field": "visit_id",
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
            "default":""
        },
        "visitDate": {
            "field": "visit_date",
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
        "visitIp": {
            "field": "visit_ip",
            "fieldType": "string",
            "type": "string",
            "default":""
        }            
    }';

    public function __construct($data = [])
    {
        parent::__construct($data, Visit::SCHEMA, Visit::TABLE_NAME, Visit::TABLE_INDEX);
    }
}
