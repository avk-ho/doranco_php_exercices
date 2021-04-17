<?php

/*
Consigne:

Créer quatre classes:

	Une classe abstraite Personne
		$nom
		$prenom
		$age
		$classe
		protected function presentation() -> "Une personne est abstraite et ne peut se présenter"
		public function __toString() -> appelle la fonction presentation()
		[ajouter les getters et setters]

	Une classe (héritant de Personne) Eleve
		protected function presentation() -> return le nom, prénom, age, et classe
		[ajouter les getters et setters]

	Une classe (héritant de Personne) Professeur
		$niveauClasse (ex: CM2, CP, etc)
		protected function presentation() -> return le nom, prénom, age, et classe, et le niveau de classe
		[ajouter les getters et setters]

	Une classe Voyage
		$lieu
		$date
		$eleves = []


	Une interface VoyageCommunication (implémentée par Eleve, Professeur, et Voyage)
		reserver($arg) 	-> Si Personne
			ajoute le nom et prénom concaténés de la personne dans le tableau élèves de voyage. Avant de l'ajouter, vérifier si le nom existe déjà, sinon, prévenir que la personne est déjà présente
							-> Si Voyage
			Récupère le nom et prénom de la personne, les concatène, et ajoute la personne dans le tableau eleves. Avant de l'ajouter, vérifier si le nom existe déjà, sinon, prévenir que la personne est déjà présente
		retirer($arg)	-> Si Personne
			retire le nom et prénom concaténés de la personne si celui-ci existe dans le tableau. Sinon prévenir que la personne n'est pas présente.
						-> Si Voyage
			retire le nom et prénom concaténés de la personne si celui-ci existe dans le tableau. Sinon prévenir que la personne n'est pas présente.
*/

abstract class Personne implements VoyageCommunication{

	protected $nom;
	protected $prenom;
	protected $age;
	protected $classe;
	public static $instanceIncrement = 0;

	public function __construct($nom, $prenom, $age, $classe){
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->age = $age;
		$this->classe = $classe;
	}

	public function __toString(){
		return $this->presentation();
	}

	public function setNom($nom){
		$this->nom = $nom;
	}

	public function getNom(){
		return $this->nom;
	}

	public function setPrenom($prenom){
		$this->prenom = $prenom;
	}

	public function getPrenom(){
		return $this->prenom;
	}

	public function setAge($age){
		$this->age = $age;
	}

	public function getAge(){
		return $this->age;
	}

	public function setClasse($classe){
		$this->classe = $classe;
	}

	public function getClasse(){
		return $this->classe;
	}

	public function getFullName(){
		return $this->nom . " " . $this->prenom;
	}

	protected function presentation(){
		return "Une personne est abstraite et ne peut se présenter";
	}

	public function reserver($voyage){
		$voyage->reserver($this);
	}

	public function retirer($voyage){
		$voyage->retirer($this);
	}

}

class Eleve extends Personne{

	protected function presentation(){
		return "Je suis " . $this->nom . " " . $this->prenom . ", âgé de " . $this->age . " ans en " . $this->classe . ".<br>";
	}

}

class Professeur extends Personne{

	protected $niveauClasse;


	public function __construct($nom, $prenom, $age, $niveauClasse){
		parent::__construct($nom, $prenom, $age, "(professeur)");
		$this->niveauClasse = $niveauClasse;
		self::$instanceIncrement++; // Ajoute un à l'incrémenteur statique à chaque construction
	}

	public static function howManyInstances(){
		return self::$instanceIncrement; //affiche le nombre d'incrémentation du compteur
	}

	public function setNiveauClasse($niveauClasse){
		$this->niveauClasse = $niveauClasse;
	}

	public function getNiveauClasse(){
		return $this->niveauClasse;
	}

	protected function presentation(){
		self::$instanceIncrement++; // Ajoute un à l'incrémenteur statique à chaque présentation
		return "Je suis " . $this->nom . " " . $this->prenom . ", âgé de " . $this->age . " ans en charge de la classe " . $this->niveauClasse . ".<br>";
	}
}

class Voyage implements VoyageCommunication{

	protected $lieu;
	protected $date;
	protected $eleves;

	public function __construct($lieu, $date){
		$this->lieu = $lieu;
		$this->date = $date;
		$this->eleves = [];
	}

	public function setLieu($lieu){
		$this->lieu = $lieu;
	}

	public function getLieu($lieu){
		return $this->lieu;
	}

	public function setDate($date){
		$this->date = $date;
	}

	public function getDate($date){
		return $this->date;
	}

	public function getEleves(){
		return $this->eleves;
	}

	public function showEleves(){
		foreach($this->eleves as $eleve){
			echo $eleve . "<br>";
		}
	}

	protected function addEleve($eleve){
		array_push($this->eleves, $eleve);
		return true;
	}

	protected function removeEleve($eleve){
		$arrayKey = array_search($eleve, $this->eleves);
		unset($this->eleves[$arrayKey]);
		return true;
	}

	public function reserver($eleve){
		if(!in_array($eleve->getFullName(), $this->eleves)){
			$this->addEleve($eleve->getFullName());
			return get_class($eleve) . " ajouté!<br>";
		} else return get_class($eleve) . " déjà présent!<br>";
	}

	public function retirer($eleve){
		if(in_array($eleve->getFullName(), $this->eleves)){
			$this->removeEleve($eleve->getFullName());
			return get_class($eleve) . " a été retiré!<br>";
		} else return get_class($eleve) . " non présent!<br>";
	}

}

interface VoyageCommunication{

	public function reserver($arg);
	public function retirer($arg);
}

echo Professeur::howManyInstances() . "<br>";
$eleve[0] = new Eleve("Dupont", "Paul", "8", "CE1");
$eleve[1] = new Eleve("Duchamp", "Jacques", "9", "CE2");
$professeur[0] = new Professeur("Dumont", "Jean", "28", "CE2");



echo $eleve[0];
echo $eleve[1];
echo $professeur[0];
echo $professeur[0];
echo $professeur[0];
echo $professeur[0];
echo $professeur[0];

echo Professeur::howManyInstances() . "<br>";

$voyage = new Voyage("Barcelone", "23/06/2021");
echo $voyage->reserver($professeur[0]);
echo $voyage->reserver($eleve[0]);
echo $voyage->reserver($eleve[1]) . "<br>";
$voyage->showEleves();

echo $voyage->retirer($professeur[0]);
echo $voyage->retirer($professeur[0]);
echo $voyage->reserver($eleve[0]);

var_dump($voyage->getEleves());