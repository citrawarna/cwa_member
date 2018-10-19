<?php 
include "koneksi.php";
$title = "Undi ";
$content = "Undi Pemenang Hadiah ";
require_once('layouts/header.php');
?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="bg-content">
				<h1 id="winner">&nbsp;</h1>
			</div>
		</div>
	</div>
	<br>
	<div class="row justify-content-center">
		<div class="col-md-6">
			<button type="button" onclick="showUser()" class="btn btn-block btn-primary" id="btnShake">Shake</button>
		</div>
	</div>
	<input type="hidden" id="val" value="0">
</div>

<?php 
require_once('layouts/footer.php');
?>