<?php
//Criando funções

// function exibirNome() {
//     echo "Meu nome é Rosana";
// }

// exibirNome();

echo "<hr>";

function exibirNome($nome){
    echo "Meu nome é $nome";
}

exibirNome("Rosana Oliveira");

echo "<hr>";

function calcularMedia($nome, $n1, $n2, $n3, $n4){
    $media = ($n1 + $n2 + $n3 + $n4) / 4;
    if($media >= 7):
        echo "$nome foi aprovado com a média $media";
    else:
        echo "$nome foi reprovado";
    endif;

}

calcularMedia("Bob", 5,7 ,8 ,9);











?>