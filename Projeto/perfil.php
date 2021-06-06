<br>
<br>
<br>
<br>
<br>

<?php
  global $email;
  //Inicia a sessão do usuário
  session_start();
  //Verifica se ele foi logado, se nao mandar para login
  if(!isset($_SESSION['id_Usuario'])){
    header("location: login.php");
    exit;
  }

    //Conexao
    $db_name="projeto_aplicacao";
    $host="localhost";
    $user="root";
    $passw="";

    global $pdo;
    try {
        $pdo = new PDO("mysql:dbname=".$db_name.";host=".$host,$user,$passw);
    } catch (PDOException $ex) {
        $msgErro = $ex->getMessage();
    }

    $nome;
    $cpfcnpj;

    //Pegar email
    $email = $_GET['em'];

    $consulta = $pdo->prepare("SELECT (ds_NomeCompleto) FROM tbdPessoa WHERE ds_Email LIKE ?");
    $consulta->execute(array("%{$email}%"));
    $line = $consulta->fetchAll();

    var_dump($line);
    

    /*$consult = $pdo->prepare("SELECT (ds_NomeCompleto,ds_NomeUsuario,cd_CPFCNPJ,
    ds_Email,ds_Senha,ds_Endereco,nr_Endereco,ds_Bairro,ds_Complemento,ds_Cidade,cd_UF,
    cd_CEP,ds_Pais) FROM tbdPessoa"); */


?>

<html>

<head>
  <meta charset="utf-8">

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
  <link rel="stylesheet" href="css/perfilStyle.css">
  <!-- Scripts do projeto -->
  <script src="js/script.js"></script>
  </link>
  <title>Perfil</title>
</head>

<body>
  <header>
    <!--Navbar -->
    <div class="container" id="nav-container">
      <nav class="navbar navbar-expand-md fixed-top">
        <a href="#" class="navbar-brand">
          <img id="logo" src="img/transparent-logo.png" alt="symbol-Action-Against-Hunger.jpg">PcF(Projeto contra fome)
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-target="#navbar-links"
          aria-controls="navbar-links" aria-expanded="false" aria-label="toggle-navegation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end navbar-color-content" id="navbar-links">
          <div class="navbar-nav">
            <a class="nav-item nav-link" aria-current="page" href="#how-to-donate-area" id="how-to-donate-menu">Como
              doar?</a>
            <a class="nav-item nav-link" aria-current="page" href="#donation-data" id="donate-menu">Doar</a>
            <a class="nav-item nav-link" aria-current="page" href="desconectar.php" id="exit-menu">Sair</a>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <div id="space">

  </div>

  <div id="user-data">
    <div class="container">
      <figure class="text-center">
        <blockquote class="blockquote">
          <h2>Meus dados</h2>
        </blockquote>
      </figure>
      <br>
      <div class="row align-items-start text-center">
        <div class="col">
          <div class="mb-3">
            <label for="full-name" class="form-label">Nome completo:</label>
            <input type="text" class="form-control" id="full-name" name="full-name" 
            value="<?php echo ""?>">
          </div>
          <div class="mb-3">
            <label for="user-name" class="form-label">Nome de usuário</label>
            <input type="text" class="form-control" id="user-name" name="user-name">
          </div>
          <div class="mb-3">
            <label for="cpf-cnpj" class="form-label">CNPJ ou CPF:</label>
            <input type="email" class="form-control" id="cpf-cnpj" name="cpf-cnpj">
          </div>
          <div class="mb-3">
            <label for="cpf-cnpj" class="form-label">Senha:</label>
            <input type="password" class="form-control" id="cpf-cnpj" name="cpf-cnpj">
          </div>
        </div>

        <div class="col">
          <div class="mb-3">
            <label for="address" class="form-label">Endereco:</label>
            <input type="text" class="form-control" id="address" name="address">
          </div>
          <div class="mb-3">
            <label for="district" class="form-label">Bairro:</label>
            <input type="text" class="form-control" id="district" name="district">
          </div>
          <div class="mb-3">
            <label for="city" class="form-label">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city">
          </div>

          <div class="mb-3">
            <label for="country" class="form-label">País:</label>
            <input type="text" class="form-control" id="country" name="country">
          </div>

        </div>
        <div class="col">
          <div class="mb-3">
            <label for="number-address" class="form-label">Número:</label>
            <input type="text" class="form-control" id="number-address" name="number-address">
          </div>

          <div class="mb-3">
            <label for="complement" class="form-label">Complemento:</label>
            <input type="text" class="form-control" id="complement" name="complement">
          </div>

          <div class="mb-3">
            <label for="complement" class="form-label">UF:</label>
            <input type="text" class="form-control" id="complement" name="complement">
          </div>


          <div class="mb-3">
            <label for="cep" class="form-label">CEP:</label>
            <input type="text" class="form-control" id="cep" name="cep">
          </div>

        </div>
      </div>
    </div>

    <div class="justify-content-center" id="button">
      <button type="submit" class="btn btn-success btn-block btn-lg">Editar dados</button>
    </div>

  </div>



  <!--Como doar -->
  <div id="how-to-donate-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="main-title">Como doar?</h3>
        </div>
        <div class="col-md-6">
          <h3 class="about-title">A importancia de doar</h3>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic obcaecati eius aliquam tempore excepturi
            asperiores rerum, incidunt minus. Et, nobis. Veritatis nobis voluptas tenetur ducimus repellendus
            consequuntur harum exercitationem ipsum?</p>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic obcaecati eius aliquam tempore excepturi
            asperiores rerum, incidunt minus. Et, nobis. Veritatis nobis voluptas tenetur ducimus repellendus
            consequuntur harum exercitationem ipsum?</p>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic obcaecati eius aliquam tempore excepturi
            asperiores rerum, incidunt minus. Et, nobis. Veritatis nobis voluptas tenetur ducimus repellendus
            consequuntur harum exercitationem ipsum?</p>
        </div>
        <div class="col-md-6">
          <h3 class="about-title">Maneiras de doar</h3>
          <ul id="about-list">
            <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil,
              earum. Quidem in consequuntur laborum, vitae cum ipsum. Dolorem iste fugit libero repudiandae,
              suscipit aliquam voluptatibus, explicabo harum porro maiores hic.
            </li>
            <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil,
              earum. Quidem in consequuntur laborum, vitae cum ipsum. Dolorem iste fugit libero repudiandae,
              suscipit aliquam voluptatibus, explicabo harum porro maiores hic.
            </li>
            <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil,
              earum. Quidem in consequuntur laborum, vitae cum ipsum. Dolorem iste fugit libero repudiandae,
              suscipit aliquam voluptatibus, explicabo harum porro maiores hic.
            </li>
          </ul>
        </div>
      </div>
    </div>


    <div id="donation-data">
      <div class="container">
        <figure class="text-center">
          <blockquote class="blockquote">
            <h4>Formulário de doação</h4>
            <p>Prencha os dados abaixo para realizar a doação</p>
          </blockquote>
        </figure>
        <div class="row align-items-start text-center">
          <div class="col">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nome da instituição ou pessoa:</label>
              <input type="text" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Usuario recebedor</label>
              <input type="text" class="form-control" id="exampleFormControlInput2">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">CNPJ ou CPF:</label>
              <input type="email" class="form-control" id="exampleFormControlInput3">
            </div>

            
          </div>
  
          <div class="col">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Endereco:</label>
              <input type="text" class="form-control" id="exampleFormControlInput4">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Bairro:</label>
              <input type="text" class="form-control" id="exampleFormControlInput5">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Cidade:</label>
              <input type="text" class="form-control" id="exampleFormControlInput5">
            </div>
  
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">País:</label>
              <input type="text" class="form-control" id="exampleFormControlInput5">
            </div>
  
          </div>
          <div class="col">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Número:</label>
              <input type="text" class="form-control" id="exampleFormControlInput5">
            </div>
  
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Complemento:</label>
              <input type="text" class="form-control" id="exampleFormControlInput5">
            </div>
  
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">UF:</label>
              <input type="text" class="form-control" id="exampleFormControlInput5">
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">CEP:</label>
              <input type="text" class="form-control" id="exampleFormControlInput5">
            </div>  
          </div>
        </div>
      </div>

      <div class="#maneira-doacao">
        
        <div class="container">
          <figure class="justify-content-start">
            <blockquote class="blockquote">
              <p>Selecione o tipo de doação:</p>
            </blockquote>
          </figure>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio">PIX
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio">Doação direta
            </label>
          </div>
        </div>

        
    <div class="justify-content-center" id="button_donate">
      <button type="submit" class="btn btn-success btn-block btn-lg">Doar</button>
    </div>

    
</body>

</html>