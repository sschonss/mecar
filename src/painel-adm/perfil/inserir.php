<?php 

require_once("../../conexao.php");



$nome = $_POST['nome'];

@$perfil = $_POST['perfil'];
if ($perfil != "on") {
	$perfil = "off";
}

@$usuarios = $_POST['usuarios'];
if ($usuarios != "on") {
	$usuarios = "off";
}

@$grafTemp = $_POST['grafTemp'];
if ($grafTemp != "on") {
	$grafTemp = "off";
}

@$grafAmon = $_POST['grafAmon'];
if ($grafAmon != "on") {
	$grafAmon = "off";
}

@$relTempFrig = $_POST['relTempFrig'];
if ($relTempFrig != "on") {
	$relTempFrig = "off";
}

@$relTempProd01 = $_POST['relTempProd01'];
if ($relTempProd01 != "on") {
	$relTempProd01 = "off";
}

@$relTempProd02 = $_POST['relTempProd02'];
if ($relTempProd02 != "on") {
	$relTempProd02 = "off";
}

@$eta = $_POST['eta'];
if ($eta != "on") {
	$eta = "off";
}

@$histAlarmeAmon = $_POST['histAlarmeAmon'];
if ($histAlarmeAmon != "on") {
	$histAlarmeAmon = "off";
}

@$alarmeAmonJust = $_POST['alarmeAmonJust'];
if ($alarmeAmonJust != "on") {
	$alarmeAmonJust = "off";
}

@$alarmeAmonNaoJust = $_POST['alarmeAmonNaoJust'];
if ($alarmeAmonNaoJust != "on") {
	$alarmeAmonNaoJust = "off";
}

@$relFabricaFarinha = $_POST['relFabricaFarinha'];
if ($relFabricaFarinha != "on") {
	$relFabricaFarinha = "off";
}

@$relOperation = $_POST['relOperation'];
if ($relOperation != "on") {
	$relOperation = "off";
}


$id = $_POST['txtid2'];



if($nome == ""){

	echo 'O nome do Perfil é Obrigatório!';

	exit();

}

if($id == ""){

	$res = $pdo->prepare("INSERT INTO perfil SET nome = :nome, perfil = :perfil, usuarios = :usuarios, grafTemp = :grafTemp, grafAmon = :grafAmon, relTempFrig = :relTempFrig, relTempProd01 = :relTempProd01, relTempProd02 = :relTempProd02, eta = :eta, histAlarmeAmon = :histAlarmeAmon, alarmeAmonJust = :alarmeAmonJust, alarmeAmonNaoJust = :alarmeAmonNaoJust, relFabricaFarinha = :relFabricaFarinha ;");	





}else{


		$res = $pdo->prepare("UPDATE perfil SET nome = :nome, perfil = :perfil, usuarios = :usuarios, grafTemp = :grafTemp, grafAmon = :grafAmon, relTempFrig = :relTempFrig, relTempProd01 = :relTempProd01, relTempProd02 = :relTempProd02, eta = :eta, histAlarmeAmon = :histAlarmeAmon, alarmeAmonJust = :alarmeAmonJust, alarmeAmonNaoJust = :alarmeAmonNaoJust, relFabricaFarinha = :relFabricaFarinha WHERE id = '$id'");
	

}



$res->bindValue(":nome", $nome);

$res->bindValue(":perfil", $perfil);

$res->bindValue(":usuarios", $usuarios);

$res->bindValue(":grafTemp", $grafTemp);

$res->bindValue(":grafAmon", $grafAmon);

$res->bindValue(":relTempFrig", $relTempFrig);

$res->bindValue(":relTempProd01", $relTempProd01);

$res->bindValue(":relTempProd02", $relTempProd02);

$res->bindValue(":eta", $eta);

$res->bindValue(":histAlarmeAmon", $histAlarmeAmon);

$res->bindValue(":alarmeAmonJust", $alarmeAmonJust);

$res->bindValue(":alarmeAmonNaoJust", $alarmeAmonNaoJust);

$res->bindValue(":relFabricaFarinha", $relFabricaFarinha);



$res->execute();



echo 'Salvo com Sucesso!';
