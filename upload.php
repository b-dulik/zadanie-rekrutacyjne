<?php


include 'api/config/database.php';

$database = new Database();
$db = $database->getConnection();


$id = $_POST['id'];

//delete article and credits
if(!empty($_POST['delete'])){
    $query = "DELETE FROM articles WHERE id={$id}";
    $stmt = $database->conn->prepare($query);
    $stmt->execute();

    $query = "DELETE FROM credits WHERE article_id={$id}";
    $stmt = $database->conn->prepare($query);
    $stmt->execute();

}

if(!empty($_POST['add_article'])){
    //Add article
    $query = "INSERT INTO `articles` (`id`, `title`, `header`, `text`, `date_created`, `date_modified`) VALUES (NULL, '{$_POST['title']}', '{$_POST['header']}', '{$_POST['text']}', current_timestamp(), current_timestamp());";
    echo $query;
    $stmt = $database->conn->prepare($query);
    $stmt->execute();

    //Get id from added article
    $last_id = $db->lastInsertId();

    //add authors to article
    foreach ($_POST['authors'] as $selectedAuthor) {
        $query = "INSERT INTO `credits` (`article_id`, `author_id`) VALUES ('$last_id', '$selectedAuthor'); ";
        $stmt = $database->conn->prepare($query);
        $stmt->execute();
        echo $query;
    }
}

if(!empty($_POST['edit_article'])){
    //Add article
    $query = "UPDATE `articles` SET `title` = '{$_POST['title']}', `header` = '{$_POST['header']}', `text` = '{$_POST['text']}', `date_modified` = current_timestamp() WHERE `articles`.`id` = {$id};";
    echo $query;
    $stmt = $database->conn->prepare($query);
    $stmt->execute();


    //delete current authors
    $query = "DELETE FROM credits WHERE article_id={$id}";
    $stmt = $database->conn->prepare($query);
    $stmt->execute();
    echo $query;


    //add authors to article
    foreach ($_POST['authors'] as $selectedAuthor) {
        $query = "INSERT INTO `credits` (`article_id`, `author_id`) VALUES ('$id', '$selectedAuthor'); ";
        $stmt = $database->conn->prepare($query);
        $stmt->execute();
        echo $query;
    }
}




header('Location: edit_panel.php')

?>
