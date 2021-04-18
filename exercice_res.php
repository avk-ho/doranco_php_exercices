<?php
    // 1- Ecrire une fonction php qui lit une variable et retourne 
    // true si celle-ci est égale ou supérieure à 100, et 
    // false s'il ne s'agit pas d'un nombre ou si elle est inférieure à 100
    function issup100($var){
        if(is_numeric($var)){
            if($var >= 100){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    // 2- Ecrire une fonction qui vérifie si une variable contient 
    // la chaine de caractères "hello world". 
    // Si non, cette fonction doit return la même chaine mais avec un 
    // ", hello world" à la fin de la chaine en question
    function hasHelloWorld($str){
        if(strstr($str, "hello world")){
            echo "Contient hello world";
            return true;
        }
        else{
            return $var.", hello world";
        }
    }

    // 3- Ecrire une fonction qui prend en compte deux arguments de 
    // type string, calcule la taille de chacun d'entre eux et 
    // return la chaine de caractère la plus longue<br>"
    function longestStr($str1, $str2){
        $length1 = strlen($str1);
        $length2 = strlen($str2);
        if($length1 > $length2){
            return $str1;
        }
        elseif($length1 < $length2){
            return $str2;
        }
        else{
            return $str1." // ".$str2;
        }
    }

    // 4- Ecrire une fonction qui prend un nombre en argument, 
    // rend true si le nombre est pair et false si le nombre est impair.
    function isEven($nb){
        if($nb%2 == 0){
            return true;
        }
        else{
            return false;
        }
    }
    // 5- Ecrire une fonction qui prend en compte deux arguments de 
    // type integer, et return le nombre le plus petit
    function smallestBetween($nb1, $nb2){
        if($nb1 > $nb2){
            return $nb2;
        }
        elseif($nb1 < $nb2){
            return $nb1;
        }
        else{
            return $nb1." = ".$nb2;
        }
    }

    // 6- Ecrire une fonction qui affiche le contenu d'un tableau 
    // case par case. Ne pas oublier de revenir à la ligne à 
    // chaque nouvelle entrée.
    function allItems($array){
        $res = "";
        foreach($array as $item){
            $res .= $item."<br>";
        }
        return $res;
    }
?>
