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
    <a href="login.php">Login</a>
    <a href="areaAluno.php">Area do Aluno</a>
  </div>
<!-- FIM NAV BAR-->
<h2>Adicionar Novo Aluno</h2>
<form action="Routes/insertAluno.php" method="POST">
  <div class="form-row">
      <div class="col-md-4 ">
        <label for="">Nome</label>
        <input type="text" class="form-control" name="nome" placeholder="Nome" required>
      </div>
      <div class="col-md-4 ">
        <label for="">CPF</label>
        <input type="text" class="form-control" name="cpf"  required>
      </div>
  </div>
  <div class="form-group">
    <label>Data De Nascimento</label>
    <input type="date" name="data_nasc" required>
  </div>
  
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

  
</body>
</html>