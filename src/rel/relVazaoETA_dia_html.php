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
	<title>Vazão ETA</title>

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

		<p class="titulo" align="center"><b>Relatório de Vazão ETA</b></p>

		<br><br>

		<div class="table-responsive">

			<table id="tabela" align="center" width="60%" cellspacing="0" border="1">

				<thead>
              <tr>
                <th scope="row"colspan="1">DATA</th>
                <th colspan="1">VAZÃO 01</th>
                <th colspan="1">VAZÃO 02</th>
                <th colspan="1">TOTAL DIA</th>
            	</tr>
				</thead>



				<tbody style="text-align-last: center;">



					<?php

						$dataHoraBuscaFim =  date('Y-m-d H:i', strtotime("+1 days", strtotime($dataHoraIni)));


						//Verifica o numero de dias entre as datas da pesquisa

						$dataOrigin = new DateTime($dataHoraIni);
						$dataTarget = new DateTime($dataHoraFim);
						$dataInterval = $dataOrigin->diff($dataTarget);
						$interval = $dataInterval->days;



						for ($a=0; $a < $interval; $a++) { 

						    $day = "+".$a." days";

						    $dataHoraInicio = date('Y-m-d H:i', strtotime($day, strtotime($dataHoraIni)));

						    $dataHoraFinal = date('Y-m-d H:i', strtotime($day, strtotime($dataHoraBuscaFim)));

   
					    $query = $pdo->query("SELECT dataHora, SUM(vazao) * 0.1 AS 'vazao01', SUM(vazao02) * 0.1 AS vazao02, (SUM(vazao) + SUM(vazao02)) * 0.1 AS totalMoment FROM TotalVazaoETA where dataHora BETWEEN ('{$dataHoraInicio}') AND ('{$dataHoraFinal}');");

					    $res = $query->fetchAll(PDO::FETCH_ASSOC);

					    if ($res[0]['vazao01'] != null || $res[0]['vazao02'] != null) {

						
						?>
						
						<tr>
							<td colspan="1" rowspan="1"><?php echo date('d/m/Y', strtotime($res[0]['dataHora'])) ?></td>
							<td colspan="1" rowspan="1"><?php echo $res[0]['vazao01'] ?> m³</td>
							<td colspan="1" rowspan="1"><?php echo $res[0]['vazao02'] ?> m³</td>
							<td colspan="1" rowspan="1"><?php echo $res[0]['totalMoment'] ?> m³</td>
						</tr>

					<?php 
							}
						} 

						$queryTotal = $pdo->query("SELECT SUM(vazao) * 0.1 AS 'vazao01Total', SUM(vazao02) * 0.1 AS vazao02Total, (SUM(vazao) + SUM(vazao02)) * 0.1 AS totalGeral FROM TotalVazaoETA where dataHora BETWEEN ('{$dataHoraIni}') AND ('{$dataHoraFim}');");

						$resTotal = $queryTotal->fetchAll(PDO::FETCH_ASSOC);

					?>


            <tr>
              <th scope="row"colspan="1">TOTAL</th>
              <th colspan="1"><?php echo $resTotal[0]['vazao01Total'] ?> m³</th>
              <th colspan="1"><?php echo $resTotal[0]['vazao02Total'] ?> m³</th>
              <th colspan="1"><?php echo $resTotal[0]['totalGeral'] ?> m³</th>
            </tr>










				</tbody>

			</table>

		</div>

		<div class="footer">
			<p style="font-size:14px" align="center"></p> 
		</div>




	</body>
	</html>
