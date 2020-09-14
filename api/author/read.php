<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/author.php';

$database = new Database();
$db = $database->getConnection();

$author = new Author($db);

$stmt = $author->read();
$num = $stmt->rowCount();

if($num>0){

    $authors_arr=array();
    $authors_arr["records"]=array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $author_entity=array(
            "id" => $row['id'],
            "name" => $row['name'],
            "surname" => $row['surname'],
            "mail" => $row['mail'],

        );

        array_push($authors_arr["records"], $author_entity);
    }
    //success
    http_response_code(200);

    echo json_encode($authors_arr);
}
else{
    //fail
    http_response_code(404);

    echo json_encode(
        array("message" => "No authors found.")
    );
}
