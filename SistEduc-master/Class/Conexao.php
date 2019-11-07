<?php 
/**
 * 
 * @return PDO
 */

    abstract class Conexao {
        static private $user = "root";
        static private $pass = "";


        public function connectionDB(){
            try {
                //code...
                $conn = new PDO("mysql:host=localhost;dbname=EscolaDB;charset=utf8",
                self::$user,self::$pass);
                return $conn;
            } catch (PDOException $ex) {
                //throw $th;
                echo "Erro ".$ex->getMessage();
            }
        }

    }