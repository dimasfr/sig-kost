<?php
	unset($_SESSION);
	session_destroy();
	echo '
	<div class="container">
		<div class="row-fluid">
		<div id="page-title" class="span4 offset4">
		<div align="center"><h2>Logout Berhasil</h2>
		<br><br><br><br><br><br><br><br><br><br><br>

		</div></div></div></div>
	';
?>