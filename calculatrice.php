<!-- OBJECTIFS:

	- Créer une calculatrice en utilisant un formulaire et PHP
	- La calculatrice doit prendre en compte deux valeurs, et appliquer une addition/soustraction/multiplication/division
	- Le formulaire doit donc comporter deux champs et quatre boutons selon l'opération choisie
	- UTILISER une fonction préalablement définie, qui prend l'opérateur choisi en argument
	- UTILISER la superglobale $_POST pour récupérer les valeurs
-->

<!DOCTYPE html>
<html>
<head>
	<title>Calculatrice</title>
</head>


<body>
    <div id="page-wrap">
		<h1>Calculatrice PHP</h1>
		<h2>Résultat</h2>
		
		<?php 
		
		if(isset($_POST['nombre_1']) && isset($_POST['nombre_2'])){
			function calcul($operateur, $nbr1, $nbr2){
				if(is_numeric($nbr1) && is_numeric($nbr2)){
					switch ($operateur){
						case "Addition":
							$result = ($nbr1 + $nbr2);
							echo $result . '<br>';
							break;
						case "Soustraction":
							$result = ($nbr1 - $nbr2);
							echo $result . '<br>';
							break;
						case "Multiplication":
							$result = ($nbr1 * $nbr2);
							echo $result . '<br>';
							break;
						case "Division":
							if(empty($nbr2)){
								echo "Division par zéro!<br>";
							}
								else {
									$result = ($nbr1 / $nbr2);
									echo $result . '<br>';
								}
							break;
						default:
							echo "C'est une autre opération!!<br>";
					}
				}
			}
			
			calcul($_POST['calcul'], $_POST['nombre_1'], $_POST['nombre_2']);
		}
		
		
			if(!(empty($_POST['calcul'])) && ($_POST['calcul'] != '???')){
				echo 'Vous avez choisi la ' . $_POST['calcul']; 
		}
		
		?>
		
		<h2>Formulaire</h2>
		  <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
				<input type="text" name="nombre_1" value=""><br><br>
				<input type="text" name="nombre_2" value=""><br><br>
				<input type="submit" value="Addition" name="calcul"/>
				<input type="submit" value="Soustraction" name="calcul"/>
				<input type="submit" value="Multiplication" name="calcul"/>
				<input type="submit" value="Division" name="calcul"/>
				<input type="submit" value="???" name="calcul"/>
		  </form>
    </div>
</body>
</html>