<?php
     // Menghubungkan ke file functions
    require ('admin/function.php');
    session_start(); 
    
    // koneksi ke database
    if(isset($_GET['page'])){
        // menangkap data berdasarkan id
        $id_produk = $_GET["id"];
		$id_user = $_SESSION['sesi_id'];
        if ( insertCart($id_produk,$id_user)> 0 ) {
            echo "
                    <script>
                        alert('Data berhasil ditambahkan ke keranjang!');
                        document.location.href = 'userPage.php';
                    </script>
                ";
            } else { echo "
                    <script>
                        alert('Data gagal ditambahkan ke keranjang!');
                        document.location.href = 'userPage.php';
                    </script>
                ";
            }
    }
    
   
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Victorious</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />    
	<link href="fontawesome/css/all.css" rel="stylesheet">
	<link href="css/templatemo-style.css" rel="stylesheet" />
	<link href="admin/css/bootstrap.min.css" rel="stylesheet">
	<style>
	.btn_style{
		border: 1px solid #cecece;
		border-radius: 3px;
		padding: 3px 10px;
		box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
		color: white;
		background-color: #009933;
	}
	.btn_style:hover{
		border: 1px solid #b1b1b1;
		box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
		background-color: #33cc33;
	}
	</style>
	
</head>

<body> 

	<div class="container">
	<!-- Top box -->
		<!-- Logo dan nama website -->
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="img/cafeVic.jpg">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<img src="img/Victorious-logo.png" alt="Logo" class="tm-site-logo" />
						</div>
						<nav class="col-md-6 col-12 tm-nav">
							<ul class="tm-nav-ul">
								<li class="tm-nav-li"><a href="userPage.php" class="tm-nav-link active">Home</a></li>
								<li class="tm-nav-li"><a href="about.php" class="tm-nav-link">About</a></li>
								<li class="tm-nav-li"><a href="index.php" class="tm-nav-link">Logout</a></li>
							</ul>
						</nav>	
					</div>
				</div>
			</div>
		</div>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Welcome to Victorious</h2>
				<p class="col-12 text-center">You deserve Eat The Best Food <br>Good Food, Good Mood</p>
				</br></br></br></br>
				<p class="col-12 text-center">
				<button type="button" class="btn_style" ><a class="btn btn-success" style="color:white" href="cart.php" ><i class="fas fa-shopping-cart fa-2x"></i></br>Your Cart</a></button> 
				</p>
			</header>
			
			<div class="tm-paging-links">
				<nav>
					<ul>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link active">Foods</a></li>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link">Drinks</a></li>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link">Desserts</a></li>
					</ul>
				</nav>
			</div>
			<!-- gallery -->
			<div class="row tm-gallery">
				<!-- gallery page 1 -->
				<div id="tm-gallery-page-foods" class="tm-gallery-page">
					<?php
						require('koneksi.php');
						$sql	= "SELECT * FROM produk WHERE jenis= 'makanan'";
						$query  = mysqli_query($db_con, $sql);
						WHILE ($data = mysqli_fetch_array($query)){
					?>
					<div class="col-md-4 text-center animate-box">
						<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
							<figure>
								<img width="150px" src="images/<?php echo $data["gambar"]; ?>" alt="Image" class="img-fluid tm-gallery-img" />
								
								<figcaption>
								<button type="button" class="btn_style" >
									<a style="color:white" href="userPage.php?page=&id=<?php echo $data["id_produk"]; ?>" onclick="return confirm('Data ini akan ditambahkan ke keranjang');"><i class="fas fa-cart-plus"></i></a>
								</button>
									<h4 class="tm-gallery-title"><br><?php echo $data["nama_produk"]; ?></h4>
									<p class="tm-gallery-description"><?php echo $data["deskripsi"]; ?></p>
									<p class="tm-gallery-price">Rp<?php echo $data["harga"]; ?>,00</p>
									
								</figcaption>
							</figure>
						</article>
					</div>
					<?php } ?>	
				</div>

				<!-- gallery page 2 -->
				<div id="tm-gallery-page-drinks" class="tm-gallery-page hidden">
					<?php
						require('koneksi.php');
						$sql	= "SELECT * FROM produk WHERE jenis= 'minuman'";
						$query  = mysqli_query($db_con, $sql);
						WHILE ($data = mysqli_fetch_array($query)){
					?>
					<div class="col-md-4 text-center animate-box">
						<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
							<figure>
								<img width="150px" src="images/<?php echo $data["gambar"]; ?>" alt="Image" class="img-fluid tm-gallery-img" />
								<figcaption>
								<button type="button" class="btn_style" >
									<a style="color:white" href="userPage.php?page=&id=<?php echo $data["id_produk"]; ?>" onclick="return confirm('Data ini akan ditambahkan ke keranjang');"><i class="fas fa-cart-plus"></i></a>
								</button>
									<h4 class="tm-gallery-title"></br><?php echo $data["nama_produk"]; ?></h4>
									<p class="tm-gallery-description"><?php echo $data["deskripsi"]; ?></p>
									<p class="tm-gallery-price">Rp<?php echo $data["harga"]; ?>,00</p>
									
								</figcaption>
							</figure>
						</article>
					</div>
					<?php } ?>	
				</div>

				<!-- gallery page 3 -->
				<div id="tm-gallery-page-desserts" class="tm-gallery-page hidden">
					<?php
						require('koneksi.php');
						$sql	= "SELECT * FROM produk WHERE jenis= 'dessert'";
						$query  = mysqli_query($db_con, $sql);
						WHILE ($data = mysqli_fetch_array($query)){
					?>
					<div class="col-md-4 text-center animate-box">
						<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
							<figure>
								<img width="150px" src="images/<?php echo $data["gambar"]; ?>" alt="Image" class="img-fluid tm-gallery-img" />
								<figcaption>
								<button type="button" class="btn_style" >
									<a style="color:white" href="userPage.php?page=&id=<?php echo $data["id_produk"]; ?>" onclick="return confirm('Data ini akan ditambahkan ke keranjang');"><i class="fas fa-cart-plus"></i></a>
								</button>
									<h4 class="tm-gallery-title"></br><?php echo $data["nama_produk"]; ?></h4>
									<p class="tm-gallery-description"><?php echo $data["deskripsi"]; ?></p>
									<p class="tm-gallery-price">Rp<?php echo $data["harga"]; ?>,00</p>
								
								</figcaption>
							</figure>
						</article>
					</div>
					<?php } ?>	
				</div>




			</div>

		</main>

		<footer class="tm-footer text-center">
			<p>Copyright &copy; Silvia Siladevi Gosal</p>
		</footer>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
	<script>
		$(document).ready(function(){
			// Handle click on paging links
			$('.tm-paging-link').click(function(e){
				e.preventDefault();
				
				var page = $(this).text().toLowerCase();
				$('.tm-gallery-page').addClass('hidden');
				$('#tm-gallery-page-' + page).removeClass('hidden');
				$('.tm-paging-link').removeClass('active');
				$(this).addClass("active");
			});
		});
	</script>
</body>
</html>