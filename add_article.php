<?php


include_once 'api/config/database.php';

$database = new Database();
$db = $database->getConnection();


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

                    <li ><a  href="edit_panel.php">Edytuj artykuły</a></li>
                    <li class="current"><a  href="edit_panel.php">Dodaj artykuł</a></li>

                </ul>
            </nav>

        </header>
    </div>

    <!-- Banner -->


    <!-- Features -->
    <div id="features-wrapper">
        <div class="container">
            <div class="row">
                <div  class="col-8">
                    <h2>Dodaj artykuł:</h2>
                    <form  method="POST" action="upload.php"; enctype="multipart/form-data" class="cta">
                        <input type="hidden"  name="id" id="id" value= "X" />
                        <input type="hidden"  name="table" id="table" value= "authors" />
                        <input required maxlength="256" type="text" name="title" id="title" placeholder="Tytuł"/>
                        <input required maxlength="130" type="text" name="header" id="header" placeholder="Nagłówek"/>
                        <textarea required type="text" name="text" id="text" placeholder="Tekst"></textarea>
                        <select name="authors[]" id="authors" multiple>
                            <?php
                            $query = "SELECT id, name, surname FROM authors ;";
                            $stmt = $database->conn->prepare($query);
                            $stmt->execute();
                            $num = $stmt->rowCount();

                            if ($num > 0) {


                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option value='.$row['id'].'>'.$row['name'].' '.$row['surname'].'</option>';
                            }

                            }
                            ?>
                        </select>
                        <input type="submit" class="button" value="Dodaj" name="add_article"/>
                    </form>
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

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
