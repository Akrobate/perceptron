<?php

/**
 * Noise generator in arrays
 * Use full to test and boost learning of
 * a percpetron
 *
 */

class DatasetNoise {

    public $noise_level;

    public construct() {
        $this->noise_level = 0;
    }

    /**
     * setter for the noise level
     */

    public function setNoiseLevel($noise) {
        $this->noise_level = $noise;
    }

    /**
     *
     */

    public function process($dataset) {
        return $dataset;
    }

}
