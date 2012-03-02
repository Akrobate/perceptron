<?php

// Calcul pour tester un chiffre

// On initialise la variable totale à zéro.
// Pour tout pixel activé de l'image :
// total = total + poids du neurone correspondant(lié au chiffre et au numéro du pixel)

// Si total > 0, alors le chiffre est reconnu.

// Apprendre une forme

// Pour tous les chiffres à tester, faire le calcul de test du chiffre et stocker le résultat dans une
// variable.
// Pour tous les pixels de l'image :
// poids correspondant = poids + (valeur à obtenir - valeur obtenue) * valeur du pixel * 10

// "valeur à obtenir" est 1 ou 0 : quand on veut apprendre le chiffre, on lui donne l'image et la
// valeur. (si la valeur est égale au chiffre qu'on teste, alors "valeur à obtenir" est égale à 1
// "valeur obtenue" est le résultat du calcul de test du chiffre.
// "valeur du pixel" est 1 ou 0 (si le pixel est noir ou blanc).

// Si la valeur à obtenir est égale à la valeur obtenue, alors "valeur à obtenir - valeur obtenue"
// s'annule et donc le poids reste le même.

// Si le pixel n'est pas allumé, le poids n'est pas changé(puisqu'il n'est pas pris en compte dans le
// calcul)

// Si la valeur à obtenir est égale à 1 et si la valeur obtenue est égale à 0, alors "valeur à obtenir -
// valeur obtenue" égale 1 et donc le poids augmente.
// Si la valeur à obtenir égale 0 et la valeur obtenue est égale à 1, alors "valeur à obtenir - valeur
// obtenue" égale -1 et donc le poids diminue.

// L'apprentissage doit être refait plusieurs fois jusqu'à ce que la reconnaissance des chiffres soit
// correcte.
 ?>