<?php

    if(!isset($_POST['MAT'])){
        header("Location: ../dashboard.php");
    }else{
        include '../Class/Aluno.php';
        $aluno = new Aluno;
        $aluno->setMat($_POST['MAT']); 
        include '../Class/Curso.php';
        $curso = new Curso;
        $curso->setID($_POST['ID']);
        include '../Class/Crud.php';
        $crud = new Crud;
        $crud->deleteAluno($aluno,$curso); // chamar metodo de delete no Crud

    }
