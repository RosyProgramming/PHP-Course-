<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso PHP - Upload</title>
</head>
<body>


<!--  
    PHP

    pathinfo() - função para retorna informações sobre o caminho de um arquivo.
    PATHINFO_DIRNAME - return only dirname
    PATHINFO_BASENAME - return only basename
    PATHINFO_EXTENSION - return only extension
    PATHINFO_FILENAME - return only filename

-->
<?php
if(isset($_POST['enviar-formulario'])):
    //var_dump($_FILES);
    //informar formatos permitido
    $formatosPermitidos = array("PNG","JPEG","JPG","GIF","png","jpeg","jpg","gif");
    
    $quantidadeArquivo = count($_FILES['arquivo']['name']);
    $contador = 0;

    //receber varios arquivos multiplos
    while ($contador < $quantidadeArquivo):

    //recebe o tipo de extensao e informa o nome do arquivo
    $extensao = strtolower(pathinfo($_FILES['arquivo']['name'][$contador], PATHINFO_EXTENSION));
    // echo $extensao;

    //verificar se a extensão existe no array permitido
    // in_array () pesquisa um array para um valor específico.
    // A função uniqid () gera um ID exclusivo com base no microtime (o tempo atual em microssegundos).

    if(in_array($extensao, $formatosPermitidos)):
        // echo "Existe";
        $pasta = "arquivos/";
        $temporario = $_FILES['arquivo']['tmp_name'][$contador];
        $novoNome = uniqid().".$extensao";

        if(move_uploaded_file($temporario, $pasta.$novoNome)):
            // $mensagem = "Upload feito com sucesso!";
            echo "Upload realizado com sucesso para $pasta.$novoNome<br>";

        else:
            // $mensagem = "Erro, não foi possivel fazer o upload";
            echo "Erro ao enviar o arquivo $temporario";

        endif;

    else:
        // echo "Não existe";
        // $mensagem = "Formato inválido";
        echo "$extensao não é permitida <br>";

    endif; 

    // echo $mensagem;
    $contador++;
    endwhile;

endif;

?>

<!-- 
    $_SERVER - É uma variável superglobal do php que contém informações sobre cabeçalhos, caminhos e locais de script.
    $_SERVER['PHP_SELF'] - Retorna o nome do arquivo do script atualmente em execução.
    enctype - atributo especifica como os dados do formulário devem ser codificados ao envi-a-los ao servirdo.
    Nota: o enctype atributo pode ser usado apenas se method="post".
 -->

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
    <input type="file" name="arquivo[]" multiple><br>
    <input type="submit" name="enviar-formulario">

</form>

</body>
</html>