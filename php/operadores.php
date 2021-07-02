<?php

//Operadores lógicos
//Nos permitem fazer comparações entre expressões 
// e (&& - and)
// ou (|| - or)
// ou exclusivo (xor) --um ou outro precisa ser verdadeiro
// negação (!)

$idade = 25;
$nome = "Rodrigo";

// if(($idade == 25) && ($nome == "Rodrigo")):
//     echo "É verdadeiro";

// else:
//     echo "É falso";

// endif;

if(!($idade == 25) and ($nome == "Rodrigo")):
    echo "É verdadeiro";

else:
    echo "É falso";

endif;


?>