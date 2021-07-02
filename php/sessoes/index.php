<?php

//session_start() cria uma sessão ou resume a 
//sessão atual baseado em um id de sessão passado 
//via GET ou POST, ou passado via cookie.

session_start();

$_SESSION['cor'] = "Verde";
$_SESSION['carro'] = "Veloster";

echo $_SESSION['cor']."<br>".$_SESSION['carro']."<br>".session_id();

?>