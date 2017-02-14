<?php

class Perceptron {

	private $nbitems;
	private $size;


    /**
     *  Weights contains the full model
     *  weights[outputNode][inputNode]
     *  outputNode = targets distincts
     *  inputNode = all the input leaves
     */

	private $weights;

	/**
	 *	Variable des l'ensemble des datas d'apprentissage
	 *
	 *
	 */

	private $learnData;

	private $keys_results;

	/**
	 *	Setteur des datas d'apprentissage
	 *	@param Array $data
	 */

	public function setLearnData($data) {
		$this->learnData = $data;
	}


	/**
	 *	Methode de configuration exemple
	 *
	 *	nb Imems correspond au nombre de resultats dans le set learn data
	 *
	 */

	public function config() {
		$keys = array();
		foreach($this->learnData as $d) {
			if (!in_array($d['result'], $keys)) {
				$keys[] = $d['result'];
			}
		}
		$this->keys_results = $keys;

        // nbr distinct outputs
        $this->nbitems = count($keys);

        // nbr inputs
		$this->size = count($this->learnData[0]['data']);
	}


	/**
	 *	Methode d'initialisation du perceptron
	 *	Positionne les weights en mode random
	 *
	 */

	public function init() {
		for ($i = 0; $i < $this->nbitems; $i++) {
			for($j = 0; $j < $this->size; $j++) {
				$this->weights[$i][$j] = rand(-50,50);
			}
		}
	}


	/**
	 *	Getteur de datas d'apprentissage
	 *
	 */

	public function getLearnData() {
		return $this->learnData;
	}


	public function getCountLearnData() {
		return count($this->learnData);
	}


	public function answerFormMotif($motif) {
		$answ = array();
		foreach($this->weights as $key => $weight) {
			if ($this->calculMotif($motif, $key)) {
				$answ[] = $this->keys_results[$key];
			}
		}
		return $answ;
	}





	public function answerScoresFormMotif($motif) {
		$answ = array();
		foreach($this->weights as $key => $weight) {
			// $scores[$key +1] = $this->calculTotalMotif($motif, $key);
			$scores[$this->keys_results[$key]] = $this->calculTotalMotif($motif, $key);
		}
		asort($scores);
		return $scores;
	}

	public function getNbitems() {
		return $this->nbitems;
	}



	public function calcul($numG, $numW) {
		return $this->calculMotif($this->learnData[$numG]['data'], $numW);
	}

	/**
	 *	Mthode d'estimation d'un motif
	 *	@param	Array	$motif = array(1,0,1....)
	 *	@param	int		$numW Reponse possible
	 */

	public function calculMotif($motif, $numW) {
		$total = $this->calculTotalMotif($motif, $numW);
		return ($total > 0)?1:0;
	}


	/**
	 *	Methode faisant la somme d'un motif
	 *	@param 	Array	$motif = array(1,0,1... etc etc)
	 *	@param	int		$numW correspond a la réponse
	 */

	public function calculTotalMotif($motif, $numW) {
		$total = 0;

		for ($i=0; $i < $this->size; $i++) {
			if ($motif[$i] == 1) {
				$total += $this->weights[$numW][$i];
			}
		}
		return $total;
	}


	/**
	 *	Methode réalisant un apprentissage complet
	 *
	 *
	 *
	 */

	public function learn($numG, $numW) {
		$result = $this->calcul($numG, $numW);

		for ($i = 0; $i < $this->size; $i++) {
			$this->weights[$numW][$i] = $this->calculWeights(
					$this->weights[$numW][$i],
					$this->learnData[$numG]['result'] == $this->keys_results[$numW],
					$result,
					$this->learnData[$numG]['data'][$i]
			);
		}
	}



	/**
	 *	Methode de calcul de poids
	 *
	 */

	public function calculWeights($valeur, $valeur_desiree, $valeur_obtenue, $valeur_entree) {
		$result = ($valeur + ($valeur_desiree - $valeur_obtenue) * $valeur_entree * 10);
		return $result;
	}


	/**
	 *	Methode d'apprentissage
	 *
	 */

	public function train($nbtrains) {
		for ($k = 0; $k < $nbtrains; $k++) {
			for ($i = 0; $i < $this->nbitems; $i++) {
				for($j = 0; $j < count($this->learnData); $j++) {
					$this->learn($j, $i);
				}
			}
		}
	}



	public function getWeights() {
		return $this->weights;
	}

}
