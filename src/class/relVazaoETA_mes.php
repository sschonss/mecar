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

//$dataHoraIni = "2020-01-01 00:50";
//$dataHoraFim = "2020-07-01 00:50";

$html = "";
$html .= "<thead>";
$html .= "<tr>";
$html .= "<th>Mês/Ano</th>";
$html .= "<th>Vazão 01</th>";
$html .= "<th>Vazão 02</th>";
$html .= "<th>Total Mês</th>";
$html .= "</thead>";
$html .= "<tbody>";


$dataHoraBuscaFim =  date('Y-m-d H:i', strtotime("+1 month", strtotime($dataHoraIni)));

//Verifica o numero de anos entre as datas da pesquisa

$anoOrigin = new DateTime($dataHoraIni);
$anoTarget = new DateTime($dataHoraFim);
$anoInterval = $anoOrigin->diff($anoTarget);
$intervalAno = $anoInterval->y;


//Verifica o numero de meses entre as datas da pesquisa

$dataOrigin = new DateTime($dataHoraIni);
$dataTarget = new DateTime($dataHoraFim);
$dataInterval = $dataOrigin->diff($dataTarget);
$intervalMes = $dataInterval->m;


//Indica valor para o for
if ($intervalAno > 0) {
    
    $interval = (12 * $intervalAno) + $intervalMes;

}else{

    $interval = $intervalMes;

}

//Fim

//Inicio do For para busca em banco de dados
for ($a=0; $a < $interval; $a++) { 

    $day = "+".$a." month";

    $dataHoraInicio = date('Y-m-d H:i', strtotime($day, strtotime($dataHoraIni)));

    $dataHoraFinal = date('Y-m-d H:i', strtotime($day, strtotime($dataHoraBuscaFim)));

   
    $query = $pdo->query("SELECT dataHora, SUM(vazao) * 0.1 AS 'vazao01', SUM(vazao02) * 0.1 AS vazao02, (SUM(vazao) + SUM(vazao02)) * 0.1 AS totalMoment FROM TotalVazaoETA where dataHora BETWEEN ('{$dataHoraInicio}') AND ('{$dataHoraFinal}');");

    $res = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($res[0]['vazao01'] != null || $res[0]['vazao02'] != null) {
               
        $html .= "<tr>";

        $html .= "<td>". date('m/Y', strtotime($res[0]['dataHora'])). "</td>";

        $html .= "<td>". $res[0]['vazao01']. " m³ </td>";

        $html .= "<td>". $res[0]['vazao02']. " m³ </td>";

        $html .= "<td>". $res[0]['totalMoment']. " m³ </td>";

        $html .= "</tr>";

    }    

}

//Fim

//Inicio do totalizado em Banco de Dados
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


