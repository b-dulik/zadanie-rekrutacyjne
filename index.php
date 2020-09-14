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
                                                    <a href="show/id={$row['id']}" class="button   " bis_skin_checked="1">Więcej..</a>                                              
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

			<!--&lt;!&ndash; Main &ndash;&gt;-->
				<!--<div id="main-wrapper">-->
					<!--<div class="container">-->
						<!--<div class="row gtr-200">-->
							<!--<div class="col-4 col-12-medium">-->

								<!--&lt;!&ndash; Sidebar &ndash;&gt;-->
									<!--<div id="sidebar">-->
										<!--<section class="widget thumbnails">-->
											<!--<h3>Condimentum curae</h3>-->
											<!--<div class="grid">-->
												<!--<div class="row gtr-50">-->
													<!--<div class="col-6"><a href="#" class="image fit"><img src="images/pic04.jpg" alt="" /></a></div>-->
													<!--<div class="col-6"><a href="#" class="image fit"><img src="images/pic05.jpg" alt="" /></a></div>-->
													<!--<div class="col-6"><a href="#" class="image fit"><img src="images/pic06.jpg" alt="" /></a></div>-->
													<!--<div class="col-6"><a href="#" class="image fit"><img src="images/pic07.jpg" alt="" /></a></div>-->
												<!--</div>-->
											<!--</div>-->
											<!--<a href="#" class="button icon fa-file-alt">More</a>-->
										<!--</section>-->
									<!--</div>-->

							<!--</div>-->
							<!--<div class="col-8 col-12-medium imp-medium">-->

								<!--&lt;!&ndash; Content &ndash;&gt;-->
									<!--<div id="content">-->
										<!--<section class="last">-->
											<!--<h2>Eu libero arcu sem tempus?</h2>-->
											<!--<p>Nisi ut Rutrum, col nibh sed augue parturient ipsum cras accumsan at Pellentesque et faucibus purus vel Eleifend Aliquam Consectetur nascetur, in elit duis id cep ut sit mus interdum in adipiscing commodo ata morbi enim lorem ac neque justo sociis eu magnis mi nec non suscipit</p>-->
											<!--<p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus. Praesent semper bibendum ipsum, et tristique augue fringilla eu. Vivamus id risus vel dolor auctor euismod quis eget mi. Etiam eu ante risus. Aliquam erat volutpat. Aliquam luctus mattis lectus sit amet phasellus quam turpis.</p>-->
											<!--<a href="#" class="button icon solid fa-arrow-circle-right">Continue Reading</a>-->
										<!--</section>-->
									<!--</div>-->

							<!--</div>-->
						<!--</div>-->
					<!--</div>-->
				<!--</div>-->

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
