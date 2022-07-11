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

//$dataHoraIni = "2021-07-08 00:00";
//$dataHoraFim = "2021-07-08 23:59";

$query = $pdo->query("SELECT FROM_UNIXTIME(`time@timestamp` + 10800, '%d/%m/%y - %H:%i') as 'dataHora', data_format_10 * 0.1 AS data_format_10, data_format_11 * 0.1 AS data_format_11, data_format_20 * 0.1 AS data_format_20, data_format_21 * 0.1 AS data_format_21, data_format_24 * 0.1 AS data_format_24, data_format_25 * 0.1 AS data_format_25, data_format_26 * 0.1 AS data_format_26, data_format_27 * 0.1 AS data_format_27, data_format_28 * 0.1 AS data_format_28, data_format_33 * 0.1 AS data_format_33 FROM `cMT-0484_DB_Temp_data` WHERE (FROM_UNIXTIME(`time@timestamp`, '%i:%s') like '00:0%' or (FROM_UNIXTIME(`time@timestamp`, '%i:%s') like '30:0%')) AND FROM_UNIXTIME(`time@timestamp` + 10800, '%Y-%m-%d %H:%i') BETWEEN ('$dataHoraIni') AND ('$dataHoraFim');");

$res = $query->fetchAll(PDO::FETCH_ASSOC);


for ($i=0; $i < count($res); $i++) { 
	foreach ($res[$i] as $key => $value) {

	}


    $dataHora[] = $res[$i]['dataHora'];

    $secaoCorte01[] = $res[$i]['data_format_10'];

    $secaoCorte02[] = $res[$i]['data_format_20'];

    $secaoCorte03[] = $res[$i]['data_format_21'];

    $secaoCorte04[] = $res[$i]['data_format_33'];

    $secaoSalgado[] = $res[$i]['data_format_24'];

    $secaoBandeja[] = $res[$i]['data_format_25'];

    $secaoEmbIQF[] = $res[$i]['data_format_26'];

    $secaoIQF[] = $res[$i]['data_format_28'];

    $secaoCMS[] = $res[$i]['data_format_11'];

    $secaoCMR[] = $res[$i]['data_format_27'];


}

$dados = array(
	"dataHora" => $dataHora,
	"secaoCorte01" => $secaoCorte01,
	"secaoCorte02" => $secaoCorte02,
	"secaoCorte03" => $secaoCorte03,
	"secaoCorte04" => $secaoCorte04,
	"secaoSalgado" => $secaoSalgado,
	"secaoBandeja" => $secaoBandeja,
	"secaoEmbIQF" => $secaoEmbIQF,
	"secaoIQF" => $secaoIQF,
	"secaoCMS" => $secaoCMS,
	"secaoCMR" => $secaoCMR
			);

echo json_encode($dados);


