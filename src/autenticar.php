<?php 

require_once("conexao.php");

@session_start();



$user = $_POST['user'];

$senha = $_POST['senha'];



$query = $pdo->prepare("SELECT * FROM usuarios where user = :user and senha = :senha");

$query->bindValue(":senha", $senha);

$query->bindValue(":user", $user);

$query->execute();



$res = $query->fetchAll(PDO::FETCH_ASSOC);

$total_reg = @count($res);

if($total_reg > 0){



	$_SESSION['id_usuario'] = $res[0]['id'];

	$_SESSION['nome_usuario'] = $res[0]['nome'];

	$_SESSION['perfil'] = $res[0]['perfil'];

	$_SESSION['painel'] = $res[0]['painel'];

	$_SESSION['ativo'] = $res[0]['ativo'];

	$_SESSION['editar'] = $res[0]['editar'];


	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>

    <link rel="icon" href="img/rec.ico" type="image/x-icon">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="css/googleapis.css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">



    <!-- Custom styles for this template-->

    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

    <script src="../vendor/jquery/jquery.min.js"></script>

    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


	</head>

	<body>

		

    <div id="carregando" style="margin-top: 20%;">
        <div align="center" class="row justify-content-md-center">
            <div class="col-sm-3 col-md-3 col-lg-1 col-xl-1">
                <i class="fa fa-cog fa-spin fa-5x fa-fw" style="left: 45%;"></i>
            </div>
        </div>
        <div align="center" class="row justify-content-md-center">
            <div class="col-sm-3 col-md-3 col-lg-1 col-xl-1">
                <h4 id="buscando" style="margin-top: 7%;">Carregando...</h4>
            </div>
        </div>
    </div>

		<?php
		

		if (@$_SESSION['ativo'] == 'off') {

			echo "<script language='javascript'> window.alert('Seu Usuário está Inativo. Contate o Administrador!!!') </script>";

			echo "<script language='javascript'> window.location='logout.php' </script>";

		}




		if($_SESSION['painel'] == 'painel-adm'){

			echo "<script language='javascript'> window.location='painel-adm' </script>";

		}


		if($_SESSION['painel'] == 'painel-amon'){

			echo "<script language='javascript'> window.location='painel-amon' </script>";

		}



		if($_SESSION['painel'] == 'painel-users'){

			echo "<script language='javascript'> window.location='painel-users' </script>";

		}



	}else{

		echo "<script language='javascript'> window.alert('Usuário ou Senha Incorreta!') </script>";


		echo "<script language='javascript'> window.location='index.php' </script>";	

	}
	
	?>

	
</body>
</html>
