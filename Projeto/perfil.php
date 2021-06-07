<?php 
  require_once 'classes\usuario.php';
  $u = new usuario();

  //Inicia a sessão do usuário


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
      //echo $valor."<br>";
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
    <link rel="icon" type="img/" href="img/duila.jpg">
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
                  width:250px; border-radius:10px;">
                    Dados alterados com sucesso !
                  </div>
                <?php
              }else{
                ?>
                  <div style="background-color:#61d6549b; margin-left:400px; padding:5px; padding-left:15px; margin-top:15px;
                  width:250px; border-radius:10px;">
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
            <p>Por que doar? Essa é a pergunta que muitos se fazem. Doar dinheiro ou bens materiais 
              é realmente muito dificil para nós, porque cria-se um laço muito forte naquele item. No caso do dinheiro 
              outras questões aparecem como: E se o meu dinheiro estiver indo para outro lugar ao invés da doação? Não possuio
              muito dinheiro o que faço? Preciso de dinheiro para sobrevivencia o que faço?
            </p>
            <p>O ato de doar traz muitas vantagens não só ao recebedor mas também ao doador. De acordo com Institutos Nacionais de Saúde
              (NIH) a doação faz com que o doador sinta mais satisfação, pois aquilo vem com a sensação de algo correto que ajudará diversas 
              pessoas. 
            </p>
            <p>
              Outra vantagem é a mais obvia de todas que é ajudar quem realmente necessita disso. Uma importante a citar é
              saber que cada pequena ajuda conta, muitas pessoas ficam receosas no quesito de doar pouco , independete
              do quanto foi doado isso já favorece a causa e pense que a cada pequena doação é possivel fazer a diferença 
            </p>
          </div>
          <div class="col-md-6">
          <h3 class="about-title">Maneiras de doar</h3>
            <p>É possivel doar de duas maneiras.A primeira seria atraves do pix e o outro é a doação direta 
            </p>
            <ul id="about-list">
              <li>Para doar através PIX o doador utiliza a chave-pix do 
                recebedor e assim ele pode doar uma quantia em dinheiro. O quanto será disponibilizado depende 
                exclusivamente do doador"
              </li>
              <li>O outro método é a doação direta, na qual o sujeito a descreve o os
                itens que está doando, por exemplo: "Doação: -30 KG de arroz -50KG de Feijão -5000L de agua potavel
              </li>
            </ul>
            <h3 class="about-title">Como doar</h3>
            <p>Para doar primeiro é preciso realizar um cadastro, para isso basta clicar no botão logo 
              abaixo,isso irá registar a pessoa, que pode realizar doações
              assim como pode receber doações de outras pessoas ou instituições
            </p>
            <p>
              Após o cadastro basta realizar o login e acessar a página de perfil que irá conter formulários de doação,
              maneiras, quantidade,etc.
            </p>
          </div>
        </div>
      </div>
    </div>

    <div id="donation-data">
      <div class="container">
        <form method="POST" class="needs-validation" novalidate>
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
                placeholder="nome do usuario" required>
              </div>

              <div class="mb-3">
                <label for="ema" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email-recebedor" name="email-recebedor" 
                placeholder="email do recebedor" required>
              </div>

              <div class="mb-3">
                <label for="ema" class="form-label">Data:</label>
                <input type="date" class="form-control" id="data-doacao" name="data-doacao" 
                placeholder="insira a date" required>
              </div>
              <div style="margin-top:100px;">
                <figure class="justify-content-start">
                  <blockquote class="blockquote">
                    <p>Selecione o tipo de doação:</p>
                  </blockquote>
                </figure>

                <div class="form-check">
                  <input class="form-check-input" type="radio" name="option" id="optPix" onClick="bloquear_campo()">
                  <label class="form-check-label" for="optPix" >
                    Doar por pix
                  </label>
                </div>

                <div class="form-check" >
                  <input class="form-check-input" type="radio" name="option" id="optAlimento" onClick="bloquear_campo()">
                  <label class="form-check-label" for="optAlimento" > 
                    Doar Alimentos
                  </label>
                </div>
              </div>

              <div class="mb-3">
                <label for="quantidade-dinheiro" class="form-label">Quantidade em dinheiro:</label>
                <input type="number" class="form-control" id="quantidade-dinheiro" name="quantidade-dinheiro" 
                placeholder="000.00" readOnly="" value="0">
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
                placeholder="Rua endereço" required>
              </div>

              <div class="mb-3">
                <label for="ba" class="form-label">Bairro:</label>
                <input type="text" class="form-control" id="bairro-recebedor" name="bairro-recebedor"
                placeholder="Bairro" required>
              </div>

              <div class="mb-3">
                <label for="ci" class="form-label">Cidade:</label>
                <input type="text" class="form-control" id="cidade-recebedor" name="cidade-recebedor" placeholder="cidade"
                required>
              </div>
      
              <div class="mb-3">
                <label for="pa" class="form-label">País:</label>
                <input type="text" class="form-control" id="pais-recebedor" name="pais-recebedor" placeholder="país" required>
              </div>

              <div class="mb-3" style="margin-top:110px;">
                <label for="chave-pix" class="form-label">Chave-pix:</label>
                <input type="text" class="form-control" id="chave-pix" name="chave-pix" placeholder="chave-pix"
                placeholder="chave-pix" readOnly="" >
              </div>

            </div>              <!-- Coluna 2-->

            <div class="col">    <!-- Coluna 3-->

              <div class="mb-3">
                <label for="nu" class="form-label">Número:</label>
                <input type="text" class="form-control" id="numero-recebedor" name="numero-recebedor"
                placeholder="Nº" required>
              </div>
      
              <div class="mb-3">
                <label for="comp" class="form-label">Complemento:</label>
                <input type="text" class="form-control" id="complemento-recebedor" name="complemento-recebedor"
                placeholder="complemento" required>
              </div>
      
              <div class="mb-3">
                <label for="u" class="form-label">UF:</label>
                <input type="text" class="form-control" id="uf-recebedor" name="uf-recebedor" placeholder="uf" required>
              </div>

              <div class="mb-3">
                <label for="ce" class="form-label">CEP:</label>
                <input type="text" class="form-control" id="cep-recebedor" name="cep-recebedor" placeholder="cep" required> 
              </div>  
            </div>      <!-- Coluna 3-->
            
          </div>   <!-- DIV ROW-->
          <hr>

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
            <button type="submit" class="btn btn-success btn-block btn-lg" id="button_donate" 
            style="margin-left:400px; margin-bottom:0px;">Doar</button>
          </div>

        </form>

        <?php  //OPERACAO PHP DOACAO
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
            $data_doacao = addslashes($_POST['data-doacao']);
            

            $valor_dinheiro = addslashes($_POST['quantidade-dinheiro']);
            $chave_pix = addslashes($_POST['chave-pix']);
            $itemDoado = addslashes($_POST['descricao_alimentos']);
            
            
            //Consuta o id_Usuario_RECEBEDOR

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
            //echo $itemDoado;
            if($doacao->criar_doacao($id_Usuario,$nome_usuario,$id_Recebedor,$nome_recebedor,$email_recebedor,$email,
            $valor_dinheiro,$chave_pix,$itemDoado,$endereco_recebedor,$nr_endereco_recebedor,$bairro_recebedor,
            $complemento_recebedor,$cidade_recebedor,$uf_recebedor,$pais_recebedor,$cep_recebedor,$data_doacao,$endereco,
            $numero,$bairro,$complemento,$cidade,$uf,$pais,$cep))
            {
              ?>
                <div style="background-color:#61d6549b; margin-left:425px; padding:5px; padding-left:15px; margin-top:15px;
                  width:250px; border-radius:10px;">
                  Doação realizada com sucesso!
                </div>
              <?php
            }else{
              ?>
              <div style="background-color:red; margin-left:425px; padding:5px; padding-left:15px; margin-top:15px;
                width:250px; border-radius:10px;">
                Erro na doação!
              </div>
            <?php
            }
          }
        ?>
      </div>   <!-- Div container-->
    </div><!-- Div donation-->

    <hr>

    <div id="historico-doacoes">
      <div style="margin-left:500px;">
        <h3 >Historico de doações</h3>
      </div>

      <?php    //PROCESSAMENTO HISTÓRICO DO DOADOR 

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

        global $pdo;

        $consulta_historico_doacao = $pdo->prepare("SELECT id_Recebedor FROM tbddoacao WHERE ds_Doador LIKE :nu");
        $consulta_historico_doacao->bindValue(":nu",$nome_usuario);
        $consulta_historico_doacao->execute();
        $resultado = $consulta_historico_doacao->fetchAll(PDO::FETCH_ASSOC);

        foreach($resultado as $value){
          //echo "id_recebedor: ".$value['id_Recebedor']."<br>";
        }
        $numero_doacoes = $consulta_historico_doacao->rowCount();
        
        ?>
          <div style="margin-left:530px;">
            Numero de doacoes:.<?php echo $numero_doacoes; ?>
          </div>
          
        <?php

        if($numero_doacoes > 0 ){ //Verificar se ja fez doações antes
          
          $consulta_tudo = $pdo->prepare("SELECT * FROM tbddoacao WHERE id_Doador LIKE ?");
          $consulta_tudo->execute(array("%{$id_Usuario}%"));
          $line = $consulta_tudo->fetchAll(PDO::FETCH_ASSOC);

          foreach($line as $value){

            ?>
              <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">ID_Doação</th>
                  <th scope="col">ID_Recebedor</th>
                  <th scope="col">Email Recebedor</th>
                  <th scope="col">Valor Doacao</th>
                  <th scope="col">Chave_Pix</th>
                  <th scope="col">Item doado</th>
                  <th scope="col">Endereço</th>
                  <th scope="col">Nr</th>
                  <th scope="col">Bairro</th>
                  <th scope="col">Complemento</th>
                  <th scope="col">Cidade</th>
                  <th scope="col">UF</th>
                  <th scope="col">País</th>
                  <th scope="col">CEP</th>
                  <th scope="col">Data</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row"><?php echo $value['id_Doacao'];?></th>
                  <td><?php echo $value['id_Recebedor']; ?></td>
                  <td><?php echo $value['ds_EmailRecebedor']; ?></td>
                  <td><?php echo $value['vl_Doacao']; ?></td>
                  <td><?php echo $value['ds_ChavePix']; ?></td>
                  <td><?php echo $value['ds_ItemDoado']; ?></td>
                  <td><?php echo $value['ds_EnderecoRecebedor'];?></td>
                  <td><?php echo $value['nr_EnderecoRecebedor']; ?></td>
                  <td><?php echo $value['ds_BairroRecebedor']; ?></td>
                  <td><?php echo $value['ds_ComplementoRecebedor']; ?></td>
                  <td><?php echo $value['ds_CidadeRecebedor']; ?></td>
                  <td><?php echo $value['cd_UF_Recebedor']; ?></td>
                  <td><?php echo $value['ds_PaisRecebedor']; ?></td>
                  <td><?php echo $value['cd_CEP_Recebedor']; ?></td>
                  <td><?php echo $value['ds_Data']; ?></td>
                </tr>
              </tbody>
            </table>

            <?php
          }
        }else{  
          ?>
            <div style="margin-left:420px;">
              Você ainda não realizou doações. <a href="#donation-data">Que tal fazer uma?</a>  
            </div>
            
          <?php
        }
      ?>
    </div>

    <hr>

    <div id="historico-recebimentos">
      <div style="margin-left:500px;">
        <h3 >Historico de recebimentos</h3>
      </div>
      
      <?php    //PROCESSAMENTO HISTÓRICO DE RECEBIMENTO
          
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

        global $pdo;

        $consulta_historico_recebimento = $pdo->prepare("SELECT id_Doador FROM tbddoacao WHERE id_Recebedor LIKE :nr");
        $consulta_historico_recebimento->bindValue(":nr",$id_Usuario);
        $consulta_historico_recebimento->execute();
        $resultado = $consulta_historico_recebimento->fetchAll(PDO::FETCH_ASSOC);

        foreach($resultado as $value){
          //echo "id_doador: ".$value['id_Doador']."<br>";
        }
        $numero_recebimentos = $consulta_historico_recebimento->rowCount();

        if($numero_recebimentos > 0 ){ //Verificar se recebeu doações antes 
          
          $consulta_tudo = $pdo->prepare("SELECT * FROM tbddoacao WHERE id_Recebedor LIKE ?");
          $consulta_tudo->execute(array("%{$id_Usuario}%"));
          $line = $consulta_tudo->fetchAll(PDO::FETCH_ASSOC);

          foreach($line as $value){

            ?>
              <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">ID_Doação</th>
                    <th scope="col">ID_Doador</th>
                    <th scope="col">Email Doador</th>
                    <th scope="col">Valor Doacao</th>
                    <th scope="col">Chave_Pix</th>
                    <th scope="col">Item doado</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Nr</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Complemento</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">UF</th>
                    <th scope="col">País</th>
                    <th scope="col">CEP</th>
                    <th scope="col">Data</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row"><?php echo $value['id_Doacao'];?></th>
                    <td><?php echo $value['id_Doador']; ?></td>
                    <td><?php echo $value['ds_EmailDoador']; ?></td>
                    <td><?php echo $value['vl_Doacao']; ?></td>
                    <td><?php echo $value['ds_ChavePix']; ?></td>
                    <td><?php echo $value['ds_ItemDoado']; ?></td>
                    <td><?php echo $value['ds_EnderecoDoador'];?></td>
                    <td><?php echo $value['nr_EnderecoDoador']; ?></td>
                    <td><?php echo $value['ds_BairroDoador']; ?></td>
                    <td><?php echo $value['ds_ComplementoDoador']; ?></td>
                    <td><?php echo $value['ds_CidadeDoador']; ?></td>
                    <td><?php echo $value['cd_UF_Doador']; ?></td>
                    <td><?php echo $value['ds_PaisDoador']; ?></td>
                    <td><?php echo $value['cd_CEP_Doador']; ?></td>
                    <td><?php echo $value['ds_Data']; ?></td>
                  </tr>
                </tbody>
              </table>
            <?php
          }
        }else{  
          ?>
            <div style="margin-left:530px;">
              Parece que ninguém doou para você
            </div>
            
          <?php 
          
        }
      ?>
    </div>
  </body>
</html>