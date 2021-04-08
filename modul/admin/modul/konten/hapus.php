<?php
$id=$_GET["id"];
if (!$id)
{ 
	die('Tidak ada ID yang akan Ditemukan!'); 
}

$query=$koneksi->prepare("SELECT * FROM tb_kost WHERE id='$id'");
$query->execute();

$print = $query->fetchAll(PDO::FETCH_ASSOC);
$printrecord = $print[0];
$get_id = $printrecord["id"];
?>
<form action="index.php?modul=konten&file=delete" method="POST">
	<b><center>Apakah anda Yakin Ingin Menghapus Data ?</b>
	<input type="hidden" name="id" value="<?php echo $get_id ?>">
	</br><input type="submit" name="hapus" value="Ya"></center>
</form>