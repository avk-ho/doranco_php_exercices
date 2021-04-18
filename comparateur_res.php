<!--
OBJECTIF:

Avec les cinq chaines de caractères envoyées par formulaire, 
définir trois fonctions différentes, avec pour objectif:

- ranger les chaines dans l'ordre alphabétique, au cas où deux chaines 
ont les même caractères, décider selon le caractère suivant 
(les caractères non-alphabétiques ont la priorité)
- ranger de la plus longue à la plus courte, en indiquant la longueur 
entre parenthèses
- ranger les chaines de caractères dans l'ordre décroissant selon 
leur nombre de points, avec 3 points pour Y, 2 points pour les voyelles, 
un point pour les consonnes, et zéro points pour les autres caractères

*N'hésitez pas à utiliser des arrays et des fonctions prédéfinies de php (voir php.net)

-->
<?php
if(isset($_POST["submit"])){
    $val1 = $_POST["val1"];
    $val2 = $_POST["val2"];
    $val3 = $_POST["val3"];
    $val4 = $_POST["val4"];
    $val5 = $_POST["val5"];
    $values = [$val1, $val2, $val3, $val4, $val5];

    function alphabetSort($values){
        sort($values);
        // $valLen = count($values);
        // for($i = 0; $i < $valLen; $i++){
        //     echo $values[$i]."<br>";
        // }
    }

    function longestToShortest($values){
        $allLen = [];
        $valuesPair = [];
        $valOrdered = [];
        $valuesLen = count($values);
        for($i = 0; $i < $valuesLen; $i++){
            $valLen = strlen($values[$i]);
            array_push($allLen, $valLen);
            $valuesPair[$valLen] = $values[$i];
        }
        rsort($allLen);
        for($i = 0; $i < $valuesLen; $i++){
            $values = [];
            array_push($values, $valuesPair[$allLen[$i]]);
            echo $values[$i];
        }
        return $values;
    }
}


?>
<form method="post">
    <label for="value1">Chaîne 1</label>
    <input type="text" name="val1">

    <label for="value2">Chaîne 2</label>
    <input type="text" name="val2">

    <label for="value3">Chaîne 3</label>
    <input type="text" name="val3">

    <label for="value4">Chaîne 4</label>
    <input type="text" name="val4">

    <label for="value5">Chaîne 5</label>
    <input type="text" name="val5">
    <button type="submit" name="submit">Envoyer</button>
</form>