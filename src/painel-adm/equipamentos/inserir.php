<?php 

require_once("../../conexao.php"); 




$id = @$_POST['txtid2'];

$tag = strtoupper(@$_POST['tag']);

if ($tag == "") {
	
	echo "A Tag é Obrigatória";

	echo $tag;

	exit();

}


$description = strtoupper(@$_POST['description']);

if ($description == "") {
	
	$description = "NÃO INFORMADO";

}


$manufacturer = strtoupper(@$_POST['manufacturer']);

if ($manufacturer == "") {
	
	$manufacturer = "NÃO INFORMADO";

}


$model = strtoupper(@$_POST['model']);

if ($model == "") {
	
	$model = "NÃO INFORMADO";

}


$localization = strtoupper(@$_POST['localization']);

if ($localization == "") {
	
	$localization = "NÃO INFORMADO";

}


$portPainel = strtoupper(@$_POST['portPainel']);

if ($portPainel == "") {
	
	$portPainel = "NÃO INFORMADO";

}


$ip = @$_POST['ip'];

if ($ip == "") {
	
	$ip = "NÃO INFORMADO";

}


$page = @$_POST['pageProject'];

if ($page == "") {
	
	$page = 0;

}




//SCRIPT PARA SUBIR FOTO NO BANCO
$nome_img = preg_replace('/[ -]+/' , '-' , @$_FILES['imagem']['name']);
$caminho = '../../img/equipment/' .$nome_img;

if (@$_FILES['imagem']['name'] == ""){

  	if ($id == "") {

  		$imagem = "sem-foto.jpg";
  		
  	}else{

  		$queryImagem = $pdo->query("SELECT * FROM equipment WHERE id = '".$id."'");

  		$resImagem = $queryImagem->fetchAll(PDO::FETCH_ASSOC);

  		$imagem = $resImagem[0]['image'];


  	}

}else{

    $imagem = $nome_img;

		$imagem_temp = @$_FILES['imagem']['tmp_name']; 
		$ext = pathinfo($imagem, PATHINFO_EXTENSION);   

		if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif' or $ext == 'pdf'){ 

			move_uploaded_file($imagem_temp, $caminho);

		}else{

			echo 'Extensão de Imagem não permitida!';

			exit();

		}

}



//SCRIPT PARA SUBIR PDF MANUAL NO BANCO
$nome_manual = preg_replace('/[ -]+/' , '-' , @$_FILES['manual']['name']);


$caminho_manual = '../../documents/' .$nome_manual;

if (@$_FILES['manual']['name'] == ""){

  	if ($id == "") {

  		$manual= "Sem Documento";
  		
  	}else{

  		$queryManual = $pdo->query("SELECT * FROM equipment WHERE id = '".$id."'");

  		$resManual = $queryManual->fetchAll(PDO::FETCH_ASSOC);

  		$manual = $resManual[0]['urlManual'];


  	}

}else{

    $manual = $nome_manual;

		$manual_temp = @$_FILES['manual']['tmp_name']; 
		$ext_manual = pathinfo($manual, PATHINFO_EXTENSION); 

		if($ext_manual == 'png' or $ext_manual == 'jpg' or $ext_manual == 'jpeg' or $ext_manual == 'gif' or $ext_manual == 'pdf'){ 

		move_uploaded_file($manual_temp, $caminho_manual);

		}else{

			echo 'Extensão de Manual não permitida!';

			echo @$_FILES['manual']['tmp_name'];

			echo $nome_manual;

			exit();
		}

}




//SCRIPT PARA SUBIR PDF PROJETO NO BANCO
$nome_project = preg_replace('/[ -]+/' , '-' , @$_FILES['project']['name']);
$caminho_project = '../../documents/' .$nome_project;

if (@$_FILES['project']['name'] == ""){

  	if ($id == "") {

  		$project= "Sem Documento";
  		
  	}else{

  		$queryProject = $pdo->query("SELECT * FROM equipment WHERE id = '".$id."'");

  		$resProject = $queryProject->fetchAll(PDO::FETCH_ASSOC);

  		$project = $resProject[0]['urlProjeto'];


  	}

}else{

    $project = $nome_project;

		$project_temp = @$_FILES['project']['tmp_name']; 
		$ext_project = pathinfo($project, PATHINFO_EXTENSION); 

		if($ext_project == 'png' or $ext_project == 'jpg' or $ext_project == 'jpeg' or $ext_project == 'gif' or $ext_project == 'pdf'){ 

		move_uploaded_file($project_temp, $caminho_project);

		}else{

			echo 'Extensão de Projeto não permitida!';

			exit();
		}

}





if($id == ""){

	$res = $pdo->prepare("INSERT INTO equipment SET tag = :tag, description = :description, manufacturer = :manufacturer, model = :model, localization = :localization, portPainel = :portPainel, ip = :ip, image = '$imagem', page = :page, urlManual = '$manual', urlProjeto = '$project'");	

	
	}else{

		$res = $pdo->prepare("UPDATE equipment SET tag = :tag, description = :description, manufacturer = :manufacturer, model = :model, localization = :localization, portPainel = :portPainel, ip = :ip, image = '$imagem', page = :page, urlManual = '$manual', urlProjeto = '$project' WHERE id = '$id'");

	}
	

	
	


$res->bindValue(":tag", $tag);

$res->bindValue(":description", $description);

$res->bindValue(":manufacturer", $manufacturer);

$res->bindValue(":model", $model);

$res->bindValue(":localization", $localization);

$res->bindValue(":portPainel", $portPainel);

$res->bindValue(":ip", $ip);

$res->bindValue(":page", $page);


$res->execute();


echo 'Salvo com Sucesso!';


?>