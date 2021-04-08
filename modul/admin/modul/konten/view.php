<?php
$id=$_GET["id"];
if (!$id)
{ 
	die('Tidak ada ID yang akan Ditemukan!'); 
}

$query = $koneksi->prepare("SELECT * FROM tb_kost WHERE id='$id'");
$query->execute();

$print = $query->fetchAll(PDO::FETCH_ASSOC);
$printrecord 	= $print[0];
$get_alamat = $printrecord["alamat"];
$get_pemilik = $printrecord["pemilik"];
$get_jenis = $printrecord["jenis"];
$get_jumlah = $printrecord["jumlah"];
$get_harga1 = $printrecord["harga_a"];
$get_harga2 = $printrecord["harga_b"];
$get_ukuran = $printrecord["ukuran"];
$get_periode = $printrecord["periode"];
$get_fasilitas = $printrecord["fasilitas"];
$get_lat = $printrecord["latitude"];
$get_lng = $printrecord["longitude"];
$get_image = $printrecord["image"];

$query = $koneksi->prepare("SELECT * FROM tb_admin WHERE id='$get_pemilik'");
$query->execute();
$print = $query->fetchAll(PDO::FETCH_ASSOC);
$printrecord 	= $print[0];
$get_nama = $printrecord["nama"];
$get_kontak = $printrecord["kontak"];

?>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="index.php">Home</a>
							</li>

							<li>
								<a href="index.php?modul=konten&file=content">Daftar Kost</a>
							</li>
							<li>
								<a href="index.php?modul=konten&file=view&id=<?php echo $id ?>">View</a>
							</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">

						<div class="page-header">
							<h1>
								View Informasi Kost
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-xs-12">
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center" width="10%">
														<label class="pos-rel">
															
														</label>
													</th>
													<th></th>
												</tr>
											</thead>
										<tbody>
										<tr>
											<td class="center">
											<label class="pos-rel">Alamat</label>
											</td>
											<td><?php echo $get_alamat ?></td>
										</tr>
										<tr>
											<td class="center">
											<label class="pos-rel">Jenis Hunian</label>
											</td>
											<td><?php 
											if ($get_jenis=='C') {
												echo "Untuk Laki - Laki & Perempuan";
											}
											elseif ($get_jenis=='L') {
												echo "Khusus Laki - Laki";
											}
											else {
												echo "Khusus Perempuan";
											} 
											?></td>
										</tr>
										<tr>
											<td class="center">
											<label class="pos-rel">Nama Pemilik</label>
											</td>
											<td><?php echo $get_nama ?></td>
										</tr>
										<tr>
											<td class="center">
											<label class="pos-rel">No. Telp</label>
											</td>
											<td><?php echo $get_kontak ?></td>
										</tr>
										<tr>
											<td class="center">
											<label class="pos-rel">Jumlah Kamar </label>
											</td>
											<td><?php echo $get_jumlah ?></td>
										</tr>
										<tr>
											<td class="center">
											<label class="pos-rel">Harga</label>
											</td>
											<td><?php 
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
										?> </td>
										</tr>
										<tr>
											<td class="center">
											<label class="pos-rel">Ukuran</label>
											</td>
											<td><?php echo $get_ukuran ?> Meter </td>
										</tr>
										<tr>
											<td class="center">
											<label class="pos-rel">Periode Pembayaran</label>
											</td>
											<td><?php echo $get_periode ?> Bulan</td>
										</tr>
										<tr>
											<td class="center">
											<label class="pos-rel">Fasilitas</label>
											</td>
											<td><?php echo $get_fasilitas ?></td>
										</tr>
										<tr>
											<td class="center">
											<label class="pos-rel">Lokasi Pada Peta</label>
											</td>
											<td><?php echo 'X = '.$get_lat.' , Y = '.$get_lng  ?></td>
										</tr>
										<tr>
											<td class="center">
											<label class="pos-rel">Foto</label>
											</td>
											<td><img src="modul/pic/konten/<?php echo $get_image ?>" height="250px"></td>
										</tr>
										</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="clearfix">
										<div class="pull-right tableTools-container">
										<a href="index.php?modul=konten&file=edit&id=<?php echo $id?>">
										<button class="btn btn-app btn-inverse btn-xs">
											Edit
										</button>
										</a>
										</div>
										</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->