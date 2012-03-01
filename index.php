<?php



require_once("init.php");
require_once("renderdata.class.php");



foreach($data as $item) {
	echo ( RenderData::draw($item) );
}
//print_r ($data[4]) ;








?>
