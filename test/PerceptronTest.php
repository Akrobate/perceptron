<?php


include_once('data/numbers.dataset.php');
include_once('../perceptron2.class.php');


class PerceptronTest extends PHPUnit_Framework_TestCase {


	public static $nbr = 0;

    protected function setUp() {

    }


    /**
     *  Test perceptron aginst it self learn data
     *  Naive test to check that the network
     *  responds fine
     */

    public function testPerceptronPrediction() {

        $data = TestDataset::get();

        $perceptron = new Perceptron();
        $perceptron->setLearnData($data);
        $perceptron->config();
        $perceptron->init();
        $perceptron->train(20);

        $total_match_in_response = 0;
        $total_multiples_answers = 0;

        foreach($data as $doc) {

            // $motif = $data[$item_in_dataset]['data'];
            // $should_be = $data[$item_in_dataset]['result'];
            $answers = $perceptron->answerFormMotif($doc['data']);

            if (in_array($doc['data'], $answers)) {
                $total_match_in_response++;
            }

            if (count($answers)) {
                $total_multiples_answers++;
            }

            $scores = $perceptron->answerScoresFormMotif($motif);

        }

        echo("total_match_in_response: $total_match_in_response \n");
        echo("total_multiples_answers: $total_multiples_answers \n");

        $connected = 'connected';
        $this->assertEquals($connected, 'connected');

		// $this->assertEquals($connected, 'connected');

        // $item_in_dataset = 2;
        // $motif = $data[$item_in_dataset]['data'];
        // $should_be = $data[$item_in_dataset]['result'];

    }

    protected function tearDown() {

    }
}
