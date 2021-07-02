<?php
// Conexão
require_once 'db_connect.php';

//sessão
session_start();

//Botão Enviar
if(isset($_POST['btn-entrar'])):
    // echo "Clicou";
    $erros = array();
    //função para filtrar os dados do login
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    //verificar se os campos estão vazios
    if(empty($login) or empty($senha)): 
        $erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
        
    else:
        //consulta no banco de dados usuário 
        $sql = "SELECT login From usuarios Where login = '$login'";
        $resultado = mysqli_query($connect, $sql);

        //verificar se o usuário existe no bd
        if(mysqli_num_rows($resultado) > 0):
            //criptografa senha
            $senha = md5($senha);
            //verificar se senha esta correta
            $sql = "SELECT * FROM usuarios Where login = '$login' AND senha = '$senha'";
            $resultado = mysqli_query($connect, $sql);

            if(mysqli_num_rows($resultado) == 1):
                //convertendo o resultado em um array 
                $dados = mysqli_fetch_array($resultado);
                //fechar a conexão
                mysqli_close($connect);
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['id'];
                //redirecionar o usuario para pagina restrita
                header('Location: home.php');
                
            else:
                $erros[] = "<li> Usuário e senha não conferem </li>";
            endif;
        else:
            // se não existe usuario no banco de dados, exiber a mensagem
            $erros[] = "<li>Usuário inexistente</li>";
        endif;
    endif;
endif;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login</title>
</head>
<body>

    <h1> Login </h1>
    <?php
        if(!empty($erros)):
            foreach($erros as $erro):
                echo $erro;
            endforeach;
        endif;
    ?>
    <hr>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    Login: <input type="text" name="login"><br><br>
    Senha: <input type="password" name="senha"><br><br>
    <button type="submit" name="btn-entrar"> Acessar </button>
    </form>

</body>
</html>