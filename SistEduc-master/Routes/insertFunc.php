<?php

    include '../Class/Crud.php';
    
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    if(preg_match('/^[A-Z]{1}[A-Za-z0-9@]{5,}$/',$nome) && 
       preg_match('/^[\d]{3}\.[\d]{3}\.[\d]{3}-[\d]{2}$/',$cpf) &&
       preg_match('/^[\w@]{6,}$/',$senha)){
        include '../Class/Func.php';
        $func = new Func;
        $func->setNome($nome);
        $func->setCpf($cpf);
        $func->setSenha($senha);
        $crud = new Crud;
        $crud->insertFunc($func);
    }

?>
