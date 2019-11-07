<?php session_start();
  if(isset($_SESSION['ALUNO'])){
    header("location: areaAluno.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<link rel="sortcut icon" href="./img/logo1.png" type="image/x-icon" />
<body>
<!--NAV BAR-->
<div class="topnav">
    <a href="index.php"><img class="img" src="./img/logo1.png" alt="" href="index.html"></a>  
    <a href="Sobre.php">Sobre</a>
    <a href="login.php">Login</a>
    <a href="areaAluno.php">Area do Aluno</a>
</div>
<!-- FIM NAV BAR-->
  <form action="Routes/switchChoice.php" method="post">
    <div class="imgcontainer">
      <img id="imglogin" src="./img/logo1.png" alt="Avatar" class="avatar">
    </div>

    <div class="container form-group col-6">
      <label for="">Quem é Você</label>
      <select name="usuario">
        
        <option value="func">Administrador</option>
        <option value="aluno">Aluno</option>
      </select><br>
      <label for=""><b>Nome</b></label>
      <input type="text" placeholder="Nome" name="nome" required>
      <label for=""><b>CPF</b></label>
      <input type="text" placeholder="CPF" name="cpf" required>
          
      <button type="submit" class="btn btn-primary">Entrar</button>
    
    </div>

    
  </form>

</body>
</html>