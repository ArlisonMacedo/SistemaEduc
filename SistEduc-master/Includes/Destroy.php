<?php
session_start();
if(isset($_SESSION['ALUNO']) || isset($_SESSION['FUNCIONARIO'])){
    session_destroy();
    header("Location: ../index.php");
}else{
    header("Location: ../index.php");
}