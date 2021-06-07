<?php
    require_once 'classes/usuario.php';
    $u = new usuario();

?>

<html>
    <style>
        body{
            display:block;
        }
    </style>

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
    <link rel="stylesheet" href="css/loginStyle.css">
    <script src="js/loginScript.js"></script>
    <title>Login</title>
</head>

<body>
    <style>
        body{
            background-color:#cccccc;
        }
    </style>
    <div class="container">
        <div class="justify-content-center align-item-center row">
            <div class="col-6">
                <form method="POST" class="needs-validation form-login" novalidate>
                    <div class="text-center mb-2">
                        <h2>Login</h2>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="insira seu email"
                            required>
                        <div class="valid-feedback">Válido.</div>
                        <div class="invalid-feedback">Campo inválido.</div>
    
                    </div>
                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="insira sua senha" required>
                        <div class="valid-feedback">Válido.</div>
                        <div class="invalid-feedback">Campo inválido.</div>
                    </div>

                    <button type="submit" class="btn btn-success btn-block btn-lg" 
                    name ="login-button">Logar</button>

                    <div> 
                        <p>Não tem uma conta? <a href="cadastro.php">Cadastrar</a></p>
                    </div>
                    <?php 
    //Verificar se clicou no botao
        if(isset($_POST['email'])){
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['password']);

            //Verificar se os campos nao estao vazios
            $u->conect("projeto_aplicacao","localhost","root","");
            if($u->msgErro==""){
                if($u->login($email,$senha)){
                    header("location:perfil.php?em=$email");
                }else{
                    ?>
                    <div style="background-color:red; margin-left:120px; padding:5px; padding-left:15px; margin-top:15px;width:250px; border-radius:10px; ">
                        Email ou senha incorretos!
                    </div>
                    <?php
                }
            }else{
                    echo "Erro:".$u->msgErro;                
            }
                    
        }
    
    ?>
                </form>
                
            </div>

            
        </div>
    </div>



</body>

</html>