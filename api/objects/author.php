<?php

class Author{

    private $conn;
    private $table_name = "authors";

    public $id;
    public $name;
    public $surname;
    public $mail;



    public function __construct($db){
        $this->conn = $db;
    }

    function read(){

        $query = "SELECT
               *
            FROM
                " . $this->table_name . " a
            ORDER BY
                a.id ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function readOne(){


        $query = "SELECT
               *
            FROM
                " . $this->table_name . " a
            WHERE
                a.id = ?";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->surname = $row['surname'];
        $this->mail = $row['mail'];


    }

    function readTop3(){



        $query = "SELECT
                  " . $this->table_name . ".*, COUNT(*) AS written_articles 
                  FROM
                  " . $this->table_name . "
                  JOIN credits ON " . $this->table_name . ".id = credits.author_id
                  GROUP BY author_id 
                  ORDER BY written_articles DESC
                  LIMIT 3";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;

    }




}
?>
