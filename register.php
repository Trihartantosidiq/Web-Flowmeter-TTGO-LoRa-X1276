<?php require 'koneksi.php';

require 'css.php';

?>


<div class="col-sm-4"></div>
	<div class="container col-sm-4">
		<form class="form-signin page-header" method="POST" action="">
			<h2 class="form-signin-heading" align="center">DAFTAR</h2>
				<tr>
					<td><input class="form-control" type="text" name="nama" required autofocus placeholder="Nama" /></td><br>
				</tr>
                <tr>
					<td><input class="form-control" type="text" name="username" required autofocus placeholder="Username" /></td><br>
				</tr>
				<tr>
					<td><input class="form-control" type="password" name="password" required autofocus placeholder="Password" /></td><br>
				</tr>
				<tr>
					<td><input class="form-control" type="text" name="level"  required autofocus placeholder="Akses" /></td><br>
				</tr>
				<tr>
					<td></td>
					<td><input class="btn btn-primary btn-block" type="submit" value="Simpan" /></td>
				</tr>
		</form>
 	</div> 
<div class="col-sm-4"></div>



<?php
require 'koneksi.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
	//variabel dari elemen form
	$nama = mysqli_real_escape_string($konek, $_POST['nama']);
    $username = mysqli_real_escape_string($konek, $_POST['username']);
	$pasword = mysqli_real_escape_string($konek, $_POST['password']);
	$level = mysqli_real_escape_string($konek, $_POST['level']);
	if($nama==''){
		echo "Form belum lengkap!!!";
	}else{
		//proses simpan data guru
		$simpan = mysqli_query($konek, "INSERT INTO login(nama, username, password, level) VALUES ('$nama','$username','$pasword', '$level')");
		
		if(!$simpan){
			echo "Simpan data gagal!!";
		}else{
			header('location:login.php');
		}
	}
}
?>
