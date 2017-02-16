<?php

class RenderData {
	private $nbWidth;
	private $nbHeight;

	private $pxWidth;
	private $pxHeight;
	private $data;


	static function draw($data) {
		$obj = new RenderData();
		$obj->init(5,6,10,10);
		$obj->setData($data);
		return $obj->drawData();
	}

	static function drawWeights($data) {
		$obj = new RenderData();
		$obj->init(5,6,10,10);
		$obj->setData($data);
		return $obj->drawDataWeights();
	}


	public function init($nbWidth, $nbHeight, $pxWidth, $pxHeight) {
		$this->nbWidth = $nbWidth;
		$this->nbHeight = $nbHeight;
		$this->pxWidth = $pxWidth;
		$this->pxHeight = $pxHeight;
	}

	public function setData($data) {
		$this->data = $data;
	}


	private function drawData() {
		$out = '<div style="margin:20px;width:'.$this->nbWidth * $this->pxWidth.'px;height:'.$this->nbHeight * $this->pxHeight.'px;"> ';
		foreach($this->data as $pixel) {
			if ($pixel == 1) {
				$color = "#000";
			} else {
				$color = "#FFF";
			}
			$out .= '<div style="float:left;width:'.$this->pxWidth.'px;height:'.$this->pxHeight.'px;background-color:'.$color.'"></div>';
		}

		$out .= '<div style="clear:both"></div>';
		$out .= '</div>';
		return $out;
	}


	private function drawDataWeights($showNegative = true) {

		$max = max($this->data);
		$min = min($this->data);

		$out = '<div style="margin:20px;width:'.$this->nbWidth * $this->pxWidth.'px;height:'.$this->nbHeight * $this->pxHeight.'px;"> ';

		foreach($this->data as $pixel) {

			if ($showNegative) {
				if ($pixel < 0) {
					// color = red;
					$ncolor = (int)((255/abs($min)) * abs($pixel));
					$color = ' rgb(255,'. (255 - $ncolor ) .','. (255 - $ncolor) .')';
				} else {
					// color = green;
					$ncolor = (int)((255/abs($max)) * abs($pixel));
					$color = ' rgb('. (255 - $ncolor) .',255,'. (255 - $ncolor) .')';
				}
			} else {
				$ncolor = (int)((255 / ($max - $min)) * ( $pixel - $min) );
				$color = ' rgb('.$ncolor.','.$ncolor.','.$ncolor.')';
			}

			$out .= '<div style="float:left;width:'.$this->pxWidth.'px;height:'.$this->pxHeight.'px;background-color:'.$color.'"></div>';
		}

		$out .= '<div style="clear:both"></div>';
		$out .= '</div>';
		return $out;
	}


	private function drawDataScanner($data) {
		if (empty($data)) {
			$data = array();
		}

		$out = "
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
		";

		$out .= '<form method="post">';
		$out .=	'<div id="perceptronGrid" style="width: '. ($this->nbWidth * $this->pxWidth + ($this->nbWidth * 2)) .';height: '. ($this->nbHeight * $this->pxHeight + ($this->nbHeight * 2)) .'; border:1px solid black">';

			for ($i=0; $i < ($this->nbWidth * $this->nbHeight); $i++) {
				if (@in_array($i, $data)) {
					$color = '#000000';
					$checked = ' checked="checked" ';
				} else {
					$color = '#FFFFFF';
					$checked = '';
				}
				$out .= '<div class="elem" style="width:'. $this->pxWidth .'px;height:'. $this->pxHeight.'px;border:1px solid black;float:left; background-color: '.$color.'  ">';
				$out .= '<input type="checkbox" style="display:none" name="data[]" value="'.$i.'"  '.$checked.' />';
				$out .= '</div>';
			}

		$out .= '<div style="clear:both"></div></div><input type="submit" value="ok"></form>';

		return $out;
	}

	public function getMotifFromScannedData($data) {
		$motif = array();
		for ($i = 0; $i < ($this->nbWidth * $this->nbHeight); $i++) {
			if (@in_array($i, $data)) {
				$motif[$i] = 1;
			} else {
				$motif[$i] = 0;
			}
		}
		return $motif;
	}




}

?>
