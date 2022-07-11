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

//$dataHoraIni = "2021-07-07 00:50";
//$dataHoraFim = "2021-07-13 00:50";

$html = "";
$html .= "<thead>";
$html .= "<tr>";
$html .= "<th>Data</th>";
$html .= "<th>Vazão 01</th>";
$html .= "<th>Vazão 02</th>";
$html .= "<th>Total Dia</th>";
$html .= "</thead>";
$html .= "<tbody>";


$dataHoraBuscaFim =  date('Y-m-d H:i', strtotime("+1 days", strtotime($dataHoraIni)));


//Verifica o numero de dias entre as datas da pesquisa

$dataOrigin = new DateTime($dataHoraIni);
$dataTarget = new DateTime($dataHoraFim);
$dataInterval = $dataOrigin->diff($dataTarget);
$interval = $dataInterval->days;



for ($a=0; $a < $interval; $a++) { 

    $day = "+".$a." days";

    $dataHoraInicio = date('Y-m-d H:i', strtotime($day, strtotime($dataHoraIni)));

    $dataHoraFinal = date('Y-m-d H:i', strtotime($day, strtotime($dataHoraBuscaFim)));

   
    $query = $pdo->query("SELECT dataHora, SUM(vazao) * 0.1 AS 'vazao01', SUM(vazao02) * 0.1 AS vazao02, (SUM(vazao) + SUM(vazao02)) * 0.1 AS totalMoment FROM TotalVazaoETA where dataHora BETWEEN ('{$dataHoraInicio}') AND ('{$dataHoraFinal}');");

    $res = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($res[0]['vazao01'] != null || $res[0]['vazao02'] != null) {
        
        $html .= "<tr>";

        $html .= "<td>". date('d/m/Y', strtotime($res[0]['dataHora'])). "</td>";

        $html .= "<td>". $res[0]['vazao01']. " m³ </td>";

        $html .= "<td>". $res[0]['vazao02']. " m³ </td>";

        $html .= "<td>". $res[0]['totalMoment']. " m³ </td>";

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


