<?php
//cookie
setcookie('user', 'Rosana Oliveira', time()+3600);
setcookie('email', 'rosana@gmail.com', time()+3600);
setcookie('ultima_pesquisa', 'roupas', time()+3600);

// var_dump($_COOKIE);

echo $_COOKIE['ultima_pesquisa'];

?>