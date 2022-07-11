<?php 
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
date_default_timezone_set('America/Manaus');
$data_hoje = strtoupper(utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today'))));

$query = $pdo->query("SELECT dfn.data_name as dataName,  case when dfn.data_name IN ('data_format_1') then 'SDVA-SM1-C001' when dfn.data_name IN ('data_format_2') then 'SDVA-SM1-C002'
  when dfn.data_name IN ('data_format_3') then 'SDVA-SM1-C003' when dfn.data_name IN ('data_format_4') then 'SDVA-SM1-C004'
  when dfn.data_name IN ('data_format_5') then 'SDVA-PT1-C005' when dfn.data_name IN ('data_format_6') then 'SDVA-PT1-C006'
  when dfn.data_name IN ('data_format_7') then 'SDVA-PT1-C007' when dfn.data_name IN ('data_format_8') then 'SDVA-PT1-C008'
  when dfn.data_name IN ('data_format_9') then 'SDVA-PT1-C009' when dfn.data_name IN ('data_format_10') then 'SDVA-PT1-C0010'
  when dfn.data_name IN ('data_format_11') then 'SDVA-PT1-C0011' when dfn.data_name IN ('data_format_12') then 'SDVA-AI1-C012'
  when dfn.data_name IN ('data_format_13') then 'SDVA-AI1-C013' when dfn.data_name IN ('data_format_14') then 'SDVA-AI1-C014'
  when dfn.data_name IN ('data_format_15') then 'SDVA-AI1-C015' when dfn.data_name IN ('data_format_16') then 'SDVA-AI1-C016'
  when dfn.data_name IN ('data_format_17') then 'SDVA-AI1-C017' when dfn.data_name IN ('data_format_18') then 'SDVA-SM2-C018'
  when dfn.data_name IN ('data_format_19') then 'SDVA-SM2-C019' when dfn.data_name IN ('data_format_20') then 'SDVA-SM2-C020'
  when dfn.data_name IN ('data_format_21') then 'SDVA-SM2-C021' when dfn.data_name IN ('data_format_22') then 'SDVA-SM2-C022'
  when dfn.data_name IN ('data_format_23') then 'SDVA-SM2-C023'
  ELSE '' END AS 'celula', ev.event_index, el.language1 AS 'Descrição do Alarme' , FROM_UNIXTIME(ev.`trigger_time@timestamp` + 10800, '%d/%m/%Y %H:%i:%s') AS 
  'dataAlarme', FROM_UNIXTIME(ev.`recover_time@timestamp` + 10800, '%d/%m/%Y %H:%i:%s') AS 'dataReset',
  TIMESTAMPDIFF(HOUR,FROM_UNIXTIME(ev.`trigger_time@timestamp`, '%Y-%m-%d %H:%i:%s')
  ,FROM_UNIXTIME(ev.`recover_time@timestamp`, '%Y-%m-%d %H:%i:%s'))
  AS Horas,
  TIMESTAMPDIFF(MINUTE,FROM_UNIXTIME(ev.`trigger_time@timestamp`, '%Y-%m-%d %H:%i:%s'),
  FROM_UNIXTIME(ev.`recover_time@timestamp`, '%Y-%m-%d %H:%i:%s'))
  %60 AS Minutos, 
  TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(ev.`trigger_time@timestamp`, '%Y-%m-%d %H:%i:%s'),
  FROM_UNIXTIME(ev.`recover_time@timestamp`, '%Y-%m-%d %H:%i:%s'))
  %60   AS segundos, je.just AS Justificativa, DATE_FORMAT(je.dataHora_just,'%d/%m/%Y %H:%i:%s' ) AS 'timeJustificativa'
  FROM `cMT-0484_event` ev LEFT JOIN `cMT-0484_event_log` el ON el.event_log_index = ev.event_log_index
  LEFT JOIN `data_format_name` dfn ON el.event_log_index = dfn.alarme or el.event_log_index = dfn.trip LEFT JOIN `justEvent` je
  ON ev.event_index = je.event_index
  WHERE ev.event_log_index >= '2621'
  AND ev.event_log_index <= '2666' AND
  FROM_UNIXTIME(`trigger_time@timestamp` + 10800, '%Y-%m-%d %H:%i:%s')
  BETWEEN ('{$dataHoraIni}') AND ('{$dataHoraFim}') ORDER BY ev.`trigger_time@timestamp` asc;");

$res = $query->fetchAll(PDO::FETCH_ASSOC);



for ($i=0; $i < count($res); $i++) { 

  foreach ($res[$i] as $key => $value) {

  }

  $id = $res[$i]['event_index'];

  $celula = $res[$i]['celula'];

  $dataAlarme = $res[$i]['dataAlarme'];

  $dataReset = $res[$i]['dataReset'];

  $ativo = $res[$i]['Horas'].'h '.$res[$i]['Minutos'].'m '.$res[$i]['segundos'].'s';

  $just = $res[$i]['Justificativa'];

  $dataName = $res[$i]['dataName'];

  $dataNameHamonia = $res[$i]['dataName']."_hamonia";

  $dataJust = $res[$i]['timeJustificativa'];




  $query1 = $pdo->query("SELECT {$dataName} as ppm FROM {$dataNameHamonia} WHERE FROM_UNIXTIME(`time@timestamp` +10800, '%d/%m/%Y %H:%i:%s') BETWEEN ('$dataAlarme') AND ('$dataReset') ORDER BY {$dataName} DESC LIMIT 1;");

  $res1 = $query1->fetchAll(PDO::FETCH_ASSOC);

  if (!isset($res1[0]['ppm'])) {

    $ppm = 0;

  }else{

    $ppm = $res1[0]['ppm'] * 0.1; 

  }




  $html.='<tbody>';
  $html .= '<tr>';
  $html .= '<td colspan="1" rowspan="1">'.$id.'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$celula.'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$dataAlarme.'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$dataReset.'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$ativo.'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$ppm.'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$just.'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$dataJust.'</td>';
  $html .= '</tr>';
  $html .= '</tbody>';

}





$body = '
<!DOCTYPE html>
<html>
<head>
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
<tr style="font-weight: bold; background-color:#a9a9a9;">
<td colspan="1" rowspan="1">ID</td>
<td colspan="1" rowspan="1">Célula</td>
<td colspan="1" rowspan="1">Data e Hora Alarme</td>
<td colspan="1" rowspan="1">Data e Hora Reset</td>
<td colspan="1" rowspan="1">Tempo Ativo</td>
<td colspan="1" rowspan="1">Pico Max. PPM Durante o Evento</td>
<td colspan="1" rowspan="1">Justificativa</td>
<td colspan="1" rowspan="1">Data e Hora Justificado</td>
</tr>
</thead>

'.$html.'

</table>
</body>
</html>';


    		// Definimos o nome do arquivo que será exportado
$arquivo = 'Relatório Alarmes Célula de Amônia.xls';
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