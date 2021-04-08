		<?php 
			require_once 'proses.php';
			$crud = new crud($koneksi);
		?>	
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
							</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">

						<div class="page-header">
							<h1>
								Daftar Kost
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-xs-12">
										<div class="table-header">
											Menampilkan isi dari Database
										</div>

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
														<label class="pos-rel">
															ID
														</label>
													</th>
													<th>Alamat</th>
													<th>Jenis</th>
													<th>Pemilik</th>
													<th>No. Telp</th>
													<th width="8%"><center>Actions</center></th>
												</tr>
											</thead>
										<tbody>
										<?php
											if ($_SESSION['level']==0) {
												$query = "SELECT * FROM tb_kost";
											}
											elseif ($_SESSION['level']==1) {
												$query = "SELECT * FROM tb_kost WHERE pemilik = ".+$_SESSION['id'];
											}
											 
											$records_per_page=10;
											$newquery = $crud->paging($query,$records_per_page);
											$crud->dataview($newquery);
										 ?>										
									</tbody>
									<tr>
							        	<td colspan="7" align="center">
									 		<div class="pagination-wrap">
									            <?php $crud->paginglink($query,$records_per_page); ?>
									        </div>
									    </td>
									</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="clearfix">
								<div class="pull-right tableTools-container">
									<a href="index.php?modul=konten&file=tambah">
										<button class="btn btn-app btn-inverse btn-xs">
											New
										</button>
									</a>
								</div>
							</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->