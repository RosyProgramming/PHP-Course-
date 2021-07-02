
<?php

//Superglobais
/*

    $GLOBALS
    $_SERVER
    $_REQUEST
    $_POST
    $_GET
    $_FILES
    $_ENV
    $_COOKIE
    $_SESSION
*/ 

$x = 10;
$y = 15;

function soma() {
    //echo $x + $y; -- Se tentar chamar a variavel x e y dentro de uma função não será exibido nada
                       //pois não e uma variavel global.
    echo $GLOBALS['x'] + $GLOBALS ['y'];
}

soma();

echo "<hr>";

echo $_SERVER['PHP_SELF']."<br>"; // imprimi a url da pasta /php/sup.php

echo $_SERVER['SERVER_NAME']."<br>"; //imprimi localhost

echo $_SERVER['SCRIPT_FILENAME']."<br>"; //imprimi o script do arquivo

echo $_SERVER['DOCUMENT_ROOT']."<br>"; //imprimi c:/xampp/htdocs

echo $_SERVER['SERVER_PORT']."<br>"; //imprimir a porta do servidor 80

echo $_SERVER['REMOTE_ADDR']."<br>"; //numero ip ::1





?>