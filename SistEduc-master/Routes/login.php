<?php 
session_start();

if(isset($_POST['nome']) && isset($_POST['cpf'])){
    $usuario = $_POST['nome'];
    $cpf = $_POST['cpf'];

    if(preg_match('/^[A-Z]{1}[A-Za-z0-9@À-Úà-ú]{5,}$/',$usuario) && 
        preg_match('/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/',$cpf)){
    
        include '../Class/Func.php';
        include '../Class/Crud.php';
        $func = new Func;
        $func->setNome($usuario);
        $func->setCpf($cpf);
        $crud = new Crud;
        
        $crud->login($func);
        
       }else{
            $_SESSION['ERRO'] = "Entrada de Dados Invalidos";
            header("Location: ../login.php");
       }

    }else{
        header("Location: ../login.php");
    }

?>