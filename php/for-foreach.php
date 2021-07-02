<?php

// for ($contador = 0; $contador <= 10; $contador++):
//     echo "O contador é $contador <br>";
// endfor;


for ($contador = 0; $contador <= 10; $contador++):
    echo "8 x $contador = " .($contador*8). "<br>";
endfor;


echo "<hr>";

$cores = array("verde", "vermelho", "azul");

foreach($cores as $indice => $valor):
    echo $indice."-".$valor."<br>";
endforeach;

echo "<hr>";
echo "Concatenação! <br>";

$v = "Dev";
$v = $v . "media!";

$v1 = " \t plataforma \t";
$v1 .= "para programadores!";

echo $v. $v1;

?>