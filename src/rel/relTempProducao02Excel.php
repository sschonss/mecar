<?php 
header('Content-Type: text/html; charset=iso-8859-1');
require_once("../conexao.php"); 
@session_start();

$dataIni = $_GET['dataIni'];

if ($dataIni == null) {
	$dataIni = date('Y-m-d');
}

$horaIni = $_GET['horaIni'];

if ($horaIni == null) {
	$horaIni = "00:00";
}

$dataFim = $_GET['dataFim'];

if ($dataFim == null) {
	$dataFim = date('Y-m-d');
}

$horaFim = $_GET['horaFim'];

if ($horaFim == null) {
	$horaFim = "23:59";
}


$dataHoraIni = $dataIni.' '.$horaIni;

$dataHoraFim = $dataFim.' '.$horaFim;

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = strtoupper(utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today'))));

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




  $html.='<tbody style="text-align-last: center;">';
  $html .= '<tr>';
  $html .= '<td colspan="1" rowspan="1">'.$dataHora[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$secaoCorte01[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$secaoCorte02[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$secaoCorte03[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$secaoCorte04[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$secaoSalgado[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$secaoBandeja[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$secaoEmbIQF[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$secaoIQF[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$secaoCMS[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$secaoCMR[$i].'</td>';
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
<thead>

<tr style="font-weight: bold;">
<th scope="col" colspan="11" width=75% >TEMPERATURA DE SALAS DE MANIPULAÇÃO E PRODUTOS EM PROCESSO 02</th>
</tr>
<tr id="bodyThead">
<th scope="row" rowspan="2" colspan="1"></th>
<th colspan="10" >TEMPERATURAS DE AMBIENTES</th>
</tr>
<tr>
<th scope="row"colspan="1">SEÇÃO DE CORTE 01</th>
<th colspan="1">SEÇÃO DE CORTE 02</th>
<th colspan="1">SEÇÃO DE CORTE 03</th>
<th colspan="1">SEÇÃO DE CORTE 04</th>
<th colspan="1">SEÇÃO DE SALGADO</th>
<th colspan="1">SEÇÃO DE BANDEJA</th>
<th colspan="1">SEÇÃO DE EMB. IQF</th>
<th colspan="1">SEÇÃO DE IQF</th>
<th colspan="1">SEÇÃO DE CMS</th>
<th colspan="1">SEÇÃO DE CMR</th>
</tr>
<tr>
<th scope="row" colspan="1" width=10%>DATA E HORA</th>
<th colspan="1">Temperatura</th>
<th colspan="1">Temperatura</th>
<th colspan="1">Temperatura</th>
<th colspan="1">Temperatura</th>
<th colspan="1">Temperatura</th>
<th colspan="1">Temperatura</th>
<th colspan="1">Temperatura</th>
<th colspan="1">Temperatura</th>
<th colspan="1">Temperatura</th>
<th colspan="1">Temperatura</th>
</tr>
</thead>

'.$html.'

</table>
</body>
</html>';


    		// Definimos o nome do arquivo que será exportado
$arquivo = 'Relatório temperaturas Produção.xls';
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


?>