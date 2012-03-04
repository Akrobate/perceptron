<?php



require_once("init2.php");
require_once("renderdata.class.php");
require_once("perceptron.class.php");






$perceptron = new Perceptron();
$perceptron->config();
$perceptron->init();
$perceptron->setLearnData($data);

//print_r ($perceptron->getLearnData());
//print_r ($perceptron->getWeights());



for ($x = 0; $x < 20; $x++) {
	for ($i = 0; $i < 7; $i++) {
		for($j = 0; $j < 7; $j++) {
			$perceptron->learn($j, $i);
		}
	}




$r = array();

echo ('<table style="border:1px solid black">');
for ($i = 0; $i < 7; $i++) {
	
	echo('<tr>');
	for($j = 0; $j < 7; $j++) {
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













?>
