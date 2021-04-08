<?php
$no = -1;
$query = $koneksi->prepare("SELECT * FROM tb_kost");
$query->execute();
while ($data = $query->fetch()) {
      $no++;
      $id[$no] = $data["id"];
      $alamat[$no]  = $data["alamat"];
      $lat[$no]   = $data["latitude"];
      $long[$no]  = $data["longitude"];
      $harga[$no]  = $data["harga_a"];
      $jenis[$no]  = $data["jenis"];
}
$i=1;
?>

<script type="text/javascript">
      var id = new Array();
      var infoal = new Array();
      var infolati = new Array();
      var infolong = new Array();
      var infoharga = new Array();
      var infojenis = new Array();

            <?php
            for ($i = 0; $i <= $no ; $i++) 
            {
            ?>
                  id[<?php echo $i ?>] = <?php echo $id[$i] ?>;
                  infoal[<?php echo $i ?>]   = '<?php echo $alamat[$i] ?>';
                  infolati[<?php echo $i ?>] = <?php echo $lat[$i] ?>;
                  infolong[<?php echo $i ?>] = <?php echo $long[$i] ?>;
                  infoharga[<?php echo $i ?>] = '<?php echo $harga[$i] ?>';
                  infojenis[<?php echo $i ?>] = '<?php echo $jenis[$i] ?>';
            <?php
            }
            ?>
    </script>