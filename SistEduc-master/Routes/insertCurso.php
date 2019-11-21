<?php
session_start();
if(isset($_POST['curso'])){
    //$nome_curso = $_POST['curso'];

    include '../Class/Curso.php';
    if( preg_match('/^[A-Za-z\sÀ-Úà-ú]{3,}$/',$_POST['curso']) &&
        preg_match('/^[A-Za-z\s0-9À-Úà-ú]{3,}$/',$_POST['diciplina']) &&
        preg_match('/^[\d]{4,}$/',$_POST['Alunos_MAT']) &&
        preg_match('/^[\d]?\.?[0-9]?[0]?$/',$_POST['nota1']) &&
        preg_match('/^[\d]?\.?[0-9]?[0]?$/',$_POST['nota2'])
        ){
            $curso = new Curso;
            $curso->setNome_curso($_POST['curso']);
            $curso->setDiciplina($_POST['diciplina']);
            $curso->setNota1($_POST['nota1']);
            $curso->setNota2($_POST['nota2']);
            $curso->setAlunos_MAT($_POST['Alunos_MAT']);
            include '../Class/Crud.php';
            $crud = new Crud;
            $crud->inserirCurso($curso);
    }else{
        $_SESSION['ERRO'] = "Entrada de Dados Invalidos"; //Atribuindo a sessão uma string de Erro ...
        header("Location: ../cadastroCurso.php");
    }
}else{
    header("Location: ../cadastroCurso.php");
}
