<!DOCTYPE HTML>
<!--
	Caminar by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>mangas ++</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/profil.css"/>
	</head>
	<body>
		<?php
		session_start();
		?>

		<!-- Header -->
		<header id="header">
			<div class="logo"><a href="#">page profil</a></div>
		</header>

		<!-- Main -->
		<section id="main">
			<div class="inner">

			<!-- One -->
			<!-- page profil utilisateur avec appel du script myAccount -->
				<section id="one" class="wrapperStyle1">
					<?php include 'header.php' ?>
					<?php include 'myAccount.php' ?>
					<div class="biblioLink">
						<a href="bibliotheque.php">Aller à la bibliothèque</a>
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