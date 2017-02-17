<?php


include_once('test/data/numbers.dataset.php');
include_once('libs/datasetnoise.class.php');


class DatasetNoiseTest extends PHPUnit_Framework_TestCase {


	public static $nbr = 0;

    protected function setUp() {

    }

    public function testSetNoiseLevel() {
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

    public function testDecideToAlterElement() {
		$iteration_for_proba = 10000;
		$accpetance_definition = 0.01;
		$test_data = [
			[
				'noise_level'=> 0.2,
				'nbr_iterations' => 100000,
				'acceptance_level' => 0.01
			],
			[
				'noise_level'=> 0.8,
				'nbr_iterations' => 1000000,
				'acceptance_level' => 0.001
			],
		];

		foreach($test_data as $t) {
			$noise = new DatasetNoise();
			$noise->setNoiseLevel($t['noise_level']);

			$yes = 0;
			$no = 0;
			for($i = 0; $i < $t['nbr_iterations']; $i++ ) {
				if ($noise->decideToAlterElement()) {
					$yes++;
				} else {
					$no++;
				}
			}
			$proba =(float)($yes / $t['nbr_iterations']);
			$this->assertLessThan($t['acceptance_level'], abs($proba - $t['noise_level']));
			unset($noise);
		}
    }
}
