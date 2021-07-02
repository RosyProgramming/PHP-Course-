<?php
//conexão
require_once 'db_connect.php';

//sessão
session_start();

//verificação de sessão
if(!isset($_SESSION['logado'])):
    header('Location: index.php');
endif;


//Dados 
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios Where id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
//fechar a conexão
mysqli_close($connect);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página restrita</title>
</head>
<body>
    <p> Seja Bem-Vindo, <?php echo $dados['nome']; ?>!</p>
    <a href="logout.php"> Sair </a>
</body>
</html>