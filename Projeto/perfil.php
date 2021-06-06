

<?php
  require_once 'classes\usuario.php ';
  $u = new usuario();

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

    //Pegar email
    $email = $_GET['em'];
    

    $consulta = $pdo->prepare("SELECT ds_NomeCompleto,ds_NomeUsuario,cd_CPFCNPJ,ds_Email,ds_Senha,
    ds_Endereco,ds_Bairro,nr_Endereco,ds_Complemento,ds_Cidade,cd_UF,cd_CEP,ds_Pais,id_Usuario
    FROM tbdPessoa WHERE ds_Email LIKE ?");
    $consulta->execute(array("%{$email}%"));
    $line = $consulta->fetch(PDO::FETCH_OBJ);

    //var_dump($line);
    $dados = [];

    foreach($line as $valor){
      //echo $key."<br>";
      $dados[] = $valor;
    }
    //Pega os valores e distribui em variaveis
    $id_Usuario = $dados[13];
    $nome_completo = $dados[0];
    $nome_usuario = $dados[1];
    $CPFCNPJ = $dados[2];
    $email = $dados[3];
    $senha= base64_decode($dados[4]);
    $endereco = $dados[5];
    $bairro = $dados[6];
    $numero = $dados[7];
    $complemento = $dados[8];
    $cidade = $dados[9];
    $uf = $dados[10];
    $cep = $dados[11];
    $pais = $dados[12];

  //Inicia a sessão do usuário
  $email = $_GET['em'];
  //echo $email;

  
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
  <script src="js/perfilScript.js"></script>
  </link>
  <title>Perfil</title>
</head>

<body>
  <header>
    <!--Navbar -->
    <div class="container" id="nav-container">
      <nav class="navbar navbar-expand-md fixed-top" style="background-color:#353D41;">
        <a href="#" class="navbar-brand">
          <img id="logo" src="img/transparent-logo.png" alt="symbol-Action-Against-Hunger.jpg">PcF(Projeto contra fome)
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-target="#navbar-links"
          aria-controls="navbar-links" aria-expanded="false" aria-label="toggle-navegation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end navbar-color-content" id="navbar-links">
          <div class="navbar-nav">
          <a class="nav-item nav-link" aria-current="page" id="meus-dados" name="meus-dados" href="#" onClick="dic()"> Meus dados</a>
            <a class="nav-item nav-link" aria-current="page" href="#how-to-donate-area" id="how-to-donate-menu">Como
              doar?</a>
            <a class="nav-item nav-link" aria-current="page" href="#donation-data" id="donate-menu">Doar</a>
            <a class="nav-item nav-link" aria-current="page" href="desconectar.php" id="exit-menu">Sair</a>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <div id="user-data">
      <div class="container">
        <form method="POST" class="needs-validation">
  
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
                value="<?php echo "$nome_completo"?>">
              </div>
              <div class="mb-3">
                <label for="user-name" class="form-label">Nome de usuário</label>
                <input type="text" class="form-control" id="name-user" name="name-user"
                value="<?php echo "$nome_usuario"?>">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                value="<?php echo "$email"?>">
              </div>
              <div class="mb-3">
                <label for="cpf-cnpj" class="form-label">CNPJ ou CPF:</label>
                <input type="text" class="form-control" id="cpf-cnpj" name="cpf-cnpj"
                value="<?php echo "$CPFCNPJ"?>">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="password" name="password"
                value="<?php echo "$senha"?>">
              </div>
            </div>
  
            <div class="col">
              <div class="mb-3">
                <label for="address" class="form-label">Endereco:</label>
                <input type="text" class="form-control" id="address" name="address"
                value="<?php echo "$endereco"?>">
              </div>
              <div class="mb-3">
                <label for="district" class="form-label">Bairro:</label>
                <input type="text" class="form-control" id="district" name="district"
                value="<?php echo "$bairro"?>">
              </div>
              <div class="mb-3">
                <label for="city" class="form-label">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city"
                value="<?php echo "$cidade"?>">
              </div>
  
              <div class="mb-3">
                <label for="country" class="form-label">País:</label>
                <input type="text" class="form-control" id="country" name="country"
                value="<?php echo "$pais"?>">
              </div>
  
            </div>
            <div class="col">
              <div class="mb-3">
                <label for="number-address" class="form-label">Número:</label>
                <input type="text" class="form-control" id="number-address" name="number-address"
                value="<?php echo "$numero"?>">
              </div>
  
              <div class="mb-3">
                <label for="complement" class="form-label">Complemento:</label>
                <input type="text" class="form-control" id="complement" name="complement"
                value="<?php echo "$complemento"?>">
              </div>
  
              <div class="mb-3">
                <label for="complement" class="form-label">UF:</label>
                <input type="text" class="form-control" id="uf" name="uf"
                value="<?php echo "$uf"?>">
              </div>
  
  
              <div class="mb-3">
                <label for="cep" class="form-label">CEP:</label>
                <input type="text" class="form-control" id="cep" name="cep"
                value="<?php echo "$cep"?>">
              </div>
  
            </div>


  
          </div>
          <div class="justify-content-center" >
              <button type="submit" class="btn btn-primary btn-block btn-lg" name="button" id="button" href="#" 
              style="margin-left: 305px; width:450px;">Editar dados</button>
          </div>

        <?php 
        //Update de dados 
        if(isset($_POST['full-name'])){
          //$id_Usuario = addslashes($_POST['id_Usuario']);
          $nome_completo = addslashes($_POST['full-name']);
          $nome_usuario = addslashes($_POST['name-user']);
          $CPFCNPJ = addslashes($_POST['cpf-cnpj']);
          $email = addslashes($_POST['email']);
          $senha = addslashes($_POST['password']);
          $endereco = addslashes($_POST['address']);
          $nr_endereco = addslashes($_POST['number-address']);
          $bairro = addslashes($_POST['district']);
          $complemento = addslashes($_POST['complement']);
          $cidade = addslashes($_POST['city']);
          $uf = addslashes($_POST['uf']);
          $cep = addslashes($_POST['cep']);
          $pais = addslashes($_POST['country']);

          $u->conect("projeto_aplicacao","localhost","root","");
          if($u->msgErro==""){
            if($u->editar_dados($id_Usuario,$nome_completo,$nome_usuario,$CPFCNPJ,$email,$senha,$endereco,
            $nr_endereco,$bairro,$complemento,$cidade,$uf,$cep,$pais)){ 
              ?>
              
                <div style="background-color:#61d6549b; margin-left:400px; padding:5px; padding-left:15px; margin-top:15px;
                width:250px;" >
                  Dados alterados com sucesso !
                </div>
              <?php
            }else{
              ?>
                <div id="msg-erro">
                  OS dados não foram alterados
                </div>
              <?php
            }
          }else{
            echo "Erro:".$u->msgErro;
          }
        }
        

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

          //Pegar email
          

          $consulta = $pdo->prepare("SELECT ds_NomeCompleto,ds_NomeUsuario,cd_CPFCNPJ,ds_Email,ds_Senha,
          ds_Endereco,ds_Bairro,nr_Endereco,ds_Complemento,ds_Cidade,cd_UF,cd_CEP,ds_Pais,id_Usuario
          FROM tbdPessoa WHERE id_Usuario LIKE ?");
          $consulta->execute(array("%{$id_Usuario}%"));
          $line = $consulta->fetch(PDO::FETCH_OBJ);

          //var_dump($line);
          $dados = [];

          foreach($line as $valor){
            //echo $key."<br>";
            $dados[] = $valor;
          }
          //Pega os valores e distribui em variaveis
          $id_Usuario = $dados[13];
          $nome_completo = $dados[0];
          $nome_usuario = $dados[1];
          $CPFCNPJ = $dados[2];
          $email = $dados[3];
          $senha= base64_decode($dados[4]);
          $endereco = $dados[5];
          $bairro = $dados[6];
          $numero = $dados[7];
          $complemento = $dados[8];
          $cidade = $dados[9];
          $uf = $dados[10];
          $cep = $dados[11];
          $pais = $dados[12];
          
          //header("location:perfil.php");
        
        ?>

        </form>
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
  </div>

  <div id="donation-data">
    <div class="container">
      <form method="POST" class="needs-validation" >
        <figure class="text-center">
          <blockquote class="blockquote">
            <h4>Formulário de doação</h4>
            <p>Prencha os dados abaixo para realizar a doação</p>
          </blockquote>
        </figure>

        <div class="row align-items-start text-center">
          
          <div class="col">       <!-- Coluna 1-->
            <div class="mb-3">
              <label for="usuario-recebedor" class="form-label">Usuario recebedor</label>
              <input type="text" class="form-control" id="usuario-recebedor" name="usuario-recebedor"
              placeholder="nome do usuario">
            </div>

            <div class="mb-3">
              <label for="ema" class="form-label">Email:</label>
              <input type="email" class="form-control" id="email-recebedor" name="email-recebedor" 
              placeholder="email do recebedor">
            </div>

            <figure class="justify-content-start">
              <blockquote class="blockquote">
                <p>Selecione o tipo de doação:</p>
              </blockquote>
            </figure>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="option" id="optPix" onClick="bloquear_campo()">
              <label class="form-check-label" for="optPix">
                Doar por pix
              </label>
            </div>

            <div class="form-check" >
              <input class="form-check-input" type="radio" name="option" id="optAlimento" onClick="bloquear_campo()">
              <label class="form-check-label" for="optAlimento" disabled="">
                Doar Alimentos
              </label>
            </div>

            <div class="mb-3">
              <label for="quantidade-dinheiro" class="form-label">Quantidade em dinheiro:</label>
              <input type="number" class="form-control" id="quantidade-dinheiro" name="quantidade-dinheiro" 
              placeholder="000.00" readOnly="" value="0">
            </div>

            <div class="mb-3">
              <label for="chave-pix" class="form-label">Chave-pix:</label>
              <input type="text" class="form-control" id="chave-pix" name="chave-pix" placeholder="chave-pix"
              placeholder="chave-pix" readOnly="">
            </div>

            <div class="mb-3">
              <label for="descricao-ali" class="form-label">Descrição alimentos:</label>
              <input type="text" class="form-control" id="descricao_alimentos" name="descricao_alimentos" 
              placeholder="descreva quantidade e quais alimentos " readOnly="">
            </div>
          </div>            <!-- Coluna 1-->

          <div class="col">      <!-- Coluna 2-->
            <div class="mb-3">
              <label for="end" class="form-label">Endereco:</label>
              <input type="text" class="form-control" id="endereco-recebedor" name="endereco-recebedor" 
              placeholder="Rua endereço">
            </div>

            <div class="mb-3">
              <label for="ba" class="form-label">Bairro:</label>
              <input type="text" class="form-control" id="bairro-recebedor" name="bairro-recebedor"
              placeholder="Bairro">
            </div>

            <div class="mb-3">
              <label for="ci" class="form-label">Cidade:</label>
              <input type="text" class="form-control" id="cidade-recebedor" name="cidade-recebedor" placeholder="cidade">
            </div>
    
            <div class="mb-3">
              <label for="pa" class="form-label">País:</label>
              <input type="text" class="form-control" id="pais-recebedor" name="pais-recebedor" placeholder="país">
            </div>

          </div>              <!-- Coluna 2-->

          <div class="col">    <!-- Coluna 3-->

            <div class="mb-3">
              <label for="nu" class="form-label">Número:</label>
              <input type="text" class="form-control" id="numero-recebedor" name="numero-recebedor"
              placeholder="Nº">
            </div>
    
            <div class="mb-3">
              <label for="comp" class="form-label">Complemento:</label>
              <input type="text" class="form-control" id="complemento-recebedor" name="complemento-recebedor"
              placeholder="complemento">
            </div>
    
            <div class="mb-3">
              <label for="u" class="form-label">UF:</label>
              <input type="text" class="form-control" id="uf-recebedor" name="uf-recebedor" placeholder="uf">
            </div>

            <div class="mb-3">
              <label for="ce" class="form-label">CEP:</label>
              <input type="text" class="form-control" id="cep-recebedor" name="cep-recebedor" placeholder="cep">
            </div>  
          </div>      <!-- Coluna 3-->

        </div>    <!-- DIV ROW-->
        
        <script>    // Bloquear inputs 
          function bloquear_campo(){
            if(document.getElementById('optPix').checked==true){             
              document.getElementById('descricao_alimentos').readOnly = true;
              document.getElementById('quantidade-dinheiro').readOnly = false;
              document.getElementById('chave-pix').readOnly = false;
            }
            
            if(document.getElementById('optPix').checked==false){
              document.getElementById('descricao_alimentos').readOnly = false;
              document.getElementById('quantidade-dinheiro').readOnly = true;
              document.getElementById('chave-pix').readOnly = true;
              }
          }
        </script>

        <div class="justify-content-center" id="">
          <button type="submit" class="btn btn-success btn-block btn-lg" id="button_donate">Doar</button>
        </div>

      </form>
    </div>   <!-- Div container-->
  </div><!-- Div donation-->

  <?php  //OPERACAO PHP

    //Incluir classe ; Criar objeto Doacao
    require_once 'classes\doacao.php';  
    $doacao = new doacao();

      //GERAR OBJETO PDO
      global $pdo;
      try {
          $pdo = new PDO("mysql:dbname=".$db_name.";host=".$host,$user,$passw);
      } catch (PDOException $ex) {
          $msgErro = $ex->getMessage();
      }
      //GERAR OBJETO PDO

      if(isset($_POST['usuario-recebedor'])) //Verificar se o campo usuario foi preenchido
      {
        //Pegar os inputs do formulário, inputs do usuario 
        $nome_recebedor = addslashes($_POST['usuario-recebedor']);
        $email_recebedor = addslashes($_POST['email-recebedor']);
        $endereco_recebedor = addslashes($_POST['endereco-recebedor']);
        $nr_endereco_recebedor = addslashes($_POST['numero-recebedor']);
        $bairro_recebedor = addslashes($_POST['bairro-recebedor']);
        $complemento_recebedor = addslashes($_POST['complemento-recebedor']);
        $cidade_recebedor = addslashes($_POST['cidade-recebedor']);
        $uf_recebedor = addslashes($_POST['uf-recebedor']);
        $pais_recebedor = addslashes($_POST['pais-recebedor']);
        $cep_recebedor = addslashes($_POST['cep-recebedor']);
        

        $valor_dinheiro = addslashes($_POST['quantidade-dinheiro']);
        $chave_pix = addslashes($_POST['chave-pix']);
        $itemDoado = addslashes($_POST['descricao_alimentos']);
        
        
        //Consuta o id_recebedor

        $consulta_id = $pdo->prepare("SELECT id_Usuario FROM tbdPessoa WHERE ds_Email LIKE ?");
        $consulta_id->execute(array("%{$email_recebedor}%"));
        $line = $consulta_id->fetch(PDO::FETCH_OBJ);
        $dados = [];

        foreach($line as $valor){
          $dados[] = $valor;
        }

        $id_Recebedor = $dados[0];
        //echo "<br>Id recebedor:".$id_Recebedor."<br>";

        
        //==========Chama função e insere os dados================//
        $doacao->conect("projeto_aplicacao","localhost","root","");
        echo $itemDoado;
        if($doacao->criar_doacao($id_Usuario,$nome_usuario,$id_Recebedor,$nome_recebedor,$email_recebedor,$email,
        $valor_dinheiro,$chave_pix,$itemDoado,$endereco_recebedor,$nr_endereco_recebedor,$bairro_recebedor,
        $complemento_recebedor,$cidade_recebedor,$uf_recebedor,$pais_recebedor,$cep_recebedor))
        {
          echo "Doação realizada com sucesso";
          //echo $id_Usuario;
        }else{
          echo "Erro na doação";
        }
      }

  ?>
  
</body>

</html>