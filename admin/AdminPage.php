<?php 
    // Menghubungkan ke halaman functions
  
  require ('function.php');
  


    if(isset($_GET['page'])){
        // menangkap data berdasarkan id
        $id_produk = $_GET["id"];
        if ( deleteProduk($id_produk)> 0 ) {
            echo "
                    <script>
                        alert('Data berhasil dihapus!');
                        document.location.href = 'AdminPage.php';
                    </script>
                ";
            } else { echo "
                    <script>
                        alert('Data gagal dihapus!');
                        document.location.href = 'AdminPage.php';
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
      <a class="btn btn-primary btn-lg" href="updateStatusTrx.php">Daftar transaksi</a>
      <a class="btn btn-danger btn-lg" href="../index.php">Logout</a>
          
        
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
              <a class="btn btn-primary btn-lg" href="tambahProduk.php">Tambah Data</a>
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i> No</th>
                    <th><i class="icon_profile"></i> id_produk</th>
                    <th><i class="icon_calendar"></i> Nama Produk</th>
                    <th><i class="icon_table"></i> Jenis</th>
                    <th><i class="icon_profile"></i> Deskripsi</th>
                    <th><i class="icon_mail_alt"></i> Harga</th>
                    <th><i class="icon_pin_alt"></i> Gambar Produk</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                  <?php
                    require('../koneksi.php');
                    $sql  = "SELECT * FROM produk";
                    $query  = mysqli_query($db_con, $sql);
                    $no=0;
                    WHILE ($data = mysqli_fetch_array($query)){
                      $no++;
                  ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data["id_produk"]; ?></td>
                    <td><?php echo $data["nama_produk"]; ?></td>
                    <td><?php echo $data["jenis"]; ?></td>
                    <td><?php echo $data["deskripsi"]; ?></td>
                    <td>Rp <?php echo $data["harga"]; ?></td>
                    <td><img width="150px" src="../images/<?php echo $data["gambar"]; ?>"></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="updateProduk.php?id=<?php echo $data["id_produk"]; ?>"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-danger" href="AdminPage.php?page=&id=<?php echo $data["id_produk"]; ?>" onclick="return confirm('Data ini akan dihapus');"><i class="icon_close_alt2"></i></a>
                        </div>
                    </td>
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
