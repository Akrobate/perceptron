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
				'expected' => 0.2
			],
			[
				'noise_level'=> 0.8,
				'expected' => 0.8
			],
		];

		foreach($test_data as $t) {
			$noise = new DatasetNoise();

			$noise->setNoiseLevel($t['noise_level']);

			$yes = 0;
			$no = 0;

			for($i = 0; $i < $iteration_for_proba; $i++ ) {
				if ($noise->decideToAlterElement()) {
					$yes++;
				} else {
					$no++;
				}
			}

			var_dump($yes);
			var_dump($no);


			$proba =(float)($yes / $iteration_for_proba);

			var_dump($proba);
			var_dump($t['expected']);
			var_dump($proba - $t['expected']);
			// $this->assertEquals($proba, $t['expected']);
			// $this->assertEquals($t['expected'], $proba);

			$this->assertLessThan($accpetance_definition, abs($proba - $t['expected']));

			unset($noise);
		}

    }




}
