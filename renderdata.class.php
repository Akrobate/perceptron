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

	
	private function drawDataWeights() {
		
		$max = max($this->data);
		$min = min($this->data);
		
		$out = '<div style="margin:20px;width:'.$this->nbWidth * $this->pxWidth.'px;height:'.$this->nbHeight * $this->pxHeight.'px;"> ';
		
		foreach($this->data as $pixel) {
			$ncolor = (int)((255 / ($max - $min)) * ( $pixel - $min) );
			$color = ' rgb('.$ncolor.','.$ncolor.','.$ncolor.')';
			$out .= '<div style="float:left;width:'.$this->pxWidth.'px;height:'.$this->pxHeight.'px;background-color:'.$color.'"></div>';
		}
		
		$out .= '<div style="clear:both"></div>';
		$out .= '</div>';
		return $out;
	}
}

?>
