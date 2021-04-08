<?php
define("ROW_PER_PAGE",8);
$search_keyword = '';
$jenis = '';
$facility1 = ''; $facility2 = ''; $facility3 = ''; $facility4 = '';
$cek1 = ''; $cek2 = ''; $cek3 = ''; $cek4 = ''; $cek5 = ''; $cek6 = ''; $cek7 = '';
$a = 0;

if(!empty($_POST['search']['keyword'])) {
	$search_keyword = $_POST['search']['keyword'];
	$a = 1;
}
if (!empty($_POST['jenis'])) {
	$jenis = $_POST['jenis'];
	if ($jenis == 'P') {
		$cek5 = 'selected';
	}
	else if ($jenis == 'L') {
		$cek6 = 'selected';
	}
	else if ($jenis == 'C') {
		$cek7 = 'selected';
	}
}
if (!empty($_POST['fasilitas1']) OR !empty($_POST['fasilitas2']) OR !empty($_POST['fasilitas3']) OR !empty($_POST['fasilitas4'])) {
	if (!empty($_POST['fasilitas2'])) {
		$facility2 = $_POST['fasilitas2']; //Lemari
		$cek2 = 'checked';
	}
	if (!empty($_POST['fasilitas4'])) {
		$facility4 = $_POST['fasilitas4']; //Kamar Mandi
		$cek4 = 'checked';
	}
	if (!empty($_POST['fasilitas3'])) {
		$facility3 = $_POST['fasilitas3']; //AC
		$cek3 = 'checked';
	}
	if (!empty($_POST['fasilitas1'])) {
		$facility1 = $_POST['fasilitas1']; //WiFi
		$cek1 = 'checked';
	}				
}

/* Pagination Code starts */
$per_page_html = '';
$page = 1;
$start=0;
if(!empty($_POST["page"])) {
	$page = $_POST["page"];
	$start=($page-1) * ROW_PER_PAGE;
}
if ($a==1) {
	$sql = "SELECT * FROM tb_kost WHERE (harga_a <= '$search_keyword') AND (jenis LIKE :jenis) AND (fasilitas LIKE :fasilitas2 AND fasilitas LIKE :fasilitas4 AND fasilitas LIKE :fasilitas3 AND fasilitas LIKE :fasilitas1) ORDER BY id ASC";
}
else {
	$sql = "SELECT * FROM tb_kost WHERE (harga_a <= 10000000) AND (jenis LIKE :jenis) AND (fasilitas LIKE :fasilitas2 AND fasilitas LIKE :fasilitas4 AND fasilitas LIKE :fasilitas3 AND fasilitas LIKE :fasilitas1) ORDER BY id ASC";
}


$limit=" limit " . $start . "," . ROW_PER_PAGE;
$pagination_statement = $koneksi->prepare($sql);
$pagination_statement->bindValue(':fasilitas1', '%' . $facility1 . '%', PDO::PARAM_STR);
$pagination_statement->bindValue(':fasilitas2', '%' . $facility2 . '%', PDO::PARAM_STR);
$pagination_statement->bindValue(':fasilitas3', '%' . $facility3 . '%', PDO::PARAM_STR);
$pagination_statement->bindValue(':fasilitas4', '%' . $facility4 . '%', PDO::PARAM_STR);
$pagination_statement->bindValue(':jenis', '%' . $jenis . '%', PDO::PARAM_STR);
$pagination_statement->execute();

$row_count = $pagination_statement->rowCount();
if(!empty($row_count)){
	$per_page_html .= "<div style='text-align:center;margin:20px 0px;'>";
	$page_count=ceil($row_count/ROW_PER_PAGE);
	if($page_count>1) {
		for($i=1;$i<=$page_count;$i++){
			if($i==$page){
				$per_page_html .= '<input class="btn btn-warning" type="submit" name="page" value="' . $i . '" class="btn-page current" />';
			} else {
				$per_page_html .= '<input class="btn btn-info" type="submit" name="page" value="' . $i . '" class="btn-page" />';
			}
		}
	}
	$per_page_html .= "</div>";
}


$query = $sql.$limit;
$pdo_statement = $koneksi->prepare($query);
$pdo_statement->bindValue(':fasilitas1', '%' . $facility1 . '%', PDO::PARAM_STR);
$pdo_statement->bindValue(':fasilitas2', '%' . $facility2 . '%', PDO::PARAM_STR);
$pdo_statement->bindValue(':fasilitas3', '%' . $facility3 . '%', PDO::PARAM_STR);
$pdo_statement->bindValue(':fasilitas4', '%' . $facility4 . '%', PDO::PARAM_STR);
$pdo_statement->bindValue(':jenis', '%' . $jenis . '%', PDO::PARAM_STR);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
?>