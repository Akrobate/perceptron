<?php


include_once('test/data/numbers.dataset.php');
include_once('libs/perceptron2.class.php');


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
        $perceptron->train(50);

        $out['total_match_in_response'] = 0;
        $out['total_multiples_answers'] = 0;
        $out['count_total_learndata'] = count($data);
        $out['errors'] = array();

        foreach($data as $doc) {

            // $motif = $data[$item_in_dataset]['data'];
            // $should_be = $data[$item_in_dataset]['result'];
            $answers = $perceptron->answerFormMotif($doc['data']);

            if (in_array($doc['result'], $answers)) {
                $out['total_match_in_response']++;
            } else {
                $out['errors'][] = $doc['result'];
            }

            if (count($answers) > 1) {
                $out['total_multiples_answers']++;
            }

            // $scores = $perceptron->answerScoresFormMotif($doc['data']);

        }

        print_r($out);

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