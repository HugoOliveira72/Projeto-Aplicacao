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
        public function register($nome_completo,$nome_usuario,$CPFCNPJ,$email,$senha,$endereco,
        $nr_endereco,$complemento){
            global $pdo;

            //Verificar se o usuario ja esta cadastrado
            $sql = $pdo->prepare("SELECT id_Usuario FROM tbdPessoa WHERE ds_Email = :e");
            $sql->bindValue(":e",$email);
            $sql->execute();

            if($sql->rowCount() > 0 ){ //ja tem cadastro
                return false; 
            }else {
                $sql = $pdo->prepare("INSERT INTO tbdPessoa (ds_NomeCompleto,ds_NomeUsuario,cd_CPFCNPJ,
                ds_Email,ds_Senha,ds_Endereco,nr_Endereco,ds_Complemento)
                VALUES (:nc,:nu,:c,:e,:s,:en,:nen,:com)");
            
                $sql->bindValue(":nc",$nome_completo);
                $sql->bindValue(":nu",$nome_usuario);
                $sql->bindValue(":c",$CPFCNPJ);
                $sql->bindValue(":e",$email);
                $sql->bindValue(":s",md5($senha));
                $sql->bindValue(":en",$endereco);
                $sql->bindValue(":nen",$nr_endereco);
                $sql->bindValue(":com",$complemento);
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