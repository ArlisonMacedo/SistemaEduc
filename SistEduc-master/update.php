<?php
    session_start();
    if(!isset($_SESSION['FUNCIONARIO'])){
        header("Location: login.php");
    }
    if($_POST['ID'] == NULL){
        $_SESSION['ERRO'] = "Não há Curso para Editar";
        header("Location: dashboard.php");
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
      <a href="dashboard.php">Dashboard</a>
    </div>
  <!-- FIM NAV BAR-->
    <?php


        if(isset($_POST['MAT'])){

            include 'Class/Crud.php';
            include 'Class/Aluno.php';
            include 'Class/Curso.php';
            $aluno = new Aluno;
            $curso = new Curso;
            $aluno->setMat($_POST['MAT']);
            $curso->setID($_POST['ID']);

            $crud = new Crud;
            $row = $crud->selectUpdateCurso($aluno, $curso);
        if($dados = $row){

    ?>
    <div class="container">
    <h1>Atualizar Dados</h1>

    </div>

    <form action="Routes/updateCurso.php" method="post" class="container form-group border-0">
        <div class="form-row">
            <div class="col-sm-6">
            <label for="">Aluno</label>
            <input type="text" name="nome" class="form-control"readonly value="<?= $dados['NOMEALUNO']?>"><br>
            </div>
            <div class="col-sm-6">
            <label for="">CPF</label>
            <input type="text" name="cpf" class="form-control"readonly value="<?= $dados['CPF'];?>"><br>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
            <label for="">Data de Nasc</label>
            <input type="date" name="data_nasc" class="form-control" readonly value="<?= $dados['Data_nasc'];?>"><br>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-6">
            <label for="">Curso</label>
            <input type="text" name="curso" value="<?= $dados['cUrSo'] ;?>"><br>
            </div>
            <div class="col-sm-6">
            <label for="">Diciplina</label>
            <input type="text" name="diciplina" value="<?= $dados['DICIPLINA']; ?>"><br>
            </div>
        </div>
        <div class="form-row">
            <div class="col-m-2">
                <label for="">Nota 1</label>
                <input type="text" name="nota1" value="<?= $dados['NOTA1'];?>"><br>
            </div>
            <div class="col-m-2">
                <label for="">Nota 2</label>
                <input type="text" name="nota2" value="<?= $dados['NOTA2'];?>"> <br>
            </div>
        </div>
            <input type="hidden" name="MAT" value="<?= $dados['MAT'];?>">
            <input type="hidden" name="ID" value="<?= $dados['ID'] ;?>">
            <button type="submit" class="btn btn-primary">Atualizar</button>

    </form>
        <?php }
        }else{
            header("Location: dashboard.php");
        }?>

</body>
</html>
