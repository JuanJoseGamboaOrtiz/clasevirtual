<?php
    namespace App;
    
    class Connect{
        public $con;
        function __construct(){
            try {
                $this->con= new \PDO($_ENV['DNS']. ":host=" . $_ENV['HOST'] . ";dbname=" . $_ENV['DBNAME'] . ";user=" . $_ENV['USER'] . ";password=" . $_ENV['PASSWORD']. ";port=" . $_ENV['PORT']);

                $this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            }catch (\PDOException $e){
                echo $e;
            }

            return $this->con;
        }
    }
?>