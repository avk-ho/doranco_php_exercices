<?php

function packTxt($txt1, $txt2, $txt3, $txt4, $txt5){ // Fonction ayant pour but de rassembler les cinq entrées en un tableau
	return $textes = array($txt1, $txt2, $txt3, $txt4, $txt5);
}

function ordreAlpha($textes){
	//echo 'ordreAlpha($textes)<br>'; //La fonction s'est bien lancée
	echo '<h3>Triage des entrées par ordre alphabétique</h3>';
	sort($textes); // Sort() trie le tableau par ordre alphabétique
	foreach($textes as $text){
		echo $text . "<br>"; //itération du tableau $texte et affichage de chaque entrée
	}
	echo "<br><br>"; //saut de ligne
}

function longueurDecr($textes){
	//echo 'longueurDecr($textes)<br>'; //La fonction s'est bien lancée
	echo '<h3>Longueur décroissante des cinq entrées</h3>';
	array_multisort(array_map('strlen', $textes), $textes); // array_multisort range un premier tableau par ordre de grandeur de ses valeurs et un second relativement au premier. Array_map allié à strlen renvoie un tableau documentant la longueur de chaque entrée de $textes, que array_multisort range ensuite de façon croissante
	$textes = array_reverse($textes); // On inverse l'ordre de $textes pour un affichage décroissant
	foreach($textes as $text){
		echo $text . " avec " . strlen($text) . " éléments.<br>"; //itération du tableau $texte et affichage de chaque entrée
	}
	echo "<br><br>"; //saut de ligne
}

function textPoints($textes){
	//echo 'textPoints($textes)<br>'; //La fonction s'est bien lancée
	echo '<h3>Triage des cinq entrées selon le nombre de points par lettres (3 par Y, 2 par voyelle, 1 par consonne)</h3>';
	$counter = array(); // Tableau servant à compter les points de chaque entrée
	$i = 0; // Itérateur
	
	foreach($textes as $text){
		foreach(str_split($text) as $letter){
			switch(strtoupper($letter)){	// Structure de contrôle conditionnelle switch vérifie la nature de la lettre, strtoupper met la lettre en majuscule pour rendre la recherche insensible à la casse
				case 'Y': // $letter est-il Y?
					if (isset($counter[$i])){ // Si la variable counter[i] existe, incrémenter. Sinon, initialiser à 3.
						$counter[$i] += 3;
					} else $counter[$i] = 3;
					//echo $text . " reçoit +3 <br>"; //commentaire de confirmation d'incrémentation
					break;
				case 'A': case 'E': case 'I': case 'U': case 'O': // $letter est-il une voyelle?
					if (isset($counter[$i])){ // Si la variable counter[i] existe, incrémenter. Sinon, initialiser à 2.
						$counter[$i] += 2;
					} else $counter[$i] = 2;
					//echo $text . " reçoit +2 <br>"; //commentaire de confirmation d'incrémentation
					break;
				case 'B': case 'C': case 'D': case 'F': case 'G':
				case 'H': case 'J':	case 'K': case 'L':	case 'M':
				case 'N': case 'P':	case 'Q': case 'R':	case 'S':
				case 'T': case 'V':	case 'W': case 'Z': // $letter est-il une consonne?
					if (isset($counter[$i])){ // Si la variable counter[i] existe, incrémenter. Sinon, initialiser à 1.
						$counter[$i] += 1;
					} else $counter[$i] = 1;
					//echo $text . " reçoit +1 <br>"; //commentaire de confirmation d'incrémentation
					break;
			}
		}
	$i++; // On incrémente $i pour passer à la case supérieure du tableau counter[].
	}
	
	$i = 0; // réinitialisation de $i
	
	array_multisort($counter, $textes); //On utilise array_multisort pour réarranger $textes selon les points enregistrées dans $counter
	$counter = array_reverse($counter); // On inverse l'ordre
	$textes = array_reverse($textes); // On inverse l'ordre
	
	foreach($counter as $number){
		echo $textes[$i] . ' est égal à ' . $number . ' points.<br>'; //On affiche chaque entrée de counter en utilisant $i pour gérer l'itération du tableau $textes
		$i++;
	}
	
	echo "<br><br>"; //saut de ligne
	
}