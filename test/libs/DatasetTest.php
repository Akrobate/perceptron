<?php


include_once('test/data/numbers.dataset.php');
include_once('libs/dataset.class.php');


$raw_data = [
    array(
        'response' => 1,
        'data'=> [1,0,0]
    ),
    array(
        'response' => 2,
        'data'=> [0,1,0]
    ),
    array(
        'response' => 3,
        'data'=> [0,0,1]
    )
];



class DatasetTest extends PHPUnit_Framework_TestCase {


	public static $nbr = 0;

    protected function setUp() {

    }


    public function testTargetsExtraction() {



        new Dataset($raw_data);
print_r($raw_data);
    }

}
