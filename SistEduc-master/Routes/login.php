<?php 

    include '../Class/Crud.php';
    
    $usuario = $_POST['nome'];
    $cpf = $_POST['cpf'];

    if(preg_match('/^[A-Z]{1}[A-Za-z0-9@]{5,}$/',$usuario) && 
       preg_match('/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/',$cpf)){
        
        include '../Class/Func.php';
        $func = new Func;
        $func->setNome($usuario);
        $func->setCpf($cpf);
        $crud = new Crud;
        
        $crud->login($func);
        
       }


?>