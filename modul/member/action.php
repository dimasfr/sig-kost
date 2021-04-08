<?php
if(isset($_POST['login']))
{
	$user = $_POST['user']; 
	$sandi = $_POST['pass'];
	$sql = $koneksi->prepare("SELECT * FROM tb_admin WHERE username='$user' and  password='$sandi'");
	$sql->execute();
	$data = $sql->fetch();
	$id=$data['id'];
	$nama=$data['username'];
	$pass=$data['password'];
	$kontak=$data['kontak'];
	$nick=$data['nama'];
	$level=$data['level'];

	if($nama==$user && $pass==$sandi)
	{
		$_SESSION['id']=$id;
		$_SESSION['username']=$nama;
		$_SESSION['password']=$pass; 
		$_SESSION['nama']=$nick;
		$_SESSION['kontak']=$kontak;
		$_SESSION['level']=$level;
		
		echo '
		<div class="container">
		<div class="row-fluid">
		<div id="page-title" class="span4 offset4">
		<div align="center"><h2>Login Berhasil</h2>
		</br></br></br></br></br></br></br></br></br>
		<h3>Untuk Melanjutkan ke Halaman Pemilik, Klik <a href="modul/admin/index.php"><b>Disini</b></a></h3>
		</div></div></div></div>
		';
	}
	else
	{
	// jika login salah //  
		echo '
		<div class="container">
		<div class="row-fluid">
		<div id="page-title" class="span4 offset4">
		<div align="center"><h2>Username atau password Anda salah</h2>
		</br></br></br></br></br></br></br>
		<h3>Untuk kembali silahkan klik <a href="index.php?modul=member&file=login">di sini</a></h3>
		</div></div></div></div>
		 ';
	} 
}
elseif (isset($_POST['register'])) 
{
	$user = $_POST['user']; 
	$sandi = $_POST['pass'];
	?>
	<div class="container">
		<div class="row-fluid">
		<div id="page-title" class="span4 offset4">
			<h2>Isi Form Data Diri</h2>
		</div>
		</div>

		<div class="row-fluid">
			<div class="lr-page span4 offset4">
				<div id="register-box">
					<div class="row-fluid">
						<div id="login-form" class="span12">
							<form method="post" action="index.php?modul=member&file=new">
								<div class="row-fluid">
								<input name="user" type="hidden" value="<?php echo $user ?>" />
								<input name="pass" type="hidden" value="<?php echo $sandi ?>" />
								Nama</br>
								<input class="span12" name="nama" type="text" placeholder="Nama Lengkap" required="true" />
								Kontak</br>
								<input class="span12" name="kontak" type="text" placeholder="No Telp" required="true" />
								</div>
								<div class="actions">
									<input type="submit" class="btn btn-danger span12" name="register" value="Register"></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>		
      		</div>
	</div>
	<?php 
}
?>