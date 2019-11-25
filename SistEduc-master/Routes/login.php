<?php
session_start();

if(isset($_POST['CPF']) && isset($_POST['senha'])){
    $cpf = $_POST['CPF'];
    $senha = $_POST['senha'];

    if( preg_match('/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/',$cpf) &&
        preg_match('/^[\w\d]{6,}$/',$senha)
        ){

        include '../Class/Func.php';
        include '../Class/Crud.php';
        $func = new Func;
        $func->setCpf($cpf);
        $func->setSenha($senha);
        $crud = new Crud;

        $crud->login($func);

       }else{
           
            $_SESSION['ERRO'] = "Entrada de Dados Invalidos";
            header("Location: ../loginFunc.php");
       }

    }else{
        header("Location: ../loginFunc.php");
    }

?>
