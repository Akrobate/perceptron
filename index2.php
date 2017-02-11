<?php

// test de reseaux de neurones Baysiens

/**
 *	Artiom FEDOROV
 *	Simple perceptron test
 */



require_once("init3.php");
require_once("renderdata.class.php");
require_once("perceptron2.class.php");





$perceptron = new Perceptron2();

$perceptron->setLearnData($data);
$perceptron->config();
$perceptron->init();
//print_r ($perceptron->getLearnData());
//print_r ($perceptron->getWeights());



for ($x = 0; $x < 100; $x++) {
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
            echo ($perceptron->getCountLearnData());
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


foreach ($perceptron->getWeights() as $w) {
	echo (RenderData::drawWeights($w));
}








?>
