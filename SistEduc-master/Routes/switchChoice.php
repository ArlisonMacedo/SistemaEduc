<?php 


$type_user = $_POST['usuario'];
if(!isset($type_user)){
    header("Location: ../login.php");
}
if($type_user == "aluno"){
    include 'loginAluno.php';
    
}else if($type_user == "func"){
    include 'login.php';
}