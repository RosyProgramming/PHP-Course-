<?php
class obj extends ADOdb_Active_Record{}
class modelCampanha extends model2 {

    private $_modelLocal;


    function __construct($modelPai)
    {
        $this->_modelLocal = $modelPai;
        
    }

    function lista_Campanha($param, $bDebug=false) {

        $sql = " SELECT campanha_id,
        izio_id,
        nome_campanha,
        desc_campanha,
        dat_inicio,
        dat_final,
        tipopublico,
        validade_cashback,
        vlr_maximo_cpf,
        dt_inclusao,
        dt_envio,
        usuario
        FROM CARVALHO_IZIO_CAMPANHA";
        
        if($bDebug){
            print $sql;
            die;
        }


        //$rs = $this->_modelLocal->ExecuteSQL($sql);

        $rs = $this->_modelLocal->executeJSON($sql); 

        // if ($rs === false) {
        //       	$msgBDErro = $this->_modelLocal->_adodb->ErrorMsg();
        //           print "{success: false, msg: ' $msgBDErro '}";
        //           die;

        //       } else {
        //       	$total = count($rs);
        //       	return '({"total":"'.$total.'","dados":'.json_encode($rs).'})';
        //       }
        return $rs;
    }

    function importarXlsx($param, $bDebug=false){
        // print_r($param);die;
    
        $nomeCampanha 	 	= $param['nomeCampanha'];
        $inicioCampanha  	= $param{'inicioCampanha'}; 
        $fimCampanha 		= $param{'fimCampanha'};
        $publicoCampanha 	= $param['publicoCampanha'];
        $validadeCashback	= $param['validadeCashback'];
        $usuario 		    = $param['idUsuarioPerfil'];

        $objPHPExcel = PHPExcel_IOFactory::load($param['nomearquivo']);

        $seqcampanha = "select gcti.seq_carvalho_izio_campanha.nextval seqcampanha from dual";
        $seq = $this->_modelLocal->ExecuteSQL($seqcampanha);
        $id = $seq[0]['seqcampanha'];

    
        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {

            $highestRow         = $worksheet->getHighestRow();             
            $highestColumn      = $worksheet->getHighestColumn();
            $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
            $criaCampanha = 'S';
            //print_r($highestRow);die;

            for ($row = 2; $row <= $highestRow; ++ $row){

                $codAcrux 			= $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                $descricao  		= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                $cashback  			= $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                $vlrVarejo			= $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                $limiteCashback 	= $worksheet->getCellByColumnAndRow(5, $row)->getValue();

                $sql = "select prod.seqproduto, prod.descecommerce  from carvalho.map_produto prod where prod.seqproduto = {$codAcrux} and prod.descecommerce is not null";
                $rs = $this->_modelLocal->executeSQL($sql);
                // print_r($sql);die;
                // print_r('01');
                // print_r($rs);die;

                // $msg = 'Compre 01 cerveja Brahma Dublo Malte 350 e ganhe 5% de cashback!Identifique-se com o CPF no caixa para ganhar o cashback!Campanha válida de 21/04/2021 a 30/04/2021 ou enquanto durarem os estoques. Cashback válido por 45 dias após o recebimento. Atenção ao código do produto: 7891991294942 ou 7891991294959';
                
                
                if(count($rs) > 0 ){
                    // encontrou produto com sua descricao
                    $msg = "Compre 01 {$rs[0]['descecommerce']} e ganhe {$cashback}% de cashback!Identifique-se com o CPF no caixa para ganhar o cashback!Campanha válida de {$inicioCampanha} a {$fimCampanha} ou enquanto durarem os estoques. Cashback válido por {$validadeCashback} dias após o recebimento.";	
                }
                else{
                    // nao encontrou a descricao ecomerce do produto
                    $criaCampanha = 'S';
                }
                
                if ($criaCampanha =='S'){ 
                    // $seqcampanha = "select gcti.seq_carvalho_izio_campanha.nextval seqcampanha from dual";
                    // $seq = $this->_modelLocal->ExecuteSQL($seqcampanha);
                    // $id = $seq[0]['seqcampanha'];
                    
                    //izio_id é o id quando enviar a campnha, 
                    //captura-se o id como retorno da API e faz o update no campo

                    $sql = array();
                    //$sql1 = "INSERT INTO gcti.carvalho_izio_campanha
                    $sql[] = "INSERT INTO gcti.carvalho_izio_campanha
                    (campanha_id,
                    izio_id,
                    nome_campanha,
                    desc_campanha,
                    dat_inicio,
                    dat_final,
                    tipopublico,
                    validade_cashback,
                    vl_max_investimento,
                    vlr_maximo_campanha,
                    vlr_maximo_cpf,
                    qtd_dias_cred_bloqueado,
                    cod_referencia,
                    dt_inclusao,
                    dt_envio,
                    usuario,
                    msg_retorno_camp,
                    msg_retorno_publi,
                    msg_retorno_lojas,
                    msg_retorno_gat,
                    msg_retorno_pub)
                    VALUES
                    ({$id},
                    123,
                    '{$rs[0]['descecommerce']}',
                    '{$msg}',
                    TO_DATE('{$param['inicioCampanha']}','DD/MM/YYYY'),
                    TO_DATE('{$param['fimCampanha']}','DD/MM/YYYY'),
                    {$publicoCampanha},
                    {$validadeCashback},
                    null,
                    null,
                    {$limiteCashback},
                    null,
                    null,
                    trunc(sysdate),
                    null,
                    '{$usuario}',
                    null,
                    null,
                    null,
                    null,
                    null)
                    ";
                    
                    //$ins = $this->_modelLocal->ExecuteSQL($sql1);
                    
                    //$sql2 = "INSERT INTO gcti.CARVALHO_IZIO_DETALHE
                    
                    $sql[] = "INSERT INTO gcti.CARVALHO_IZIO_DETALHE
                    (campanha_id, seqproduto, perc_cashback, limite_cashback, foto)
                    VALUES
                    ({$id}, {$codAcrux}, {$cashback}, {$limiteCashback}, null)
                    ";

                    // //$ins = $this->_modelLocal->ExecuteSQL($sql2);
                    
                    $sql[] = "INSERT INTO gcti.carvalho_izio_codbarras (
                    select {$id}, pr.codacesso as cod_ean
                    from carvalho.map_prodcodigo pr
                    where pr.seqproduto = {$codAcrux}
                    and pr.tipcodigo = 'E')";
                    
                    $ins =  $this->_modelLocal->executeTransaction($sql);			
                    //$ins = $this->_modelLocal->ExecuteSQL($sql3);
                    // print($sql3);

                    // if(!$bDebug){
                    // 	print $sql[0];
                    // 	die;
                    // }
                    
                }else{
                    print("estou aqui 3");die;
                    // fazer o q ? com os produtos q nao foram validados
                }

            }
                    if ($ins === false)
                    {						
                        // print("estou aqui 1");die;
                        // return '{"success":false, "msg":"Erro inesperado ao inserir os dados"}';
                        // print '{"success":false, "msg":"Erro inesperado ao inserir os dados"}';

                        echo '{"success":false, "msg":"Erro inesperado ao inserir os dados"}';
                    }
                    else
                    {					
                        // print("estou aqui 2");die;
                        // return '{"success":true, "msg": "Registro incluído com sucesso!"}';
                        // print '{"success":true, "msg": "Registro incluído com sucesso!"}';

                        echo '{"success":true, "msg": "Registro incluído com sucesso!"}';
                    }
        }	
    }
}	
?>