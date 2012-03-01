<?php

class RenderData {
	private $nbWidth;
	private $nbHeight;

	private $pxWidth;
	private $pxHeight;
	private $data;


	static function draw($data) {
		$obj = new RenderData();
		$obj->init(5,6,20,20);
		$obj->setData($data);
		return $obj->drawData();
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


}
