<?php
if($_POST['proses'])
{
    $id=($_POST['id']);
    $alamat=($_POST['alamat']);
    $fasilitas=($_POST['fasilitas']);
    $jenis=($_POST['jenis']);
    $pemilik=($_POST['pemilik']);
    $jumlah=($_POST['jumlah']);
    $terpakai=($_POST['terpakai']);
    $harga_a=($_POST['harga_a']);
    $harga_b=($_POST['harga_b']);
    $ukuran=($_POST['ukuran']);
    $periode=($_POST['periode']);
    $lat=($_POST['lat']);
    $lng=($_POST['lng']);

    if ($terpakai>$jumlah) {
        echo "<center><p><font size=4><b>Terjadi Kesalahan Pada Jumlah Kamar!</b></font><p><a href='index.php?modul=konten&file=edit&id=".$id."'>Klik di sini untuk kembali</a></p></center>";
    }
    else {
        try
        {
            //Masukkan user baru ke database
                $query = $koneksi->prepare("UPDATE tb_kost SET alamat = :alm, jenis = :jenis, pemilik = :pemilik, jumlah = :jumlah ,terpakai = :terpakai, harga_a = :harga_a, harga_b = :harga_b, ukuran = :ukuran, periode = :periode, fasilitas = :fasilitas, latitude = :lat, longitude = :lng WHERE id = :id");
                $query->bindParam(":id", $id);
                $query->bindParam(":alm", $alamat);
                $query->bindParam(":jenis", $jenis);
                $query->bindParam(":pemilik", $pemilik);
                $query->bindParam(":jumlah", $jumlah);
                $query->bindParam(":terpakai", $terpakai);
                $query->bindParam(":harga_a", $harga_a);
                $query->bindParam(":harga_b", $harga_b);
                $query->bindParam(":ukuran", $ukuran);
                $query->bindParam(":periode", $periode);
                $query->bindParam(":fasilitas", $fasilitas);
                $query->bindParam(":lat", $lat);
                $query->bindParam(":lng", $lng);
                $query->execute();
				echo "<center><p><font size=4><b>Proses Pengubahan Berhasil!</b></font><p><a href='index.php?modul=konten&file=content'>Klik di sini untuk kembali</a></p></center>";
            }catch(PDOException $e){
                // Jika terjadi error
                if($e->errorInfo[0] == 23000){
                    //errorInfor[0] berisi informasi error tentang query sql yg baru dijalankan
                    //23000 adalah kode error ketika ada data yg sama pada kolom yg di set unique
                    $this->error = "Username sudah digunakan!";
                }else{
                    echo $e->getMessage();
                }
            }
            }
        }
?>