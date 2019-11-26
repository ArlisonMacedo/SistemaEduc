<?php

    include 'Conexao.php';
    //include '../Includes/Session.php';
    //include 'Func.php';
    //include 'Aluno.php';

    class Crud extends Conexao {

        // metodo de teste
        public function Teste(){
            echo "Ola Eu sou o GOku";
        }

        /** Funcções para o funcionario da instituição */
        public function selectFunc(){
            $row = array();
            $sql = "SELECT * FROM FUNCIONARIO";
            try {
                //code...
                $stmt = $this->connectionDB()->query($sql);
                $stmt->execute();
                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $row;
            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }
        // força
        public function insertFunc(Func $func,$cpfAdmin,$passAdmin){

            $admin = $this->connectionDB()->prepare("SELECT * FROM FUNCIONARIO WHERE CPF = :CPF AND SENHA = :SENHA");
            $admin->bindValue(":CPF",$cpfAdmin);
            $admin->bindValue(":SENHA",$passAdmin);
            $admin->execute();
            $row = $admin->fetchAll(PDO::FETCH_ASSOC);
            if(count($row) == 1){
                $sql = "INSERT INTO FUNCIONARIO VALUES (null,:NOME,:CPF,:EMAIL,:SENHA)";
                try {
                    //code...
                    $stmt = $this->connectionDB()->prepare($sql);

                    $stmt->bindValue(":NOME",$func->getNome());
                    $stmt->bindValue(":CPF",$func->getCpf());
                    $stmt->bindValue(":EMAIL",$func->getEmail());
                    $stmt->bindValue(":SENHA",$func->getSenha());

                    if($stmt->execute()){
                        $_SESSION['USERCREATE'] = "Usuário Criado com Sucesso";

                        header("Location: ../loginFunc.php");
                    }
                } catch (PDOException $th) {
                    //throw $th;
                    echo "Erro ".$th->getMessage();
                }
            }else{
                $_SESSION['ERRO'] = "Erro! Verifique Novamente";
                header("Location: ../cadastroFunc.php");
            }
        }
        public function deleteFunc(Func $func){
            $sql = "DELETE FROM FUNCIONARIO WHERE COD = :COD ";

            try {
                //code...
                $stmt = $this->connectionDB()->prepare($sql);
                $stmt->bindValue(":COD",$func->getMat());
                if($stmt->execute()){
                    header("Location: ../dashboard.php");
                }

            } catch (PDOException $ex) {
                //throw $th;
                echo "Erro ".$ex->getMessage();
            }
        }

        public function login(Func $func){
            //login Funcionario
            //session_start();
            $sql = "SELECT * FROM FUNCIONARIO WHERE CPF = :CPF and SENHA = :SENHA";

            try {
                //code...
                $stmt = $this->connectionDB()->prepare($sql);

                $stmt->bindValue(":CPF",$func->getCpf());
                $stmt->bindValue(":SENHA",$func->getSenha());

                $stmt->execute();
                $dados;
                while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                    $dados = $row->NOME;
                }
                    if(count($dados) == 1){

                        $_SESSION['FUNCIONARIO'] = $dados;
                        header("Location: ../dashboard.php");

                    }else{
                        echo $dados;
                        $_SESSION['ERROLOGIN'] = "Usuario ou CPF Invalidos";
                        header("Location: ../loginFunc.php");
                    }

            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }

        /**
            *
                *
                    * @Funcções para o Aluno da instituição
                *
            *
         */

        public function selectAluno(){
            /** trazer todos os alunos e seus repectivos cursos
            * para o dashboard
            */
            $row = array();
            $sql = "SELECT * FROM Alunos as Al left join CURSO as C on (Al.MAT = C.Alunos_MAT)";
            try {
                //code...
                $stmt = $this->connectionDB()->query($sql);
                $stmt->execute();
                $row = $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FECTH_ASSOC trazer os dados sem ser numa base de array
                return $row;
            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }


        public function selectUpdateAluno(Aluno $aluno){
            /**
             * Função para trazer um unico registro do usuario para pagina de Edição { editUser.php }
             * somente os dados do Aluno atraves da chave primaria que é { MAT }
             */
            $sql = "SELECT * FROM Alunos WHERE MAT = :MAT ";
            $row = array();

            try {
                //code...
                $stmt = $this->connectionDB()->prepare($sql);
                $stmt->bindValue(":MAT",$aluno->getMat());
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row;
            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }

        public function updateAluno(Aluno $aluno){
            /**
             * Função para Atualizar os Dados somente do Aluno
             */


                $sql = "UPDATE Alunos SET NOMEALUNO = :nome, CPF = :cpf, Data_nasc = :data_nasc
                WHERE MAT = :MAT";

                try {
                    //code...
                    $stmt = $this->connectionDB()->prepare($sql);
                    $stmt->bindValue(":nome",$aluno->getNome());
                    $stmt->bindValue(":cpf",$aluno->getCpf());
                    $stmt->bindValue(":data_nasc",$aluno->getData_nasc());
                    $stmt->bindValue(":MAT",$aluno->getMat());
                    if($stmt->execute()){
                        header("Location: ../dashboard.php");
                    }else{
                        $_SESSION['ERRO'] = "Algo Deu Errado, CPF já Existente ou outros Dados Invalidos para Matricula ".$aluno->getMat()."";
                        header("Location: ../dashboard.php");
                    }
                } catch (PDOException $th) {
                    //throw $th;
                    echo "Erro ".$th->getMessage();
                }

        }

        public function deleteAluno(Aluno $aluno,Curso $curso){
            //* Função para Deletar Aluno e eventualmente o seus curso relacionado

            $query = "DELETE FROM CURSO WHERE ID = :ID";
            $sql = "DELETE FROM Alunos WHERE MAT = :MAT";
            $boolCurso = false;
            $boolAluno = false;
            try {
                //code...
                $del = $this->connectionDB()->prepare($query);
                $del->bindValue(":ID",$curso->getID());
                if($del->execute()){
                    $boolCurso = true;
                }
                $stmt = $this->connectionDB()->prepare($sql);
                $stmt->bindValue(":MAT",$aluno->getMat());
                if($stmt->execute()){
                    $boolAluno = true;
                }
                if($boolCurso && $boolAluno){
                    header("Location: ../dashboard.php");
                }else{
                    header("location: ../dashboard.php");
                }

            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }

        public function inserirAluno(Aluno $aluno){
            // Função para Inserir o Aluno no Sistema

            $sql = "INSERT INTO Alunos VALUES (null,:nome,:cpf,:data_nasc)";
            try {
                //code...
                $stmt = $this->connectionDB()->prepare($sql);
                $stmt->bindValue(":nome",$aluno->getNome());
                $stmt->bindValue(":cpf",$aluno->getCpf());
                $stmt->bindValue(":data_nasc",$aluno->getData_nasc());
                if($stmt->execute()){
                    header("Location: ../dashboard.php");
                }else {
                    $_SESSION['ERRO'] = "CPF já existente";
                    header("Location: ../cadastroAluno.php");
                }
            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }

        public function procurarAluno(Aluno $aluno){
            /**
            * Função para procurar Aluno atraves de uma pesquisa para relaciona lo com um curso
            * essa função irar mostra os dados na pagina de cadastroCurso.php em dois inputs
            * pois se existir um aluno no banco de acordo com a matricula enviada sera mostrada
            * o NOME e CPF  de acordo com a matricula inserida
            */

            $sql = "SELECT NOMEALUNO , CPF FROM Alunos WHERE MAT = :MAT ";
            $row = array();
            try {
                $stmt = $this->connectionDB()->prepare($sql);
                $stmt->bindValue(":MAT",$aluno->getMat());
                if($stmt->execute()):
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $row;
                else:
                    $_SESSION['ERRO'] = "Matricula não disponivel";
                    header("Location: ../cadastroCurso.php");
                endif;
            } catch (PDOException $e) {
                echo "Erro ".$e->getMessage();
            }

        }
        public function loginAluno(Aluno $aluno){
           // session_start();
           /**
            * Função para Login Do Aluno
            */
            $sql = "SELECT * FROM Alunos WHERE NOMEALUNO = :nome and CPF = :cpf ";

            try {
                //code...
                $stmt = $this->connectionDB()->prepare($sql);
                $stmt->bindValue(":nome",$aluno->getNome());
                $stmt->bindValue(":cpf",$aluno->getCpf());
                $stmt->execute();
                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if(count($row) == 1){
                    $_SESSION['ALUNO'] = $aluno->getNome();
                    $_SESSION['CPF'] = $aluno->getCpf();
                    header("Location: ../areaAluno.php");

                }else{
                    $_SESSION['ERROLOGIN'] = "Usuario ou CPF Invalidos";
                    header("Location: ../login.php");
                }

            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }

        }

        public function selectDataAluno(Aluno $aluno){
            /**
             * Função para Trazer os dados do Aluno Assim que estiver logado sera exibido
             * na Area do Aluno
             */

            $sql = "SELECT * FROM Alunos as Al LEFT JOIN CURSO AS C ON Al.MAT =  C.Alunos_MAT
            WHERE CPF = :cpf";
            $row = array();
            try {
                //code...
                $stmt = $this->connectionDB()->prepare($sql);
                $stmt->bindValue(":cpf",$aluno->getCpf());

                $stmt->execute();
                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return $row;

            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }


        public function inserirCurso(Curso $curso){
            // função para inserir curso no sistema e inserindo a chave estrangeira
            // do Aluno para o relacionamento
            // o curso somente irar ser cadastro se exitir um Aluno para relacionar a ele(Curso)

            $exist = "SELECT * FROM CURSO
                WHERE cUrSo = :curso and DICIPLINA = :disciplina and CURSO.Alunos_MAT = :MAT";

            $try = $this->connectionDB()->prepare($exist);
            $try->bindValue(":curso",$curso->getNome_curso());
            $try->bindValue(":disciplina",$curso->getDiciplina());
            $try->bindValue(":MAT",$curso->getAlunos_MAT());
            $try->execute();
            $row = $try->fetchAll(PDO::FETCH_ASSOC);
            if(count($row) >= 1){
                $_SESSION['ERRO'] = "ERRO! Curso e Disciplina Já Cadastrado a esse Usuário";

                header("Location: ../dashboard.php");
            }else{

            $sql = "INSERT INTO CURSO VALUES (null,:curso,:diciplina,:nota1,:nota2,:media,:Alunos_MAT)";
                try {
                    //code...
                    $stmt = $this->connectionDB()->prepare($sql);
                    $stmt->bindValue(":curso",$curso->getNome_curso());
                    $stmt->bindValue(":diciplina",$curso->getDiciplina());
                    $stmt->bindValue(":nota1",$curso->getNota1());
                    $stmt->bindValue(":nota2",$curso->getNota2());
                    $stmt->bindValue(":media",($curso->getNota1() + $curso->getNota2()) / 2);
                    $stmt->bindValue(":Alunos_MAT",$curso->getAlunos_MAT());
                    if($stmt->execute()){
                        header("Location: ../dashboard.php");
                    }

                } catch (PDOException $th) {
                    //throw $th;
                    echo "Erro ".$th->getMessage();
                }
            }
        }
        public function selectUpdateCurso(Aluno $aluno,Curso $curso){
            /**
             * Função para trazer um unico registro quando o Aluno estiver relacionado com um Curso
             * para assim apresentar na tela de Editar dados do Curso
             */

            $sql = "SELECT * FROM Alunos as Al INNER JOIN CURSO as C ON Al.MAT = C.Alunos_MAT
            WHERE MAT = :MAT AND C.ID = :ID";
            $row = array();

            try {
                //code...
                $stmt = $this->connectionDB()->prepare($sql);
                $stmt->bindValue(":MAT",$aluno->getMat());
                $stmt->bindValue(":ID",$curso->getID());
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                    // code...
                    $_SESSION['curso'] = $row['cUrSo'];
                    $_SESSION['disciplina'] = $row['DICIPLINA'];
                    $_SESSION['nota1'] = $row['NOTA1'];
                    $_SESSION['nota2'] = $row['NOTA2'];
                    $_SESSION['ID_CURSO'] = $row['ID'];
                }
                return $row;
            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }

        public function atualizar(Curso $curso, Aluno $aluno){
            // função para fazer o update tanto do curso e tbm do aluno passando os dois
            // objetos Aluno e Curso como parametro acessando os metodos Setters e Getters
            // trabalho com a chave primaria de ambas as tabelas



            $upAluno = "UPDATE Alunos set NOMEALUNO = :nome, CPF = :cpf, Data_nasc = :data_nasc
            WHERE MAT = :MAT";

            $upCurso = "UPDATE CURSO SET cUrSo = :curso, DICIPLINA = :diciplina, nota1 = :nota1,
            nota2 = :nota2, MEDIA = (:nota1+:nota2) / 2 WHERE ID = :ID";

            $boolC = false;
            $boolA = false;

            try {
                //code...
                $stmt = $this->connectionDB()->prepare($upCurso);
                $stmt->bindValue(":curso",$curso->getNome_curso());
                $stmt->bindValue(":diciplina",$curso->getDiciplina());
                $stmt->bindValue(":nota1",$curso->getNota1());
                $stmt->bindValue(":nota2",$curso->getNota2());
                $stmt->bindValue(":ID",$curso->getID());
                if($stmt->execute()){
                   $boolC = true;
                   $_SESSION['NewCurso'] = $curso->getNome_curso();
                   $_SESSION['NewDisciplina'] = $curso->getDiciplina();
                }

                $stud = $this->connectionDB()->prepare($upAluno);
                $stud->bindValue(":nome",$aluno->getNome());
                $stud->bindValue(":cpf",$aluno->getCpf());
                $stud->bindValue(":data_nasc",$aluno->getData_nasc());
                $stud->bindValue(":MAT",$aluno->getMat());
                if($stud->execute()){
                    $boolA = true;
                    $_SESSION['NewMAT'] = $aluno->getMat();
                }
                if($boolC && $boolA){
                /** Sempre irar dar Verdadeiro (True) pois o usuario não irar manusear as chaves
                 * primarias de ambas as tabelas, pois isso ficara a cargo do sistema em suas
                 * tratativas
                 */
                 $this->Rollback($_SESSION['NewCurso'], $_SESSION['NewDisciplina'],$_SESSION['NewMAT']);
                }
            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }

        public function Rollback($curso, $disciplina,$Mat){
            $exist = "SELECT * FROM CURSO
            WHERE cUrSo = :curso and DICIPLINA = :disciplina and CURSO.Alunos_MAT = :MAT";

            $try = $this->connectionDB()->prepare($exist);
            $try->bindValue(":curso",$curso);
            $try->bindValue(":disciplina",$disciplina);
            $try->bindValue(":MAT",$Mat);
            $try->execute();
            $row = $try->fetchAll(PDO::FETCH_ASSOC);
            if(count($row) <= 1){

                //include '../verificaDuplication.php';
                //while ($dados = $row->fetch(PDO::FETCH_OBJ)) {
                    // code...
                //}
                $_SESSION['SUCESSO'] = "Atualizado com Sucesso";

                header("Location: ../dashboard.php");
                //echo count($row);
               }else{
                   $upCurso = "UPDATE CURSO SET cUrSo = :curso, DICIPLINA = :diciplina, nota1 = :nota1,
                   nota2 = :nota2, MEDIA = (:nota1+:nota2) / 2 WHERE ID = :ID";


                   $reload = $this->connectionDB()->prepare($upCurso);
                   $reload->bindValue(":curso",$_SESSION['curso']);
                   $reload->bindValue(":diciplina",$_SESSION['disciplina']);
                   $reload->bindValue(":nota1",$_SESSION['nota1']);
                   $reload->bindValue(":nota2",$_SESSION['nota2']);
                   $reload->bindValue(":ID",$_SESSION['ID_CURSO']);
                   $reload->execute();

                   $_SESSION['ERRO'] = "ERRO! Curso e Disciplina Já Cadastrado a esse Usuário";

                   header("Location: ../dashboard.php");

                  //echo count($row);


               }
           }
    }

?>
