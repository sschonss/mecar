<?php

ini_set("memory_limit", "-1");
set_time_limit(0);

require_once("../conexao.php");

$html = "";


$dataHoraIni = $_GET['dataIni'].' 05:00:00';
$dataHoraFim =  date('Y-m-d H:i:s', strtotime("+1 days", strtotime($dataHoraIni)));
$relatorio = $_GET['relatorio'];


//$dataHoraIni = "2021-07-08 05:00:00";
//$dataHoraFim = "2021-07-09 05:00:00";

$html = "";

$query = $pdo->query("SELECT * FROM {$relatorio} WHERE dataHoraIniBatelada BETWEEN ('$dataHoraIni') AND ('$dataHoraFim');");

$res = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($res) > 0) {

    $html .= '<thead align="center">';
    $html .= '<tr>';
    $html .= '<th rowspan="2">BATELADA</th>';
    $html .= '<th colspan="2">Início da Batelada</th>';
    $html .= '<th colspan="2">Início Processo Térmico</th>';
    $html .= '<th colspan="2">Final Processo Térmico</th>';
    $html .= '<th colspan="2">Final da Batelada</th>';
    $html .= '<th rowspan="2">Tempo da Batelada</th>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<th>Hora</th>';
    $html .= '<th>Temp.</th>';
    $html .= '<th>Hora</th>';
    $html .= '<th>Temp.</th>';
    $html .= '<th>Hora</th>';
    $html .= '<th>Temp.</th>';
    $html .= '<th>Hora</th>';
    $html .= '<th>Temp.</th>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody>';



    $batelada = 0;
    $tempoTotalBatelada = 0;

    for ($i=0; $i < count($res); $i++) { 
        foreach ($res[$i] as $key => $value) {

        }

        $tempoBatelada = (strtotime($res[$i]['dataHoraFimBatelada']) - strtotime($res[$i]['dataHoraIniBatelada'])) / 60;
        $tempoTotalBatelada += (strtotime($res[$i]['dataHoraFimBatelada']) - strtotime($res[$i]['dataHoraIniBatelada'])) / 60;

        $batelada = $batelada + 1;

        $html .= '<tr>';
        $html .= '<td>Batelada '.$batelada.'</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res[$i]['dataHoraIniBatelada'])).'</td>';
        $html .= '<td>'.number_format(($res[$i]['tempIniBatelada'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res[$i]['dataHoraIniTermico'])).'</td>';
        $html .= '<td>'.number_format(($res[$i]['tempIniTermico'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res[$i]['dataHoraFimTermico'])).'</td>';
        $html .= '<td>'.number_format(($res[$i]['tempFimTermico'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res[$i]['dataHoraFimBatelada'])).'</td>';
        $html .= '<td>'.number_format(($res[$i]['tempFimBatelada'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.$tempoBatelada.' Min.</td>';
        $html .= '</tr>';
    }

    $html .= '<tr>';
    $html .= '<td colspan="8"></td>';
    $html .= '<td style="font-weight: bold;">Tempo Total</td>';
    $html .= '<td style="font-weight: bold;">'.$tempoTotalBatelada.' Min.</td>';
    $html .= '</tr>';

    $html .= '</tbody>';
    
}




echo json_encode($html);


