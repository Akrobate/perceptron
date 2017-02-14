<?php


include_once('data/numbers.dataset.php');

class PerceptronTest extends PHPUnit_Framework_TestCase {


	public static $nbr = 0;

    protected function setUp() {

    }


     public function testPerceptronCalculation() {

        $data = TestDataset::get();
        print_r($data);
		$this->assertEquals($connected, 'connected');
        $connected = "connected";
        $item_in_dataset = 2;
        $motif = $data[$item_in_dataset]['data'];
        $should_be = $data[$item_in_dataset]['result'];
        echo("Should be $should_be");
    }

    protected function tearDown() {

    }
}
