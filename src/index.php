<?php 


require_once("conexao.php");


?>

<!DOCTYPE html>

<html>

<head>

	<title>Faça seu Login</title>

	<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">



	<script src="js/jquery.min.js"></script>

	<!------ Include the above in your HEAD tag ---------->



	<meta charset='UTF-8'>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">        

    <link rel="shortcut icon" href="img/icone.ico" type="image/x-icon">

    <link rel="icon" href="img/rec.ico" type="image/x-icon">



	<style class="cp-pen-styles">@import url(css/googleapis_open_sans.css);

	.btn { display: inline-block; *display: inline; *zoom: 1; padding: 4px 10px 4px; margin-bottom: 0; font-size: 13px; line-height: 18px; color: #333333; text-align: center;text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75); vertical-align: middle; background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(top, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0); border-color: #e6e6e6 #e6e6e6 #e6e6e6; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border: 1px solid #e6e6e6; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); cursor: pointer; *margin-left: .3em; }

	.btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] { background-color: #e6e6e6; }

	.btn-large { padding: 9px 14px; font-size: 15px; line-height: normal; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }

	.btn:hover { color: #333333; text-decoration: none; background-color: #e6e6e6; background-position: 0 -15px; -webkit-transition: background-position 0.1s linear; -moz-transition: background-position 0.1s linear; -ms-transition: background-position 0.1s linear; -o-transition: background-position 0.1s linear; transition: background-position 0.1s linear; }

	.btn-primary, .btn-primary:hover { text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff; }

	.btn-primary.active { color: rgba(255, 255, 255, 0.75); }

	.btn-primary { background-color: #4a77d4; background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4); background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4)); background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4); background-image: -o-linear-gradient(top, #6eb6de, #4a77d4); background-image: linear-gradient(top, #6eb6de, #4a77d4); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);  border: 1px solid #3762bc; text-shadow: 1px 1px 1px rgba(0,0,0,0.4); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5); }

	.btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { filter: none; background-color: #4a77d4; }

	.btn-block { width: 100%; display:block; }



	* { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }



	html { width: 100%; height:100%; overflow:hidden; }



	body { 

		width: 100%;

		height:100%;

		font-family: 'Open Sans', sans-serif;

		background: white;

		background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #023044 0%, #021744 100%);

		background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #023044 0%,#021744 100%);

		background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #023044 0%,#021744 100%);

		background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #023044 0%,#021744 100%);

		background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #023044 0%,#021744 100%);

		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#021744',GradientType=1 );

	}

	.login { 

		position: absolute;

		top: 50%;

		left: 50%;

		margin: -150px 0 0 -150px;

		width:300px;

		height:300px;

	}

	.login h1 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }



	.input { 

		width: 100%; 

		margin-bottom: 10px; 

		background: rgba(0,0,0,0.3);

		border: none;

		outline: none;

		padding: 10px;

		font-size: 13px;

		color: #fff;

		text-shadow: 1px 1px 1px rgba(0,0,0,0.3);

		border: 1px solid rgba(0,0,0,0.3);

		border-radius: 4px;

		box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);

		-webkit-transition: box-shadow .5s ease;

		-moz-transition: box-shadow .5s ease;

		-o-transition: box-shadow .5s ease;

		-ms-transition: box-shadow .5s ease;

		transition: box-shadow .5s ease;

	}

	.input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }

</style>

</head>

<body>







	<div class="login">

		<div align="center" class="mb-4">

			<img src="img/LOGOTIPO_HORIZONTAL_2.png" width="270">

		</div>

		<form method="post" action="autenticar.php">

			<input class="input" type="text" name="user" placeholder="Usuário" required="required" />

			<input class="input" type="password" name="senha" placeholder="Senha" required="required" />

			<button type="submit" class="btn btn-light btn-block btn-large">Logar</button>

		</form>

	</div>







</script>

</body>

</html>











<!-- Modal -->

<div class="modal fade" id="modalRecuperar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">

				<h5 class="modal-title" id="staticBackdropLabel">Recuperar Senha</h5>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					<span aria-hidden="true">&times;</span>

				</button>

			</div>

			<form method="POST" id="form">

				<div class="modal-body">

					<div class="form-group">

						<label >Seu Email</label>

						<input type="email" class="form-control" id="email" name="email" placeholder="Email">

					</div>



					<small>

						<div id="mensagem">



						</div>

					</small> 



				</div>

				<div class="modal-footer">

					<button id="btn-fechar" type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

					<button type="submit" class="btn btn-info">Recuperar</button>

				</div>

			</form>

		</div>

	</div>

</div>







<!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM OU SEM IMAGEM -->

<script type="text/javascript">

	$("#form").submit(function () {

		

		event.preventDefault();

		var formData = new FormData(this);



		$.ajax({

			url:"recuperar.php",

			type: 'POST',

			data: formData,



			success: function (mensagem) {

				$('#mensagem').removeClass()

				if (mensagem.trim() == "Sua senha foi Enviada para seu Email!") {

                    //$('#nome').val('');

                    //$('#btn-fechar').click();

                    $('#mensagem').addClass('text-success')

                } else {

                	$('#mensagem').addClass('text-danger')

                }

                $('#mensagem').text(mensagem)

            },



            cache: false,

            contentType: false,

            processData: false,

            xhr: function () {  // Custom XMLHttpRequest

            	var myXhr = $.ajaxSettings.xhr();

                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload

                	myXhr.upload.addEventListener('progress', function () {

                		/* faz alguma coisa durante o progresso do upload */

                	}, false);

                }

                return myXhr;

            }

        });

	});

</script>




