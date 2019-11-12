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
            //session_start();
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
                    
                }else{
                    $_SESSION['ERROLOGIN'] = "Usuario ou CPF Invalidos";
                    header("Location: ../login.php");
                }

            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }

        /**
         * 
         * @Funcções para o Aluno da instituição
         * 
         */

        public function selectAluno(){ 
            // trazer todos os alunos e seus repectivos cursos
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

        public function selectUpdate(Aluno $aluno,Curso $curso){
            /**
             * Função para trazer um registro quando o Aluno estiver relacionado com um Curso
             * para assim apresentar na tela de Editar dados do Curso
             */
            $sql = "SELECT * FROM Alunos as Al LEFT JOIN CURSO as C ON Al.MAT = C.Alunos_MAT 
            WHERE MAT = :MAT AND C.ID = :ID";
            $row = array();
            
            try {
                //code...
                $stmt = $this->connectionDB()->prepare($sql);
                $stmt->bindValue(":MAT",$aluno->getMat());
                $stmt->bindValue(":ID",$curso->getID());
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row;
            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }
        public function selectUpdateAluno(Aluno $aluno){
            /**
             * Função para trazer o registro do usuario para Tela de Edição
             * 
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
            //* Função para Inserir o Aluno no Sistema

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
            // função para inserir curso no sistema e inserindo a chave estrangeira
            // do Aluno para o relacionamento

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
                /** Sempre irar dar Verdadeiro (True) pois o usuario não irar manuserrar as chaves
                 * primarias de ambas as tabelas, pois isso ficara a cargo do sistema em suas
                 * tratativas 
                 */
                    header("Location: ../dashboard.php");
                }
            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
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

        
    }
?>
