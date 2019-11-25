<?php

    session_start();



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
    <a href="Sobre.php" class="btn btn-tranparent">Sobre</a>
</div>

    <body>




            <form action="./Routes/login.php" method="post" class="border-0">
                <div class="imgcontainer">
                    <img id="imglogin" src="./img/logo1.png" alt="Avatar" class="avatar">
                </div>
                <div class="container form-group col-6">


                <?php if(isset($_SESSION['ERRO'])){
                        echo "<div class='alert alert-warning' role='alert'>";
                        echo "<h4>". $_SESSION['ERRO']."</h4>";
                        echo "</div>";
                         unset($_SESSION['ERRO']);
                        }else if(isset($_SESSION['ERROLOGIN'])){
                          echo "<div class = 'alert alert-warning' role = 'alert'>";
                          echo "<h4>". $_SESSION['ERROLOGIN']."</h4>";
                          echo "</div>";
                          unset($_SESSION['ERROLOGIN']);
                    }else if(isset($_SESSION['USERCREATE'])){
                            echo "<div class = 'alert alert-success' role = 'alert'>";
                            echo "<h4>". $_SESSION['USERCREATE']."</h4>";
                            echo "</div>";
                            unset($_SESSION['USERCREATE']);
                    } ?>

                        <label for="CPF">CPF</label>
                        <input type="text" name="CPF" placeholder="000.000.000-00">
                        <label for="Senha">Senha</label>
                        <input type="password" name="senha" placeholder="No minimo 6 Caracteres">
                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                        <br>
                        <a href="cadastroFunc.php" style="margin-left:60%;">Cadastrar Novo Funcionário</a>
                    </div>
                    </form>



    </body>
</html>
