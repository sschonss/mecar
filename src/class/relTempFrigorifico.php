<?php

ini_set("memory_limit", "-1");
set_time_limit(0);

require_once("../conexao.php");

$html = "";


$dataIni = $_GET['dataIni'];
$horaIni = $_GET['horaIni'];

$dataFim = $_GET['dataFim'];
$horaFim = $_GET['horaFim'];

$dataHoraIni = $dataIni.' '.$horaIni;
$dataHoraFim = $dataFim.' '.$horaFim;


$dataHora = array();
$camara01 = array();
$camara02 = array();
$camara03 = array();
$camara04 = array();
$expedicao = array();
$paletizacao = array();
$tunelEst = array();
$tunelCont = array();
$embSecund01 = array();
$embSecund02 = array();


$query = $pdo->query("SELECT FROM_UNIXTIME(`time@timestamp` + 10800, '%d/%m/%y %H:%i')AS 'dataHora', 
						data_format_1 * 0.1 AS data_format_1, 
						data_format_2 * 0.1 AS data_format_2, 
						data_format_3 * 0.1 AS data_format_3, 
						data_format_4 * 0.1 AS data_format_4, 
						data_format_5 * 0.1 AS data_format_5, 
						data_format_6 * 0.1 AS data_format_6, 
						data_format_8 * 0.1 AS data_format_8, 
						data_format_9 * 0.1 AS data_format_9, 
						data_format_13 * 0.1 AS data_format_13, 
						data_format_23 * 0.1 AS data_format_23 
						FROM `cMT-0484_DB_Temp_data` 
						WHERE (FROM_UNIXTIME(`time@timestamp`, '%i:%s') like '00:0%' or (FROM_UNIXTIME(`time@timestamp`, '%i:%s') like '30:0%')) 
						AND FROM_UNIXTIME(`time@timestamp` + 10800, '%Y-%m-%d %H:%i') 
						BETWEEN ('{$dataHoraIni}') AND ('{$dataHoraFim}');");

$res = $query->fetchAll(PDO::FETCH_ASSOC);


for ($i=0; $i < count($res); $i++) { 
	foreach ($res[$i] as $key => $value) {

	}


    $dataHora[] = $res[$i]['dataHora'];

    $camara01[] = $res[$i]['data_format_1'];

    $camara02[] = $res[$i]['data_format_2'];

    $camara03[] = $res[$i]['data_format_3'];

    $camara04[] = $res[$i]['data_format_4'];

    $expedicao[] = $res[$i]['data_format_5'];

    $paletizacao[] = $res[$i]['data_format_6'];

    $tunelEst[] = $res[$i]['data_format_8'];

    $tunelCont[] = $res[$i]['data_format_9'];

    $embSecund01[] = $res[$i]['data_format_13'];

    $embSecund02[] = $res[$i]['data_format_23'];


}

$dados = array(
	"dataHora" => $dataHora,
	"camara01" => $camara01,
	"camara02" => $camara02,
	"camara03" => $camara03,
	"camara04" => $camara04,
	"tunelEst" => $tunelEst,
	"tunelCont" => $tunelCont,
	"embSecund01" => $embSecund01,
	"embSecund02" => $embSecund02,
	"expedicao" => $expedicao,
	"paletizacao" => $paletizacao
	);

echo json_encode($dados);


