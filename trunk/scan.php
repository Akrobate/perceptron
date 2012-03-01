<?php

	define('NBWIDTH', 5);
	define('NBHEIGHT', 6);

	define('PXWIDTH', 50);
	define('PXHEIGHT', 50);

?>

<html>
	<head>
		<script type="text/javascript" src="/js/jquery.js"></script>
		<script>
			$(document).ready(function() {
				$('.grid .elem').toggle(function() {
					$(this).css('background-color', '#000000');
					$(this).find('input').attr('checked', true);
				}, function(){
					$(this).css('background-color', '#FFFFFF');				
					$(this).find('input').attr('checked', false);
				});
			});
		</script>
		<style>
		
		</style>
	</head>

	<body>
		<form method="post">
			<div class="grid" style="width:<? echo(NBWIDTH*PXWIDTH + (NBWIDTH * 2)) ?>;height:<? echo(NBHEIGHT * PXHEIGHT + (NBHEIGHT * 2)) ?>; border:1px solid black">
				<? for ($i=1; $i <= NBWIDTH * NBHEIGHT ; $i++):  ?>
					<div class="elem" style="width:<?=PXWIDTH?>px;height:<?=PXHEIGHT?>px;border:1px solid black;float:left;">
						<input type="hidden" name="data[]" value="<?=$i?>" />
					</div>
				<? endfor; ?>
				<div style="clear:both"></div>
			</div>
	
			<div class="monitor"><? print_r($_POST['data']) ?></div>
			
			<input type="submit" value="ok">
			
		</form>
	</body>
</html>
