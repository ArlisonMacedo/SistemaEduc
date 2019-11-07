<?php

if(isset($_POST['MAT'])){
    include '../Class/Curso.php';
    $curso = new Curso;
    $curso->setNome_curso($_POST['curso']);
    $curso->setDiciplina($_POST['diciplina']);
    $curso->setNota1($_POST['nota1']);
    $curso->setNota2($_POST['nota2']);
    $curso->setID($_POST['ID']);

    include '../Class/Aluno.php';
    $aluno = new Aluno;
    $aluno->setMat($_POST['MAT']);
    $aluno->setNome($_POST['nome']);
    $aluno->setCpf($_POST['cpf']);
    $aluno->setData_nasc($_POST['data_nasc']);

    include '../Class/Crud.php';
    $crud = new Crud;
    $crud->atualizar($curso,$aluno);
}