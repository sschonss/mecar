<?php

ini_set("memory_limit", "-1");
set_time_limit(0);

require_once("../conexao.php");



$undefined = "undefined";

// Recebe o nome do Banco de Dados

$dataBase = (isset($_GET['dataBase'])) ? $_GET['dataBase'] : null;


// Gera dinâmicamente as arrays para armazenar dados provenientes do banco de dados

$data_format = $pdo->query("show columns from `{$dataBase}`;");

$res_data_format = $data_format->fetchAll(PDO::FETCH_ASSOC);

$num_data_format = count($res_data_format) - 2;

for ($a=1; $a < $num_data_format; $a++) { 
	
	${"data".$a} = array();

}

//Fim


$data = array();



$dataIni = (isset($_GET['dataIni'])) ? $_GET['dataIni'] : date('Y-m-d');
$horaIni = (isset($_GET['horaIni'])) ? $_GET['horaIni'] : date('H:i', strtotime('-240 seconds'));

$dataFim = (isset($_GET['dataFim'])) ? $_GET['dataFim'] : date('Y-m-d');
$horaFim = (isset($_GET['horaFim'])) ? $_GET['horaFim'] : date('H:i');

$dataHoraIni = $dataIni.' '.$horaIni;
$dataHoraFim = $dataFim.' '.$horaFim;

$periodo1 = strtotime($dataHoraFim);
$periodo2 = strtotime($dataHoraIni);
$periodo = ((($periodo1 - $periodo2) / 60) / 60) / 24;


$linha01 = ($_GET['linha01'] !== "") ? $_GET['linha01'] : "undefined";
$linha02 = ($_GET['linha02'] !== "") ? $_GET['linha02'] : "undefined";
$linha03 = ($_GET['linha03'] !== "") ? $_GET['linha03'] : "undefined";
$linha04 = ($_GET['linha04'] !== "") ? $_GET['linha04'] : "undefined";



if ($periodo < 1) {

	$query = "SELECT a.*, FROM_UNIXTIME(a.`time@timestamp` + 10800, '%H:%i:%s') AS 'data01' FROM `{$dataBase}` a WHERE FROM_UNIXTIME(a.`time@timestamp` + 10800, '%Y-%m-%d %H:%i') BETWEEN ('$dataHoraIni') AND ('$dataHoraFim');";

}else{

	$query = "SELECT a.*, FROM_UNIXTIME(a.`time@timestamp` + 10800, '%d-%m %H:%i:%s') AS 'data01' FROM `{$dataBase}` a WHERE FROM_UNIXTIME(a.`time@timestamp` + 10800, '%Y-%m-%d %H:%i') BETWEEN ('$dataHoraIni') AND ('$dataHoraFim');";

}

$consult = $pdo->query("{$query}");

$res = $consult->fetchAll(PDO::FETCH_ASSOC);

$row = count($res) - 1;
$timestamp  = array();

for ($i=0; $i < count($res); $i++) { 
	foreach ($res[$i] as $key => $value) {

	}

	$timestamp[] = $res[$i]['time@timestamp'];

	$data[] = $res[$i]['data01'];
	
	for ($j=0; $j < $num_data_format; $j++) { 

		

		${"campo".$j} = ($res[$i]['data_format_'.$j] == null) ? 0 : ($res[$i]['data_format_'.$j] * 0.1);
		${"data".$j}[] = ${"campo".$j};
		
	}



}


$dados = array(
	'dataLinha1' => $data,
	'dataLinha2' => $data,
	'dataLinha3' => $data,
	'dataLinha4' => $data,
	'linha1' => ${$linha01},
	'linha2' => ${$linha02},
	'linha3' => ${$linha03},
	'linha4' => ${$linha04},
);

echo json_encode($dados);


