<?php 
    // Menghubungkan ke halaman functions
  
  require ('admin/function.php');
  session_start();
  
  

     $id_user = $_SESSION['sesi_id'];
  
  if(isset($_GET['page'])){
    // menangkap data berdasarkan id
    $kode_cart = $_GET["kode"];
    if ( konfirmasi($kode_cart, $id_user)> 0 ) {
        echo "
                <script>
                    alert('Pesanan telah dibuat ! Silahkan Melakukan Pembayaran di kasir terdekat..');
                    document.location.href = 'cart.php';
                </script>
            ";
        } else { echo "
                <script>
                    alert('pesanan gagal di buat!');
                    document.location.href = 'cart.php';
                </script>
            ";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="../logo_jasuke.png">

  <title>Victorious</title>

  <!-- Bootstrap CSS -->
  <link href="admin/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="admin/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="admin/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="admin/css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="admin/css/style.css" rel="stylesheet">
  <link href="admin/css/style-responsive.css" rel="stylesheet" />

  
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Silvia" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="AdminPage.php" class="logo">VICTORIOUS <span class="lite">CART</span></a>
      <!--logo end-->

    </header>
    
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i>Data Produk</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="userPage.php">Home</a></li>
              <li><i class="fa fa-table"></i>Data</li>
              <li><i class="fa fa-th-list"></i>Produk</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                
              </header>
              <a class="btn btn-primary btn-lg" href="cart.php">Cancel</a>
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i> No</th>
                    <th><i class="icon_calendar"></i> Nama Produk</th>
                    <th><i class="icon_pin_alt"></i> Gambar Produk</th>
                    <th><i class="icon_pin_alt"></i> jumlah_beli</th>
                    <th><i class="icon_mail_alt"></i> total_Harga</th>
                   
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                  <?php
                    require('koneksi.php');
                    $sql  = "SELECT * FROM cart WHERE id_user = '$id_user'";
                    $query  = mysqli_query($db_con, $sql);
                    $no=0;
                   
                    WHILE ($data = mysqli_fetch_array($query)){
                      $no++;
                  ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data["nama_produk"]; ?></td>
                    <td><img width="150px" src="images/<?php echo $data["gambar"]; ?>"></td>
                    <td><?php echo $data["jumlah_beli"]; ?></td>
                    <td>Rp <?php echo $data["total_harga"]; ?></td>
                    <td>
                      <div class="btn-group">
                        <!-- <a class="btn btn-danger" href="cart.php?page=&id_cart=<?php echo $data["id_cart"]; ?>"onclick="return confirm('Data ini akan dihapus');"><i class="icon_close_alt2"></i></a> -->
                        </div>
                    </td>
                  </tr>
                  
                  <?php } ?>
                  <?php
                    require('koneksi.php');

                    if(isset($_GET["bayar"])){

                    $query = mysqli_query($db_con, "SELECT MAX(kode) AS id FROM transaksi");

                    $data = mysqli_fetch_array($query);
                    $kode = $data['id'];
                    
                    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                    // dan diubah ke integer dengan (int)
                    $urutan = (int) substr($kode, 3, 3);
                    
                    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                    $urutan++;
                    
                    // membentuk kode barang baru
                    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
                    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
                    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
                    $huruf = "TRX";
                    $kode_cart = $huruf . sprintf("%03s", $urutan);
                                    
                    
                    }
                   
                    
                    $sql  = "SELECT total_bayar('$id_user');";
                    $query  = mysqli_query($db_con, $sql);
    
                    WHILE ($data = mysqli_fetch_array($query)){
                        
                  ?>
                  <tr>
                      <td><?php echo $kode_cart;?></td>
                      <td></td>
                      <td></td>
                      <td>Total Bayar :</td>
                      <td><?php echo $data["total_bayar('$id_user')"]; ?></td>
                      <td><a class="btn btn-primary btn-lg" href="konfirmasi.php?page=&kode=<?php echo $kode_cart; ?>" onclick="return confirm('Silahkan tunggu');">Bayar</a></td>
                      
                  </tr>
                  <?php  
                   } ?>
                </tbody>
              </table>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
    <div class="text-right">
      <div class="credits">
          Designed by Silvia
        </div>
    </div>
  </section>


</body>

</html>
