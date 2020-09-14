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
								<h1><a href="index.php">Zadanie Rekrutacyjne</a></h1><BR>
								<span>wykonał Bartłomiej Dulik</span>
							</div>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li class="current"><a href="index.php">Strona główna</a></li>
									<li><a href="edit_panel.php">Edytuj artykuły</a></li>
                                    <li><a  href="edit_panel.php">Dodaj artykuł</a></li>
								</ul>
							</nav>

					</header>
				</div>


			<!-- Features -->
				<div id="features-wrapper">
					<div class="container">
						<div class="row">

                            <?php

                            $query = "SELECT * FROM articles ORDER BY date_created DESC ;";
                            $stmt = $database->conn->prepare($query);
                            $stmt->execute();
                            $num = $stmt->rowCount();

                            if ($num > 0) {


                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo <<<EOT
                                    <div class="col-4 col-12-medium">

                                        <!-- Box -->
                                            <section class="box feature">
                                                <div class="inner">
                                                    <header>
                                                        <h2>{$row['title']}</h2>
                                                        <h5>{$row['date_created']}</h5>
                                                    </header>
                                                    <p style="">{$row['header']}</p>   <br>
                                                    <a href="show.php?id={$row['id']}" class="button   " bis_skin_checked="1">Więcej..</a>                                              
                                                </div>
                                            </section>

                                    </div>
EOT;
            }
        }
?>

						</div>
					</div>
				</div>



			<!-- Footer -->
				<div id="footer-wrapper">
					<footer id="footer" class="container">
							<div class="col-12">
								<div id="copyright">
									<ul class="menu">
                                        <li>Treść artykułów jest własnością portalu <a href="https://www.meczyki.pl/">meczyki.pl</a> , zostały użyte jako przykładowa treść zadania.</li>
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
