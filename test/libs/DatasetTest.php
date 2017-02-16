<?php


include_once('test/data/numbers.dataset.php');
include_once('libs/dataset.class.php');

class DatasetTest extends PHPUnit_Framework_TestCase {

    protected function setUp() {

    }

    public function testTargetsExtraction() {

        $value = [
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

        $expected = [1,2,3];

        $dataset = new Dataset($value);
        $dataset->setTargetsColumn('response');
        $targets = $dataset->getTargets();
        $this->assertEquals(json_encode($targets), json_encode($expected));
    }


    public function testDataExtraction() {

        $value = [
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

        $expected = [[1,0,0], [0,1,0],[0,0,1]];

        $dataset = new Dataset($value);
        $dataset->setDataColumn('data');
        $data = $dataset->getData();
        $this->assertEquals(json_encode($data), json_encode($expected));
    }

}
