<?php 
    require_once 'classes\usuario.php';
    $u = new usuario();
?>

<!DOCTYPE html>
<html>

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
    <script src="js\cadastroScript.js"></script>
    <title>Cadastro</title>
</head>
<body>

    <br>
    <div class="container col-8" id="form-register">
        <div class="justify-content-center align-item-center row">
            <div class="col-10">
                <form method="POST" class="needs-validation" novalidate>
                    <div class="text-center mb-2">
                        <h4>Cadastre-se</h4>
                    </div>
                    <!-- Primeira coluna-->
                    <div class="row align-items-start text-center">
                        <div class="col">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome completo:</label>
                                <input type="text" class="form-control" id="full-name" name="full-name"
                                    placeholder="Prencha seu nome completo" maxlength="50" required>
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo inválido.</div>
                            </div>
                            <div class="mb-3">
                                <label for="name-user" class="form-label">Nome de usuário</label>
                                <input type="text" class="form-control" id="name-user" name="name-user"
                                    placeholder="nome de usuario" maxlength="15" required>
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo inválido.</div>
                            </div>

                            <div class="mb-3">
                                <label for="cpf-cnpj" class="form-label">CPF ou CNPJ:</label>
                                <input type="text" class="form-control" id="cpf-cnpj"
                                    name="cpf-cnpj" placeholder="cpj ou cnpj" maxlength="32" required>
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo inválido.</div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Senha:</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="senha" maxlength="32" required>
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo inválido.</div>
                            </div>

                            <div class="mb-3">
                                <label for="confirm-password" class="form-label">Confirmar Senha:</label>
                                <input type="password" class="form-control" id="confirm-password"
                                    name="confirm-password" placeholder="confirmar senha" maxlength="32" required>
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo inválido.</div>
                            </div>
                        </div>
                        <!-- Segunda coluna-->
                        <div class="col">
                            <div class="mb-3">
                                <label for="address" class="form-label">Endereco:</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="endereco" maxlength="50" required>
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo inválido.</div>
                            </div>
                            <div class="mb-3">
                                <label for="number-address" class="form-label">Bairro:</label>
                                <input type="text" class="form-control" id="district" name="district"
                                    placeholder="bairro" maxlength="32" required>
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo inválido.</div>
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">Cidade:</label>
                                <input type="text" class="form-control" id="city" name="city"
                                    placeholder="insira sua cidade" maxlength="20" required>
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo inválido.</div>
                            </div>

                            <div class="mb-3">
                                <label for="country" class="form-label">País:</label>
                                <input type="text" class="form-control" id="country" name="country" placeholder="país"
                                    maxlength="30" required>
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo inválido.</div>
                            </div>
                            <div class="mb-3">
                                <label for="confirm-password" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email"
                                    name="email" placeholder="email@email" maxlength="40" required>
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo inválido.</div>
                            </div>
                        </div>
                        <!-- Terceira coluna-->
                        <div class="col">
                            <div class="mb-3">
                                <label for="number-address" class="form-label">Número:</label>
                                <input type="text" class="form-control" id="number-address" name="number-address" 
                                placeholder="numero" maxlength="5" required>
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo inválido.</div>
                            </div>

                            <div class="mb-3">
                                <label for="complement" class="form-label">Complemento:</label>
                                <input type="text" class="form-control" id="complement" name="complement" 
                                placeholder="Complemento" maxlength="30" >

                            </div>

                            <div class="mb-3">
                                <label for="uf" class="form-label">UF:</label>
                                <input type="text" class="form-control" id="uf" name="uf" placeholder="UF" maxlength="2" 
                                required>
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo inválido.</div>
                            </div>


                            <div class="mb-3">
                                <label for="cep" class="form-label">CEP:</label>
                                <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" maxlength="9"
                                required>
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo inválido.</div>
                            </div>
                        </div>
                    </div>  

                    <button type="submit" class="btn btn-success btn-block btn-lg" name="button">Cadastrar</button>
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
                        $bairro = addslashes($_POST['district']);
                        $complemento = addslashes($_POST['complement']);
                        if(empty($complemento)){
                            $complemento = "Sem complemento";
                        }
                        $cidade = addslashes($_POST['city']);
                        $uf = addslashes($_POST['uf']);
                        $cep = addslashes($_POST['cep']);
                        $pais = addslashes($_POST['country']);
                        

                        if(!empty($nome_completo) && !empty($nome_usuario) && !empty($CPFCNPJ) && !empty($email) &&
                        !empty($senha) && !empty($endereco) && !empty($nr_endereco) && !empty($bairro) 
                        && !empty($complemento) && !empty($cidade) && !empty($uf) && !empty($cep) && !empty($pais)){

                            $u->conect("projeto_aplicacao","localhost","root","");

                            if($u->msgErro==""){ //Nao deu erro

                                //Confirmar a senha
                                if($senha==$conf_senha){   
                                    //Verificar se o cadastro deu certo
                                    if($u->register($nome_completo,$nome_usuario,$CPFCNPJ,$email,$senha,$endereco,
                                    $nr_endereco,$bairro,$complemento,$cidade,$uf,$cep,$pais)){ 
                                        ?>
                                        <div style="background-color:#61d6549b; margin-left: 250px; margin-top:8px;
                                    width:250px; border-radius:5px; padding-left:10px;" >
                                            Cadastrado com sucesso
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                        <div style="background-color:rgb(167, 55, 55); margin-left: 250px; margin-top:8px;
                                    width:250px; border-radius:5px; padding-left:5px;" >
                                            ja cadastrado
                                        </div>
                                        <?php
                                    }
                                }else{
                                    ?>
                                    <div style="background-color:rgb(167, 55, 55); margin-left: 250px; margin-top:8px;
                                    width:250px; border-radius:5px; padding-left:5px;" >
                                        Senha e confimar senha errados!
                                    </div>
                                    <?php
                                }
                                
                            }else{
                                ?>
                                <div class="msg-erros">
                                    <?php echo "Erro:".$u->msgErro;?>
                                </div>
                                <?php
                            }
                        }else{
                            ?>
                            <div class="msg-erros">
                                Preencha todos os campos por-favor; 
                        </div>
                        <?php
                        }
                    }
                
                    ?>

                    <div>
                        <p>Ja possui uma conta? <a href="login.php">Logar</a></p>
                    </div>
                </form>
            </div>
            

        </div>
    </div>
   

</body>

</html>