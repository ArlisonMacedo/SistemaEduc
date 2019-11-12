<?php session_start();
  if(!isset($_SESSION['FUNCIONARIO'])){
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
  <link rel="sortcut icon" href="./img/logo1.png" type="image/x-icon" />
  <title>Cadastro Curso</title>
</head>
<body>
  <!--NAV BAR-->
  <div class="topnav">
      <a href="index.php"><img class="img" src="./img/logo1.png" alt="" href="index.html"></a>  
      <a href="Sobre.php">Sobre</a>
      <a href="dashboard.php">Dashboard</a>
      
    </div>
    <!-- FIM NAV BAR--> <br>
    <div class="container">
      <h1>Inserir Curso</h1>
        <?php if(isset($_SESSION['ERRO'])){
          echo "<h3>".$_SESSION['ERRO']. "</h3>";
          unset($_SESSION['ERRO']);
        }?>
  <form action="Routes/insertCurso.php" method="POST" class="border-0">
    <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="">Curso</label>
          <input type="text" class="form-control" name="curso" placeholder="Ex. ADS" required>
        </div>
        <div class="col-md-4 mb-3">
          <label for="">Disciplina</label>
          <input type="text" class="form-control" name="diciplina" placeholder="Ex. LP4" required>
        </div>
    </div>
    <div class="form-row ">
      <div class="form-group col-md-2 mb-3" style="">
        <label for="">Nota 1</label>
        <input type="text" class="form-control" name="nota1" placeholder="Ex. 10" >
      </div>
      <div class="form-group col-md-2 mb-3">
        <label for="">Nota 2</label>
        <input type="text" class="form-control" name="nota2" placeholder="Ex. 10" >
      </div>
      <div class="form-group col-md-4 mb-3">
        <label for="">Matricula do Aluno</label>
        <input type="text" class="form-control" name="Alunos_MAT" placeholder="Ex. 1000" required>
      </div>
    </div>
    <div class="form-row align-items-right">
      <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
  </form>
    </div>
</body>
</html>
