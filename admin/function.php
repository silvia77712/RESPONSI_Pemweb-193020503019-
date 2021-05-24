<?php
	$db_host	= "localhost";
	$db_user	= "root";
	$db_pass	= "";
	$db_nama	= "belanja";
	$db_con 	= mysqli_connect($db_host, $db_user, $db_pass, $db_nama);

	

    if (!$db_con) {
        die("Connection failed: " . mysqli_connect_error());
    }

function query($query){
	global $db_con;
	$result = mysqli_query($db_con, $query);
	$datas = [];

	// mengembalikan nilai berupa array associative
	while( $data = mysqli_fetch_assoc($result) ) {
		$datas[] = $data;
	}

	return $datas;
}


function deleteProduk($id_produk){
	global $db_con;
	mysqli_query($db_con, "DELETE FROM produk WHERE id_produk ='$id_produk'");
	
	// cek apakah data berhasil dihapuskan atau tidak
	return mysqli_affected_rows($db_con);
    echo "<meta http-equiv='refresh' content='0;url=AdminPage.php'>";	
}

function deletetrx($notrx){
	global $db_con;
	mysqli_query($db_con, "DELETE FROM transaksi  WHERE no_transaksi ='$notrx'");
	
	// cek apakah data berhasil dihapuskan atau tidak
	return mysqli_affected_rows($db_con);
    echo "<meta http-equiv='refresh' content='0;url=daftarTrx.php'>";	
}

function deleteKeranjang($id_cart){
	global $db_con;
	mysqli_query($db_con, "DELETE FROM keranjang WHERE id_cart ='$id_cart'");
	
	// cek apakah data berhasil dihapuskan atau tidak
	return mysqli_affected_rows($db_con);
    echo "<meta http-equiv='refresh' content='0;url=cart.php'>";	
}


function insertProduk($data, $file) {
	global $db_con;
    $input_nama_produk	= $data["nama_produk"];
	$input_harga_produk	= $data["harga_produk"];
    $input_jenis= $data["jenis"];
    $input_desc	= $data["desc"];
	$nama_file_baru = $file['foto_produk']['name'];
	$ukuran_file = $file['foto_produk']['size'];
	$tipe_file = $file['foto_produk']['type'];
	$lokasi_ambil_file = $file['foto_produk']['tmp_name'];
	$lokasi_simpan_file = "../images/".$nama_file_baru;

    move_uploaded_file($lokasi_ambil_file, $lokasi_simpan_file);

	$query 		= "CALL insert_produk ('$input_nama_produk','$input_jenis', '$input_desc','$input_harga_produk', '$nama_file_baru')";
	mysqli_query($db_con, $query);
	echo "<meta http-equiv='refresh' content='0;url=AdminPage.php'>";


	// cek apakah data berhasil ditambahkan atau tidak
	return mysqli_affected_rows($db_con);
}

function insertUser($data) {
	global $db_con;
    $input_username	= $data["user"];
	$input_pass	= $data["psw"];
    $input_nama= $data["name"];
    $input_noHp	= $data["no_hp"];
	$input_email= $data["email"];


	$query = mysqli_query($db_con, "SELECT MAX(id_user) as id_user FROM user");

    $datas = mysqli_fetch_array($query);
    $kode = $datas['id_user'];
                    
    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($kode, 3, 3);
                    
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
                    
    // membentuk kode barang baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "USR";
    $new_idUser = $huruf . sprintf("%03s", $urutan);


   

	$query 		= "CALL insert_user ('$new_idUser','$input_username','$input_pass','$input_nama', '$input_noHp','$input_email')";
	mysqli_query($db_con, $query);
	echo "<meta http-equiv='refresh' content='0;url=index.php'>";


	// cek apakah data berhasil ditambahkan atau tidak
	return mysqli_affected_rows($db_con);
}

function updateProduk($data, $file) {
	global $db_con;
    $id_produk = $data['id'];
    $input_nama_produk	= $data["nama_produk"];
	$input_harga_produk	= $data["harga_produk"];
    $input_jenis= $data["jenis"];
    $input_desc	= $data["desc"];
	$nama_file_baru = $file['foto_produk']['name'];
	$ukuran_file = $file['foto_produk']['size'];
	$tipe_file = $file['foto_produk']['type'];
	$lokasi_ambil_file = $file['foto_produk']['tmp_name'];
	$lokasi_simpan_file = "../images/".$nama_file_baru;

    move_uploaded_file($lokasi_ambil_file, $lokasi_simpan_file);

	$query 		= "CALL update_produk ('$id_produk','$input_nama_produk','$input_jenis', '$input_desc','$input_harga_produk', '$nama_file_baru')";
	mysqli_query($db_con, $query);
	echo "<meta http-equiv='refresh' content='0;url=AdminPage.php'>";


	// cek apakah data berhasil ditambahkan atau tidak
	return mysqli_affected_rows($db_con);
}

function insertCart($id_produk,$id_user){
	global $db_con;
   
    $jumlah_beli = 1;
	$query 		= "CALL insert_cart('$id_produk','$jumlah_beli', '$id_user')";
	mysqli_query($db_con, $query);
	echo "<meta http-equiv='refresh' content='0;url=userPage.php'>";
    return mysqli_affected_rows($db_con);

}

function updateCart($data){
	global $db_con;
    $id_cart = $data['id'];
    $jumlah_beli= $data["jumlah_beli"];
	$query 		= "CALL update_cartView('$id_cart','$jumlah_beli')";
	mysqli_query($db_con, $query);
	echo "<meta http-equiv='refresh' content='0;url=cart.php'>";
    return mysqli_affected_rows($db_con);

}




function show($query){
	global $db_con;
	$result = mysqli_query($db_con, $query);
	$rows = [];

	// mengembalikan nilai berupa array associative
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}

function konfirmasi($kode_cart, $id_user){
    global $db_con;
    
    
    $keranjang = show("SELECT * FROM keranjang WHERE id_user = '$id_user' ");

    foreach ($keranjang as $k){
        $id_produk = $k["id_produk"];
        $jumlah_beli = $k["jumlah_beli"];

        $query 		= "CALL insert_transaksi('$id_produk','$jumlah_beli','$kode_cart','$id_user')";
	    mysqli_query($db_con, $query);
	    
        
    }
    echo "<meta http-equiv='refresh' content='0;url=userPage.php'>";
	return mysqli_affected_rows($db_con);

}

function proses($kode){
	global $db_con;
	$query 		= "UPDATE transaksi SET status= 'diproses' WHERE kode = '$kode'";
	mysqli_query($db_con, $query);
	echo "<meta http-equiv='refresh' content='0;url=cart.php'>";
    return mysqli_affected_rows($db_con);

}

function selesai($kode){
	global $db_con;
	$query 		= "UPDATE transaksi SET status= 'selesai' WHERE kode = '$kode'";
	mysqli_query($db_con, $query);
	echo "<meta http-equiv='refresh' content='0;url=cart.php'>";
    return mysqli_affected_rows($db_con);

}



    
?>