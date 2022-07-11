<?php 

require_once("../../conexao.php"); 



$id = $_POST['id'];


$pdo->query("UPDATE `data_format_ppm` SET ativo = 'off' WHERE data_index = '".$id."'");


echo 'Excluído com Sucesso!';



?>