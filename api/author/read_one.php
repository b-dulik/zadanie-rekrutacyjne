<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../objects/author.php';

$database = new Database();
$db = $database->getConnection();

$author = new Author($db);

$author->id = isset($_GET['id']) ? $_GET['id'] : die();

$author->readOne();

if($author->name!=null){
    $author_arr = array(
        "id" =>  $author->id,
        "name" => $author->name,
        "surname" => $author->surname,
        "mail" => $author->mail,

    );

    http_response_code(200);

    echo json_encode($author_arr);
}

else{
    http_response_code(404);

    echo json_encode(array("message" => "Author doesn't exist."));
}
?>
