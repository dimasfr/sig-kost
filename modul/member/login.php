	<!--start: Container -->
	<div class="container">
		
		<!-- start: Page Title -->
		<div class="row-fluid">
		
			<div id="page-title" class="span4 offset4">

				<h2>Log in</h2>

			</div>
			
		</div>
		<!-- end: Page Title -->
		
		<!-- start: Login Box-->
		<div class="row-fluid">
		
			<div class="lr-page span4 offset4">

				<div id="login-box">

					<!-- start: Row -->
					<div class="row-fluid">

						<div id="login-form" class="span12">

							<?php
							if(!isset($_SESSION['username'])){
							echo'
							<div class="page-title-small">
								<h3>Gunakan Akun Yang Anda Miliki</h3>
							</div>
							<form method="post" action="index.php?modul=member&file=action">
								<div class="row-fluid">
									<input class="span12" name="user" type="text" placeholder="username" required="true"/>
									<input class="span12" name="pass" type="password" placeholder="password" required="true"/>
								</div>
								</div>	
								<div class="actions">
									<input type="submit" class="btn btn-danger span12" name="login" value="Login"></button>
								</div>
								<div class="page-title-small">
									<h3><a href="index.php?modul=member&file=register">Sign Up</a></h3>
								</div>
							</form>
							';
							}
							else {
							echo '
							<form method="post" action="index.php?modul=member&file=logout">
							<div class="page-title-small">
								<h3>Anda Telah Login Sebagai '.$_SESSION['nama'].' </h3>
							</div>
							</br>
							<center><h3>Untuk Melanjutkan ke Halaman Admin, Klik <a href="modul/admin/index.php"><b>Disini</b></a></h3></center>
							</br>
							<div class="actions">
									<input type="submit" class="btn btn-danger span12" name="logout" value="Log Out"></button>
							</div>
							</form>
							';
							}
							?>
						</div>

					</div>
					<!-- end: Row -->	

				</div>
				<!-- end: Login Box  -->
				
			</div>	
			
      	</div>
		
	</div>
	<!--end: Container-->