<?php 

require_once("../../conexao.php"); 



$id = $_POST['id'];




$query = $pdo->query("SELECT * FROM `cMT-0484_event` where event_index = '".$id."'");

$res = $query->fetchAll(PDO::FETCH_ASSOC);

$result = @count($res);

if ($result > 0) {

	$pdo->query("DELETE FROM `cMT-0484_event` WHERE event_index = '".$id."'");

}


$query2 = $pdo->query("SELECT * FROM justevent where event_index = '".$id."'");

$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);

$result2 = @count($res2);

if ($result2 > 0) {

	$pdo->query("DELETE FROM justevent WHERE event_index = '".$id."'");

}


echo 'Excluído com Sucesso!';



?>