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

$html = "";
$html .= "<thead>";
$html .= "<tr>";
$html .= "<th>Data Hora</th>";
$html .= "<th>Vazão 01</th>";
$html .= "<th>Vazão 02</th>";
$html .= "<th>Total Hora</th>";
$html .= "</thead>";
$html .= "<tbody>";

$query = $pdo->query("SELECT dataHora, (vazao * 0.1) as vazao01, (vazao02 * 0.1) as vazao02, ((vazao + vazao02) * 0.1) as totalMoment FROM TotalVazaoETA WHERE dataHora BETWEEN ('{$dataHoraIni}') AND ('{$dataHoraFim}');");

$res = $query->fetchAll(PDO::FETCH_ASSOC);


for ($i=0; $i < count($res); $i++) { 
	foreach ($res[$i] as $key => $value) {

	}

    if ($res[$i]['vazao01'] != null || $res[$i]['vazao02'] != null) {
        
        $html .= "<tr>";

        $html .= "<td>". date('d/m/Y H:i', strtotime($res[$i]['dataHora'])). "</td>";

        $html .= "<td>". $res[$i]['vazao01']. " m³ </td>";

        $html .= "<td>". $res[$i]['vazao02']. " m³ </td>";

        $html .= "<td>". $res[$i]['totalMoment']. " m³ </td>";

        $html .= "</tr>";
    }

}


$queryTotal = $pdo->query("SELECT SUM(vazao) * 0.1 AS 'vazao01Total', SUM(vazao02) * 0.1 AS vazao02Total, (SUM(vazao) + SUM(vazao02)) * 0.1 AS totalGeral FROM TotalVazaoETA where dataHora BETWEEN ('{$dataHoraIni}') AND ('{$dataHoraFim}');");

$resTotal = $queryTotal->fetchAll(PDO::FETCH_ASSOC);


$html .= "<tr style='font-weight: bold;'>";

$html .= "<td>TOTAL</td>";

$html .= "<td>".$resTotal[0]['vazao01Total']." m³</td>";

$html .= "<td>".$resTotal[0]['vazao02Total']." m³</td>";

$html .= "<td>".$resTotal[0]['totalGeral']." m³</td>";

$html .= "</tr>";

$html .= "</tbody>";





echo json_encode($html);


