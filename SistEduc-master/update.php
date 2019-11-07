<?php

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
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <title>Dashboard</title>
  <link rel="sortcut icon" href="./img/logo1.png" type="image/x-icon" />
</head>
    <body>
  <!--NAV BAR-->
  <div class="topnav">
      <a href="index.php"><img class="img" src="./img/logo1.png" alt="" href="index.html"></a>  
      <a href="Sobre.php">Sobre</a>
      <a href="login.php">Login</a>
    </div>
  <!-- FIM NAV BAR-->
    <?php 
        if(isset($_POST['MAT'])){
            include 'Class/Crud.php';
            include 'Class/Aluno.php';
            $aluno = new Aluno;
            $aluno->setMat($_POST['MAT']);
            $crud = new Crud;
            $row = $crud->selectUpdate($aluno);
        if($dados = $row){
        
    ?>
    
    <form action="Routes/updateCurso.php" method="post">
        <div class="form-group">
            <label for="">Aluno</label>
            <input type="text" name="nome" value="<?php echo $dados['NOMEALUNO']?>"><br>
        </div>
        <div class="form-group">
            <label for="">CPF</label>
            <input type="text" name="cpf" value="<?php echo $dados['CPF'];?>"><br>
        </div>
        <div class="form-group">
            <label for="">Data de Nasc</label>
            <input type="text" name="data_nasc" value="<?php echo $dados['Data_nasc'];?>"><br>
        </div>
        <div class="form-group">
            <label for="">Curso</label>
            <input type="text" name="curso" value="<?php echo $dados['cUrSo'] ;?>"><br>
        </div>
        <div class="form-group">
            <label for="">Diciplina</label>
            <input type="text" name="diciplina" value="<?php echo $dados['DICIPLINA']; ?>"><br>
        </div>
        <div class="form-row">
            <div class="col-m-2">
                <label for="">Nota 1</label>
                <input type="text" name="nota1" value="<?php echo $dados['NOTA1'];?>"><br>
            </div>
            <div class="col-m-2">
                <label for="">Nota 2</label>
                <input type="text" name="nota2" value="<?php echo $dados['NOTA2'];?>"> <br>
            </div>
        </div>
            <input type="hidden" name="MAT" value="<?php echo $dados['MAT'];?>">
            <input type="hidden" name="ID" value="<?php echo $dados['ID'] ;?>">
            <button type="submit" class="btn btn-primary">Atualizar</button>

    </form>
        <?php }
        }?>

</body>
</html>