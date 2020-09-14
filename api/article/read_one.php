<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../objects/article.php';

$database = new Database();
$db = $database->getConnection();

$article = new Article($db);

$article->id = isset($_GET['id']) ? $_GET['id'] : die();

$article->readOne();

if($article->title!=null){

    $article_arr = array(
        "id" =>  $article->id,
        "title" => $article->title,
        "header" => $article->header,
        "text" => $article->text,
        "date_created" => $article->date_created,
        "date_modified" => $article->date_modified,

    );

    http_response_code(200);

    echo json_encode($article_arr);
}

else{
    http_response_code(404);

    echo json_encode(array("message" => "Article doesn't exist."));
}
?>
