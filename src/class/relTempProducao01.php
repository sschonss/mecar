<?php

ini_set("memory_limit", "-1");
set_time_limit(0);

require_once("../conexao.php");

$html = "";


$dataIni = $_GET['dataIni'];
$horaIni = $_GET['horaIni'];

$dataFim = $_GET['dataFim'];
$horaFim = $_GET['horaFim'];

$dataHoraIni = $dataIni . ' ' . $horaIni;
$dataHoraFim = $dataFim . ' ' . $horaFim;

//$dataHoraIni = "2021-07-08 00:00";
//$dataHoraFim = "2021-07-08 23:59";

$query = $pdo->query("SELECT FROM_UNIXTIME(`time@timestamp` + 10800, '%d/%m/%y - %H:%i') as 'dataHora', 
						data_format_12 * 0.1 AS data_format_12, 
						data_format_14 * 0.1 AS data_format_14, 
						data_format_15 * 0.1 AS data_format_15, 
						data_format_16 * 0.1 AS data_format_16, 
						data_format_17 * 0.1 AS data_format_17, 
						data_format_19 * 0.1 AS data_format_19, 
						data_format_29 * 0.1 AS data_format_29, 
						data_format_30 * 0.1 AS data_format_30, 
						data_format_31 * 0.1 AS data_format_31, 
						data_format_32 * 0.1 AS data_format_32, 
						data_format_38 * 0.1 AS data_format_38 
						FROM `cMT-0484_DB_Temp_data` 
						WHERE (FROM_UNIXTIME(`time@timestamp`, '%i:%s') like '00:0%' or (FROM_UNIXTIME(`time@timestamp`, '%i:%s') like '30:0%')) 
						AND FROM_UNIXTIME(`time@timestamp` + 10800, '%Y-%m-%d %H:%i') 
						BETWEEN ('$dataHoraIni') AND ('$dataHoraFim');");

$res = $query->fetchAll(PDO::FETCH_ASSOC);


for ($i = 0; $i < count($res); $i++) {
	foreach ($res[$i] as $key => $value) {
	}


	$dataHora[] = $res[$i]['dataHora'];

	$preChiller01[] = $res[$i]['data_format_15'];

	$chiller01[] = $res[$i]['data_format_16'];

	$preChiller02[] = $res[$i]['data_format_30'];

	$chiller02[] = $res[$i]['data_format_32'];

	$preResfri01[] = $res[$i]['data_format_14'];

	$preResfri02[] = $res[$i]['data_format_31'];

	$camResfriado01[] = $res[$i]['data_format_17'];

	$camResfriado02[] = $res[$i]['data_format_29'];

	$giroFreezer[] = $res[$i]['data_format_38'];

	$secaoEmbalagem01[] = $res[$i]['data_format_12'];

	$secaoEmbalagem02[] = $res[$i]['data_format_19'];
}

$dados = array(
	"dataHora" => $dataHora,
	"preChiller01" => $preChiller01,
	"chiller01" => $chiller01,
	"preChiller02" => $preChiller02,
	"chiller02" => $chiller02,
	"preResfri01" => $preResfri01,
	"preResfri02" => $preResfri02,
	"camResfriado01" => $camResfriado01,
	"camResfriado02" => $camResfriado02,
	"giroFreezer" => $giroFreezer,
	"secaoEmbalagem01" => $secaoEmbalagem01,
	"secaoEmbalagem02" => $secaoEmbalagem02
);

echo json_encode($dados);
