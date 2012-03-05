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
	
	
	private function drawDataScanner() {
		/*
			$out = '<form method="post">';
			$out .=	'<div id="perceptronGrid" style="width: '. (NBWIDTH*PXWIDTH + (NBWIDTH * 2)) .';height: '. NBHEIGHT * PXHEIGHT + (NBHEIGHT * 2)) .'; border:1px solid black">';
					for ($i=0; $i < NBWIDTH * NBHEIGHT ; $i++) {
						<div class="elem" style="width:<?=PXWIDTH?>px;height:<?=PXHEIGHT?>px;border:1px solid black;float:left;<? if (@in_array($i, $posted_data)):?>background-color:#000000;<? endif; ?> ">
							<input type="checkbox" style="display:none" name="data[]" value="<?=$i?>"  <? if (@in_array($i, $posted_data)):?>checked="checked"<? endif; ?> />
						</div>
					}
					<div style="clear:both"></div>
				</div>
		
				<div class="monitor"><? print_r($answers) ?><br /><? print_r($scores) ?></div>
				
				<input type="submit" value="ok">
				
			</form>
		*/
	}
	
	
	
}

?>
