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
      <a href="cadastroAluno.php">Cadastrar</a>
      <a href="login.php">Login</a>
    </div>
  <!-- FIM NAV BAR-->
  <section>
    <div class="container">
      <h2>Ola <?= $_SESSION['FUNCIONARIO'];?> Bem Vindo</h2>  
      <br>
    <div class="row">
      <div class="col-md-2">
        <a href="cadastroAluno.php"><button type="submit" class="btn btn-primary">Cadastrar Aluno</button></a><br><br>

      </div>
      <div class="col-md-2">
        <a href="cadastroCurso.php"><button class="btn btn-primary">Cadastrar Curso</button></a>
      </div>
      <div class="col-md-2">    
        <a href="Includes/Destroy.php"><button  class="btn btn-primary">Sair</button></a>
      </div>

    </div>
    </div>
    
    
    
    <br>
      <table class="table table-striped">
        <thead class="thead-dark">
        
        <tr>
          <th>Matricula</th>
          <th>Aluno</th>   
          <th>Cpf</th>
          <th>Data Nasc</th>
          <th>Curso</th>
          <th>Diciplina</th>
          <th>Nota1</th>
          <th>Nota2</th>
          <th>Media</th>
          <th colspan="2">Ação</th>
        </tr>
        </thead>
        <?php 
            include 'Class/Crud.php';
            $crud = new Crud;
            $row = $crud->selectAluno();
            foreach($row as $key => $values){
              echo"<tr>";
              foreach($values as $key => $dados){
                if($key != "ID" && $key != "Alunos_MAT"){
                  echo "<td>".$dados."</td>";
                }
              }?>
                <td>
                  <form action="update.php" method="post">
                    <input type="hidden" name="ID" value="<?php echo $values['ID'];?>">
                    <input type="hidden" name="MAT" value="<?php echo $values['MAT'];?>">
                    <input type="submit" value="Editar">
                  </form>
                </td>
                <td>
                  <form action="Routes/deleteAlun.php" method="post">
                    <input type="hidden" name="ID" value="<?php echo $values['ID'];?>">
                    <input type="hidden" name="MAT" value="<?php echo $values['MAT'];?>">
                    <input type="submit" value="Deletar"> 
                  </form>
                </td>
                
              <?php
              echo"</tr>";
            }
        
        ?>
      </table>
      <br><br><br>
  </section>
  

</body>
</html>