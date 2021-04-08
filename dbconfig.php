<?php

$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "sig_kost";

try
{
	$koneksi = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
	$koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
?>