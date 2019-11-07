<?php  session_start();
  if(!isset($_SESSION['ALUNO'])){
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
      <?php if($_SESSION['ALUNO']){echo "";} ?>
    </div>
  <!-- FIM NAV BAR-->
  <?php

    include 'Class/Crud.php';
    include 'Class/Aluno.php';

    $aluno = new Aluno;
    $aluno->setCpf($_SESSION['CPF']);

    $crud = new Crud;
    $row = $crud->selectDataAluno($aluno);

  ?>
  <section>
    <h2>Dados do Aluno</h2>
    <h3>Ola seja bem Vindo(a) <?= $_SESSION['ALUNO'];?></h3> 
      <table class="table">
        <tr class="thead-dark">
          <th>Matricula</th>
          <th>Nome</th>   
          <th>Cpf</th>
          <th>Data Nasc</th>
          <th>Curso</th>
          <th>Diciplina</th>
          <th>Nota1</th>
          <th>Nota2</th>
          <th>Média</th>
        </tr>
        <?php 
        
          
          foreach($row as $key => $values){
            echo "<tr>";
            foreach($values as $key => $dados){
              if($key != "ID" && $key != "Alunos_MAT"){
                echo "<td>".$dados."</td>";
              }
            }
            echo "</tr>";
          }
        
        ?>
        
      </table>
  </section>


  
<div class="sair">
    <a href="Includes/Destroy.php"><button type="submit" class="btn btn-primary">Sair</button></a>
</div>


</body>
</html>