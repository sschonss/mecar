<?php
@session_start();
if (@$_SESSION['painel'] != 'painel-adm') {
	echo "<script language='javascript'> window.location='../index.php' </script>";
}

require_once("../conexao.php");



?>


<div class="row justify-content-md-center">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 pt-5">
		<img src="../img/LOGOTIPO_HORIZONTAL_4.png" style="width: 100%; opacity: 0.1;">
	</div>
</div>