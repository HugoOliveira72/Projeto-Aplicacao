<?php 
    require_once 'classes\usuario.php';
    $u = new usuario();
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/cadastroStyle.css">
    <script src="js/cadastroScript.js"></script>
    <title>Cadastro</title>
</head>

<body>

    <div class="container">
        <div class="justify-content-center align-item-center row">
            <div class="col-12">
                <form method="POST" class="needs-validation form-register" novalidate>
                    <div class="text-center mb-2">
                        <h2>Cadastre-se</h2>
                    </div>

                    <!-- Primeira coluna-->
                    <div class="row align-items-start text-center">
                        <div class="col">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome completo:</label>
                                <input type="text" class="form-control" id="full-name" name="full-name"
                                    placeholder="Prencha seu nome completo" maxlength="50">
                            </div>
                            <div class="mb-3">
                                <label for="name-user" class="form-label">Nome de usuário</label>
                                <input type="text" class="form-control" id="name-user" name="name-user"
                                    placeholder="nome de usuario" maxlength="15">
                            </div>

                            <div class="mb-3">
                                <label for="cpf-cnpj" class="form-label">CPF ou CNPJ:</label>
                                <input type="text" class="form-control" id="cpf-cnpj"
                                    name="cpf-cnpj" placeholder="cpj ou cnpj" maxlength="32">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Senha:</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="senha" maxlength="32">
                            </div>

                            <div class="mb-3">
                                <label for="confirm-password" class="form-label">Confirmar Senha:</label>
                                <input type="password" class="form-control" id="confirm-password"
                                    name="confirm-password" placeholder="confirmar senha" maxlength="32">
                            </div>
                        </div>
                        <!-- SEgunda coluna-->
                        <div class="col">
                            <div class="mb-3">
                                <label for="address" class="form-label">Endereco:</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="endereco" maxlength="50">
                            </div>
                            <div class="mb-3">
                                <label for="number-address" class="form-label">Bairro:</label>
                                <input type="text" class="form-control" id="district" name="district"
                                    placeholder="bairro" maxlength="32">
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">Cidade:</label>
                                <input type="text" class="form-control" id="city" name="city"
                                    placeholder="insira sua cidade" maxlength="20">
                            </div>

                            <div class="mb-3">
                                <label for="country" class="form-label">País:</label>
                                <input type="text" class="form-control" id="country" name="country" placeholder="país"
                                    maxlength="30">
                            </div>
                            <div class="mb-3">
                                <label for="confirm-password" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email"
                                    name="email" placeholder="email@email" maxlength="40">
                            </div>
                        </div>
                        <!-- Terceira coluna-->
                        <div class="col">
                            <div class="mb-3">
                                <label for="number-address" class="form-label">Número:</label>
                                <input type="text" class="form-control" id="number-address" name="number-address" placeholder="numero" maxlength="5">
                            </div>

                            <div class="mb-3">
                                <label for="complement" class="form-label">Complemento:</label>
                                <input type="text" class="form-control" id="complement" name="complement" placeholder="Complemento" maxlength="30">
                            </div>

                            <div class="mb-3">
                                <label for="uf" class="form-label">UF:</label>
                                <input type="text" class="form-control" id="uf" name="uf" placeholder="UF" maxlength="2">
                            </div>


                            <div class="mb-3">
                                <label for="cep" class="form-label">CEP:</label>
                                <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" maxlength="9">
                            </div>
                        </div>
                    </div>  

                    <button type="submit" class="btn btn-success btn-block btn-lg" name="button">Cadastrar</button>

                    <div>
                        <p>Ja possui uma conta? <a href="login.html">Logar</a></p>
                    </div>
                </form>
            </div>


        </div>
    </div>
    <?php 
        //Verificar se clicou no botao
        if(isset($_POST['button'])){

            $nome_completo = addslashes($_POST['full-name']);
            $nome_usuario = addslashes($_POST['name-user']);
            $CPFCNPJ = addslashes($_POST['cpf-cnpj']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['password']);
            $conf_senha = addslashes($_POST['confirm-password']);
            $endereco = addslashes($_POST['address']);
            $nr_endereco = addslashes($_POST['number-address']);
            

            if(!empty($nome_completo) && !empty($nome_usuario) && !empty($CPFCNPJ) && !empty($email) &&
            !empty($senha) && !empty($endereco) && !empty($nr_endereco) ){

                $u->conect("projeto_aplicacao","localhost","root","");

                if($u->msmErro==""){ //Nao deu erro

                    if($senha==$conf_senha){   //Confirmar a senha
                        if($u->register($nome_completo,$nome_usuario,$CPFCNPJ,$email,$senha,$endereco,
                        $nr_endereco)){  //Verificar se o cadastro deu certo
                            echo "Cadastrado com sucesso";
                        }else{
                            echo "ja cadastrado";
                        }
                    }else{
                        echo "Senha e confimar senha errados";
                    }
                    
                }else{
                    echo "Erro:".$u->msmErro;
                }
            }else{
               echo "preencha tudo"; 
            }
        }
    
    ?>

</body>

</html>