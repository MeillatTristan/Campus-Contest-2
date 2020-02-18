<!DOCTYPE HTML>
<html>
	<head>
		<title>Mangas ++</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
		<?php
		session_start();
		?>
	<!-- Header -->
		<header id="header">
			<div class="logo"><a href="#">Mangas ++</a></div>
		</header>

	<!-- Main -->
		<section id="main">
			<div class="inner">

			<!-- One -->
			<!-- page de creation de compte avec appel du formulaire d'inscription -->
				<section id="one" class="wrapper style1">
				<?php include 'inscription.php'?>
				</section>
			</div>
		</section>

	<!-- Footer -->
		<footer id="footer">
		</footer>
	</body>
</html>