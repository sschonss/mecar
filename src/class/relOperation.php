<?php

ini_set("memory_limit", "-1");
set_time_limit(0);

require_once("../conexao.php");

$html = "";


$dataIni = $_GET['dataIni'];
$horaIni = $_GET['horaIni'];

$dataFim = $_GET['dataFim'];
$horaFim = $_GET['horaFim'];

$dataHoraIni = strtotime($dataIni . ' ' . $horaIni);
$dataHoraFim = strtotime($dataFim . ' ' . $horaFim);


$dataHora = array();
$user_name = array();
$object_comment = array();
$action = array();
$information = array();
$ip_address = array();
$paletizacao = array();
$hostname = array();
$platform = array();


$query = $pdo->query("SELECT FROM_UNIXTIME(`time@timestamp`, '%d/%m/%y %H:%i')AS 'dataHora', `user_name`, `object_comment`, `action`, information, ip_address, hostname, platform FROM `cMT-Graxaria_operation` WHERE (`time@timestamp`) BETWEEN ('$dataHoraIni') AND ('$dataHoraFim}');");

$res = $query->fetchAll(PDO::FETCH_ASSOC);


for ($i = 0; $i < count($res); $i++) {
    foreach ($res[$i] as $key => $value) {
    }


    $dataHora[] = $res[$i]['dataHora'];

    $user_name[] = $res[$i]['user_name'];

    $object_comment[] = $res[$i]['object_comment'];

    $action[] = $res[$i]['action'];

    $information[] = $res[$i]['information'];

    $ip_address[] = $res[$i]['ip_address'];

    $hostname[] = $res[$i]['hostname'];

    $platform[] = $res[$i]['platform'];
}

$dados = array(
    "dataHora" => $dataHora,
    "user_name" => $user_name,
    "object_comment" => $object_comment,
    "action" => $action,
    "information" => $information,
    "hostname" => $hostname,
    "platform" => $platform,
    "ip_address" => $ip_address,
);

echo json_encode($dados);
