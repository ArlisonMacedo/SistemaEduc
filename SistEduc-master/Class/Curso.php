<?php 


    class Curso {
        private $ID;
        private $Alunos_MAT;
        private $nome_curso;
        private $diciplina;
        private $nota1;
        private $nota2;
        private $situacao;

        /**
         * Get the value of ID
         */ 
        public function getID()
        {
                return $this->ID;
        }

        /**
         * Set the value of ID
         *
         * @return  self
         */ 
        public function setID($ID)
        {
                $this->ID = $ID;

                return $this;
        }

        /**
         * Get the value of Alunos_MAT
         */ 
        public function getAlunos_MAT()
        {
                return $this->Alunos_MAT;
        }

        /**
         * Set the value of Alunos_MAT
         *
         * @return  self
         */ 
        public function setAlunos_MAT($Alunos_MAT)
        {
                $this->Alunos_MAT = $Alunos_MAT;

                return $this;
        }

        /**
         * Get the value of nome_curso
         */ 
        public function getNome_curso()
        {
                return $this->nome_curso;
        }

        /**
         * Set the value of nome_curso
         *
         * @return  self
         */ 
        public function setNome_curso($nome_curso)
        {
                $this->nome_curso = $nome_curso;

                return $this;
        }

        /**
         * Get the value of diciplina
         */ 
        public function getDiciplina()
        {
                return $this->diciplina;
        }

        /**
         * Set the value of diciplina
         *
         * @return  self
         */ 
        public function setDiciplina($diciplina)
        {
                $this->diciplina = $diciplina;

                return $this;
        }

        /**
         * Get the value of nota1
         */ 
        public function getNota1()
        {
                return $this->nota1;
        }

        /**
         * Set the value of nota1
         *
         * @return  self
         */ 
        public function setNota1($nota1)
        {
                $this->nota1 = $nota1;

                return $this;
        }

        /**
         * Get the value of nota2
         */ 
        public function getNota2()
        {
                return $this->nota2;
        }

        /**
         * Set the value of nota2
         *
         * @return  self
         */ 
        public function setNota2($nota2)
        {
                $this->nota2 = $nota2;

                return $this;
        }

        /**
         * Get the value of situacao
         */ 
        public function getSituacao()
        {
                return $this->situacao;
        }

        /**
         * Set the value of situacao
         *
         * @return  self
         */ 
        public function setSituacao($situacao)
        {
                $this->situacao = $situacao;

                return $this;
        }
    }

?>