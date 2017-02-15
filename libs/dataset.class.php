<?php

/**
 * Container and transformer
 * of a learn / test datasets
 * a percpetron
 *
 *
 */

class Dataset {

    public $raw_data;
    public $raw_data_fields;
    public $raw_data_count;

    public $data;
    public $targets;
    public $targets_fields_name;

    function __construct($raw_data) {
        $this->raw_data = $raw_data;
    }

    public function setTargetsColumn($targets_field_name) {
        if (in_array($targets_field_name, $raw_data[0])) {
            $this->targets = array_map(function($value) {
                return $value[$targets_field_name];
            }, $this->raw_data);
        }
    }

    public function getTargets() {
        return $this->targets;
    }

    public function checkAllFieldsStableInRawData() {



    }
}
