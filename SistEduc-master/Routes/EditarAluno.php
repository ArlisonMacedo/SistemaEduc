<?php

    session_start();

    if(isset($_POST['MAT'])){

        if(preg_match('/^[A-ZÀ-Ú]{1}[a-zA-ZÀ-Úà-ú]+[\s]+[A-ZÀ-Ú]{1}[a-zA-ZÀ-Úà-ú]+$/',$_POST['nome']) &&
        preg_match('/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/',$_POST['cpf']) &&
        preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$_POST['data_nasc'])){

            include '../Class/Aluno.php';
            $aluno = new Aluno;

            $aluno->setMat($_POST['MAT']);
            $aluno->setNome($_POST['nome']);
            $aluno->setCpf($_POST['cpf']);
            $aluno->setData_nasc($_POST['data_nasc']);

            include '../Class/Crud.php';

            $crud = new Crud;

            $crud->updateAluno($aluno);

        }else{
            $_SESSION['ERRO'] = "Entrada de Dados Invalidos";
            header("Location: ../editUser.php");
        }
    }else{
        header("Location: ../dashboard.php");
    }
