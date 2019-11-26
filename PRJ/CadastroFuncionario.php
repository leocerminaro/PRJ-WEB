<?php

include("conexao.php");
//registro dos dados
if(isset($_POST['confirmar'])) {
  //Registro dos dados

  if(!isset($_SESSION))
    session_start();

  foreach($_POST as $chave=>$valor)
    $_SESSION[$chave] = $mysqli->real_escape_string($valor);
  

//validação dos dados

  if(strlen($_SESSION['nomeFunc'])==0){
    $erro[]="Preencha o nome";
  }  
//Inserção no BD

  // if(count($erro)==0){
  $sql_code = "INSERT INTO funcionario (
  username,
  password,
  nome, 
  sobrenome, 
  idade,
  cpf, 
  sexo,
  cargo, 
  logradouro,
  numero, 
  complemento,
  bairro, 
  profissao, 
  email)
  VALUES(
    '$_SESSION[usernameFunc]',
  '$_SESSION[passwordFunc]',
  '$_SESSION[nomeFunc]',
  '$_SESSION[sobrenome]',
  '$_SESSION[idade]',
    '$_SESSION[cpfFunc]',
  '$_SESSION[sexo]',
  '$_SESSION[cargoFunc]',
  '$_SESSION[logradouro]',
  '$_SESSION[numero]',
  '$_SESSION[complemento]',
  '$_SESSION[bairroFunc]',
  '$_SESSION[profissao]',
  '$_SESSION[email]'
)";

$confirma = $mysqli->query($sql_code) or die ($mysqli->error);

  // if($confirma){
    // unset(
    //   $_SESSION[nome],
    //   $_SESSION[sobrenome],
    //   $_SESSION[idade],
    //   $_SESSION[sexo],
    //   $_SESSION[cargo],
    //   $_SESSION[logradouro],
    //   $_SESSION[numero],
    //   $_SESSION[complemento],
    //   $_SESSION[profissao],
    //   $_SESSION[email]);

echo "<script> location.href='consultaFuncionario.php'; </script>";

  // } else
  // $erro[] = $confirma;

// }

}


?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro de Funcionário</title>

  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/estilo.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script type="text/javascript">
      function validacaoIdade(field) {
    var age=document.getElementById('idade').value;

    if (isNaN(age) || age < 1 || age > 100)
    { 
      document.getElementById("idade").value = "";
    }
  }
  </script>

</head>
<body>

  <header>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse navbar-nav" id="conteudoNavbarSuportado">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="inicio.php"><img src="svg/home.svg"> <span class="sr-only">(página atual)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Consultas

          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="consultaClientes.php">Clientes</a>
            <a class="dropdown-item" href="consultaProcedimento.php">Procedimentos</a>
            <a class="dropdown-item" href="ConsultaHistorico.php">Histórico</a>
            <a class="dropdown-item" href="ConsultaFuncionario.php">Funcionários</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Cadastro
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="CadastroCliente.php">Clientes</a>
            <a class="dropdown-item" href="CadastroProcedimento.php">Procedimentos</a>
            <a class="dropdown-item" href="CadastroTransacao.php">Recebimento</a>
            <a class="dropdown-item" href="CadastroAgendamento.php">Agendamento</a>
            <a class="dropdown-item" href="CadastroFuncionario.php">Funcionário</a>
          </div>
        </li>
        <!-- li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Relatórios
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="RelatorioProcedimentos.php">Procedimentos realizados</a>
            <a class="dropdown-item" href="RelatorioAtendimentos.php">Atendimentos</a>
            <a class="dropdown-item" href="RelatorioReceitas.php">Receita Mensal</a>
          </div>
        </li> -->
      </li>
    </ul>

    <ul class="nav navbar-nav ml-auto">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <img src="svg/person.svg">
       </a>
       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="perfil.php">Meus Dados</a>
        <a class="dropdown-item" href="alterarsenha.php">Mudar Senha</a>
        <a class="dropdown-item" href="index.php">Logout</a>
      </div>
    </li>


  </li>
</ul>
</div>
</nav>

</header>

<div class="container">
  <div class="MyProfile">
    <h1>Novo Funcionário</h1>
  </div>

  <hr>
  <!-- edit form column -->
  <div class="col-sm-12 personal-info article-inicio row">

    <form class="formCadastroN" role="form" action="CadastroFuncionario.php?p=cadastrar" method="POST" name="formCadastro">
      <!-- <div class="row">
        <div class="collum">
          <div class="form-group">
            <label class="col-lg-3 control-label">Nome</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="nomeFunc">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Sobrenome</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="sobrenome">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Idade</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="idade">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Sexo</label>
            <div class="col-lg-8">
              <select class="col-lg-3 form-control" id="exampleFormControlSelect1" name="sexo">
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                <option value="Outro">Outro</option>
              </select>
              <div class="form-group">
                <label class="col-lg-3 control-label">Cargo</label>
                <div class="col-lg-8">
                  <select class="col-lg-3 form-control" id="exampleFormControlSelect1" name="cargo">
                    <option value="Esteticisa">Esteticisa</option>
                    <option value="Manicure">Manicure</option>
                    <option value="Gerente">Gerente</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>




        <div class="column">


          <div class="form-group">
            <label class="col-lg-3 control-label">Logradouro</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="logradouro">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Numero</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="numero">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Complemento</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="complemento">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Profissão</label>
            <div class="col-lg-8">
              <input class="form-control" type="text"  name="profissao">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="email">
            </div>
          </div>
          <div class="form-group">
            <label class = "col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Salvar" name="confirmar">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancelar">
            </div>
          </div>
        </div>
      -->
      <h3>Informações pessoais</h3>

      <div class="row">
        <div class="column">
          <div class="form-group">
            <label class="col-lg-3 control-label">Nome</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="nomeFunc" required >
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Sobrenome</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="sobrenome" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">CPF</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="cpfFunc" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Username</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="usernameFunc" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Senha</label>
              <div class="col-lg-8">
                <input class="form-control" type="password" name="passwordFunc" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Idade</label>
              <div class="col-lg-8">
                <input class="form-control" type="number" min="0" name="idade" id="idade" required onblur="validacaoIdade(formCadastro.idade)">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Sexo</label>
              <div class="col-lg-8">
                <select class="col-lg-12 form-control" id="exampleFormControlSelect1" name="sexo" required>
                  <option value="Masculino">Masculino</option>
                  <option value="Feminino">Feminino</option>
                  <option value="Outro">Outro</option>
                </select>
              </div>
            </div>
            

          </div>

        </div>

        <div class="column">
          <div class="form-group">
              <label class="col-lg-3 control-label">Cargo</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="cargoFunc" required>
              </div>
            </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Logradouro</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="logradouro" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Numero</label>
            <div class="col-lg-8">
              <input class="form-control" type="number" min="0" name="numero">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Bairro</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" min="0" name="bairroFunc">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Complemento</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="complemento">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Profissão</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="profissao" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="email" onblur="validacaoEmail(formCadastro.email)" required>
            </div>
          </div>
          <div id="msgemail"></div>
        </div>

        
      </div>
      <!--  -->
<!-- <h3>Informações de login</h3>
      <div class="column">
          <div class="form-group">
            <label class="col-lg-3 control-label">Username</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="usernameFunc" required >
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Senha</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="senhaUser" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Confirmar senha</label>
              <div class="col-lg-8">
                <input class="form-control" type="number" min="0" name="confirmNovaSenha" required>
              </div>
            </div>
          -->



 <div class="form-group ajustebotao">
          <label class = "col-md-5 control-label"></label>

          <input class="btn btn-primary" value="Salvar" type="submit" name="confirmar">
          <span></span>
          <input type="reset" class="btn btn-default" value="Cancelar">
        </div>

      </div>
        </div>



    </form>




  </div>
</div>
</body>
</html>


