<?php 
header('Content-Type: text/html; charset=iso-8859-1');
require_once("../conexao.php"); 
@session_start();



$dataHoraIni = $_GET['dataIni'].' 05:00:00';
$dataHoraFim =  date('Y-m-d H:i:s', strtotime("+1 days", strtotime($dataHoraIni)));



setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = strtoupper(utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today'))));

$html = "";

$query_viscera01 = $pdo->query("SELECT * FROM visceras01 WHERE dataHoraIniBatelada BETWEEN ('$dataHoraIni') AND ('$dataHoraFim');");

$res_viscera01 = $query_viscera01->fetchAll(PDO::FETCH_ASSOC);

if (count($res_viscera01) > 0) {

    $html .= '<thead align="center">';
    $html .= '<tr>';
    $html .= '<th colspan="10">VISCERAS 01</th>';
    $html .= '</tr>';
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



    $batelada_viscera01 = 0;
    $tempoTotalBatelada_viscera01 = 0;

    for ($i=0; $i < count($res_viscera01); $i++) { 
        foreach ($res_viscera01[$i] as $key => $value) {

        }

        $tempoBatelada_viscera01 = (strtotime($res_viscera01[$i]['dataHoraFimBatelada']) - strtotime($res_viscera01[$i]['dataHoraIniBatelada'])) / 60;
        $tempoTotalBatelada_viscera01 += (strtotime($res_viscera01[$i]['dataHoraFimBatelada']) - strtotime($res_viscera01[$i]['dataHoraIniBatelada'])) / 60;

        $batelada_viscera01 = $batelada_viscera01 + 1;


        $html .= '<tr>';
        $html .= '<td>Batelada '.$batelada_viscera01.'</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_viscera01[$i]['dataHoraIniBatelada'])).'</td>';
        $html .= '<td>'.number_format(($res_viscera01[$i]['tempIniBatelada'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_viscera01[$i]['dataHoraIniTermico'])).'</td>';
        $html .= '<td>'.number_format(($res_viscera01[$i]['tempIniTermico'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_viscera01[$i]['dataHoraFimTermico'])).'</td>';
        $html .= '<td>'.number_format(($res_viscera01[$i]['tempFimTermico'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_viscera01[$i]['dataHoraFimBatelada'])).'</td>';
        $html .= '<td>'.number_format(($res_viscera01[$i]['tempFimBatelada'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.$tempoBatelada_viscera01.' Min.</td>';
        $html .= '</tr>';
    }

    $html .= '<tr>';
    $html .= '<td colspan="8"></td>';
    $html .= '<td style="font-weight: bold;">Tempo Total</td>';
    $html .= '<td style="font-weight: bold;">'.$tempoTotalBatelada_viscera01.' Min.</td>';
    $html .= '</tr>';

    $html .= '</tbody>';
    
}




$query_viscera02 = $pdo->query("SELECT * FROM visceras02 WHERE dataHoraIniBatelada BETWEEN ('$dataHoraIni') AND ('$dataHoraFim');");

$res_viscera02 = $query_viscera02->fetchAll(PDO::FETCH_ASSOC);

if (count($res_viscera02) > 0) {

    $html .= '<thead align="center">';
    $html .= '<tr>';
    $html .= '<th colspan="10">VISCERAS 02</th>';
    $html .= '</tr>';
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



    $batelada_viscera02 = 0;
    $tempoTotalBatelada_viscera02 = 0;

    for ($i=0; $i < count($res_viscera02); $i++) { 
        foreach ($res_viscera02[$i] as $key => $value) {

        }

        $tempoBatelada_viscera02 = (strtotime($res_viscera02[$i]['dataHoraFimBatelada']) - strtotime($res_viscera02[$i]['dataHoraIniBatelada'])) / 60;
        $tempoTotalBatelada_viscera02 += (strtotime($res_viscera02[$i]['dataHoraFimBatelada']) - strtotime($res_viscera02[$i]['dataHoraIniBatelada'])) / 60;

        $batelada_viscera02 = $batelada_viscera02 + 1;


        $html .= '<tr>';
        $html .= '<td>Batelada '.$batelada_viscera02.'</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_viscera02[$i]['dataHoraIniBatelada'])).'</td>';
        $html .= '<td>'.number_format(($res_viscera02[$i]['tempIniBatelada'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_viscera02[$i]['dataHoraIniTermico'])).'</td>';
        $html .= '<td>'.number_format(($res_viscera02[$i]['tempIniTermico'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_viscera02[$i]['dataHoraFimTermico'])).'</td>';
        $html .= '<td>'.number_format(($res_viscera02[$i]['tempFimTermico'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_viscera02[$i]['dataHoraFimBatelada'])).'</td>';
        $html .= '<td>'.number_format(($res_viscera02[$i]['tempFimBatelada'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.$tempoBatelada_viscera02.' Min.</td>';
        $html .= '</tr>';
    }

    $html .= '<tr>';
    $html .= '<td colspan="8"></td>';
    $html .= '<td style="font-weight: bold;">Tempo Total</td>';
    $html .= '<td style="font-weight: bold;">'.$tempoTotalBatelada_viscera02.' Min.</td>';
    $html .= '</tr>';

    $html .= '</tbody>';
    
}

$query_viscera03 = $pdo->query("SELECT * FROM visceras03 WHERE dataHoraIniBatelada BETWEEN ('$dataHoraIni') AND ('$dataHoraFim');");

$res_viscera03 = $query_viscera03->fetchAll(PDO::FETCH_ASSOC);

if (count($res_viscera03) > 0) {

    $html .= '<thead align="center">';
    $html .= '<tr>';
    $html .= '<th colspan="10">VISCERAS 03</th>';
    $html .= '</tr>';
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



    $batelada_viscera03 = 0;
    $tempoTotalBatelada_viscera03 = 0;

    for ($i=0; $i < count($res_viscera03); $i++) { 
        foreach ($res_viscera03[$i] as $key => $value) {

        }

        $tempoBatelada_viscera03 = (strtotime($res_viscera03[$i]['dataHoraFimBatelada']) - strtotime($res_viscera03[$i]['dataHoraIniBatelada'])) / 60;
        $tempoTotalBatelada_viscera03 += (strtotime($res_viscera03[$i]['dataHoraFimBatelada']) - strtotime($res_viscera03[$i]['dataHoraIniBatelada'])) / 60;

        $batelada_viscera03 = $batelada_viscera03 + 1;


        $html .= '<tr>';
        $html .= '<td>Batelada '.$batelada_viscera03.'</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_viscera03[$i]['dataHoraIniBatelada'])).'</td>';
        $html .= '<td>'.number_format(($res_viscera03[$i]['tempIniBatelada'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_viscera03[$i]['dataHoraIniTermico'])).'</td>';
        $html .= '<td>'.number_format(($res_viscera03[$i]['tempIniTermico'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_viscera03[$i]['dataHoraFimTermico'])).'</td>';
        $html .= '<td>'.number_format(($res_viscera03[$i]['tempFimTermico'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_viscera03[$i]['dataHoraFimBatelada'])).'</td>';
        $html .= '<td>'.number_format(($res_viscera03[$i]['tempFimBatelada'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.$tempoBatelada_viscera03.' Min.</td>';
        $html .= '</tr>';
    }

    $html .= '<tr>';
    $html .= '<td colspan="8"></td>';
    $html .= '<td style="font-weight: bold;">Tempo Total</td>';
    $html .= '<td style="font-weight: bold;">'.$tempoTotalBatelada_viscera03.' Min.</td>';
    $html .= '</tr>';

    $html .= '</tbody>';
    
}

$query_penas01 = $pdo->query("SELECT * FROM penas01 WHERE dataHoraIniBatelada BETWEEN ('$dataHoraIni') AND ('$dataHoraFim');");

$res_penas01 = $query_penas01->fetchAll(PDO::FETCH_ASSOC);

if (count($res_penas01) > 0) {

    $html .= '<thead align="center">';
    $html .= '<tr>';
    $html .= '<th colspan="10">PENAS 01</th>';
    $html .= '</tr>';
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



    $batelada_penas01 = 0;
    $tempoTotalBatelada_penas01 = 0;

    for ($i=0; $i < count($res_penas01); $i++) { 
        foreach ($res_penas01[$i] as $key => $value) {

        }

        $tempoBatelada_penas01 = (strtotime($res_penas01[$i]['dataHoraFimBatelada']) - strtotime($res_penas01[$i]['dataHoraIniBatelada'])) / 60;
        $tempoTotalBatelada_penas01 += (strtotime($res_penas01[$i]['dataHoraFimBatelada']) - strtotime($res_penas01[$i]['dataHoraIniBatelada'])) / 60;

        $batelada_penas01 = $batelada_penas01 + 1;


        $html .= '<tr>';
        $html .= '<td>Batelada '.$batelada_penas01.'</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_penas01[$i]['dataHoraIniBatelada'])).'</td>';
        $html .= '<td>'.number_format(($res_penas01[$i]['tempIniBatelada'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_penas01[$i]['dataHoraIniTermico'])).'</td>';
        $html .= '<td>'.number_format(($res_penas01[$i]['tempIniTermico'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_penas01[$i]['dataHoraFimTermico'])).'</td>';
        $html .= '<td>'.number_format(($res_penas01[$i]['tempFimTermico'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_penas01[$i]['dataHoraFimBatelada'])).'</td>';
        $html .= '<td>'.number_format(($res_penas01[$i]['tempFimBatelada'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.$tempoBatelada_penas01.' Min.</td>';
        $html .= '</tr>';
    }

    $html .= '<tr>';
    $html .= '<td colspan="8"></td>';
    $html .= '<td style="font-weight: bold;">Tempo Total</td>';
    $html .= '<td style="font-weight: bold;">'.$tempoTotalBatelada_penas01.' Min.</td>';
    $html .= '</tr>';

    $html .= '</tbody>';
    
}

$query_penas02 = $pdo->query("SELECT * FROM penas02 WHERE dataHoraIniBatelada BETWEEN ('$dataHoraIni') AND ('$dataHoraFim');");

$res_penas02 = $query_penas02->fetchAll(PDO::FETCH_ASSOC);

if (count($res_penas02) > 0) {

    $html .= '<thead align="center">';
    $html .= '<tr>';
    $html .= '<th colspan="10">PENAS 02</th>';
    $html .= '</tr>';
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



    $batelada_penas02 = 0;
    $tempoTotalBatelada_penas02 = 0;

    for ($i=0; $i < count($res_penas02); $i++) { 
        foreach ($res_penas02[$i] as $key => $value) {

        }

        $tempoBatelada_penas02 = (strtotime($res_penas02[$i]['dataHoraFimBatelada']) - strtotime($res_penas02[$i]['dataHoraIniBatelada'])) / 60;
        $tempoTotalBatelada_penas02 += (strtotime($res_penas02[$i]['dataHoraFimBatelada']) - strtotime($res_penas02[$i]['dataHoraIniBatelada'])) / 60;

        $batelada_penas02 = $batelada_penas02 + 1;


        $html .= '<tr>';
        $html .= '<td>Batelada '.$batelada_penas02.'</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_penas02[$i]['dataHoraIniBatelada'])).'</td>';
        $html .= '<td>'.number_format(($res_penas02[$i]['tempIniBatelada'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_penas02[$i]['dataHoraIniTermico'])).'</td>';
        $html .= '<td>'.number_format(($res_penas02[$i]['tempIniTermico'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_penas02[$i]['dataHoraFimTermico'])).'</td>';
        $html .= '<td>'.number_format(($res_penas02[$i]['tempFimTermico'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_penas02[$i]['dataHoraFimBatelada'])).'</td>';
        $html .= '<td>'.number_format(($res_penas02[$i]['tempFimBatelada'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.$tempoBatelada_penas02.' Min.</td>';
        $html .= '</tr>';
    }

    $html .= '<tr>';
    $html .= '<td colspan="8"></td>';
    $html .= '<td style="font-weight: bold;">Tempo Total</td>';
    $html .= '<td style="font-weight: bold;">'.$tempoTotalBatelada_penas02.' Min.</td>';
    $html .= '</tr>';

    $html .= '</tbody>';
    
}

$query_penas03 = $pdo->query("SELECT * FROM penas03 WHERE dataHoraIniBatelada BETWEEN ('$dataHoraIni') AND ('$dataHoraFim');");

$res_penas03 = $query_penas03->fetchAll(PDO::FETCH_ASSOC);

if (count($res_penas03) > 0) {

    $html .= '<thead align="center">';
    $html .= '<tr>';
    $html .= '<th colspan="10">PENAS 03</th>';
    $html .= '</tr>';
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



    $batelada_penas03 = 0;
    $tempoTotalBatelada_penas03 = 0;

    for ($i=0; $i < count($res_penas03); $i++) { 
        foreach ($res_penas03[$i] as $key => $value) {

        }

        $tempoBatelada_penas03 = (strtotime($res_penas03[$i]['dataHoraFimBatelada']) - strtotime($res_penas03[$i]['dataHoraIniBatelada'])) / 60;
        $tempoTotalBatelada_penas03 += (strtotime($res_penas03[$i]['dataHoraFimBatelada']) - strtotime($res_penas03[$i]['dataHoraIniBatelada'])) / 60;

        $batelada_penas03 = $batelada_penas03 + 1;

        $html .= '<tr>';
        $html .= '<td>Batelada '.$batelada_penas03.'</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_penas03[$i]['dataHoraIniBatelada'])).'</td>';
        $html .= '<td>'.number_format(($res_penas03[$i]['tempIniBatelada'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_penas03[$i]['dataHoraIniTermico'])).'</td>';
        $html .= '<td>'.number_format(($res_penas03[$i]['tempIniTermico'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_penas03[$i]['dataHoraFimTermico'])).'</td>';
        $html .= '<td>'.number_format(($res_penas03[$i]['tempFimTermico'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.date('d/m/Y H:i', strtotime($res_penas03[$i]['dataHoraFimBatelada'])).'</td>';
        $html .= '<td>'.number_format(($res_penas03[$i]['tempFimBatelada'] * 0.01), 2, '.','').' °C</td>';
        $html .= '<td>'.$tempoBatelada_penas03.' Min.</td>';
        $html .= '</tr>';
    }

    $html .= '<tr>';
    $html .= '<td colspan="8"></td>';
    $html .= '<td style="font-weight: bold;">Tempo Total</td>';
    $html .= '<td style="font-weight: bold;">'.$tempoTotalBatelada_penas03.' Min.</td>';
    $html .= '</tr>';

    $html .= '</tbody>';
    
}





$body = '
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style>
table{
  text-align: center;
}
</style>
</head>
<body>
<table cellspacing="0" cellpadding="1" border="1">
'.$html.'
</table>
</body>
</html>';


    		// Definimos o nome do arquivo que será exportado
$arquivo = 'Relatório Fabrica Sub-Produto.xls';
    		// Configurações header para forçar o download
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );
    		// Envia o conteúdo do arquivo
echo $body;
exit;
