<?php
    session_start();
    include 'Class/Crud.php';

    $crud = new Crud;
    $row = $crud->Rollback($_SESSION['NewCurso'], $_SESSION['NewDisciplina']);

    foreach ($row as $key => $value) {
        // code...
        foreach ($value as $key => $dados) {
            // code...
            echo $dados."  ";
        }
    }
 ?>
