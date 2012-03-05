<?php

class Perceptron {
	
	private $nbitems;
	private $size;

	private $weights;
	private $learnData;

	public function setLearnData($data) {
		$this->learnData = $data;	
		
	}
	
	public function getLearnData() {
		return $this->learnData;
	}
	
	public function config() {
		$this->nbitems = 7;
		$this->size = 30;
	}


	public function answerFormMotif($motif) {
		$answ = array();
		foreach($this->weights as $key => $weight) {
			if ($this->calculMotif($motif, $key)) {
				$answ[] = $key + 1;
			}
		}
		return $answ;
	
	}
	
	public function answerScoresFormMotif($motif) {
		$answ = array();
		foreach($this->weights as $key => $weight) {
			$scores[$key +1] = $this->calculTotalMotif($motif, $key);
			
		}
		asort($scores);
		return $scores;
	}


	public function calcul($numG, $numW) {
		return $this->calculMotif($this->learnData[$numG], $numW);	
	}

	public function calculTotalMotif($motif, $numW) {
		$total = 0;
		
		for ($i=0; $i < $this->size; $i++) {
			if ($motif[$i] == 1) {
				$total += $this->weights[$numW][$i];
			}			
		}
		
		return $total;	
	
	}


	public function calculMotif($motif, $numW) {
		$total = $this->calculTotalMotif($motif, $numW);
		return ($total > 0)?1:0;
	}
	
		
	public function learn($numG, $numW) {
		$result = $this->calcul($numG, $numW);
		
		for ($i = 0; $i < $this->size; $i++) {
			$this->weights[$numW][$i] = $this->calculWeights($this->weights[$numW][$i], $numG == $numW, $result, $this->learnData[$numG][$i]);
		}
	}
	
	
	public function calculWeights($valeur, $valeur_desiree, $valeur_obtenue, $valeur_entree) {
		$result = ($valeur + ($valeur_desiree - $valeur_obtenue) * $valeur_entree * 10);
		return $result;
	}
	

	public function train($nbtrains) {
		for ($k = 0; $k < $nbtrains; $k++) {
			for ($i = 0; $i < 7; $i++) {
				for($j = 0; $j < 7; $j++) {
					$this->learn($j, $i);
				}
			}
		}
	
	}
	
	public function init() {
		for ($i = 0; $i < $this->nbitems; $i++) {
			for($j = 0; $j < $this->size; $j++) {
				$this->weights[$i][$j] = rand(-50,50);
			}
		}
	}
	


	public function getWeights() {
		return $this->weights;
	}


}

?>
