<?php

include_once("functions.php");

class LocationsTest extends PHPUnit_Framework_TestCase {


	public static $nbr = 0;

    protected function setUp() {

    }


     public function testPerceptronCalculation() {

		$connected = "connected";

		$this->assertEquals($connected, 'connected');

    }

    protected function tearDown() {

    }
}
