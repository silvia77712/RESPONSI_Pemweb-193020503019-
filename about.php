<?php
     // Menghubungkan ke file functions
    require ('admin/function.php');
    
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Victorious-logo - About Page</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
    <link href="css/all.min.css" rel="stylesheet" />
	<link href="css/templatemo-style.css" rel="stylesheet" />
</head>
<body> 

	<div class="container">
	<!-- Top box -->
		<!-- Logo & Site Name -->
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="img/simple-house-01.jpg">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<img src="img/Victorious-logo.png" alt="Logo" class="tm-site-logo" />
						</div>
						<nav class="col-md-6 col-12 tm-nav">
							<ul class="tm-nav-ul">
								<li class="tm-nav-li"><a href="userPage.php" class="tm-nav-link">Home</a></li>
								<li class="tm-nav-li"><a href="about.php" class="tm-nav-link active">About</a></li>
								<li class="tm-nav-li"><a href="index.php" class="tm-nav-link">Logout</a></li>
							</ul>
						</nav>	
					</div>
				</div>
			</div>
		</div>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">VICTORIOUS </h2>
				<p class="col-12 text-center"> VICTORIOUS web merupakan fitur buku menu baru dari cafe Victorious dimana pelanggan dapat melihat menu 
					hanya dengan mengakses web, Pelanggan dapat memesan menu yang akan di beli dengan memasukkan menu ke cart.</p>
			</header>

			<center>

			<div class="tm-container-inner tm-persons">
				
					<article class="col-lg-6">
						
							<img width="300px" src="img/silvia.jpeg" alt="Image" class="img-fluid tm-person-img" />
							<figcaption class="tm-person-description"></figcaption>
								<h4 class="tm-person-name">Silvia Siladevi Gosal</h4>
								<p class="tm-person-title">Founder and CEO</p>
								<p class="tm-person-about" > Semua orang adalah pemenang dan mereka berhak mendapat yang terbaik</p>
								<div>
									<a href="https://web.facebook.com/silvia.s.devi.104" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
									<a href="https://twitter.com" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
									<a href="https://www.instagram.com/silvia.777/" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
								</div>
							</figcaption>
						
					</article>
					
			</div>

			</center>

			<div class="tm-container-inner tm-featured-image">
				<div class="row">
					<div class="col-12">
						<div class="placeholder-2">
							<div class="parallax-window-2" data-parallax="scroll" data-image-src="img/about-05.jpg"></div>		
						</div>
					</div>
				</div>
			</div>
			<div class="tm-container-inner tm-features">
				
			</div>
			<div class="tm-container-inner tm-history">
				<div class="row">
					<div class="col-12">
						<div class="tm-history-inner">
							<img src="img/about-06.jpg" alt="Image" class="img-fluid tm-history-img" />
							<div class="tm-history-text"> 
								<h4 class="tm-history-title">TOP MENU</h4>
								<p class="tm-mb-p"></p>
								<p></p>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</main>

		<footer class="tm-footer text-center">
			<p>Copyright &copy; 2021 Silvia 
            
            | Design: Silvia</a></p>
		</footer>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
</body>
</html>