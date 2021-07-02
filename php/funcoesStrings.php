<?php
// Funções para strings
/*
strtoupper - converte a string em maiuscula
strtolower  - converte a string em minuscula
substr - retorna uma parte da string
str_pad - complementa uma string com a quantidade de caractere
str_repeat - repeti uma string
strlen - retorna o comprimento de uma string 
str_replace - serve para substituir uma palavra em um texto
strpos -- Retorna a posição de uma palavra em um texto 
*/

$nome = "rosana oliveira";
$novoNome = strtoupper($nome);
echo $novoNome;

print("<hr>");

$nome = "ROSANA OLIVEIRA";
$novoNome = strtolower($nome);
echo $novoNome;

print("<hr>");

$mensagem = "Olá mundo";
echo substr($mensagem, 4);

print("<hr>");

$objeto = "mouse";
$novoObjeto = str_pad($objeto, 7, "*");
echo $novoObjeto;

print("<hr>");

$string = str_repeat("Sucesso!", 5);
echo $string;

print("<hr>");

$mensagem = "olá mundo";
echo strlen($mensagem);


echo "<hr>";

$texto = "A seleção Argentina será campeã da copa do mundo de 2018.";
$novoTexto = str_replace("Argentina", "Brasileira", $texto);
echo $novoTexto;


echo "<hr>";

echo strpos($texto, "copa");





?>