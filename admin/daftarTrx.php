<?php 
    // Menghubungkan ke halaman functions
  
  require ('function.php');
  


    if(isset($_GET['page'])){
        // menangkap data berdasarkan id
        $kode_trx = $_GET["notrx"];
        if ( deletetrx($noTrx)> 0 ) {
            echo "
                    <script>
                        alert('Data berhasil dihapus!');
                        document.location.href = 'daftarTrx.php';
                    </script>
                ";
            } else { echo "
                    <script>
                        alert('Data gagal dihapus!');
                        document.location.href = 'daftarTrx.php';
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

  <title>Admin | Victorious</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <header class="header dark-bg">
      <!--logo start-->
      <a href="AdminPage.php" class="logo">VICTORIOUS <span class="lite">Admin</span></a>
      <!--logo end-->
      

      <div class="top-nav notification-row">
          
      <a class="btn btn-primary btn-lg" href="updateStatusTrx.php">Kembali</a>
        
      </div>

    </header>
   
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i>Data Produk</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="AdminPage.php">Home</a></li>
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
              
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i> kode</th>
                    <th><i class="icon_table"></i> id_produk</th>
                    <th><i class="icon_pin_alt"></i> jumlah_beli</th>
                    <th><i class="icon_calendar"></i> tanggal_beli</th>
                    <th><i class="icon_mail_alt"></i> total_bayar</th>
                    <th><i class="icon_mail_alt"></i> status</th>
                    
                  </tr>
                  <?php
                    require('../koneksi.php');
                    $sql  = "SELECT * FROM transaksiAdmin";
                    $query  = mysqli_query($db_con, $sql);
                    
                    WHILE ($data = mysqli_fetch_array($query)){
                      
                  ?>
                  <tr>
                    
                    <td><?php echo $data["kode"]; ?></td>
                    <td><?php echo $data["nama_produk"]; ?></td>
                    <td><?php echo $data["jumlah_beli"]; ?></td>
                    <td><?php echo $data["tanggal_beli"]; ?></td>
                    <td>Rp <?php echo $data["total_bayar"]; ?></td>
                    <td><?php echo $data["status"]; ?></td>
                    
                  </tr>
                  <?php } ?>

                  <?php
                    require('../koneksi.php');
                    $sql  = "SELECT total_pemasukan();";
                    $query  = mysqli_query($db_con, $sql);
    
                    WHILE ($data = mysqli_fetch_array($query)){
                      
                  ?>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>Total Pemasukan :</td>
                      <td><?php echo $data["total_pemasukan()"]; ?></td>
                      <td></td>
                  </tr>
                  <?php } ?>
                  
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
          Designed by Silvia </a>
        </div>
    </div>
  </section>


</body>

</html>
