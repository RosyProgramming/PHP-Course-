<html> 
<body>


<!-- /* Validações
Funções (filter_input -  filter_var)
Filter_Validate_INT
Filter_Validate_Email
Filter_Validate_Float
Filter_Validate_IP
Filter_validate-URL
*/ -->


<?php

if (isset($_POST['enviar-formulario'])):
    $erros = array();
    // $idade = $_POST['idade'];
    // echo $idade;

    if(!$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)):
        $erros[]= "Idade precisa ser inteiro";
    endif;

    
    if(!$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)):
        $erros[]= "Email invalido";
    endif;

    if(!$peso = filter_input(INPUT_POST, 'peso', FILTER_VALIDATE_FLOAT)):
        $erros[]= "Peso precisa ser um float";
    endif;

    if(!$ip = filter_input(INPUT_POST, 'ip', FILTER_VALIDATE_IP)):
        $erros[]= "IP Inválido!";
    endif;

    if(!$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL)):
        $erros[]= "URL Inválido!";
    endif;

    if(!empty($erros)):
        foreach($erros as $erro):
            echo "<li> $erro </li>";
        endforeach;
    else:
        echo "Parabéns, seus dados estão corretos!";
    endif;
endif;

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
Idade: <input type="text" name="idade"><br>
Email: <input type="text" name="email"><br>
Peso: <input type="text" name="peso"><br>
IP: <input type="text" name="ip"><br>
URL: <input type="text" name="url"><br>
<button type="submit" name="enviar-formulario">Enviar</button><br>
</form>

</body>
</html>