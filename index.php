<!DOCTYPE HTML>
<!-- page d'accueil du site  -->
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" type="image/png" href="images/logo.png" />
		<title>manga++</title>
	</head>
	<body>
		<?php 	session_start(); ?>
		<!-- Header -->
			<header id="header">
				<div class="logo">
					<img src="images/Logo.PNG" width="200" height="200" alt="">

				</div>
			</header>

		<!-- Main -->
			<section id="main">
				<div class="inner">

				<!-- One -->
					<section id="one" class="wrapper style1">
						<header class="special">
							<h2>LOUEZ VOS MANGA</h2>
							<p>et à petit prix !</p>
							<!-- appel du header pour le menu de connexion -->
							<p><?php include 'header.php' ?></p>

						</header>
						<?php
						if (!isset($_SESSION['id'])){
							?>
							<p><?php include 'connexion.php'?></p>
							<?php
						}
						?>
					</section>

				<!-- Two -->
					<section id="two" class="wrapper style2">
						<header>
							<h2>Nouveautés</h2>
							<p>Une série qui monte</p>
						</header>
						<div class="content">
							<div class="gallery">
								<div>
									<div class="image fit flush">
										<a href="images/pic03.jpg"><img src="images/pic03.jpg" alt="" /></a>
									</div>
								</div>
								<div>
									<div class="image fit flush">
										<a href="images/pic01.jpg"><img src="images/pic01.jpg" alt="" /></a>
									</div>
								</div>
								<div>
									<div class="image fit flush">
										<a href="images/pic04.jpg"><img src="images/pic04.jpg" alt="" /></a>
									</div>
								</div>
								<div>
									<div class="image fit flush">
										<a href="images/pic05.jpg"><img src="images/pic05.jpg" alt="" /></a>
									</div>
								</div>
							</div>
						</div>
					</section>

				<!-- Three -->
					<section id="three" class="wrapper">
						<div class="spotlight">
							<div class="image flush"><img src="images/pic06.jpg" alt="" /></div>
							<div class="inner">
								<h3>World's End Harem</h3>
							</div>
						</div>
						<div class="spotlight alt">
							<div class="image flush"><img src="images/pic07.jpg" alt="" /></div>
							<div  class="inner">
								<h3>One Piece</h3>
							</div>
						</div>
						<div class="spotlight">
							<div class="image flush"><img src="images/pic08.jpg" alt="" /></div>
							<div class="inner">
								<h3>One Piece</h3>
							</div>
						</div>
					</section>

				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container" >
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

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>