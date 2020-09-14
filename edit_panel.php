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

                    <li class="current"><a  href="edit_panel.php">Edytuj artykuły</a></li>
                    <li ><a  href="add_article.php">Dodaj artykuł</a></li>

                </ul>
            </nav>

        </header>
    </div>

    <!-- Banner -->


    <!-- Features -->
    <div id="features-wrapper">
        <div class="container">
            <div class="row">
                <table >
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tytuł</th>
                        <th>Utworzono</th>
                        <th>Zmodyfikowano</th>
                        <th></th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                <?php

                $query = "SELECT * FROM articles ;";
                $stmt = $database->conn->prepare($query);
                $stmt->execute();
                $num = $stmt->rowCount();

                if ($num > 0) {


                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo <<<EOT
                                        
                                        
                                         <tr>
                                             <td>{$row['id']}</td>
                                             <td><strong>{$row['title']}</strong></td>
                                             <td>{$row['date_created']}</td>
                                             <td>{$row['date_modified']} </td>
                                             <td>  
                                                <a href="edit_article.php?id={$row['id']}" class="button">Edytuj</a>                                                                                         
                                             </td>
                                             <td>
                                                <form style="margin-bottom: 0px" method="POST" action="upload.php"; enctype="multipart/form-data" class="cta">
                                                   <input style="font-size: 15pt" type="hidden" name="id" id="id" value="{$row['id']}" />
                                                   <input style="font-size: 15pt" type="hidden" name="table" id="table" value="articles" />    
                                                   <input type="submit" value="Usuń"  name="delete" class="button"  onclick="return confirm('Czy napewno chcesz usunąć artykuł?')" />
                                                </form>
                                             </td>
                                         </tr>
                                         
                                       
EOT;
                        }
                    }
                ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>


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
