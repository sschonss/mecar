<?php 
require_once("../conexao.php"); 
@session_start();

$dataIni = $_GET['dataIni'];
$relatorio = $_GET['relatorio'];


if ($relatorio == "geral") {
	
	$html = file_get_contents($url."rel/relSubProdutoGeral_html.php?dataIni=$dataIni");

}else{

	$html = file_get_contents($url."rel/relSubProduto_html.php?dataIni=$dataIni&relatorio=$relatorio");

}





echo $html;
