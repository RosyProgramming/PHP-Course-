<?php
// Conexão com Banco de Dados
//Nome do servidor
$servername = "localhost";
//nome do usuario do phpmyAdmin
$username = "root";
//senha do banco de dados
$password = "";
//nome do banco de dados criado no phpmyadmin
$db_name= "sistemaLogin";


//Armazenando Conexão do banco de Dados
$connect = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
    echo "Falha na conexão: ".mysqli_connect_error();
endif;



?>