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

    public function setTargetsColumn($field_name) {
        $tgfn = $field_name;
        if (isset($this->raw_data[0][$field_name])) {
            foreach($this->raw_data as $value) {
                $this->targets[] = $value[$field_name];
            }
        }
    }


    public function setDataColumn($field_name) {
        $tgfn = $field_name;
        if (isset($this->raw_data[0][$field_name])) {
            foreach($this->raw_data as $value) {
                $this->data[] = $value[$field_name];
            }
        }
    }


    public function getTargets() {
        return $this->targets;
    }


    public function getData() {
        return $this->data;
    }

    public function checkAllFieldsStableInRawData() {



    }
}
