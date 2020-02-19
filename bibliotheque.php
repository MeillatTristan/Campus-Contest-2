<!DOCTYPE HTML>
<html>
	<head>
		<title>Mangas++</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/bibliotheque.css" />
	</head>
	<body>
	<?php session_start(); ?>
		<!-- Main -->
			<section id="main">
				<div class="inner">
				<!-- One -->
				<!-- page bibliotheque avec la liste des series disponible et inclusion du header et du fichier location -->
					<section id="one" class="wrapper style1">
					<h3>Bibliothèque : location</h3>
					<p> <?php include "header.php"?> </p>
					<?php include "location.php"?>
					</section>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
					</ul>
				</div>
				<div class="copyright">
					&copy; Untitled. All rights reserved. Images <a href="https://unsplash.com">Unsplash</a> Design <a href="https://templated.co">TEMPLATED</a>
				</div>
			</footer>
	</body>
</html>