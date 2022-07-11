<?php
require_once("../conexao.php");

set_time_limit(0);

@session_start();



$dataHoraIni = $_GET['dataIni'] . ' 05:00:00';
$dataHoraFim =  date('Y-m-d H:i:s', strtotime("+1 days", strtotime($dataHoraIni)));


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
	<title>Fabrica de Sub-Produto</title>

	<link rel="shortcut icon" href="../img/icone.ico" type="image/x-icon">

	<link rel="icon" href="../img/rec.ico" type="image/x-icon">
	<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<style>
		@page {
			margin: 0px;

		}

		.footer {
			margin-top: 20px;
			width: 100%;
			background-color: #ebebeb;
			padding: 10px;
		}

		.cabecalho {
			background-color: #ebebeb;
			padding: 10px;
			margin-bottom: 30px;
			width: 100%;
			height: 100px;
		}

		.titulo {
			margin: 0;
			font-size: 28px;
			font-family: Arial, Helvetica, sans-serif;
			color: #6e6d6d;

		}

		.subtitulo {
			margin: 0;
			font-size: 17px;
			font-family: Arial, Helvetica, sans-serif;
		}

		.areaTotais {
			border: 0.5px solid #bcbcbc;
			padding: 15px;
			border-radius: 5px;
			margin-right: 25px;
			margin-left: 25px;
			position: absolute;
			right: 20;
		}

		.areaTotal {
			border: 0.5px solid #bcbcbc;
			padding: 15px;
			border-radius: 5px;
			margin-right: 25px;
			margin-left: 25px;
			background-color: #f9f9f9;
			margin-top: 2px;
		}

		.pgto {
			margin: 1px;
		}

		.fonte13 {
			font-size: 13px;
		}

		.esquerda {
			display: inline;
			width: 50%;
			float: left;
		}

		.direita {
			display: inline;
			width: 50%;
			float: right;
		}

		.table {
			padding: 15px;
			font-family: Verdana, sans-serif;
			margin-top: 20px;
		}

		.texto-tabela {
			font-size: 12px;
		}


		.esquerda_float {

			margin-bottom: 10px;
			margin-top: 10px;
			float: left;
			display: inline;
			margin-left: 15px;
		}


		.titulos {
			margin-top: 10px;
		}

		.image {
			margin-top: 10px;
		}

		.margem-direita {
			margin-right: 80px;
		}

		.container {
			padding-left: 50px;
			padding-right: 50px;
		}

		hr {
			margin: 8px;
			padding: 1px;
		}

		#tabela {
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
			<div class="col-sm-4 direita" text-align="right">
				<small> Data: <?php echo $data_hoje; ?></small>
			</div>
		</div>

		<hr>
		<br><br>

		<p class="titulo" text-align="center"><b>Relatório Fabrica Sub-Produto</b></p>

		<br><br>

		<div class="table-responsive">

			<table id="tabela" width="100%" cellspacing="0" border-style="1">

				<thead>
					<tr style="background-color:#a9a9a9; font-weight: bold;">
						<th colspan="2" rowspan="1">VISCERAS 01</th>
						<th colspan="9" rowspan="1">Controle de tempo de processo térmico a uma temperatura mínima de 70°C, por no mínimo 45 min.</th>
					</tr>
					<tr style="font-weight: bold;">
						<th colspan="2" rowspan="2">BATELADA</th>
						<th colspan="2" rowspan="1">Início da batelada</th>
						<th colspan="2" rowspan="1">Início Processo térmico</th>
						<th colspan="2" rowspan="1">Final processo térmico</th>
						<th colspan="2" rowspan="1">Final da batelada</th>
						<th colspan="1" rowspan="2">Tempo da batelada</th>
					</tr>
					<tr style="font-weight: bold;">
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
					</tr>
				</thead>



				<tbody style="text-align-last: center;">



					<?php


					$query_visceras01 = $pdo->query("SELECT * FROM visceras01 WHERE dataHoraIniBatelada BETWEEN ('$dataHoraIni') AND ('$dataHoraFim');");

					$res_visceras01 = $query_visceras01->fetchAll(PDO::FETCH_ASSOC);

					$batelada_visceras01 = 0;
					$tempoTotalBatelada_visceras01 = 0;

					for ($i = 0; $i < count($res_visceras01); $i++) {

						foreach ($res_visceras01[$i] as $key => $value) {
						}

						$tempoBatelada_visceras01 = (strtotime($res_visceras01[$i]['dataHoraFimBatelada']) - strtotime($res_visceras01[$i]['dataHoraIniBatelada'])) / 60;
						$tempoTotalBatelada_visceras01 += (strtotime($res_visceras01[$i]['dataHoraFimBatelada']) - strtotime($res_visceras01[$i]['dataHoraIniBatelada'])) / 60;

						$batelada_visceras01 = $batelada_visceras01 + 1;

					?>

						</tr>
						<tr>
							<td colspan="2">Batelada <?php echo $batelada_visceras01; ?></td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_visceras01[$i]['dataHoraIniBatelada'])); ?></td>
							<td><?php echo number_format(($res_visceras01[$i]['tempIniBatelada'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_visceras01[$i]['dataHoraIniTermico'])); ?></td>
							<td><?php echo number_format(($res_visceras01[$i]['tempIniTermico'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_visceras01[$i]['dataHoraFimTermico'])); ?></td>
							<td><?php echo number_format(($res_visceras01[$i]['tempFimTermico'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_visceras01[$i]['dataHoraFimBatelada'])); ?></td>
							<td><?php echo number_format(($res_visceras01[$i]['tempFimBatelada'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo $tempoBatelada_visceras01; ?> Min.</td>
						</tr>

					<?php } ?>

					<tr>
						<td colspan="9"></td>
						<td style="font-weight: bold;">Tempo Total</td>
						<td style="font-weight: bold;"><?php echo $tempoTotalBatelada_visceras01; ?> Min.</td>
					</tr>

				</tbody>



				<thead>
					<tr style="background-color:#a9a9a9; font-weight: bold;">
						<th colspan="2" rowspan="1">VISCERAS 02</th>
						<th colspan="9" rowspan="1">Controle de tempo de processo térmico a uma temperatura mínima de 70°C, por no mínimo 45 min.</th>
					</tr>
					<tr style="font-weight: bold;">
						<th colspan="2" rowspan="2">BATELADA</th>
						<th colspan="2" rowspan="1">Início da batelada</th>
						<th colspan="2" rowspan="1">Início Processo térmico</th>
						<th colspan="2" rowspan="1">Final processo térmico</th>
						<th colspan="2" rowspan="1">Final da batelada</th>
						<th colspan="1" rowspan="2">Tempo da batelada</th>
					</tr>
					<tr style="font-weight: bold;">
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
					</tr>
				</thead>



				<tbody style="text-align-last: center;">



					<?php


					$query_visceras02 = $pdo->query("SELECT * FROM visceras02 WHERE dataHoraIniBatelada BETWEEN ('$dataHoraIni') AND ('$dataHoraFim');");

					$res_visceras02 = $query_visceras02->fetchAll(PDO::FETCH_ASSOC);

					$batelada_visceras02 = 0;
					$tempoTotalBatelada_visceras02 = 0;

					for ($i = 0; $i < count($res_visceras02); $i++) {

						foreach ($res_visceras02[$i] as $key => $value) {
						}

						$tempoBatelada_visceras02 = (strtotime($res_visceras02[$i]['dataHoraFimBatelada']) - strtotime($res_visceras02[$i]['dataHoraIniBatelada'])) / 60;
						$tempoTotalBatelada_visceras02 += (strtotime($res_visceras02[$i]['dataHoraFimBatelada']) - strtotime($res_visceras02[$i]['dataHoraIniBatelada'])) / 60;

						$batelada_visceras02 = $batelada_visceras02 + 1;


					?>

						</tr>
						<tr>
							<td colspan="2">Batelada <?php echo $batelada_visceras02; ?></td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_visceras02[$i]['dataHoraIniBatelada'])); ?></td>
							<td><?php echo number_format(($res_visceras02[$i]['tempIniBatelada'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_visceras02[$i]['dataHoraIniTermico'])); ?></td>
							<td><?php echo number_format(($res_visceras02[$i]['tempIniTermico'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_visceras02[$i]['dataHoraFimTermico'])); ?></td>
							<td><?php echo number_format(($res_visceras02[$i]['tempFimTermico'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_visceras02[$i]['dataHoraFimBatelada'])); ?></td>
							<td><?php echo number_format(($res_visceras02[$i]['tempFimBatelada'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo $tempoBatelada_visceras02; ?> Min.</td>
						</tr>

					<?php } ?>

					<tr>
						<td colspan="9"></td>
						<td style="font-weight: bold;">Tempo Total</td>
						<td style="font-weight: bold;"><?php echo $tempoTotalBatelada_visceras02; ?> Min.</td>
					</tr>

				</tbody>



				<thead>
					<tr style="background-color:#a9a9a9; font-weight: bold;">
						<th colspan="2" rowspan="1">VISCERAS 03</th>
						<th colspan="9" rowspan="1">Controle de tempo de processo térmico a uma temperatura mínima de 70°C, por no mínimo 45 min.</th>
					</tr>
					<tr style="font-weight: bold;">
						<th colspan="2" rowspan="2">BATELADA</th>
						<th colspan="2" rowspan="1">Início da batelada</th>
						<th colspan="2" rowspan="1">Início Processo térmico</th>
						<th colspan="2" rowspan="1">Final processo térmico</th>
						<th colspan="2" rowspan="1">Final da batelada</th>
						<th colspan="1" rowspan="2">Tempo da batelada</th>
					</tr>
					<tr style="font-weight: bold;">
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
					</tr>
				</thead>



				<tbody style="text-align-last: center;">



					<?php


					$query_visceras03 = $pdo->query("SELECT * FROM visceras03 WHERE dataHoraIniBatelada BETWEEN ('$dataHoraIni') AND ('$dataHoraFim');");

					$res_visceras03 = $query_visceras03->fetchAll(PDO::FETCH_ASSOC);

					$batelada_visceras03 = 0;
					$tempoTotalBatelada_visceras03 = 0;

					for ($i = 0; $i < count($res_visceras03); $i++) {

						foreach ($res_visceras03[$i] as $key => $value) {
						}

						$tempoBatelada_visceras03 = (strtotime($res_visceras03[$i]['dataHoraFimBatelada']) - strtotime($res_visceras03[$i]['dataHoraIniBatelada'])) / 60;
						$tempoTotalBatelada_visceras03 += (strtotime($res_visceras03[$i]['dataHoraFimBatelada']) - strtotime($res_visceras03[$i]['dataHoraIniBatelada'])) / 60;

						$batelada_visceras03 = $batelada_visceras03 + 1;


					?>

						</tr>
						<tr>
							<td colspan="2">Batelada <?php echo $batelada_visceras03; ?></td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_visceras03[$i]['dataHoraIniBatelada'])); ?></td>
							<td><?php echo number_format(($res_visceras03[$i]['tempIniBatelada'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_visceras03[$i]['dataHoraIniTermico'])); ?></td>
							<td><?php echo number_format(($res_visceras03[$i]['tempIniTermico'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_visceras03[$i]['dataHoraFimTermico'])); ?></td>
							<td><?php echo number_format(($res_visceras03[$i]['tempFimTermico'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_visceras03[$i]['dataHoraFimBatelada'])); ?></td>
							<td><?php echo number_format(($res_visceras03[$i]['tempFimBatelada'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo $tempoBatelada_visceras03; ?> Min.</td>
						</tr>

					<?php } ?>

					<tr>
						<td colspan="9"></td>
						<td style="font-weight: bold;">Tempo Total</td>
						<td style="font-weight: bold;"><?php echo $tempoTotalBatelada_visceras03; ?> Min.</td>
					</tr>

				</tbody>


				<thead>
					<tr style="background-color:#a9a9a9; font-weight: bold;">
						<th colspan="2" rowspan="1">PENAS 01</th>
						<th colspan="9" rowspan="1">Controle de tempo de processo térmico a uma temperatura mínima de 70°C, por no mínimo 45 min.</th>
					</tr>
					<tr style="font-weight: bold;">
						<th colspan="2" rowspan="2">BATELADA</th>
						<th colspan="2" rowspan="1">Início da batelada</th>
						<th colspan="2" rowspan="1">Início Processo térmico</th>
						<th colspan="2" rowspan="1">Final processo térmico</th>
						<th colspan="2" rowspan="1">Final da batelada</th>
						<th colspan="1" rowspan="2">Tempo da batelada</th>
					</tr>
					<tr style="font-weight: bold;">
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
					</tr>
				</thead>



				<tbody style="text-align-last: center;">



					<?php


					$query_penas01 = $pdo->query("SELECT * FROM penas01 WHERE dataHoraIniBatelada BETWEEN ('$dataHoraIni') AND ('$dataHoraFim');");

					$res_penas01 = $query_penas01->fetchAll(PDO::FETCH_ASSOC);

					$batelada_penas01 = 0;
					$tempoTotalBatelada_penas01 = 0;

					for ($i = 0; $i < count($res_penas01); $i++) {

						foreach ($res_penas01[$i] as $key => $value) {
						}

						$tempoBatelada_penas01 = (strtotime($res_penas01[$i]['dataHoraFimBatelada']) - strtotime($res_penas01[$i]['dataHoraIniBatelada'])) / 60;
						$tempoTotalBatelada_penas01 += (strtotime($res_penas01[$i]['dataHoraFimBatelada']) - strtotime($res_penas01[$i]['dataHoraIniBatelada'])) / 60;

						$batelada_penas01 = $batelada_penas01 + 1;


					?>

						</tr>
						<tr>
							<td colspan="2">Batelada <?php echo $batelada_penas01; ?></td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_penas01[$i]['dataHoraIniBatelada'])); ?></td>
							<td><?php echo number_format(($res_penas01[$i]['tempIniBatelada'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_penas01[$i]['dataHoraIniTermico'])); ?></td>
							<td><?php echo number_format(($res_penas01[$i]['tempIniTermico'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_penas01[$i]['dataHoraFimTermico'])); ?></td>
							<td><?php echo number_format(($res_penas01[$i]['tempFimTermico'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_penas01[$i]['dataHoraFimBatelada'])); ?></td>
							<td><?php echo number_format(($res_penas01[$i]['tempFimBatelada'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo $tempoBatelada_penas01; ?> Min.</td>
						</tr>

					<?php } ?>

					<tr>
						<td colspan="9"></td>
						<td style="font-weight: bold;">Tempo Total</td>
						<td style="font-weight: bold;"><?php echo $tempoTotalBatelada_penas01; ?> Min.</td>
					</tr>

				</tbody>


				<thead>
					<tr style="background-color:#a9a9a9; font-weight: bold;">
						<th colspan="2" rowspan="1">PENAS 02</th>
						<th colspan="9" rowspan="1">Controle de tempo de processo térmico a uma temperatura mínima de 70°C, por no mínimo 45 min.</th>
					</tr>
					<tr style="font-weight: bold;">
						<th colspan="2" rowspan="2">BATELADA</th>
						<th colspan="2" rowspan="1">Início da batelada</th>
						<th colspan="2" rowspan="1">Início Processo térmico</th>
						<th colspan="2" rowspan="1">Final processo térmico</th>
						<th colspan="2" rowspan="1">Final da batelada</th>
						<th colspan="1" rowspan="2">Tempo da batelada</th>
					</tr>
					<tr style="font-weight: bold;">
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
					</tr>
				</thead>



				<tbody style="text-align-last: center;">



					<?php


					$query_penas02 = $pdo->query("SELECT * FROM penas02 WHERE dataHoraIniBatelada BETWEEN ('$dataHoraIni') AND ('$dataHoraFim');");

					$res_penas02 = $query_penas02->fetchAll(PDO::FETCH_ASSOC);

					$batelada_penas02 = 0;
					$tempoTotalBatelada_penas02 = 0;

					for ($i = 0; $i < count($res_penas02); $i++) {

						foreach ($res_penas02[$i] as $key => $value) {
						}

						$tempoBatelada_penas02 = (strtotime($res_penas02[$i]['dataHoraFimBatelada']) - strtotime($res_penas02[$i]['dataHoraIniBatelada'])) / 60;
						$tempoTotalBatelada_penas02 += (strtotime($res_penas02[$i]['dataHoraFimBatelada']) - strtotime($res_penas02[$i]['dataHoraIniBatelada'])) / 60;

						$batelada_penas02 = $batelada_penas02 + 1;


					?>

						</tr>
						<tr>
							<td colspan="2">Batelada <?php echo $batelada_penas02 + $i; ?></td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_penas02[$i]['dataHoraIniBatelada'])); ?></td>
							<td><?php echo number_format(($res_penas02[$i]['tempIniBatelada'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_penas02[$i]['dataHoraIniTermico'])); ?></td>
							<td><?php echo number_format(($res_penas02[$i]['tempIniTermico'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_penas02[$i]['dataHoraFimTermico'])); ?></td>
							<td><?php echo number_format(($res_penas02[$i]['tempFimTermico'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_penas02[$i]['dataHoraFimBatelada'])); ?></td>
							<td><?php echo number_format(($res_penas02[$i]['tempFimBatelada'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo $tempoBatelada_penas02; ?> Min.</td>
						</tr>

					<?php } ?>

					<tr>
						<td colspan="9"></td>
						<td style="font-weight: bold;">Tempo Total</td>
						<td style="font-weight: bold;"><?php echo $tempoTotalBatelada_penas02; ?> Min.</td>
					</tr>

				</tbody>


				<thead>
					<tr style="background-color:#a9a9a9; font-weight: bold;">
						<th colspan="2" rowspan="1">PENAS 03</th>
						<th colspan="9" rowspan="1">Controle de tempo de processo térmico a uma temperatura mínima de 70°C, por no mínimo 45 min.</th>
					</tr>
					<tr style="font-weight: bold;">
						<th colspan="2" rowspan="2">BATELADA</th>
						<th colspan="2" rowspan="1">Início da batelada</th>
						<th colspan="2" rowspan="1">Início Processo térmico</th>
						<th colspan="2" rowspan="1">Final processo térmico</th>
						<th colspan="2" rowspan="1">Final da batelada</th>
						<th colspan="1" rowspan="2">Tempo da batelada</th>
					</tr>
					<tr style="font-weight: bold;">
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
					</tr>
				</thead>



				<tbody style="text-align-last: center;">



					<?php


					$query_penas03 = $pdo->query("SELECT * FROM penas03 WHERE dataHoraIniBatelada BETWEEN ('$dataHoraIni') AND ('$dataHoraFim');");

					$res_penas03 = $query_penas03->fetchAll(PDO::FETCH_ASSOC);

					$batelada_penas03 = 0;
					$tempoTotalBatelada_penas03 = 0;

					for ($i = 0; $i < count($res_penas03); $i++) {

						foreach ($res_penas03[$i] as $key => $value) {
						}

						$tempoBatelada_penas03 = (strtotime($res_penas03[$i]['dataHoraFimBatelada']) - strtotime($res_penas03[$i]['dataHoraIniBatelada'])) / 60;
						$tempoTotalBatelada_penas03 += (strtotime($res_penas03[$i]['dataHoraFimBatelada']) - strtotime($res_penas03[$i]['dataHoraIniBatelada'])) / 60;

						$batelada_penas03 = $batelada_penas03 + 1;


					?>

						</tr>
						<tr>
							<td colspan="2">Batelada <?php echo $batelada_penas03 + $i; ?></td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_penas03[$i]['dataHoraIniBatelada'])); ?></td>
							<td><?php echo number_format(($res_penas03[$i]['tempIniBatelada'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_penas03[$i]['dataHoraIniTermico'])); ?></td>
							<td><?php echo number_format(($res_penas03[$i]['tempIniTermico'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_penas03[$i]['dataHoraFimTermico'])); ?></td>
							<td><?php echo number_format(($res_penas03[$i]['tempFimTermico'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res_penas03[$i]['dataHoraFimBatelada'])); ?></td>
							<td><?php echo number_format(($res_penas03[$i]['tempFimBatelada'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo $tempoBatelada_penas03; ?> Min.</td>
						</tr>

					<?php } ?>

					<tr>
						<td colspan="9"></td>
						<td style="font-weight: bold;">Tempo Total</td>
						<td style="font-weight: bold;"><?php echo $tempoTotalBatelada_penas03; ?> Min.</td>
					</tr>

				</tbody>

			</table>

		</div>

		<div class="footer">
			<p style="font-size:14px" text-align="center"></p>
		</div>




</body>

</html>