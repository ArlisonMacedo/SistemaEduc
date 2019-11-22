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
      <a href="Sobre.php"><button class="btn btn-tranparent text-light"><strong>Sobre</strong></button></a>
      <?php if($_SESSION['ALUNO']){
          echo "<a style='position: absolute; left:70%;'>
                <button class='btn text-light'><strong> Olá, ".$_SESSION['ALUNO']."</strong></button>
            </a>";
      } ?>
      <a href="Includes/Destroy.php" style="position:relative; margin-left: 73%;">
          <button type="submit" class="btn btn-dark">Sair</button>
      </a>


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
      <div class="container mt-5">

          <h2>Dados do Aluno</h2>

      </div>
      <table class="table">
        <tr class="thead-dark">
          <th>Matricula</th>
          <th>Nome</th>
          <th>CPF</th>
          <th>Data Nasc</th>
          <th>Curso</th>
          <th>Disciplina</th>
          <th>Nota1</th>
          <th>Nota2</th>
          <th>Média</th>
        </tr>
        <?php


          foreach($row as $key => $values){
            echo "<tr>";
            ?>
            <td><?= $values['MAT'];?></td>
            <td><?= $values['NOMEALUNO'];?></td>
            <td><?= $values['CPF'];?></td>
            <td><?= date('d/m/Y',strtotime($values['Data_nasc']));?></td>
            <td><?= $values['cUrSo'];?></td>
            <td><?= $values['DICIPLINA'];?></td>
            <td><?= $values['NOTA1'];?></td>
            <td><?= $values['NOTA2'];?></td>
            <td><?= $values['MEDIA'];?></td>
            <?php
            echo "</tr>";
          }

        ?>

      </table>
  </section>






</body>
</html>
