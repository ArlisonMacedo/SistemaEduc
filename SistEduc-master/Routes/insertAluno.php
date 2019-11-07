<?php

    if(isset($_POST['nome'])){
        include '../Class/Aluno.php';
        $aluno = new Aluno;
        $aluno->setNome($_POST['nome']);
        $aluno->setCpf($_POST['cpf']);
        $aluno->setData_nasc($_POST['data_nasc']);
        include '../Class/Crud.php';
        $crud = new Crud;
        $crud->inserirAluno($aluno);

    }



?>