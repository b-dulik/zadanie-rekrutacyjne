<?php

if(!isset($_GET['id'])) {
    header('Location: edit_panel.php');
    exit;
}
include_once 'api/config/database.php';

$database = new Database();
$db = $database->getConnection();

//get article data
$query = "SELECT * FROM articles WHERE id = ".$_GET['id']." ;";
$stmt = $database->conn->prepare($query);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

//get article authors for selection
$queryGetAuthor = "SELECT author_id FROM credits WHERE article_id = ".$_GET['id'].";";
$stmt = $database->conn->prepare($queryGetAuthor);
$stmt->execute();
$authors = [];

$i = 0;

while( $row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $authors[$i] = $row['author_id']; // Inside while loop
    $i++;
}






?>

<!DOCTYPE HTML>

<html>
<head>
    <title>Zadanie Rekrutacyjne</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="assets/css/main.css?ts=<?=time()?>" />

</head>
<body class="is-preload homepage">
<div id="page-wrapper">

    <!-- Header -->
    <div id="header-wrapper">
        <header id="header" class="container">

            <!-- Logo -->
            <div id="logo">
                <h1><a href="index.php">Zadanie Rekrutacyjne</a></h1>
            </div>

            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li><a href="index.php">Strona główna</a></li>

                    <li><a  href="edit_panel.php">Edytuj artykuły</a></li>
                    <li><a  href="edit_panel.php">Dodaj artykuł</a></li>

                </ul>
            </nav>

        </header>
    </div>

    <!-- Banner -->


    <!-- Features -->
    <div id="features-wrapper">
        <div class="container">
            <div class="row">
                <div  class="col-8 col-12-medium">
                    <h2><?php echo $result['title'] ?></h2>
                    <h5>Utworzono: <?php echo $result['date_created'] ?> Ostatnia modyfikacja: <?php echo $result['date_modified'] ?> </h5>
                    <p>Utworzono: <?php echo $result['text'] ?></p>

                </div>
                <div class="col-4 col-12-medium">
                    <div id="sidebar">
                    <h3>Autorzy:</h3>
                    <?php
                        $query = "SELECT id, name, surname FROM authors ;";
                        $stmt = $database->conn->prepare($query);
                        $stmt->execute();
                        $num = $stmt->rowCount();


                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    if (in_array($row['id'], $authors)){
                                        echo '<h4>'.$row['name'].' '.$row['surname'].'</h4>';
                                    }
                                }
                    ?>
                    </div>
                </div>

            </div>
        </div>


        <!-- Footer -->
        <div id="footer-wrapper">
            <footer id="footer" class="container">
                <div class="col-12">
                    <div id="copyright">
                        <ul class="menu">
                            <li>Wykonał: Bartłomiej Dulik</li>
                        </ul>
                    </div>
                </div>
        </div>
        </footer>
    </div>

</div>

<!-- Scripts -->

<!--<script src="assets/js/jquery.min.js"></script>-->
<!--<script src="assets/js/jquery.dropotron.min.js"></script>-->
<!--<script src="assets/js/browser.min.js"></script>-->
<!--<script src="assets/js/breakpoints.min.js"></script>-->
<!--<script src="assets/js/util.js"></script>-->
<!--<script src="assets/js/main.js"></script>-->

</body>
</html>
