<?php
session_start();
echo'
    <center><h1>Acces Denied</h1><b><h3>Maaf <b>' .$_SESSION['nickname'].  '</b> Anda Tidak dapat masuk di Halaman Admin , <a href="../index.php">Kembali</a></h3>
';
?>
