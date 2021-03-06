<?php

/**
 *  Noise generator in arrays
 *  Use full to test and boost learning of
 *  a percpetron
 *
 *  Works with Dataset Entity and provide binary
 *  (for the moment) noise on the data only. Not targets.
 *
 */

class DatasetNoise {

    public $noise_level;
    public $source_dataset;
    public $working_copy_dataset;

    function __construct() {
        $this->noise_level = 0;
    }


    /**
     *  setter for the noise level
     *  @param: $noise float value range[0.0, 1.0]
     *  @return void
     */

    public function setNoiseLevel($noise) {
        if ($noise < 0 || $noise > 1) {
            throw new Exception('$noise out of range [0.0, 1.0]');
        } else {
            $this->noise_level = $noise;
        }
    }

    public function getNoiseLevel() {
        return $this->noise_level;
    }

    /**
     * Processes noise
     */

    public function process($dataset, $noise_mode = 'binairy') {
        $this->source_dataset = $dataset;
        $this->working_copy_dataset = clone $dataset;
        $result = array();
        switch ($noise_mode) {
            case 'binairy':
                $result = $this->processBinaryNoise($this->working_copy_dataset);
                break;
            default:
                break;
        }
        return $dataset;
    }


    /**
     *  @param: $data array[1,0,0,1,1,1,0,...]
     */

    public function processBinaryNoise($data) {
        $noised_data = array();
        foreach($data as $key => $element) {
            if ($this->decideToAlterElement()) {
                $noised_data[$key] = $this->binaryToggleValue($data[$key]);
            }
        }
        return $noised_data;
    }


    /**
     *  Method to switch toggle binairy value
     *  example: if 1 the return 0 else if 0 return 1
     */

    public function binaryToggleValue($value) {
        $result = 1;
        if ($value) {
            $result = 0;
        }
        return $result;
    }



    /**
     *  Method wich decide to alter element with noise_level probability
     *  @return boolean Return true if element needs to be altered
     *
     */

    public function decideToAlterElement() {
        $response = false;
        if (mt_rand() / mt_getrandmax() < $this->noise_level) {
            $response = true;
        }
        return $response;
    }
}
