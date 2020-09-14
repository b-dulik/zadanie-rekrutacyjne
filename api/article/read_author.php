<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/article.php';

$database = new Database();
$db = $database->getConnection();

$article = new Article($db);

$article->author_id = isset($_GET['id']) ? $_GET['id'] : die();

$stmt = $article->read_author();
$num = $stmt->rowCount();

if($num>0){

    $articles_arr=array();
    $articles_arr["records"]=array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $article_entity=array(
            "id" => $row['id'],
            "title" => $row['title'],
            "header" => $row['header'],
            "text" => html_entity_decode($row['text']),
            "date_created" => $row['date_created'],
            "date_modified" => $row['date_modified'],
        );

        array_push($articles_arr["records"], $article_entity);
    }

    http_response_code(200);

    echo json_encode($articles_arr);
}
else{

    http_response_code(404);

    echo json_encode(
        array("message" => "No articles found.")
    );
}
