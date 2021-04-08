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
				</li>					<li>
					<a href="index.php?modul=konten&file=tambah">New</a>
				</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<div class="page-header">
				<h1>
					Tambah Data Baru
				</h1>
			</div><!-- /.page-header -->
		<div class="row">
		<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->

		<div class="row">
		<div class="col-xs-12">
		<!-- div.dataTables_borderWrap -->
		<div>
		<form method="POST" action="index.php?modul=konten&file=action" enctype="multipart/form-data">
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
				<label class="pos-rel">Alamat</label></td>
				<td><input type="text" size="50" name="alamat" required></td>
			</tr>
			<tr>
				<td class="center">
				<label class="pos-rel">Image</label></td>
				<td><input type="file" name="image1"></td>
			</tr>
			<tr>
				<td class="center">
				<label class="pos-rel">Fasilitas</label></td>
				<td><textarea rows="9" cols="90" name="fasilitas" required></textarea></td>
			</tr>
			<tr>
				<td class="center">
				<label class="pos-rel">Jenis Hunian</label></td>
				<td><select name="jenis" required>
					<option>-</option>
					<option value="P">Khusus Perempuan</option>
					<option value="L">Khusus Laki-Laki</option>
					<option value="C">Untuk Perempuan & Laki-Laki</option>
				</select></td>
			</tr>
			<tr>
				<td class="center">
				<label class="pos-rel">Nama Pemilik</label></td>
				<td><input type="text" name="a" value="<?php echo $_SESSION['nama'] ?>" readonly></td>
				<input type="hidden" name="pemilik" value="<?php echo $_SESSION['id'] ?>">
			</tr>
			<tr>
				<td class="center">
				<label class="pos-rel">No. Telp</label></td>
				<td><input type="text" name="telp" value="<?php echo $_SESSION['kontak']?>" readonly></td>
			</tr>
			<tr>
				<td class="center">
				<label class="pos-rel">Jumlah Kamar</label></td>
				<td><input type="text" size="10px" name="jumlah"></td>
			</tr>
			<tr>
				<td class="center">
				<label class="pos-rel">Kamar yang Terpakai</label></td>
				<td><input type="text" size="10px" name="terpakai"></td>
			</tr>
			<tr>
				<td class="center">
				<label class="pos-rel">Harga (Rp.)</label></td>
				<td><input type="text" size="10px" name="harga_a" required> s/d <input type="text" size="10px" name="harga_b"></td>
			</tr>
			<tr>
				<td class="center">
				<label class="pos-rel">Ukuran (Meter)</label></td>
				<td><input type="text" name="ukuran" required></td>
			</tr>
			<tr>
				<td class="center">
				<label class="pos-rel">Periode Pembayaran (Bulan)</label></td>
				<td><input type="text" name="periode" required</td>
			</tr>
			<tr>
				<td class="center">
				<label class="pos-rel">Kordinat Pada Peta</label></td>
				<td>Lat <input type="text" name="lat" required> , Lng <input type="text" name="lng" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input class="btn btn-white btn-success" type="submit" name="save" value="Proses"></td>
			</tr>
			</tbody>
		</table>
		</form>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>