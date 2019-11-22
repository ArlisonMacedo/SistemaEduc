<?php
session_start();




if(isset($_POST['MAT'])){

    $rgCurso = '/^[A-ZÀ-Úa-zà-ú\s]{3,}$/';
    $rgDiciplina = '/^[A-ZÀ-Úa-z\s0-9à-ú]{3,}$/';
    $rgNome = '/^[A-ZÀ-Ú]{1}[a-zA-ZÀ-Úà-ú]+[\s]+[A-ZÀ-Ú]{1}[a-zA-ZÀ-Úà-ú]+$/';
    $rgCpf = '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/';
    $rgData_nasc = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/';

    if( preg_match($rgCurso,$_POST['curso']) && preg_match($rgDiciplina,$_POST['diciplina']) &&
        preg_match($rgNome,$_POST['nome']) && preg_match($rgCpf,$_POST['cpf']) &&
        preg_match($rgData_nasc,$_POST['data_nasc']) && preg_match('/^[\d]?\.?[0-9]?[0]?$/',$_POST['nota1']) &&
        preg_match('/^[\d]?\.?[0-9]?[0]?$/',$_POST['nota2'])){

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
    }else{
        $_SESSION['ERRO'] = "Entrada de Dados Invalidos";
        header("Location: ../dashboard.php");
    }
}
