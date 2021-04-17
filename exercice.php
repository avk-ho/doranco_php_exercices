<?php

echo "Hello world <br>";




function numberCheck($arg){
	if((is_numeric($arg)) && ($arg > 100)){ //is_numeric permet de vérifier si la valeur est supérieure à 100, nous vérifions ensuite la valeur du nombre
		return true;
	}
	return false;
	// fonction
	}

$nbrA = 12;
$nbrB = 'hello world';
$nbrC = 240;

var_dump(numberCheck($nbrA));
var_dump(numberCheck($nbrB));
var_dump(numberCheck($nbrC));



echo "2- Ecrire une fonction qui vérifie si une variable contient la chaine de caractères \"hello world\". Si non, cette fonction doit return la même chaine mais avec un \", hello world\" à la fin de la chaine en question<br>";

function helloWorld($string){
	if(is_string($string)){
		if (!stristr($string, "hello world")){
			return $string . ", hello world";
		}
		else return $string;
	}
}

$string1 = "Le Corbeau et le Renard";
$string2 = "hello world et la Fourmi";
$string3 = "hello world";

echo helloWorld($string1) . "<br>";
echo helloWorld($string2) . "<br>";
echo helloWorld($string3) . "<br>";


echo "3- Ecrire une fonction qui prend en compte deux arguments de type string, calcule la taille de chacun d'entre eux et return la chaine de caractère la plus longue<br>";

function whichIsLonger($string1, $string2){
	if(is_string($string1) && is_string($string2)){
		if(strlen($string1) == strlen($string2)){
			return "Les deux chaines sont égales.";
		} else if (strlen($string1) > strlen($string2)){
			return $string1 . "(" . strlen($string1) . ")";
		} else return $string2 . "(" . strlen($string2) . ")";

	} else return "Arguments invalides";
}

$string1 = "Le Corbeau et le Renard";
$string2 = false;
echo whichIsLonger($string1, $string2);

echo "4- Ecrire une fonction qui prend un nombre en argument, rend true si le nombre est pair et false si le nombre est impair.<br>";

function isEven($int){
	if(is_numeric($int)){
		$result = $int % 2; //On utilise l'opérateur % pour obtenir le reste de la division par 2, si ce reste = 0, le nombre est pair
		if($result == 0){
			return true;
		}
	} 
	return false;
}

$int1 = 11;
$int2 = 42;
$int3 = 74;
$int4 = 129;

var_dump(isEven($int1));
var_dump(isEven($int2));
var_dump(isEven($int3));
var_dump(isEven($int4));
var_dump(isEven("chaine de caractères"));


echo "5- Ecrire une fonction qui prend en compte deux arguments de type integer, et return le nombre le plus petit<br>";

function whichIsShorter($int1, $int2){
	if(is_numeric($int1) && is_numeric($int2)){
		$result = $int1 - $int2;
			if($result > 0){ //Si $int1 est supérieur à zéro, il est logiquement plus grand que $int2
				return $int2;
			} else if($result == 0){
				return "Les deux valeurs sont équivalentes";
			} return $int1;
	} else return "Arguments invalides";
}

$int1 = 333;
$int2 = "";

echo whichIsShorter($int1, $int2);



echo "6- Ecrire une fonction qui affiche le contenu d'un tableau case par case. Ne pas oublier de revenir à la ligne à chaque nouvelle entrée.<br>";

function arrayReader($array){
	foreach($array as $value){
		echo $value . '<br>';
	}
}

$array = array ('pomme', 'orange', 'peche', 'banane', 'poire');
$array2 = array ('fruit' => 'raisin', 'légume' => 'tomate');
arrayReader($array);
arrayReader($array2);
