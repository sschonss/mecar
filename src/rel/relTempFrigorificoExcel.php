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

$query = $pdo->query("SELECT FROM_UNIXTIME(`time@timestamp` + 10800, '%d/%m/%y %H:%i')AS 'dataHora', data_format_1 * 0.1 AS data_format_1, data_format_2 * 0.1 AS data_format_2, data_format_3 * 0.1 AS data_format_3, data_format_4 * 0.1 AS data_format_4, data_format_5 * 0.1 AS data_format_5, data_format_6 * 0.1 AS data_format_6, data_format_8 * 0.1 AS data_format_8, data_format_9 * 0.1 AS data_format_9, data_format_13 * 0.1 AS data_format_13, data_format_23 * 0.1 AS data_format_23 FROM `cMT-0484_DB_Temp_data` WHERE (FROM_UNIXTIME(`time@timestamp`, '%i:%s') like '00:0%' or (FROM_UNIXTIME(`time@timestamp`, '%i:%s') like '30:0%')) AND FROM_UNIXTIME(`time@timestamp` + 10800, '%Y-%m-%d %H:%i') BETWEEN ('{$dataHoraIni}') AND ('{$dataHoraFim}');");

$res = $query->fetchAll(PDO::FETCH_ASSOC);



for ($i=0; $i < count($res); $i++) { 

  foreach ($res[$i] as $key => $value) {

  }


  $dataHora[] = $res[$i]['dataHora'];

  $camara01[] = $res[$i]['data_format_1'];

  $camara02[] = $res[$i]['data_format_2'];

  $camara03[] = $res[$i]['data_format_3'];

  $camara04[] = $res[$i]['data_format_4'];

  $expedicao[] = $res[$i]['data_format_5'];

  $paletizacao[] = $res[$i]['data_format_6'];

  $tunelEst[] = $res[$i]['data_format_8'];

  $tunelCont[] = $res[$i]['data_format_9'];

  $embSecund01[] = $res[$i]['data_format_13'];

  $embSecund02[] = $res[$i]['data_format_23'];




  $html.='<tbody style="text-align-last: center;">';
  $html .= '<tr>';
  $html .= '<td colspan="1" rowspan="1">'.$dataHora[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$camara01[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$camara02[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$camara03[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$camara04[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$tunelEst[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$tunelCont[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$embSecund01[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$embSecund02[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$expedicao[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$paletizacao[$i].'</td>';
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
<th scope="col" colspan="11" width=75% >TEMPERATURA DE CÂMARAS FRIAS, TÚNEIS DE CONGELAMENTO E SALAS DE CIRCULAÇÃO DE PRODUTOS EMBALADOS</th>
</tr>
<tr>
<th scope="row" rowspan="2" colspan="1"></th>
<th colspan="4" >CÂMARAS DE ESTOCAGEM</th>
<th colspan="1" rowspan="2" width=10%>TÚNEL DE CONGELAMENTO ESTÁTICO</th>
<th colspan="1" rowspan="2" width=10%>TÚNEL DE CONGELAMENTO CONTÍNUO</th>
<th colspan="4" rowspan="1">SALAS DE CIRCULAÇÃO DE PRODUTOS EMBALADOS</th>
</tr>
<tr>
<th scope="row" colspan="1" width=10%>CÂMARA 1</th>
<th colspan="1" width=10%>CÂMARA 2</th>
<th colspan="1" width=10%>CÂMARA 3</th>
<th colspan="1" width=10%>CÂMARA 4</th>
<th colspan="1" width=10%>EMBAL. 2° 1</th>
<th colspan="1" width=10%>EMBAL. 2° 2</th>
<th colspan="1" width=10%>EXPEDIÇÃO</th>
<th colspan="1" width=10%>PALETIZAÇÃO</th>
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
$arquivo = 'Relatório temperaturas frigorífico.xls';
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