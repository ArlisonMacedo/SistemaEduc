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
      <a href="Sobre.php"><button class="btn btn-transparent text-light"><strong>Sobre</strong></button></a>
      <?php
        if(isset($_SESSION['FUNCIONARIO'])){?>
            <a style="position:absolute; left: 70%;">
                <button class='btn btn-transparent text-light' data-toggle="popover" data-trigger="focus"
                 title="Olá" data-content="Você esta indo bem " data-placement="bottom">
                    <strong>Olá,<?= $_SESSION['FUNCIONARIO'] ;?></strong>
                </button>
            </a>
        <?php }
       ?>
      <a href="Includes/Destroy.php" style="position:relative; left: 70%;">
          <button class="btn btn-dark">
              <strong>Sair</strong>
          </button>
      </a>
    </div>
  <!-- FIM NAV BAR-->
  <section>
    <div class="container">
      <h2>Painel de Controle</h2>
      <br>
      <div class="row">
        <div class="col-md-2">
          <a href="cadastroAluno.php"><button type="submit" class="btn btn-primary">Cadastrar Aluno</button></a><br><br>

        </div>
        <div class="col-md-2">
          <a href="cadastroCurso.php"><button class="btn btn-primary">Adicionar Curso</button></a>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <?php
            if(isset($_SESSION['ERRO'])){ ?>
              <div class="alert alert-warning"  role="alert">
                <?= "<strong>".$_SESSION['ERRO']."</strong>";
                  unset($_SESSION['ERRO']);
                ?>
              </div>
            <?php }
            if(isset($_SESSION['SUCESSO'])){ ?>
              <div class="alert alert-success"  role="alert">
                <?= "<strong>".$_SESSION['SUCESSO']."</strong>";
                  unset($_SESSION['SUCESSO']);
                ?>
              </div>
            <?php }
          ?>
        </div>
      </div>
    </div>



    <br>
      <table class="table table-striped">
        <thead class="thead-dark">

        <tr>
          <th>Matrícula</th>
          <th>Aluno</th>
          <th>CPF</th>
          <th>Data Nasc</th>
          <th>Curso</th>
          <th>Disciplina</th>
          <th>Nota 1</th>
          <th>Nota 2</th>
          <th>Média</th>
          <th colspan="3">Ação</th>
        </tr>
        </thead>
        <?php
            include 'Class/Crud.php';
            $crud = new Crud;
            $row = $crud->selectAluno(); // função esta localizada em Crud.php para exibir os todos alunos e cursos
                                         // irar exibir alunos mesmo que esteja sem curso
            foreach($row as $key => $values){
                // $values['ID'];
                // $values['NOMEALUNO']
              echo"<tr>";
              /**foreach($values as $key => $dados){
                if($key != "ID" && $key != "Alunos_MAT"){
                  echo "<td><strong>".$dados."</strong></td>";

              }*/
              ?>
                <td><?= $values['MAT'];?></td>
                <td><?= $values['NOMEALUNO'];?></td>
                <td><?= $values['CPF'];?></td>
                <td><?= date('d/m/Y', strtotime($values['Data_nasc']));  ?></td>
                <td><?= $values['cUrSo'];?> </td>
                <td><?= $values['DICIPLINA'];?></td>
                <td><?= $values['NOTA1'];?></td>
                <td><?= $values['NOTA2'];?></td>
                <td><?= $values['MEDIA'];?></td>
              <?php

              ?>
              <td>
                <form action="editUser.php" method="post" class="border-0">
                  <input type="hidden" name="MAT" value="<?= $values['MAT'];?>">
                  <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-user-circle"></i>
                  </button>
                </form>
              </td>

                <td>
                  <form action="update.php" method="post" class="border-0">
                    <input type="hidden" name="ID" value="<?= $values['ID'];?>">
                    <input type="hidden" name="MAT" value="<?= $values['MAT'];?>">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-address-book"></i>
                    </button>
                  </form>
                </td>
                <td>
                  <form action="Routes/deleteAlun.php" method="post" class="border-0">
                    <input type="hidden" name="ID" value="<?= $values['ID'];?>">
                    <input type="hidden" name="MAT" value="<?= $values['MAT'];?>">
                    <button type="submit" class="btn btn-danger btn-sm" >
                      <i class="fa fa-trash" aria-hidden="true"></i>
                      </button>
                  </form>
                </td>

              <?php
              echo"</tr>";
            }

        ?>
      </table>
      <br><br><br>
  </section>
  <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous">
</script>
<script src="bootstrap/js/bootstrap.bundle.js"></script>
  <script>
  $(function () {
      $('[data-toggle="popover"]').popover()
  })
  $('.popover-dismiss').popover({
      trigger: 'focus'
    })
  </script>


</body>
</html>
