<?php 
require_once("../conexao.php"); 

set_time_limit(0);

@session_start();


@$dataIni = $_GET['dataIni'];

@$horaIni = $_GET['horaIni'];

@$dataFim = $_GET['dataFim'];

@$horaFim = $_GET['horaFim'];


$dataHoraIni = $dataIni.' '.$horaIni;

$dataHoraFim = $dataFim.' '.$horaFim;


$data = date('D');
$mes = date('M');
$dia = date('d');
$ano = date('Y');

$semana = array(
    'Sun' => 'DOMIMGO',
    'Mon' => 'SEGUNDA-FEIRA',
    'Tue' => 'TERÇA-FEIRA',
    'Wed' => 'QUARTA-FEIRA',
    'Thu' => 'QUINTA-FEIRA',
    'Fri' => 'SEXTA-FEIRA',
    'Sat' => 'SÁBADO'
);

$mes_extenso = array(
    'Jan' => 'JANEIRO',
    'Feb' => 'FEVEREIRO',
    'Mar' => 'MARÇO',
    'Apr' => 'ABRIL',
    'May' => 'MAIO',
    'Jun' => 'JUNHO',
    'Jul' => 'JULHO',
    'Aug' => 'AGOSTO',
    'Nov' => 'NOVEMBRO',
    'Sep' => 'SETEMBRO',
    'Oct' => 'OUTUBRO',
    'Dec' => 'DEZEMBRO'
);
$data_hoje= $semana["$data"] . ", {$dia} DE " . $mes_extenso["$mes"] . " DE {$ano}";


?>

<!DOCTYPE html>
<html>
<head>
	<title>Relatório de Alarmes Amônia</title>

	<link rel="shortcut icon" href="../img/icone.ico" type="image/x-icon">

	<link rel="icon" href="../img/rec.ico" type="image/x-icon">
	<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<style>

		@page {
			margin: 0px;

		}

		.footer {
			margin-top:20px;
			width:100%;
			background-color: #ebebeb;
			padding:10px;
		}

		.cabecalho {    
			background-color: #ebebeb;
			padding:10px;
			margin-bottom:30px;
			width:100%;
			height:100px;
		}

		.titulo{
			margin:0;
			font-size:28px;
			font-family:Arial, Helvetica, sans-serif;
			color:#6e6d6d;

		}

		.subtitulo{
			margin:0;
			font-size:17px;
			font-family:Arial, Helvetica, sans-serif;
		}

		.areaTotais{
			border : 0.5px solid #bcbcbc;
			padding: 15px;
			border-radius: 5px;
			margin-right:25px;
			margin-left:25px;
			position:absolute;
			right:20;
		}

		.areaTotal{
			border : 0.5px solid #bcbcbc;
			padding: 15px;
			border-radius: 5px;
			margin-right:25px;
			margin-left:25px;
			background-color: #f9f9f9;
			margin-top:2px;
		}

		.pgto{
			margin:1px;
		}

		.fonte13{
			font-size:13px;
		}

		.esquerda{
			display:inline;
			width:50%;
			float:left;
		}

		.direita{
			display:inline;
			width:50%;
			float:right;
		}

		.table{
			padding:15px;
			font-family:Verdana, sans-serif;
			margin-top:20px;
		}

		.texto-tabela{
			font-size:12px;
		}


		.esquerda_float{

			margin-bottom:10px;
			margin-top: 10px;
			float:left;
			display:inline;
			margin-left: 15px;
		}


		.titulos{
			margin-top:10px;
		}

		.image{
			margin-top:10px;
		}

		.margem-direita{
			margin-right: 80px;
		}

		.container{
			padding-left: 50px;
			padding-right: 50px;
		}

		hr{
			margin:8px;
			padding:1px;
		}

		#tabela{
			margin-top: 10px;
		}


	</style>

</head>
<body>


	<div class="cabecalho">
		<div class="row titulos">
			<div class="col-sm-2 esquerda_float image">	
				<img src="../img/logo.png" width="170px">
			</div>
			<div class="col-sm-10 esquerda_float">	
				<h2 class="titulo"><b><?php echo strtoupper($nome_empresa) ?></b></h2>
				<h6 class="subtitulo"><?php echo $endereco_empresa ?></h6>

			</div>
		</div>

	</div>

	<div class="container">

		<div class="row">
			<div class="col-sm-4 direita" align="right">	
				<big> <small> Data: <?php echo $data_hoje; ?></small> </big>
			</div>
		</div>

		<hr>
		<br><br>

		<p class="titulo" align="center"><b>Relatório de Alarmes Justificados Células de Amônia</b></p>

		<br><br>

		<div class="table-responsive">

			<table id="tabela" width="100%" cellspacing="0" border="1">

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



				<tbody>



					<?php

					
					$query = $pdo->query("SELECT dfn.data_name as dataName, case when dfn.data_name IN ('data_format_1') then 'SDVA-SM1-C001' when dfn.data_name IN ('data_format_2') then 'SDVA-SM1-C002'
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
						AND ev.event_log_index <= '2666' AND ev.event_index = je.event_index AND
						FROM_UNIXTIME(`trigger_time@timestamp` + 10800, '%Y-%m-%d %H:%i:%s')
						BETWEEN ('{$dataHoraIni}') AND ('{$dataHoraFim}') ORDER BY ev.`trigger_time@timestamp` desc;");

					$res = $query->fetchAll(PDO::FETCH_ASSOC);



					for ($i=0; $i < count($res); $i++) { 

						foreach ($res[$i] as $key => $value) {

						}

						$id = $res[$i]['event_index'];

						$celula = $res[$i]['celula'];

						$dataAlarme = $res[$i]['dataAlarme'];

						$dataReset = $res[$i]['dataReset'];

						$ativo = $res[$i]['Horas'].'h '.$res[$i]['Minutos'].'m '.$res[$i]['segundos'].'s';

						$dataName = $res[$i]['dataName'];

						$dataNameHamonia = $res[$i]['dataName']."_hamonia";

						$just = $res[$i]['Justificativa'];

						$dataJust = $res[$i]['timeJustificativa'];


						$query1 = $pdo->query("SELECT {$dataName} as ppm FROM {$dataNameHamonia} WHERE FROM_UNIXTIME(`time@timestamp` +10800, '%d/%m/%Y %H:%i:%s') BETWEEN ('$dataAlarme') AND ('$dataReset') ORDER BY {$dataName} DESC LIMIT 1;");

						$res1 = $query1->fetchAll(PDO::FETCH_ASSOC);


						if (!isset($res1[0]['ppm'])) {
							
							$ppm = 0;

						}else{

							$ppm = $res1[0]['ppm'] * 0.1; 

						}

						
						?>




						
						<tr>
							<td colspan="1" rowspan="1"><?php echo $id; ?></td>
							<td colspan="1" rowspan="1"><?php echo $celula; ?></td>
							<td colspan="1" rowspan="1"><?php echo $dataAlarme; ?></td>
							<td colspan="1" rowspan="1"><?php echo $dataReset; ?></td>
							<td colspan="1" rowspan="1"><?php echo $ativo; ?></td>
							<td colspan="1" rowspan="1"><?php echo $ppm ; ?></td>
							<td colspan="1" rowspan="1"><?php echo $just; ?></td>
							<td colspan="1" rowspan="1"><?php echo $dataJust; ?></td>
						</tr>

					<?php } ?>











				</tbody>

			</table>

		</div>

		<div class="footer">
			<p style="font-size:14px" align="center"></p> 
		</div>




	</body>
	</html>
