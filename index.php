<?php

     // Menghubungkan ke file functions
    require 'admin/function.php';
   
    // koneksi ke database
    
    // cek apakah tombol submit sudah ditekan atau belum
    if ( isset($_POST["submit"]) ) {

        // cek apakah data berhasil ditambahkan atau tidak
        if ( insertUser($_POST) > 0)
        {
            echo "
                <script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
        } else echo "
                <script>
                    alert('Data gagal ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
    }


if(isset($_GET['login'])){
	session_start();
	
	
	//koding memanggil data inputan
	$user_input = $_POST["input_user"];
	$pass_input = $_POST["input_pass"];
	
	//koding memanggil data dari database
	$sql		= "SELECT * FROM user WHERE username='$user_input' && password='$pass_input'";
	$query		= mysqli_query($db_con, $sql);
	$dt			= mysqli_fetch_array($query);
	$db_id = $dt["id_user"];
	$nama_pengguna = $dt["nama_lengkap"];
	$db_user = $dt["username"];
	$db_pass = $dt["password"]; 
	$email = $dt["email"];
	
	if($user_input==$db_user && $pass_input==$db_pass){ 

		$_SESSION['sesi_id'] = $db_id;
		header ('location:userPage.php');
	}else if($user_input== 'admin' && $pass_input=='123'){ 

		header ('location:admin/AdminPage.php');
  }
  else if($user_input!=$db_user || $pass_input!=$db_pass){
		echo "
		<script>
			alert('Password atau Username salah!');
      document.location.href = 'index.php';
		</script>
		";
    
		header ('location:index.php');
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
  <link rel="shortcut icon" href="img/favicon.png">

  <title>VICTORIOUS | LOGIN</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  color: white; 
  max-width: 300px;
  padding: 10px;
  background-color: #555;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>

 
</head>

<body class="login-img3-body">

  <div class="container">

    <form action="index.php?login" method="POST" class="login-form" >
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input class="form-control" type="text" name="input_user" placeholder="Username" required>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input class="form-control" type="password" name="input_pass" placeholder="Password" required>
        </div>
        <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
      </div>
    </form>
    <div class="text-right">


    <button class="open-button" onclick="openForm()">Daftar</button>

    <div class="form-popup" id="myForm">
      <form action="" class="form-container" method="POST">
        <h1>Daftar</h1>

        <label for="nama"><b>Nama Lengkap</b></label>
        <input type="text" placeholder="masukkan nama anda" name="name" required>
        
        <label for="nomor hp"><b>Nomor Hp</b></label>
        <input type="text" placeholder="masukkan nomor hp anda" name="no_hp" required>
        

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="masukkan email anda" name="email" required>

        <label for="psw"><b>Username</b></label>
        <input type="text" placeholder="masukkan username anda" name="user" required>

        
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="masukkan password anda" name="psw" required>

        <button type="submit" name="submit" class="btn">Daftar</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      </form>
    </div>

    <script>
      function openForm() {
        document.getElementById("myForm").style.display = "block";
      }

      function closeForm() {
        document.getElementById("myForm").style.display = "none";
      }
    </script>



   
    
  </div>


</body>

</html>


