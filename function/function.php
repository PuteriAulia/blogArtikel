<?php
	include("config.php");

	// TAMBAH ARTIKEL
	if (isset($_POST['tambah_artikel'])) {
		$tanggal = $_POST['tanggal'];
		$judul = $_POST['judul'];
		$isi = $_POST['isi'];
		$views = 0;

	    $namaFile = $_FILES['gambar']['name'];
	    $ukuranFile = $_FILES['gambar']['size'];
	    $error = $_FILES['gambar']['error'];
	    $tmpName = $_FILES['gambar']['tmp_name'];

	    // cek yang di upload harus gambar
	    $daftarEkstensiGambar = ['jpg', 'jpeg','png'];
	    $ekstensiGambar = explode('.', $namaFile);
	    $ekstensiGambar = strtolower(end($ekstensiGambar));

	    if (!in_array($ekstensiGambar, $daftarEkstensiGambar)) {
	      	echo"
	           <script>
	             alert('Upload gambar dengan benar');
	           </script>
	        ";
	    }

	    // upload gambar
	    //generate nama baru
	    $namaFileBaru = uniqid();
	    $namaFileBaru .= '.';
	    $namaFileBaru .= $ekstensiGambar; 

	    move_uploaded_file($tmpName, '../imgArtikel/'.$namaFileBaru);

	    $gambar = $namaFileBaru;

	    mysqli_query($dbconnect, "INSERT INTO artikel VALUES('', '$judul', '$isi', '$tanggal', '$views', '$gambar')");

	    header("location:../dashboard.php");
	}


	// EDIT ARTIKEL
	if (isset($_POST['edit_artikel'])) {
		$id = $_POST['id'];
	    $judul = $_POST['judul'];  
	    $artikel = $_POST['isi']; 
	    $gambarLama = $_POST['gambarlama'];


	    // cek apakah user mengedit gambar atau tidak
	    if ($_FILES['gambar']['error'] === 4) {
	      $gambar = $gambarLama;
	    }
	    else{
	      $namaFile = $_FILES['gambar']['name'];
	      $ukuranFile = $_FILES['gambar']['size'];
	      $error = $_FILES['gambar']['error'];
	      $tmpName = $_FILES['gambar']['tmp_name'];

	      // cek yang di upload harus gambar
	      $daftarEkstensiGambar = ['jpg', 'jpeg','png'];
	      $ekstensiGambar = explode('.', $namaFile);
	      $ekstensiGambar = strtolower(end($ekstensiGambar));

	      if (!in_array($ekstensiGambar, $daftarEkstensiGambar)) {
	        echo"
	             <script>
	               alert('Upload gambar dengan benar');
	             </script>
	           ";
	      }

	      // upload gambar
	      //generate nama baru
	      $namaFileBaru = uniqid();
	      $namaFileBaru .= '.';
	      $namaFileBaru .= $ekstensiGambar; 

	      move_uploaded_file($tmpName, 'imgArtikel/'.$namaFileBaru);

	      $gambar = $namaFileBaru;
	    }

	    mysqli_query($dbconnect, "UPDATE artikel SET artikel_judul='$judul', artikel_isi='$artikel', artikel_gambar='$gambar' WHERE artikel_id = '$id' ");

	    header("location:../artikel_kelola.php");
	 }



	 // LIKE
	if(isset($_GET['aksi']) && $_GET['aksi'] == 'suka' && isset($_GET['artikel_id'])) {

		 $artikel_like_ip = $_SERVER['REMOTE_ADDR'];
		 $id      = $_GET['artikel_id'];

		 $query_input_blog_input = mysqli_query($dbconnect, "INSERT INTO artikel_like VALUES('', '$artikel_like_ip', '$id')");

		 if($query_input_blog_input) {
		   header("Location:../artikel_detail.php?id=".$id);
		 }

		else {
		   header('Location: ?error=error');
		}
	}
 



	// REGISTRASI
	function register($data){
		include("config.php");

		$username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($dbconnect,$data["password"]);
        $password2 = mysqli_real_escape_string($dbconnect,$data["password2"]);

         // cek username sudah ada / belum
        $result = mysqli_query($dbconnect,"SELECT user_name FROM user WHERE user_name='$username'");
        
        if(mysqli_fetch_assoc($result)){
            echo "<script>
                    alert('User sudah terdaftar!')
                </script>";
                return false;
        }
        
        if($password !== $password2){
            echo "<script>
                alert('Konfirmasi password tidak sesuai!')
            </script>";
            return false;
        }
        
        // enkripsi password
        $password = password_hash($password,PASSWORD_DEFAULT);
        
        // insert ke database
        mysqli_query($dbconnect, "INSERT INTO user VALUES('','$username','$password')");

        return mysqli_affected_rows($dbconnect);
	}
?>
