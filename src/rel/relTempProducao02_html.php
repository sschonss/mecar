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

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

date_default_timezone_set('America/Sao_Paulo');


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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Temperaturas Frigorifico</title>

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
				<big> <small> DATA: <?php echo $data_hoje; ?></small> </big>
			</div>
		</div>

		<hr>
		<br><br>

		<p class="titulo" align="center"><b>Relatório de Temperaturas Produção</b></p>

		<br><br>

		<div class="table-responsive">

			<table id="tabela" width="100%" cellspacing="0" border="1">

				<thead>

            <tr style="font-weight: bold; background-color:#a9a9a9;">
              <th scope="col" colspan="12" width=75% >TEMPERATURA DE SALAS DE MANIPULAÇÃO E PRODUTOS EM PROCESSO 02</th>
            </tr>
            <tr id="bodyThead">
              <th scope="row" rowspan="2" colspan="1"><img src="../img/logo.png" style="width: 70%"></th>
              <th colspan="11" >TEMPERATURAS DE AMBIENTES</th>
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



				<tbody style="text-align-last: center;">



					<?php

					
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

						
						?>




						
						<tr>
							<td colspan="1" rowspan="1"><?php echo $dataHora[$i]; ?></td>
							<td colspan="1" rowspan="1"><?php echo $secaoCorte01[$i]; ?></td>
							<td colspan="1" rowspan="1"><?php echo $secaoCorte02[$i]; ?></td>
							<td colspan="1" rowspan="1"><?php echo $secaoCorte03[$i]; ?></td>
							<td colspan="1" rowspan="1"><?php echo $secaoCorte04[$i]; ?></td>
							<td colspan="1" rowspan="1"><?php echo $secaoSalgado[$i]; ?></td>
							<td colspan="1" rowspan="1"><?php echo $secaoBandeja[$i]; ?></td>
							<td colspan="1" rowspan="1"><?php echo $secaoEmbIQF[$i]; ?></td>
							<td colspan="1" rowspan="1"><?php echo $secaoIQF[$i]; ?></td>
							<td colspan="1" rowspan="1"><?php echo $secaoCMS[$i]; ?></td>
							<td colspan="1" rowspan="1"><?php echo $secaoCMR[$i]; ?></td>
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
