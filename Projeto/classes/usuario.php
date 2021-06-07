<?php
    Class usuario{
        private $pdo;
        public $msgErro = "";

        //Conectar com o banco de dados
        public function conect($db_name,$host,$user,$passw){
            global $pdo;
            try {
                $pdo = new PDO("mysql:dbname=".$db_name.";host=".$host,$user,$passw);
            } catch (PDOException $ex) {
                $msgErro = $ex->getMessage();
            }
            
        }

        //Cadastrar usuario
        public function register($nome_completo,$nome_usuario,$CPFCNPJ,$email,$senha,$endereco,
        $nr_endereco,$bairro,$complemento,$cidade,$uf,$cep,$pais){
            global $pdo;

            //Verificar se o usuario ja esta cadastrado
            $sql = $pdo->prepare("SELECT id_Usuario FROM tbdPessoa WHERE ds_Email = :e");
            $sql->bindValue(":e",$email);
            $sql->execute();

            if($sql->rowCount() > 0 ){ //ja tem cadastro
                return false; 
            }else {
                $sql = $pdo->prepare("INSERT INTO tbdPessoa (ds_NomeCompleto,ds_NomeUsuario,cd_CPFCNPJ,
                ds_Email,ds_Senha,ds_Endereco,nr_Endereco,ds_Bairro,ds_Complemento,ds_Cidade,cd_UF,
                cd_CEP,ds_Pais) VALUES (:nc,:nu,:c,:e,:s,:en,:nen,:b,:com,:ci,:uf,:cep,:p)");
            
                $sql->bindValue(":nc",$nome_completo);
                $sql->bindValue(":nu",$nome_usuario);
                $sql->bindValue(":c",$CPFCNPJ);
                $sql->bindValue(":e",$email);
                $sql->bindValue(":s",base64_encode($senha));
                $sql->bindValue(":en",$endereco);
                $sql->bindValue(":nen",$nr_endereco);
                $sql->bindValue(":b",$bairro);
                $sql->bindValue(":com",$complemento);
                $sql->bindValue(":ci",$cidade);
                $sql->bindValue(":uf",$uf);
                $sql->bindValue(":cep",$cep);
                $sql->bindValue(":p",$pais);
                $sql->execute();
                return true;
            }
        }

        //Logar usuario
        public function login($email,$senha){
            global $pdo;
            global $msgErro;

            //Verificar se email e senha existem no banco de dados
            $sql = $pdo->prepare("SELECT id_Usuario FROM tbdPessoa
            WHERE ds_Email = :e AND ds_Senha = :s");
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",base64_encode($senha));
            $sql->execute();
            if($sql->rowCount()> 0){ //Já está cadastrado   
                $dado = $sql->fetch();
                return true;  
            }else{              //Não está cadastrado
                return false;
            }
        }

        public function editar_dados($id_Usuario,$nome_completo,$nome_usuario,$CPFCNPJ,$email,$senha,$endereco,
        $nr_endereco,$bairro,$complemento,$cidade,$uf,$cep,$pais){
            global $pdo;
            $sql = $pdo->prepare("UPDATE tbdPessoa SET ds_NomeCompleto=:nc,ds_NomeUsuario=:nu,cd_CPFCNPJ=:c,
            ds_Email=:e,ds_Senha=:s,ds_Endereco=:en,nr_Endereco=:nen,ds_Bairro=:b,ds_Complemento=:com,
            ds_Cidade=:ci,cd_UF=:uf,cd_CEP=:cep,ds_Pais=:p WHERE id_Usuario =:id");
            $sql->bindValue(":nc",$nome_completo);
            $sql->bindValue(":nu",$nome_usuario);
            $sql->bindValue(":c",$CPFCNPJ);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",base64_encode($senha));
            $sql->bindValue(":en",$endereco);
            $sql->bindValue(":nen",$nr_endereco);
            $sql->bindValue(":b",$bairro);
            $sql->bindValue(":com",$complemento);
            $sql->bindValue(":ci",$cidade);
            $sql->bindValue(":uf",$uf);
            $sql->bindValue(":cep",$cep);
            $sql->bindValue(":p",$pais);
            $sql->bindValue(":id",$id_Usuario);
            if($sql->execute()){
                return true;
            }else{
                return false;
            }
            
        }
    }
?>