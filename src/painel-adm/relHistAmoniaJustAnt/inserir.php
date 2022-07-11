<?php 

require_once("../../conexao.php"); 



@session_start();


$just = $_POST['justificativa'];

$id = $_POST['txtid2'];


if ($just == "") {
	
	echo "É Obrigatório uma Justificativa!";

	exit();

}


$query1 = $pdo->query("SELECT * FROM justEvent where event_index = '$id' ");

	$res1 = $query1->fetchAll(PDO::FETCH_ASSOC);

	$total_reg1 = @count($res1);



if ($total_reg1 > 0) {

	$res = $pdo->prepare("UPDATE justEvent SET dataHora_just = NOW(), just = :just where event_index = '$id'");

}else{
	
	$res = $pdo->prepare("INSERT INTO justEvent SET event_index = '$id', dataHora_just = NOW(), just = :just");



}	





$res->bindValue(":just", $just);


$res->execute();


echo 'Salvo com Sucesso!';



?>