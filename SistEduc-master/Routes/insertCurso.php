<?php

if(isset($_POST['curso'])){
    include '../Class/Curso.php';
    $curso = new Curso;
    $curso->setNome_curso($_POST['curso']);
    $curso->setDiciplina($_POST['diciplina']);
    $curso->setNota1($_POST['nota1']);
    $curso->setNota2($_POST['nota2']);
    $curso->setAlunos_MAT($_POST['Alunos_MAT']);
    include '../Class/Crud.php';
    $crud = new Crud;
    $crud->inserirCurso($curso);
}