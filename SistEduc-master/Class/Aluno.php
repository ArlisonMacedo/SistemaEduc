<?php 


    

    class Aluno{
        private $mat;
        private $nome;
        private $cpf;
        private $data_nasc;
        

        /**
         * Get the value of mat
         */ 
        public function getMat()
        {
                return $this->mat;
        }

        /**
         * Set the value of mat
         *
         * @return  self
         */ 
        public function setMat($mat)
        {
                $this->mat = $mat;

                return $this;
        }

        /**
         * Get the value of data_nasc
         */ 
        public function getData_nasc()
        {
                return $this->data_nasc;
        }

        /**
         * Set the value of data_nasc
         *
         * @return  self
         */ 
        public function setData_nasc($data_nasc)
        {
                $this->data_nasc = $data_nasc;

                return $this;
        }

        /**
         * Get the value of nome
         */ 
        public function getNome()
        {
                return $this->nome;
        }

        /**
         * Set the value of nome
         *
         * @return  self
         */ 
        public function setNome($nome)
        {
                $this->nome = $nome;

                return $this;
        }

        /**
         * Get the value of cpf
         */ 
        public function getCpf()
        {
                return $this->cpf;
        }

        /**
         * Set the value of cpf
         *
         * @return  self
         */ 
        public function setCpf($cpf)
        {
                $this->cpf = $cpf;

                return $this;
        }
    }