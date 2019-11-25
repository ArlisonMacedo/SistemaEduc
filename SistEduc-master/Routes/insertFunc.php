<?php
    session_start();

    if(isset($_POST['nome'])){
    $nome = $_POST['nome'];
    $cpf = $_POST['CPF'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpfAdmin = $_POST['cpfadmin'];
    $passAdmin = $_POST['passadmin'];

    if( preg_match('/^[A-ZÀ-Ú]{1}[a-z]+\s[A-ZÀ-Ú]{1}[a-z]+$/',$nome) &&
        preg_match('/^[\d]{3}\.[\d]{3}\.[\d]{3}-[\d]{2}$/',$cpf) &&
        preg_match('/^[a-z]+\@[a-z]+\.[a-z]{3}$/',$email) &&
        preg_match('/^[\w\d]{6,}$/',$senha)){


            include '../Class/Func.php';

            $func = new Func;
            $func->setNome($nome);
            $func->setCpf($cpf);
            $func->setEmail($email);
            $func->setSenha($senha);

            include '../Class/Crud.php';

            $crud = new Crud;
            $crud->insertFunc($func,$cpfAdmin,$passAdmin);

    }else{
        $_SESSION['ERRO'] = "Entrada de Dados Invalidos";
        header("Location: ../cadastroFunc.php");
    }
}else{
    $_SESSION['ERRO'] = "Preencha os Dados por favor";
    header("Locaiton: ../cadastroFunc.php");
}

?>
