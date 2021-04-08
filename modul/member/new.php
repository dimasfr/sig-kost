<?php
if($_POST['register'])
{
    $no=0;
    $query=$koneksi->prepare("SELECT * FROM tb_admin ORDER BY id ASC");
    $query->execute();
    while($data = $query->fetch())
    {
        $no=$data['id'];
    }
    $no++;
    $user=($_POST['user']);
    $pass=($_POST['pass']);
    $nama=($_POST['nama']);
    $kontak=($_POST['kontak']);
    $level=1;
        
        try
        {
            //Masukkan user baru ke database
            $query = $koneksi->prepare("INSERT INTO tb_admin (id,nama,kontak,username,password,level) VALUES (:id, :nama, :kontak, :user, :pass, :level)");
            $query->bindParam(":id", $no);
            $query->bindParam(":user", $user);
            $query->bindParam(":pass", $pass);
            $query->bindParam(":nama", $nama);
            $query->bindParam(":kontak", $kontak);
            $query->bindParam(":level", $level);
            $query->execute();

            $_SESSION['id']=$no;
            $_SESSION['username']=$user;
            $_SESSION['password']=$pass; 
            $_SESSION['nama']=$nama;
            $_SESSION['kontak']=$kontak;
            $_SESSION['level']=$level;

            echo'
            <div class="container">
            <div class="row-fluid">
            <div id="page-title" class="span4 offset4">
            <div align="center"><h2>Pendaftaran Berhasil</h2>
            </br>
            <h2>Selamat Bergabung '.$_SESSION['nama'].'</h2>
            </br></br></br></br></br></br></br>
            <h3>Untuk Melanjutkan ke Halaman Admin, Klik <a href="modul/admin/index.php"><b>Disini</b></a></h3>
            </div></div></div></div>';
            
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
?>