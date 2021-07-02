<?php

//Funções para números 
/*
number_format - formata  o valor
round - arredondar valores
ceil - arredondar valores para cima
floor - arredonda para baixo
rand - função para realizar sorteio - gera numeros aleatorio 
*/

$db = 1234.56;
$preco = number_format($db, 2, ",", ".");
echo  "O valor do produto é R$ $preco";


echo "<hr>";

echo round(3.49789);

echo "<hr>";

echo ceil(3.589);

echo "<hr>";
echo floor(9.589);

echo "<hr>";
echo rand(1,20);

?>