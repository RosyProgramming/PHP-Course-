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
    $formatosPermitidos = array("xlsx", "csv");
    
    //Pegando a extensão do arquivo
    $extensao = strtolower(pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION));
    // echo ($extensao);

    //verificar se a extensão existe no array
    if (in_array($extensao, $formatosPermitidos)):
        // $gravaArquivo = $this->_model->enviarxls_setor($dados, false);
        // $nomeTemporario = $_FILES['arquivo']['tmp_name'];
        // $novoNome = uniqid()."$extensao";

        //Nome do arquivo temporario 
        $nomeTemporario = $_FILES['arquivo']['tmp_name']; 
        // print($nomeTemporario);
        // echo "<hr>";

        //nome do arquivo atual
        $nomeArquivo = $_FILES['arquivo']['name'];
        // print($nomeArquivo);
        // echo "<hr>";
        
        // Remover a extensão do nome do arquivo original
        $nome_arquivo = str_replace ($extensao, '', $nomeArquivo);
        // print($nome_arquivo);
        $novo_nome   = PATH   . '_controller/phpexcel/' . $nome_arquivo  . $extensao;
        // print($novo_name);die;

        if (move_uploaded_file($nomeTemporario,$novo_nome)):

            $dados['nomearquivo'] = $novo_nome;
            $dados['descricao'] = $nome_arquivo .$extensao;
            //  print_r($dados);die;
            
            $gravaArquivo = $this->_model->importar_campanha($dados, false);
            
            unlink($dados['nomearquivo']);
            
            if(empty($gravaArquivo)):
                $msg = "Arquivo gravado com sucesso.";
	            echo $msg;
            else:
                $msg = "Erro ao gravar arquivo no banco de dados.";
	                    echo "{success: true, msg: '$msg'}";
            endif;
            // echo "{sucess: false, msg:'Gravado com sucesso!'}";

        else:
            echo "{sucess: false, msg:'Erro ao enviar os dados!'}";
        endif;
    else:
        echo "{sucess: false, msg:'Formato inválido'}";
    endif;

endif;

?>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
    <input type="file" name="arquivo"><br>
    <input type="submit" name="enviar-formulario">

</form>

</body>
</html>