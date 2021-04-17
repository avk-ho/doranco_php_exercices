<!--
OBJECTIF:

Avec les cinq chaines de caractères envoyées par formulaire, définir trois fonctions différentes, avec pour objectif:

- ranger les chaines dans l'ordre alphabétique, au cas où deux chaines ont les même caractères, décider selon le caractère suivant (les caractères non-alphabétiques ont la priorité)
- ranger de la plus longue à la plus courte, en indiquant la longueur entre parenthèses
- ranger les chaines de caractères dans l'ordre décroissant selon leur nombre de points, avec 3 points pour Y, 2 points pour les voyelles, un point pour les consonnes, et zéro points pour les autres caractères

*N'hésitez pas à utiliser des arrays et des fonctions prédéfinies de php (voir php.net)

-->


<!DOCTYPE html>
<html>

<?php 
	require 'fonctions_comp.php' //introduction des fonctions nécessaires pour le traitement du formulaire
?>

<head>
	<title>Comparateur</title>
</head>


<body>
    <div id="page-wrap">
	<h1>Comparateur de chaines de caractères</h1>
	<h2>Résulat</h2>
	
	<?php 
	
	if (isset($_POST['envoi']) && !empty($_POST['txt5']) && !empty($_POST['txt5']) && !empty($_POST['txt5']) && !empty($_POST['txt5']) && !empty($_POST['txt5'])) // Vérification de l'usage du bouton envoi et du remplissage de tous les champs, si oui, les trois fonctions sont lancées
	{
		
 		$textes = packTxt($_POST['txt1'], $_POST['txt2'], $_POST['txt3'], $_POST['txt4'], $_POST['txt5']); // création d'un tableau comprenant les cinq entrées texte
		ordreAlpha($textes); // Triage des entrées par ordre alphabétique
		longueurDecr($textes); // Longueur décroissante des cinq entrées
		textPoints($textes); // Triage des cinq entrées selon le nombre de points par lettres (3 par Y, 2 par voyelle, 1 par consonne)
	}
	
	?>
	
	<h2>Formulaire</h2>
	  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="">
			<label for="txt1">Entrée n°1</label><br>
			<input type="text" name="txt1" value=""><br>
			<label for="txt2">Entrée n°2</label><br>
			<input type="text" name="txt2" value=""><br>
			<label for="txt3">Entrée n°3</label><br>
			<input type="text" name="txt3" value=""><br>
			<label for="txt4">Entrée n°4</label><br>
			<input type="text" name="txt4" value=""><br>
			<label for="txt5">Entrée n°5</label><br>
			<input type="text" name="txt5" value=""><br><br>
			<button type="submit" name="envoi" value="">Entrer</button>
	  </form>
    </div>
</body>
</html>


<?php

