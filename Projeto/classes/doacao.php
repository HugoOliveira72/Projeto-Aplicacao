<?php 
    Class doacao{
        private $pdo;
        public $msg_Erro = "";

        public function conect($db_name,$host,$user,$passw){
            global $pdo;
            try {
                $pdo = new PDO("mysql:dbname=".$db_name.";host=".$host,$user,$passw);
            } catch (PDOException $mensagem) {
                $msg_Erro = $ex->getMessage();
            }
        }

        public function criar_doacao($id_Usuario,$nome_usuario,$id_Recebedor,$nome_usuario_recebedor,$email_recebedor,
        $email_doador,$valor_doacao,$chave_pix,$itemDoado,$endereco_recebedor,$nr_endereco_recebedor,$bairro_recebedor,
        $complemento_recebedor,$cidade_recebedor,$uf_recebedor,$pais_recebedor,$cep_recebedor,$data_doacao,$EnderecoDoador,
        $nrEnderecoDoador,$BairroDoador,$ComplementoDoador,$CidadeDoador,$UF_Doador,$PaisDoador,$CEP_Doador){

            global $pdo;

                $sql = $pdo->prepare("INSERT INTO tbddoacao (id_Doador,ds_Doador,id_Recebedor,ds_Recebedor,
                ds_EmailRecebedor,ds_EmailDoador,vl_Doacao,ds_ChavePix,ds_ItemDoado,ds_EnderecoRecebedor,nr_EnderecoRecebedor,
                ds_BairroRecebedor,ds_ComplementoRecebedor,ds_CidadeRecebedor,cd_UF_Recebedor,ds_PaisRecebedor,cd_CEP_Recebedor,
                ds_data,
                
                ds_EnderecoDoador,nr_EnderecoDoador,ds_BairroDoador,ds_ComplementoDoador,ds_CidadeDoador,cd_UF_Doador,
                ds_PaisDoador,cd_CEP_Doador) 
                VALUES (:iu,:do,:ir,:r,:emr,:emd,:vld,:chp,:itd,:endr,:nendr,:bar,:cor,:cir,:ufr,:par,:cer,:dt,:endd,:nendd,:bad,:comd,:cid,:ufd,:pad,:cepd)");
            
                $sql->bindValue(":iu",$id_Usuario);
                $sql->bindValue(":do",$nome_usuario);
                $sql->bindValue(":ir",$id_Recebedor);
                $sql->bindValue(":r",$nome_usuario_recebedor);
                $sql->bindValue(":emr",$email_recebedor);
                $sql->bindValue(":emd",$email_doador);
                $sql->bindValue(":vld",$valor_doacao);
                $sql->bindValue(":chp",$chave_pix);
                $sql->bindValue(":itd",$itemDoado);
                $sql->bindValue(":endr",$endereco_recebedor);
                $sql->bindValue(":nendr",$nr_endereco_recebedor);
                $sql->bindValue(":bar",$bairro_recebedor);
                $sql->bindValue(":cor",$complemento_recebedor);
                $sql->bindValue(":cir",$cidade_recebedor);
                $sql->bindValue(":ufr",$uf_recebedor);
                $sql->bindValue(":par",$pais_recebedor);
                $sql->bindValue(":cer",$cep_recebedor);
                
                $sql->bindValue(":endd",$EnderecoDoador);
                $sql->bindValue(":nendd",$nrEnderecoDoador);
                $sql->bindValue(":bad",$BairroDoador);
                $sql->bindValue(":comd",$ComplementoDoador);
                $sql->bindValue(":cid",$CidadeDoador);
                $sql->bindValue(":ufd",$UF_Doador);
                $sql->bindValue(":pad",$PaisDoador);
                $sql->bindValue(":cepd",$CEP_Doador);

                $sql->bindValue(":dt",$data_doacao);
                $sql->execute();
                return true;
            }
    }
?>