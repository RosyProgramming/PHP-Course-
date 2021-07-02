<?php
//Expressões regulares
//Define um padrão a ser usado para procurar ou 
// substituir palavras ou grupos de palavras.
// ^ inicio da expressão, $ final da expressão - /i - case sensitive
// [] conjunto de caracteres
// {} ocorrências - ? {0,1} *{0,} +{1,}
// /^[a-z0-9.\-\-]+@[a-z0-9\_]+\.(com|br|com.br|net)$/
// /^[0-9]{2}\/[0-9]{2}\/{0-9}{4}$/

// [A-Z] Letras maiúsculas.
// [a-z] Letras minúsculas.
// [a-Za-z] Letras maiusculas e minusculas.
// [A-Za-z-9] letras e números.


$string = "02/07/2021";
$padrao = "/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/";

if(preg_match($padrao, $string)):
    echo "válido";
    echo "<hr>";
    echo $string;
else:
    echo "Inválido";
    echo "<hr>";
endif;