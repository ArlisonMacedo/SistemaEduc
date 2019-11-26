<?php
    session_start();
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
      <a href="dashboard.php">Dashboard</a>
    </div>
    <?php
        
        if(isset($_POST['MAT'])){
            include 'Class/Aluno.php';
            include 'Class/Crud.php';
            $aluno = new Aluno;
            $aluno->setMat($_POST['MAT']);
            $crud = new Crud;

            $row = $crud->selectUpdateAluno($aluno);// esse script esta localizado em Crud.php
                                                    // onde so traz um unico registro de acordo com o POST de [MAT]
                                                    // o dado [MAT] vem do dashboard no mini-form do botão para edição do usuario ja vem incluido
                                                    // no POST a variavel MAT onde esta trazendo a chave primaria da tabela Alunos de acordo que clicado
                                                    // no usuario em dashboard
                                                    // e o administrador poderar editar de acordo com as regex.

            if($row){ ?>
                <div class="container">
                    <h3>Atualizar dados do Aluno</h3>
                    <form action="Routes/EditarAluno.php" method="POST"class="border-0">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome do Aluno</label>
                            <input type="text" class="form-control" name="nome"
                                aria-describedby="emailHelp" placeholder="Ex. Fulando Silva" value="<?= $row['NOMEALUNO']?>">
                            <small id="emailHelp" class="form-text text-muted">Primeira Letra Maiscula e deve Obter um espaço entre os sobrenome</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">CPF</label>
                            <input type="text" class="form-control" name="cpf" placeholder="000.000.000-00"
                             value="<?= $row['CPF']?>">
                             <small id="emailHelp" class="form-text text-muted">É necessario adicionar os <strong>( pontos )</strong> e o <strong>( traços )</strong> correspondentes</small>
                        </div>
                        <div class="form-group">
                            <label for="">Data de Nascimento</label>
                            <input type="date" class="form-control" name="data_nasc" value="<?= $row['Data_nasc']?>">
                        </div>
                        <input type="hidden" name="MAT" value="<?= $row['MAT'];?>">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                </div>
           <?php }

        }


    ?>
