<?php 
$id=$_GET["id"];
if (!$id)
{ 
	die('Tidak ada ID yang Ditemukan!'); 
}
$query = $koneksi->prepare("SELECT * FROM tb_kost WHERE id='$id'");
$query->execute();

$print = $query->fetchAll(PDO::FETCH_ASSOC);
$printrecord = $print[0];
$get_alamat = $printrecord["alamat"];
$get_pemilik = $printrecord["pemilik"];
$get_jenis = $printrecord["jenis"];
$get_jumlah = $printrecord["jumlah"];
$get_terpakai = $printrecord["terpakai"];
$get_harga1 = $printrecord["harga_a"];
$get_harga2 = $printrecord["harga_b"];
$get_ukuran = $printrecord["ukuran"];
$get_periode = $printrecord["periode"];
$get_fasilitas = $printrecord["fasilitas"];
$get_image = $printrecord["image"];

$query = $koneksi->prepare("SELECT * FROM tb_admin WHERE id='$get_pemilik'");
$query->execute();

$print = $query->fetchAll(PDO::FETCH_ASSOC);
$printrecord = $print[0];
$get_nama = $printrecord["nama"];
$get_kontak = $printrecord["kontak"];

?>
	<!-- start: Page Title -->
	<div id="page-title">

		<h1><?php echo $get_alamat ?></h1>

	</div>
	<!-- end: Page Title -->
	
	<style>
	      .fullscreen:-webkit-full-screen {
	      width: auto !important;
	      height: 720px !important;
	      margin:auto !important;
	  }
	     .fullscreen:-moz-full-screen {
	      width: auto !important;
	      height: 720px !important;
	      margin:auto !important;
	  }
	     .fullscreen:-ms-fullscreen {
	      width: auto !important;
	      height: 720px !important;
	      margin:auto !important;
	  }     
	     </style>
	     <script>
	        function makeFullScreen() {
	         var divObj = document.getElementById('theImage');
	       //Use the specification method before using prefixed versions
	      if (divObj.requestFullscreen) {
	        divObj.requestFullscreen();
	      }
	      else if (divObj.msRequestFullscreen) {
	        divObj.msRequestFullscreen();               
	      }
	      else if (divObj.mozRequestFullScreen) {
	        divObj.mozRequestFullScreen();      
	      }
	      else if (divObj.webkitRequestFullscreen) {
	        divObj.webkitRequestFullscreen();       
	      } else {
	        console.log('Fullscreen API is not supported');
	      } 

	    }
	</script>

	<!--start: Wrapper -->
	<div id="wrapper">
	
		<!--start: Container -->
		<div class="container">
				
			<hr class="clean">

			<!-- start: Row -->
			<div class="row-fluid">

				<div class="span4">

					<ul class="project-info">
						<img src="modul/admin/modul/pic/konten/<?php echo $get_image ?>" id="theImage" class="fullscreen" onClick="makeFullScreen()">
					</ul>

				</div>

				<div class="span8">

					<p style="font-size: 120%">
						<h3>
						<table>
							<tr>
								<td width="30%"><strong>Pemilik</strong></td><td width="3%">:</td><td><?php echo $get_nama ?></td>
							</tr>
							<tr>
								<td><strong>Hunian </strong></td><td>:</td><td><?php 
										if ($get_jenis=='C') {
											echo "Laki - Laki & Perempuan";
										}
										elseif ($get_jenis=='L') {
											echo "Khusus Laki - Laki";
										}
										else {
											echo "Khusus Perempuan";
										}
									?>
								</td>
							</tr>
							<tr>
								<td><strong>No. Telp </strong></td><td>:</td><td><?php echo $get_kontak ?></td>
							</tr>
							<tr>
								<td><strong>Total Kamar </strong></td><td>:</td><td><?php echo ($get_jumlah) ?> Kamar </td>
							</tr>
							<tr>
								<td><strong>Tersedia </strong></td><td>:</td><td>
								<?php 
									$hasil = ($get_jumlah-$get_terpakai) ;
									if ($hasil <= 0) {
										echo 'Full';
									}
									else{
										echo $hasil.' Kamar';
									}
								?></td>
							</tr>
							<tr>
								<td><strong>Harga</strong></td><td>:</td><td><?php 
										if($get_harga2 != 0)
										{
											?>
												<script type="text/javascript">
													var bilangan1 = <?php echo $get_harga1 ?>;
													var bilangan2 = <?php echo $get_harga2 ?>;

													var number_string1 = bilangan1.toString(),
													sisa1 = number_string1.length % 3,
													rupiah1 = number_string1.substr(0, sisa1),
													ribuan1 = number_string1.substr(sisa1).match(/\d{3}/g);

													var number_string2 = bilangan2.toString(),
													sisa2 = number_string2.length % 3,
													rupiah2 = number_string2.substr(0, sisa2),
													ribuan2 = number_string2.substr(sisa2).match(/\d{3}/g);

													if(ribuan1){
														separator1 = sisa1 ? '.' : ' ';
														rupiah1 += separator1 + ribuan1.join('.');
													}

													if(ribuan2){
														separator2 = sisa2 ? '.' : ' ';
														rupiah2 += separator2 + ribuan2.join('.');
													}

													document.write('Rp.'+ rupiah1 +' - Rp.'+ rupiah2);
												</script>
											<?php
										}
										else {
											?>
												<script type="text/javascript">
													var bilangan = <?php echo $get_harga1 ?>;

													var number_string = bilangan.toString(),
													sisa = number_string.length % 3,
													rupiah = number_string.substr(0, sisa),
													ribuan = number_string.substr(sisa).match(/\d{3}/g);

													if(ribuan){
														separator = sisa ? '.' : ' ';
														rupiah += separator + ribuan.join('.');
													}

													document.write('Rp.'+ rupiah);
												</script>
											<?php
										}
										?></td>
							</tr>
							<tr>
								<td><strong>Ukuran</strong></td><td>:</td><td><?php echo $get_ukuran ?> Meter</td>
							</tr>
							<tr>
								<td><strong>Periode Pembayaran</strong></td><td>:</td><td><?php echo $get_periode ?> Bulan</td>
							</tr>
							<tr>
								<td><strong>Fasilitas</strong></td><td>:</td><td><?php echo $get_fasilitas ?></td>
							</tr>
						</table>
					</h3>
					</p>

				</div>	

			</div>
			<!-- end: Row -->
			<?php include 'modul/maps/location.php'; ?>
			<hr>
					
        		</div>

      		</div>
			<!-- end: Row -->
				
		</div>
		<!-- end: Container  -->
	
	</div>
	<!-- end: Wrapper  -->