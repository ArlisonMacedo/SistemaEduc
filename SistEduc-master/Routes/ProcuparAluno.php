<?php

    if(isset($_POST['Alunos_MAT'])){


        if(preg_match('/^[\d]{4,}$/',$_POST['Alunos_MAT'])){
            include '../Class/Crud.php';
            include '../Class/Aluno.php';
            $aluno = new Aluno;
            $aluno->setMat($_POST['Alunos_MAT']);
            echo $aluno->getMat();
            $crud = new Crud;

        }

    }


 ?>
