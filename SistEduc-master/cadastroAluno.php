<?php 
  session_start();
  if(!isset($_SESSION["FUNCIONARIO"])){
    header("Location: login.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> 
  <title>SistEduc</title> 
</head>
<link rel="sortcut icon" href="./img/logo1.png" type="image/x-icon" />
<body>
<!--NAV BAR-->
  <div class="topnav">
    <a href="index.php"><img class="img" src="./img/logo1.png" alt="" href="index.html"></a>  
    <a href="Sobre.php">Sobre</a>
    <a href="dashboard.php">Dashboard</a>
  </div>
<!-- FIM NAV BAR-->
<div class="container">
  <h2>Adicionar Novo Aluno</h2>
  <?php if(isset($_SESSION['ERRO'])){
      echo "<h4>".$_SESSION['ERRO']."</h4>";
      unset($_SESSION['ERRO']);
    }?>
<form action="Routes/insertAluno.php" method="POST" class="border-0">
  <div class="form-row">
      <div class="col-md-4 ">
        <label for="">Nome</label>
        <input type="text" class="form-control" name="nome" placeholder="Fulano Silva" required>
      </div>
      <div class="col-md-4 ">
        <label for="">CPF</label>
        <input type="text" class="form-control" name="cpf" placeholder="Ex. 000.000.000-00" required>
      </div>
  </div>
  <div class="form-group">
    <label>Data De Nascimento</label>
    <input type="date" class="form-control col-sm-2"name="data_nasc" required>
  </div>
  
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</div>

  
</body>
</html>