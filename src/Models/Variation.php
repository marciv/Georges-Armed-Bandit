<?php

namespace Georges\Models;

// use Throwable;

class Variation  extends Model
{
    const TABLE_NAME = 'variation';
    const TABLE_INDEX = 'variation_id';
    const SCHEMA = '{
        "variationId": {
            "field": "variation_id",
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
        "uriRegex": {
            "field": "uri_regex",
            "fieldType": "string",
            "type": "string",
            "default":""
        },
        "parameters": {
            "field": "parameters",
            "fieldType": "json",
            "type": "array",
            "default":"[]"
        },
        "statut": {
            "field": "statut",
            "fieldType": "string",
            "type": "string",
            "default":"off"
        }                 
    }';

    public function __construct($data = [])
    {
        parent::__construct($data, Variation::SCHEMA, Variation::TABLE_NAME, Variation::TABLE_INDEX);
    }
}
