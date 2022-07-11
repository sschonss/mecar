<?php 
header('Content-Type: text/html; charset=iso-8859-1');
require_once("../conexao.php"); 
@session_start();



$dataHoraIni = $_GET['dataIni'].' 05:00:00';
$dataHoraFim =  date('Y-m-d H:i:s', strtotime("+1 days", strtotime($dataHoraIni)));
$relatorio = $_GET['relatorio'];

if ($relatorio == "visceras01") {

  $nome_relatorio = "Visceras 01";

}

if ($relatorio == "visceras02") {

  $nome_relatorio = "Visceras 02";
  
}

if ($relatorio == "visceras03") {

  $nome_relatorio = "Visceras 03";
  
}

if ($relatorio == "penas01") {

  $nome_relatorio = "Penas 01";
  
}

if ($relatorio == "penas02") {

  $nome_relatorio = "Penas 02";
  
}

if ($relatorio == "penas03") {

  $nome_relatorio = "Penas 03";
  
}



setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = strtoupper(utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today'))));

$query = $pdo->query("SELECT * FROM {$relatorio} WHERE dataHoraIniBatelada BETWEEN ('$dataHoraIni') AND ('$dataHoraFim');");

$res = $query->fetchAll(PDO::FETCH_ASSOC);



$batelada = 0;
$tempoTotalBatelada = 0;



for ($i=0; $i < count($res); $i++) { 

  foreach ($res[$i] as $key => $value) {

  }

  $tempoBatelada = (strtotime($res[$i]['dataHoraFimBatelada']) - strtotime($res[$i]['dataHoraIniBatelada'])) / 60;
  $tempoTotalBatelada += (strtotime($res[$i]['dataHoraFimBatelada']) - strtotime($res[$i]['dataHoraIniBatelada'])) / 60;

  $batelada = $batelada + 1;

  $html .= '<tr>';
  $html .= '<td colspan="2">Batelada '.$batelada.'</td>';
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
$html .= '<td colspan="9"></td>';
$html .= '<td style="font-weight: bold;">Tempo Total</td>';
$html .= '<td style="font-weight: bold;">'.$tempoTotalBatelada.' Min.</td>';
$html .= '</tr>';

$html .= '</tbody>';





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
<thead >
<tr style="background-color:#a9a9a9; font-weight: bold;">
<td colspan="2" rowspan="1">'.$nome_relatorio.'</td>
<td colspan="9" rowspan="1">Controle de tempo de processo térmico a uma temperatura mínima de 70°C, por no mínimo 45 min.</td>
</tr>
<tr style="font-weight: bold;">
<td colspan="2" rowspan="2">BATELADA</td>
<td colspan="2" rowspan="1">Início da batelada</td>
<td colspan="2" rowspan="1">Início Processo térmico</td>
<td colspan="2" rowspan="1">Final processo térmico</td>
<td colspan="2" rowspan="1">Final da batelada</td>
<td colspan="1" rowspan="2">Tempo da batelada</td>
</tr>
<tr style="font-weight: bold;">
<td colspan="1" rowspan="1">Hora</td>
<td colspan="1" rowspan="1">Temp.</td>
<td colspan="1" rowspan="1">Hora</td>
<td colspan="1" rowspan="1">Temp.</td>
<td colspan="1" rowspan="1">Hora</td>
<td colspan="1" rowspan="1">Temp.</td>
<td colspan="1" rowspan="1">Hora</td>
<td colspan="1" rowspan="1">Temp.</td>
</tr>
</thead>

'.$html.'

</table>
</body>
</html>';


    		// Definimos o nome do arquivo que será exportado
$arquivo = 'Relatório Fabrica Sub-Produto'.$nome_relatorio.'.xls';
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
