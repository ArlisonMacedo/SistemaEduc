<?php session_start();
  if(isset($_SESSION['ALUNO'])){
    header("location: areaAluno.php");
  }else if(isset($_SESSION['FUNCIONARIO'])){
    header("Location: dashboard.php");
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
<title>Login * SistEduc </title>
<body>
<!--NAV BAR-->
<div class="topnav">
    <a href="index.php"><img class="img" src="./img/logo1.png" alt="" href="index.html"></a>
    <a href="Sobre.php">Sobre</a>
</div>
<!-- FIM NAV BAR-->
  
   
  
  <form action="Routes/switchChoice.php" method="post" class="border-0">
  
    <div class="imgcontainer">
      <img id="imglogin" src="./img/logo1.png" alt="Avatar" class="avatar">
    </div>

    <div class="container form-group col-6">
    <?php if(isset($_SESSION['ERRO'])){
            echo "<h4>". $_SESSION['ERRO']."</h4>";
             session_destroy();
            }else if(isset($_SESSION['ERROLOGIN'])){
              echo "<h4>". $_SESSION['ERROLOGIN']."</h4>";
              session_destroy();
        } ?>
    <select name="usuario" class="browser-default custom-select"required >
      <option selected disabled >Abra e Selecione o usuario</option>
      <option value="func">Administrador</option>
      <option value="aluno">Aluno</option>
    </select>
  
    <br><br>
      <label for=""><b>Nome</b></label>
      <input type="text" placeholder="Fulano Silva" name="nome" required>
      <label for=""><b>CPF</b></label>
      <input type="text" placeholder="000.111.222-99" name="cpf" required>
          
      <button type="submit" class="btn btn-primary">Entrar</button>
    
    </div>

    
  </form>
</body>
</html>