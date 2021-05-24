<?php
     // Menghubungkan ke file functions
    require 'function.php';
   
    // koneksi ke database
    
    // cek apakah tombol submit sudah ditekan atau belum
    if ( isset($_POST["submit"]) ) {

        // cek apakah data berhasil ditambahkan atau tidak
        if ( insertProduk($_POST, $_FILES) > 0)
        {
            echo "
                <script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'AdminPage.php';
                </script>
            ";
        } else echo "
                <script>
                    alert('Data gagal ditambahkan!');
                    document.location.href = 'AdminPage.php';
                </script>
            ";
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
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Victorious</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/daterangepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-colorpicker.css" rel="stylesheet" />
  <!-- date picker -->

  <!-- color picker -->

  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  
</head>

<body>

  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <header class="header dark-bg">
      <a href="AdminPage.php" class="logo">VICTORIOUS <span class="lite">Admin</span></a>
     
      <div class="top-nav notification-row">
        
        <ul class="nav pull-right top-menu">
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="AdminPage.php">
                            
                            <span class="username">KEMBALI</span>
                            <b class="caret"></b>
             </a>
          </li>
         
        </ul>
      </div>
    </header>
    <!--header end-->

    

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i>Tambah Data Produk</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="AdminPage.php">Home</a></li>

              <li><i class="fa fa-th-list"></i>Tambah Data</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Tambah Data Produk
              </header>
              <div class="panel-body">
                <form role="form" action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" id="exampleInputEmail1" placeholder="Nama Produk" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis</label>
                    <select id="exampleInputEmail1" class="form-control" name="jenis" placeholder="Jenis">
                        <option selected>Choose</option>
                                <option>makanan</option>
                                <option>minuman</option>
                                <option>dessert</option>
                       
                    </select>
                    <!-- <input type="text" name="jenis" class="form-control" id="exampleInputEmail1" placeholder="Jenis"> -->
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Deskripsi</label>
                    <input type="text" name="desc" class="form-control" id="exampleInputEmail1" placeholder="Deskripsi" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga</label>
                    <input type="number" name="harga_produk" class="form-control" id="exampleInputPassword1" placeholder="Harga" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Unggah Foto</label>
                    <input type="file" name="foto_produk">
                    
                  </div>
                  
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>

              </div>
            </section>
          </div>
        </div>
      </section>
    
  
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

  <!-- jquery ui -->
  <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom checkbox & radio-->
  <script type="text/javascript" src="js/ga.js"></script>
  <!--custom switch-->
  <script src="js/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="js/jquery.tagsinput.js"></script>

  <!-- colorpicker -->

  <!-- bootstrap-wysiwyg -->
  <script src="js/jquery.hotkeys.js"></script>
  <script src="js/bootstrap-wysiwyg.js"></script>
  <script src="js/bootstrap-wysiwyg-custom.js"></script>
  <script src="js/moment.js"></script>
  <script src="js/bootstrap-colorpicker.js"></script>
  <script src="js/daterangepicker.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="js/scripts.js"></script>


</body>

</html>
