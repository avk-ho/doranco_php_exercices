<?php

/*
1- Créer une classe abstraite dénommée Vivant
La classe Vivant doit posséder:
Une variable protected $nom
Une variable protected $lieu
Une fonction abstraite description()
Une méthode magique __construct()
Une méthode magique __toString()
Une méthode magique __get()
Une méthode magique __set()
2- Créer deux classes Humain et Chat héritant de la classe abstraite Vivant.
Implémenter la fonction description() qui retourne la chaine de caractère "Bonjour, je suis (nom) et je suis un (class)", utiliser la fonction get_class()
3- Instancier un Humain et un Chat, et faire appeler par chacun d'eux la fonction description()
4- Appliquer la méthode magique __toString() sur les instances Humain et Chat.
*/

abstract class Vivant{

	protected $nom;
	protected $lieu;

	public function __construct($nom, $lieu){
		$this->nom = $nom;
		$this->lieu = $lieu;
	}

	public function __toString(){
		return 'Je suis ' . get_class($this) . ', mon nom est ' . $this->nom . ' !'; //get_class($this) rend la classe active au moment de l'activation de la fonction: ceci signifie qu'une classe héritière sera concernée par $this plutôt que la classe mère
	}

	public function __get($value){
		echo 'La propriété ' . $value . ' est privée.<br>';
	}

	public function __set($value, $modification){
		echo 'L\'attribut ' . $value . ' ne peut pas être changé pour la valeur ' . $modification . '.<br>';
	}


	abstract public function description();

}

class Humain extends Vivant{

	public function description(){
		return 'Bonjour, je suis ' . $this->nom . ' et je suis un ' . get_class(); //get_class est une fonction prédéfinie qui renvoie le nom de la classe marquée en paramètre, ou la classe dans laquelle la fonction est située, sans paramètres
	}

}

class Chat extends Vivant{

	public function description(){
		return 'Bonjour, je suis ' . $this->nom . ' et je suis un ' . get_class();
	}
}

$humain = new Humain('Patrick', 'Caen');
$chat = new Chat('Chaton', 'Brest');

$chat->lieu = "Strasbourg"; //Exemple d'intervention de la fonction magique __set()

echo $humain->description() . '<br>';
echo $chat->description() . '<br><br>';

echo $humain . '<br>';
echo $chat . '<br>';