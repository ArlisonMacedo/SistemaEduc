<?php

if(isset($_POST['cpf']) && isset($_POST['nome'])){
    include '../Class/Aluno.php';
    $aluno = new Aluno;
    $aluno->setNome($_POST['nome']);
    $aluno->setCpf($_POST['cpf']);
    
    include '../Class/Crud.php';
    $crud = new Crud;
    $crud->loginAluno($aluno);
    
}