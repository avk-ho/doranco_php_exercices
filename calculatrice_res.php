<!-- OBJECTIFS:

	- Créer une calculatrice en utilisant un formulaire et PHP
	- La calculatrice doit prendre en compte deux valeurs, et appliquer une addition/soustraction/multiplication/division
	- Le formulaire doit donc comporter deux champs et quatre boutons selon l'opération choisie
	- UTILISER une fonction préalablement définie, qui prend l'opérateur choisi en argument
	- UTILISER la superglobale $_POST pour récupérer les valeurs
-->
<?php
    function calcul($n1, $n2, $operation){
        if($operation == "addition"){
            $resultat = $n1 + $n2;
            echo $resultat;
        }
        elseif($operation == "soustraction"){
            $resultat = $n1 - $n2;
            echo $resultat;
        }
        elseif($operation == "multiplication"){
            $resultat = $n1 * $n2;
            echo $resultat;
        }
        elseif($operation == "division"){
            if($n2 == "0"){
                echo "Impossible, division par 0.";
            }
            else{
                $resultat = $n1 / $n2;
            echo $resultat;
            }            
        }        
    }
    if(isset($_POST["calcul"])){
        $operation = $_POST["calcul"];

        if($_POST["number1"] != "" && $_POST["number2"] != ""){
            $n1 = $_POST["number1"];
            $n2 = $_POST["number2"];
            // echo "n1 : ".$n1."<br>n2 :".$n2;
            // var_dump($n1);
            calcul($n1, $n2, $operation);
        }
        else{
            echo "Veuillez entrer des nombres dans les 2 champs.";
        }
    }
    


    
  
?>
<form action="" method="post">
    <label for="number1">Number 1 :</label>
    <input name="number1" type="number">
    <label for="number2">Number 2 :</label>
    <input name="number2" type="number">
    <button type="submit" name="calcul" value="addition">+</button>
    <button type="submit" name="calcul" value="soustraction">-</button>
    <button type="submit" name="calcul" value="multiplication">x</button>
    <button type="submit" name="calcul" value="division">/</button>
</form>