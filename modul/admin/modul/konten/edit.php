<?php
$id=$_GET["id"];
if (!$id)
{ 
	die('Tidak ada ID yang akan Ditemukan!'); 
}

$check1=''; $check2=''; $check3='';

$query = $koneksi->prepare("SELECT * FROM tb_kost WHERE id='$id'");
$query->execute();

$print = $query->fetchAll(PDO::FETCH_ASSOC);
$printrecord 	= $print[0];
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
$get_lat = $printrecord["latitude"];
$get_lng = $printrecord["longitude"];
$get_image = $printrecord["image"];

$query = $koneksi->prepare("SELECT * FROM tb_admin WHERE id='$get_pemilik'");
$query->execute();

$print = $query->fetchAll(PDO::FETCH_ASSOC);
$printrecord 	= $print[0];
$get_nama = $printrecord["nama"];

if ($get_jenis=='P') {
	$check1 = 'selected';
}
elseif ($get_jenis=='L'){
	$check2 = 'selected';
}
else{
	$check3 = 'selected';
}
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
								<a href="index.php?modul=konten&file=edit&id=<?php echo $id ?>">Edit</a>
							</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">

						<div class="page-header">
							<h1>
								Edit Informasi Kost
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-xs-12">
										<!-- div.dataTables_borderWrap -->
										<div>
										<form name="Edit" action="index.php?modul=konten&file=update" enctype=\" multipart/form-data\" method="POST" >
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center" width="12%">
														<label class="pos-rel">
															
														</label>
													</th>
													<th></th>
												</tr>
											</thead>
										<tbody>
										<tr>
											<td class="center">
											<label class="pos-rel">ID</label>
											</td>
											<td><?php echo $id ?><input type="hidden" name="id" value="<?php echo $id ?>"></td>
										</tr>
										<tr>
											<td class="center">
											<label class="pos-rel">Alamat</label>
											</td>
											<td><input type="text" size="50" name="alamat" value="<?php echo $get_alamat ?>"></td>
										</tr>
										<tr>
											<td class="center">
											<label class="pos-rel">Fasilitas</label>
											</td>
											<td><textarea rows="9" cols="90" name="fasilitas"><?php echo $get_fasilitas ?></textarea></td>
										</tr>
										<tr>
											<td class="center">
											<label class="pos-rel">Jenis Hunian</label>
											</td>
											<td><select name="jenis">
												<option>-</option>
												<option value="P" <?php echo $check1 ?>>Khusus Perempuan</option>
												<option value="L" <?php echo $check2 ?>>Khusus Laki-Laki</option>
												<option value="C" <?php echo $check3 ?>>Untuk Perempuan & Laki-Laki</option>
											</select></td>
										</tr>
										<tr>
											<td class="center">
											<label class="pos-rel">Nama Pemilik</label></td>
											<td><input type="text" name="a" value="<?php echo $get_nama ?>" readonly></td>
											<input type="hidden" name="pemilik" value="<?php echo $get_pemilik ?>">
										</tr>
										<tr>
											<td class="center">
											<label class="pos-rel">Jumlah Kamar</label></td>
											<td><input type="text" size="10px" name="jumlah" value="<?php echo $get_jumlah ?>"></td>
										</tr>
										<tr>
											<td class="center">
											<label class="pos-rel">Kamar yang Terpakai</label></td>
											<td><input type="text" size="10px" name="terpakai" value="<?php echo $get_terpakai ?>"></td>
										</tr>
										<tr>
											<td class="center">
											<label class="pos-rel">Harga (Rp.)</label></td>
											<td><input type="text" size="10px" name="harga_a" required="true" value="<?php echo $get_harga1 ?>"> s/d <input type="text" size="10px" name="harga_b" value="<?php echo $get_harga2 ?>"></td>
										</tr>
										<tr>
											<td class="center">
											<label class="pos-rel">Ukuran (Meter)</label></td>
											<td><input type="text" name="ukuran" required="true" value="<?php echo $get_ukuran ?>"></td>
										</tr>
										<tr>
											<td class="center">
											<label class="pos-rel">Periode Pembayaran (Bulan)</label></td>
											<td><input type="text" name="periode" required="true" value="<?php echo $get_periode ?>"</td>
										</tr>
										<tr>
											<td class="center">
											<label class="pos-rel">Kordinat Pada Peta</label></td>
											<td>Lat <input type="text" name="lat" required="true" value="<?php echo $get_lat ?>"> , Lng <input type="text" name="lng" required="true" value="<?php echo $get_lng ?>"></td>
										</tr>
										<tr>
											<td></td>
											<td><input class="btn btn-white btn-success" type="submit" name="proses" value="Proses"></td>
										</tr>
										</tbody>
										</table>
										</form>
									</div>
								</div>
							</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->