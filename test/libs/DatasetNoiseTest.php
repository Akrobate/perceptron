<?php


include_once('test/data/numbers.dataset.php');
include_once('libs/datasetnoise.class.php');


class DatasetNoiseTest extends PHPUnit_Framework_TestCase {


	public static $nbr = 0;

    protected function setUp() {

    }

    public function testNoise() {


		$test_data = [
			[
				'value'=> 0.2,
				'expected' => 0.2
			],
			[
				'value'=> 0.898,
				'expected' => 0.898
			],
			[
				'value'=> 1.898,
				'expected' => null
			],
			[
				'value'=> -1.898,
				'expected' => null
			],
		];

		foreach($test_data as $t) {
			$noise = new DatasetNoise();
			try {
				$noise->setNoiseLevel($t['value']);
				$this->assertEquals($noise->getNoiseLevel(), $t['expected']);
			} catch(Exception $e) {
				$this->assertEquals($noise->getNoiseLevel(), $t['expected']);
			}
			unset($noise);
		}

    }




}
