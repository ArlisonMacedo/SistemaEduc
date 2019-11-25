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
<title>Cadastro Funcionário * SistEduc </title>
<body>
<!--NAV BAR-->
<div class="topnav">
    <a href="index.php"><img class="img" src="./img/logo1.png" alt="" href="index.html"></a>
    <a href="Sobre.php">Sobre</a>
</div>
<!-- FIM NAV BAR-->

    <body>
        <div class="container">
            <h2>Insira os Dados</h2>
            <div class="row justify-content-center mt-5">
                <div class="col-md-8 ">
                    <form class="form-group border-0" action="./Routes/insertFunc.php" method="post">
                        <div class="col-12">
                            <?php
                                if(isset($_SESSION['ERRO'])){
                                    echo "<div class = 'alert alert-warning' role = 'alert'>";
                                    echo "<h4>". $_SESSION['ERRO']."</h4>";
                                    echo "</div>";
                                    unset($_SESSION['ERRO']);
                                }
                             ?>
                        </div>
                        <label for="">Nome</label>
                        <input type="text" class="form-control" name="nome" placeholder="Crazy Albania">
                        <label for="CPF">CPF</label>
                        <input type="text" class="form-control" name="CPF" placeholder="000.000.000-00">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="exemplo@outline.com">
                        <label for="Senha">Senha</label>
                        <input type="password" class="form-control" name="senha" placeholder="No minimo 6 Caracteres">
                        <label for="">Admin Controle</label>
                        <input type="text" name="cpfadmin" class="form-control col-4" placeholder="Nome do Admin">
                        <input type="password" class="form-control col-4" name="passadmin" placeholder="Senha do Admin">
                        <input type="submit" name="login" value="Cadastrar" class="btn btn-primary btn-block">

                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
