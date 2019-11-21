<?php
session_start();
    if(isset($_POST['nome'])){ 
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $data_nasc = $_POST['data_nasc'];
        
        if(preg_match('/^[A-ZÀ-Ú]{1}[a-zA-ZÀ-Úà-ú]+[\s]+[A-ZÀ-Ú]{1}[a-zA-ZÀ-Úà-ú]+$/',$nome) &&
            preg_match('/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/',$cpf) &&
            preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$data_nasc)){
        
            include '../Class/Aluno.php';
            $aluno = new Aluno;
            $aluno->setNome($nome);
            $aluno->setCpf($cpf);
            $aluno->setData_nasc($data_nasc);
            include '../Class/Crud.php'; 
            $crud = new Crud; 
            $crud->inserirAluno($aluno);
            
        }else{
            $_SESSION['ERRO'] = "Entrada de Dados Invalidos";
            header("Location: ../cadastroAluno.php");
        }

    }else{
        header("Location: ../cadastroAluno.php");
    }



?>