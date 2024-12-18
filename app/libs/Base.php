<?php

    session_start();

    class Base {

        private $host = DB_HOST;
        private $dbname = DB_NAME;
        private $user = DB_USER;
        private $password = DB_PASS;

        private $dbh; //Manejador BD
        private $stmt; //sentencia
        private $error;


        public function __construct(){

            $dns = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;


            $options = [
                PDO::ATTR_ERRMODE => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            try {
                $this -> dbh = new PDO($dns, $this->user, $this->password, $options);
                $this -> dbh->exec('set names utf8');

            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }

           

        }

        public function query($sql){
            
            return $this->stmt = $this->dbh->prepare($sql);

        }

        public function bind($parametro, $valor, $tipo = null) {
            if (is_null($tipo)) {
                switch (true) {
                    case is_int($valor):
                        $tipo = PDO::PARAM_INT;
                        break;
                    case is_bool($valor):
                        $tipo = PDO::PARAM_BOOL;
                        break;
                    case is_null($valor):
                        $tipo = PDO::PARAM_NULL;
                        break;
                    default:
                        $tipo = PDO::PARAM_STR;
                        break;
                }
            }
            $this->stmt->bindValue($parametro, $valor, $tipo);
        }

        public function execute(){

            return $this->stmt->execute();

        }
        

        public function registers(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }
        
        public function register(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }
        
        public function fetch() {
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }
    
        public function rowCount() {
            return $this->stmt->rowCount();
        }


    }


?>