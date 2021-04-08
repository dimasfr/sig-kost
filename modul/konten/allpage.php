	<!-- start: Page Title -->
	<div id="page-title">

		<h2>Daftar Kost</h2>
		

	</div>
	<!-- end: Page Title -->
		<style>
			input[type=text] {
	    		width: 100px;
	    		-webkit-transition: width 0.4s ease-in-out;
	    		transition: width 0.4s ease-in-out;
			}
			input[type=text]:focus {
		    		width: 100%;
			}
		</style>
	<!--start: Wrapper-->
	<div id="wrapper">
		<?php	
			include 'proses.php';
		?>
		<!-- start: Container -->	
		<div class="container">
			 <form name='frmSearch' action='' method='post'>
			 	<div class="pagination-wrap">
				 	<?php echo $per_page_html; ?>
				</div>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Filter</button>
				    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				      <div class="modal-dialog" role="document">
				        <div class="modal-content">
				          <div class="modal-header">
				            <h4 class="modal-title" id="exampleModalLabel">Filter Untuk Mendapatkan Kost Impian Anda </h4>
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span>
				            </button>
				          </div>
				          <div class="modal-body">
				              <table>
				              	<tr>
				              		<td colspan="3">
				              			<div class="form-group">
							                <label for="message-text" class="form-control-label">Fasilitas : </label>
							             </div>
							        </td>
							        <td colspan="3">
							        	<div class="form-group">
							                <label for="message-text" class="form-control-label">Jenis Hunian : </label>
							             </div>
							        </td>
				              	</tr>
					         	<tr>
					         		<td width="50px"><label for="message-text" class="form-control-label"><input type="checkbox" name="fasilitas1" id="fasilitas" value="wifi" <?php echo $cek1 ?>> Wifi</label></td>
					         		<td colspan="2"><label for="message-text" class="form-control-label"><input type="checkbox" name="fasilitas2" id="fasilitas" value="lemari" <?php echo $cek2 ?>> Lemari</label></td>
					         		<td><select name="jenis">
					         			<option value="">Please Select</option>
					         			<option value="P" <?php echo $cek5 ?>>Khusus Perempuan</option>
					         			<option value="L" <?php echo $cek6 ?>>Khusus Laki-Laki</option>
					         			<option value="C" <?php echo $cek7 ?>>Perempuan & Laki-Laki</option>
					         		</select></td>
					         	</tr>
					         	<tr>
					         		<td><label for="message-text" class="form-control-label"><input type="checkbox" name="fasilitas3" id="fasilitas" value="ac" <?php echo $cek3 ?>> AC</label></td>
					         		<td colspan="2" width="250px"><label for="message-text" class="form-control-label"><input type="checkbox" name="fasilitas4" id="fasilitas" value="Mandi (Dalam" <?php echo $cek4 ?>>Kamar Mandi Dalam</label></td>
					         	</tr>
					         	<tr>
					         		<div class="form-group">
					         			<td colspan="3">Harga : </td>
					         		</div>
					         	</tr>
					         	<tr>
					         		<td colspan="3"><input type="text" name="search[keyword]" value="<?php echo $search_keyword; ?>" id="keyword"></td>
					         		<td>&nbsp;</td>
					         		<td>&nbsp;</td>
					         		<td><input type="submit" name="process" value="Process" class="btn btn-info"></td>
					         	</tr>
				              </table>
				            </form>
				          </div>
				          <div class="modal-footer">
				            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				          </div>
				        </div>
				      </div>
				    </div>
			<!-- start: Portfolio -->
			<div id="wall" class="row-fluid">
			<?php
			if(!empty($result)) { 
				foreach($result as $row) {
				?>
                <div class="span3 item <?php echo $row['jenis'] ?>">
					<div class="picture">
						<a class="image" href="index.php?modul=konten&file=content&id=<?php echo $row['id'] ?>" title="<?php echo $row['alamat'] ?>"><img src="modul/admin/modul/pic/konten/<?php echo $row['image']?>"></a>
						<div class="description">
							<p><div align="center"><?php echo $row['alamat'] ?></div></p>
							<p><div align="center"> 
								<?php 
									if ($row['jenis']=='C') {
										echo "Laki - Laki & Perempuan";
									}
									elseif ($row['jenis']=='L') {
										echo "Khusus Laki - Laki";
									}
									else {
										echo "Khusus Perempuan";
									}
								?>
								</div></p>
							<p><div align="center">Tersedia 
								<?php
									$hsl = $row['jumlah']-$row['terpakai'];
									echo $hsl;
								?> Kamar</div></p>
							<p><div align="center">Harga Mulai 
								<script type="text/javascript">
									var bilangan = <?php echo $row['harga_a'] ?>;

									var number_string = bilangan.toString(),
									sisa = number_string.length % 3,
									rupiah = number_string.substr(0, sisa),
									ribuan = number_string.substr(sisa).match(/\d{3}/g);

									if(ribuan){
										separator = sisa ? '.' : ' ';
										rupiah += separator + ribuan.join('.');
									}

									document.write('Rp.'+ rupiah);
								</script>
								</div></p>
						</div>
					</div>	
				</div>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
			?>
			</div>
			<!-- end: Portfolio -->
      		</div>
		<!--end: Container-->
	
	</div>
	<!-- end: Wrapper  -->