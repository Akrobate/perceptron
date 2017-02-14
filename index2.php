<?php

/**
 *	Artiom FEDOROV
 *	Simple perceptron test
 *	test de reseaux de neurones Baysiens
 */

require_once("init3.php");
require_once("renderdata.class.php");
require_once("perceptron2.class.php");

$perceptron = new Perceptron();

$perceptron->setLearnData($data);
$perceptron->config();
$perceptron->init();
//print_r ($perceptron->getLearnData());
//print_r ($perceptron->getWeights());

for ($x = 0; $x < 50; $x++) {
	for ($i = 0; $i < $perceptron->getCountLearnData(); $i++) {
		for($j = 0; $j < $perceptron->getNbitems(); $j++) {
			$perceptron->learn($i, $j);
		}
	}

	$r = array();

	echo ('<table style="border:1px solid black">');
	for ($i = 0; $i < $perceptron->getNbitems(); $i++) {

		echo('<tr>');
		for($j = 0; $j < $perceptron->getCountLearnData(); $j++) {
            //echo ($perceptron->getCountLearnData());
			$r[$i][$j] = $perceptron->calcul($j, $i);
			if ($r[$i][$j]) {
				$color = '#000000';
			} else {
				$color = '#FFFFFF';
			}
			echo('<td width=20 height=20 style="background-color:'.$color.';" >');
			echo('</td>');
		}
		echo('</tr>');
	}
	echo ('</table>');

}

$item_in_dataset = 2;

$motif = $data[$item_in_dataset]['data'];
$should_be = $data[$item_in_dataset]['result'];

echo("Should be $should_be");

$answers = $perceptron->answerFormMotif($motif);
$scores = $perceptron->answerScoresFormMotif($motif);
echo("Answers");
print_r($answers);
echo("Scores");
print_r($scores);

// test for each

/*
for($i = 0; $i < count($data); i++) {

    echo()

    echo('<br>');
}
*/


foreach ($perceptron->getWeights() as $w) {
	echo (RenderData::drawWeights($w));
}
