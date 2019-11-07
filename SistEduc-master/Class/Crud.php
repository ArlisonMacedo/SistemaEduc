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

        public function insertFunc(Func $func){
            $sql = "INSERT INTO FUNCIONARIO VALUES (null,:NOME,:CPF,:SENHA)";
            try {
                //code...
                $stmt = $this->connectionDB()->prepare($sql);
                
                $stmt->bindValue(":NOME",$func->getNome());
                $stmt->bindValue(":CPF",$func->getCpf());
                $stmt->bindValue(":SENHA",$func->getSenha());
                
                if($stmt->execute()){
                    echo "Dados inseridos com sucesso";
                }
            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
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

        public function login(Func $func){ //login Funcionario
            session_start();
            $sql = "SELECT * FROM FUNCIONARIO WHERE NOME = :NOME and CPF = :CPF";

            try {
                //code...
                $stmt = $this->connectionDB()->prepare($sql);

                $stmt->bindValue(":NOME",$func->getNome());
                $stmt->bindValue(":CPF",$func->getCpf());

                $stmt->execute();
                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if(count($row) == 1){
                    $_SESSION['FUNCIONARIO'] = $func->getNome();
                    header("Location: ../dashboard.php");
                    
                }

            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }

        /**@Funcções para o Aluno da instituição */
        public function selectAluno(){
            $row = array();
            $sql = "SELECT * FROM Alunos as Al left join CURSO as C on (Al.MAT = C.Alunos_MAT)";
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

        public function selectUpdate(Aluno $aluno){
            $sql = "SELECT * FROM Alunos as Al LEFT JOIN CURSO as C ON Al.MAT = C.Alunos_MAT 
            WHERE MAT = :MAT";
            
            try {
                //code...
                $stmt = $this->connectionDB()->prepare($sql);
                $stmt->bindValue(":MAT",$aluno->getMat());
                $stmt->execute();
                $row = array();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row;
            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }

        public function deleteAluno(Aluno $aluno,Curso $curso){
            $query = "DELETE FROM CURSO WHERE ID = :ID";
            $sql = "DELETE FROM Alunos WHERE MAT = :MAT";
            $bool = false;
            try {
                //code...
                $del = $this->connectionDB()->prepare($query);
                $del->bindValue(":ID",$curso->getID());
                if($del->execute()){
                    $bool = true;
                }
                $stmt = $this->connectionDB()->prepare($sql);
                $stmt->bindValue(":MAT",$aluno->getMat());
                if($stmt->execute()){
                    $bool = true;
                }
                if($bool){
                    header("Location: ../dashboard.php");
                }
                
            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }

        public function inserirAluno(Aluno $aluno){
            $sql = "INSERT INTO Alunos VALUES (null,:nome,:cpf,:data_nasc)";
            try {
                //code...
                $stmt = $this->connectionDB()->prepare($sql);
                $stmt->bindValue(":nome",$aluno->getNome());
                $stmt->bindValue(":cpf",$aluno->getCpf());
                $stmt->bindValue(":data_nasc",$aluno->getData_nasc());
                if($stmt->execute()){
                    header("Location: ../dashboard.php");
                }
            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }

        public function inserirCurso(Curso $curso){
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

        public function atualizar(Curso $curso, Aluno $aluno){
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
                }
                $stud = $this->connectionDB()->prepare($upAluno);
                $stud->bindValue(":nome",$aluno->getNome());
                $stud->bindValue(":cpf",$aluno->getCpf());
                $stud->bindValue(":data_nasc",$aluno->getData_nasc());
                $stud->bindValue(":MAT",$aluno->getMat());
                if($stud->execute()){
                    $boolA = true;
                }
                if($boolC && $boolA){
                    header("Location: ../dashboard.php");
                }
            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }

        public function loginAluno(Aluno $aluno){
            session_start();
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
                    
                }
                
            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }

        }

        public function selectDataAluno(Aluno $aluno){
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

        
    }
?>
