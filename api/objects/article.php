<?php

class Article{

    private $conn;
    private $table_name = "articles";

    public $id;
    public $title;
    public $header;
    public $text;
    public $date_created;
    public $date_modified;
    public $author_id;



    public function __construct($db){
        $this->conn = $db;
    }

    function read(){

        $query = "SELECT
                   *
                  FROM
                   " . $this->table_name . " a
                  ORDER BY
                  a.date_created DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function read_author(){


        $query = "SELECT
                    " . $this->table_name . ".*
                  FROM
                    " . $this->table_name . "
                      JOIN credits ON " . $this->table_name . ".id = credits.article_id
                  WHERE
                      credits.author_id = ?";

        echo $query;

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->author_id);
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

        $this->title = $row['title'];
        $this->header = $row['header'];
        $this->text = $row['text'];
        $this->date_created = $row['date_created'];
        $this->date_modified = $row['date_modified'];

    }



}
?>
