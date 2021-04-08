<?php
if($_POST['save'])
{
    
    $no=0;
    $query=$koneksi->prepare("SELECT * FROM tb_kost ORDER BY id ASC");
    $query->execute();
    while($data = $query->fetch())
    {
        $no=$data['id'];
    }
    $no++;

    $id=$no;
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
        echo "<center><p><font size=4><b>Terjadi Kesalahan Pada Jumlah Kamar!</b></font><p><a href='index.php?modul=konten&file=tambah'>Klik di sini untuk kembali</a></p></center>";
    }
    else{

    $imgFile1 = $_FILES['image1']['name'];
    $tmp_dir1 = $_FILES['image1']['tmp_name'];
    $imgSize1 = $_FILES['image1']['size'];

        if(!empty($imgFile1)){
        $upload_dir = 'modul/pic/konten/'; // upload directory
        
        $imgExt1 = strtolower(pathinfo($imgFile1,PATHINFO_EXTENSION)); // get image extension// valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

        // rename uploading image
        $userpic1 = rand(1000,1000000).".".$imgExt1;

        // allow valid first file formats
        if(in_array($imgExt1, $valid_extensions)){

        // Check file size '10MB'
            if($imgSize1 < 10000000) {
                move_uploaded_file($tmp_dir1,$upload_dir.$userpic1);
            }
            else{
                $errMSG = "<center>Sorry, your file is too large.</center>";
            }
        }
    }
    else{
        $errMSG = "<center>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</center>";  
    }
if(empty($imgFile1)) {
    echo "<center>Tidak Menyertakan Image</center>";
    $userpic1 = "noimage.png";
}
        try
        {
            
            $query = $koneksi->prepare("INSERT INTO tb_kost (id,alamat,jenis,pemilik,jumlah,terpakai,harga_a,harga_b,ukuran,periode,fasilitas,latitude,longitude,image) VALUES (:id, :alm, :jenis, :pemilik, :jumlah, :terpakai, :harga_a, :harga_b, :ukuran, :periode, :fasilitas, :lat, :lng, :img)");
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
            $query->bindParam(":img", $userpic1);
            $query->execute();
            
	echo "<center><p><font size=4><b>Proses Pengisian Berhasil!</b></font><p><a href='index.php?modul=konten&file=content'>kembali</a></p></center>";
            }catch(PDOException $e){
                // Jika terjadi error
                if($e->errorInfo[0] == 23000){
                    //errorInfor[0] berisi informasi error tentang query sql yg baru dijalankan
                    //23000 adalah kode error ketika ada data yg sama pada kolom yg di set unique
                    $this->error = "ID Sudah Digunakan!";
                }else{
                    echo $e->getMessage();
                }
            }
        }
    }
?>