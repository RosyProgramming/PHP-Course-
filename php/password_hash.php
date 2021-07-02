<?php
$senha = '123456';
$senha_db = '$2y$10$7M9pWgrQ7Kb9m7pZCMGSPO/2SBQ7GT7un1kTfReQC7oQZ47D2gJZm';

//utilizando passaword_hash para criptografa senha 
// $options = [
//     'cost' => 10,
// ];

// $senhaSegura = password_hash($senha, PASSWORD_BCRYPT);
// echo $senhaSegura;

//verificando a senha criptografada 
if(password_verify($senha, $senha_db)):
    echo "Senha válida";
else:
    echo "Senha invalida";
endif;
?>