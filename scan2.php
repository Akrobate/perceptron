<?php

	define('NBWIDTH', 5);
	define('NBHEIGHT', 6);

	define('PXWIDTH', 50);
	define('PXHEIGHT', 50);

	require_once("init3.php");
	require_once("renderdata.class.php");
	require_once("perceptron2.class.php");

	$perceptron = new Perceptron();
    $perceptron->setLearnData($data);

	$perceptron->config();
	$perceptron->init();
	$perceptron->train(20);



	// construction du motif a partir du submit

	for ($i = 0; $i < 30; $i++) {
		if (@in_array($i, $_POST['data'])) {
			$motif[$i] = 1;
		} else {
			$motif[$i] = 0;
		}
	}


	echo (RenderData::draw($motif));

	$answers = $perceptron->answerFormMotif($motif);
	$scores = $perceptron->answerScoresFormMotif($motif);

	if (!isset($_POST['data'])) {
		$posted_data = array();
	} else {
		$posted_data = $_POST['data'];
	}


?>

<html>
	<head>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script>
			$(document).ready(function() {
				applyOB();
			});
			function applyOB() {
				$('#perceptronGrid .elem').click(function() {
					if ($(this).find('input').attr('checked')) {
						$(this).css('background-color', '#FFFFFF');
						$(this).find('input').attr('checked', false);
					} else {
						$(this).css('background-color', '#000000');
						$(this).find('input').attr('checked', true);
					}
				});
			}
		</script>
		<style>

		</style>
	</head>

	<body>

		<form method="post">
			<div id="perceptronGrid" style="width:<? echo(NBWIDTH*PXWIDTH + (NBWIDTH * 2)) ?>;height:<? echo(NBHEIGHT * PXHEIGHT + (NBHEIGHT * 2)) ?>; border:1px solid black">
				<? for ($i=0; $i < NBWIDTH * NBHEIGHT ; $i++):  ?>
					<div class="elem" style="width:<?=PXWIDTH?>px;height:<?=PXHEIGHT?>px;border:1px solid black;float:left;<? if (@in_array($i, $posted_data)):?>background-color:#000000;<? endif; ?> ">
						<input type="checkbox" style="display:none" name="data[]" value="<?=$i?>"  <? if (@in_array($i, $posted_data)):?>checked="checked"<? endif; ?> />
					</div>
				<? endfor; ?>
				<div style="clear:both"></div>
			</div>

			<div class="monitor"><? print_r($answers) ?><br /><? print_r($scores) ?></div>

			<input type="submit" value="ok">
		</form>

		<?php
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
		?>
	</body>
</html>
