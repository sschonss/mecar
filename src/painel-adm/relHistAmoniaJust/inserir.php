<?php

require_once("../../conexao.php");



@session_start();


$just = $_POST['justificativa'];

$id = $_POST['txtid2'];

$user = $_SESSION['id_usuario'];



if ($just == "") {

    echo "É Obrigatório uma Justificativa!";

    exit();

}


$query1 = $pdo->query("SELECT * FROM data_format_ppm where data_index = '$id' ");

$res1 = $query1->fetchAll(PDO::FETCH_ASSOC);

$total_reg1 = @count($res1);



if ($total_reg1 > 0) {

    $res = $pdo->prepare("UPDATE data_format_ppm SET data_hora_just = NOW(), justificativa = :just, user = :user where data_index = '$id'");

}else{

    $res = $pdo->prepare("INSERT INTO data_format_ppm SET data_index = '$id', data_hora_just = NOW(), justificativa = :just, user = :user where");



}





$res->bindValue(":just", $just);

$res->bindValue(":user", $user);


$res->execute();


echo 'Salvo com Sucesso!';



?>