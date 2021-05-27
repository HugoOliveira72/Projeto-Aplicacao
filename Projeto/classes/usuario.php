<?php
    Class usuario{
        private $pdo;
        public $msmErro = "";

        //Conectar com o banco de dados
        public function conect($db_name,$host,$user,$passw){
            global $pdo;
            try {
                $pdo = new PDO("mysql:dbname=".$db_name.";host=".$host,$user,$passw);
            } catch (PDOException $ex) {
                $msmErro = $ex->getMessage();
            }
            
        }

        //Cadastrar usuario
        public function register($CPFCNPJ,$nome_completo,$nome_usuario,$email,$senha,$endereco,
        $n_endereco,$bairro,$complemento,$cidade,$uf,$cep,$pais){
            global $pdo;

            //Verificar se o usuario ja esta cadastrado
            $sql = $pdo->prepare("SELECT id_Usuario FROM tbdPessoa WHERE ds_Email = :e");
            $sql->bindValue(":e",$email);
            $sql->execute();

            if($sql->rowCount()> 0 ){ //ja tem cadastro
                return false; 
            }else {
                $sql->prepare("INSERT INTO tbdPessoa (cd_CPFCNPJ,ds_NomeCompleto,ds_NomeUsuario,ds_Email,
                ds_Senha,ds_Complemento,ds_Enderecov,nr_Endereco,ds_Bairro,ds_Cidade,cd_UF,cd_CEP,ds_Pais)
                VALUES (:c,:nc,:nu,:e,:s,:cm,:en,:nem,:b,:ci,:uf,:cep,:p)");
                $sql->bindValue(":c",$CPFCNPJ);
                $sql->bindValue(":nc",$nome_completo);
                $sql->bindValue(":nu",$nome_usuario);
                $sql->bindValue(":e",$email);
                $sql->bindValue(":s",$senha);
                $sql->bindValue(":cm",$complemento);
                $sql->bindValue(":en",$endereco);
                $sql->bindValue(":nem",$n_endereco);
                $sql->bindValue(":b",$bairro);
                $sql->bindValue(":ci",$cidade);
                $sql->bindValue(":uf",$uf);
                $sql->bindValue(":cep",$cep);
                $sql->bindValue(":p",$pais);
                $sql->execute();
                return true;
            }
        }

        //Logar usuario
        public function login($CPFCNPJ,$senha){
            global $pdo;
            //Verificar se cpf e senha tem no banco
            $sql = $pdo->prepare("SELECT id_Usuario FROM tbmPessoa
            WHERE cd_CPFCNPJ = :c AND senha = :s");
            $sql->bindValue(":c",$CPFCNPJ);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            if($sql->rowCount()> 0){ //Já está cadastrado
                return false;
            }else{              //Não está cadastrado
 
                $dado = $sql->fetch();
                session_start();
                $_SESSION['id_Usuario'] = $dado['id_Usuario'];
                return true;  
            }
        }



    }
?>