<?php
session_start();
if(isset($_POST['cpf']) && isset($_POST['nome'])){
    
    $rgnome = '/^[A-ZÀ-Ú]{1}[a-zA-ZÀ-Úà-ú]+[\s]+[A-ZÀ-Ú]{1}[A-Za-zÀ-Úà-ú]+$/';
    $rgcpf = '/^[\d]{3}\.[\d]{3}\.[\d]{3}-[\d]{2}$/';
    if(preg_match($rgnome,$_POST['nome']) && preg_match($rgcpf,$_POST['cpf'])){

        include '../Class/Aluno.php';
        $aluno = new Aluno;
        $aluno->setNome($_POST['nome']);
        $aluno->setCpf($_POST['cpf']);
        
        include '../Class/Crud.php';
        $crud = new Crud;
        $crud->loginAluno($aluno);
    }else{
        $_SESSION['ERRO'] = "Entrada de Dados Invalidos";
        header("location: ../login.php");
    }
    
}else{
    header("location: ../login.php");
}
?>