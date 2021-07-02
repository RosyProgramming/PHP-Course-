<?php
//Manipulação de Arquivos 
/*
fopen(filename, mode) -- abrir arquivo
fclose(filename) -- fechar arquivo  aberto
fwrite() --- escrever no arquivo 
!feof() -- se não for o final do arquivo aberto  
fgets() --pega o contéudo do arquivo aberto e exibir a linhas
filesize-- tamanho do arquivo 
*/

$arquivo = 'arquivo.txt';
//\r\n serve para pular uma linha
$conteudo = "Conteudo de teste\r\n";
$tamanhoArquivo = filesize($arquivo);
$arquivoAberto = fopen($arquivo, 'r'); //mode - a esrever no arquivo 
// fwrite($arquivoAberto, $conteudo);

while(!feof($arquivoAberto)):
    $linha = fgets($arquivoAberto, $tamanhoArquivo);
    echo $linha."<br>";
endwhile;

fclose($arquivoAberto);
?>