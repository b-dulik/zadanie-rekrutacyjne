<?php


class Database{

    public $conn;

    public function getConnection(){

        $config = parse_ini_file('db.ini');

        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $config['host'] . ";dbname=" . $config['db_name'], $config['username'], $config['password']);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
