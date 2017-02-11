<?php

// Calcul pour tester un chiffre

// On initialise la variable totale � z�ro.
// Pour tout pixel activ� de l'image :
// total = total + poids du neurone correspondant(li� au chiffre et au num�ro du pixel)

// Si total > 0, alors le chiffre est reconnu.

// Apprendre une forme

// Pour tous les chiffres � tester, faire le calcul de test du chiffre et stocker le r�sultat dans une
// variable.
// Pour tous les pixels de l'image :
// poids correspondant = poids + (valeur � obtenir - valeur obtenue) * valeur du pixel * 10

// "valeur � obtenir" est 1 ou 0 : quand on veut apprendre le chiffre, on lui donne l'image et la
// valeur. (si la valeur est �gale au chiffre qu'on teste, alors "valeur � obtenir" est �gale � 1
// "valeur obtenue" est le r�sultat du calcul de test du chiffre.
// "valeur du pixel" est 1 ou 0 (si le pixel est noir ou blanc).

// Si la valeur � obtenir est �gale � la valeur obtenue, alors "valeur � obtenir - valeur obtenue"
// s'annule et donc le poids reste le m�me.

// Si le pixel n'est pas allum�, le poids n'est pas chang�(puisqu'il n'est pas pris en compte dans le
// calcul)

// Si la valeur � obtenir est �gale � 1 et si la valeur obtenue est �gale � 0, alors "valeur � obtenir -
// valeur obtenue" �gale 1 et donc le poids augmente.
// Si la valeur � obtenir �gale 0 et la valeur obtenue est �gale � 1, alors "valeur � obtenir - valeur
// obtenue" �gale -1 et donc le poids diminue.

// L'apprentissage doit �tre refait plusieurs fois jusqu'� ce que la reconnaissance des chiffres soit
// correcte.
 ?>