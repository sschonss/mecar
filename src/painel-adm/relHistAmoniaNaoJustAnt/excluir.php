<?php 

require_once("../../conexao.php"); 



$id = $_POST['id'];


$pdo->query("DELETE FROM `cMT-0484_event` WHERE event_index = '".$id."'");


echo 'Excluído com Sucesso!';



?>