<?php

$pag = "perfil";

require_once("../conexao.php");
require '../class/validarPerfil.php';



@session_start();

//verificar se o usuário está autenticado

if (@$_SESSION['id_usuario'] == null || @$_SESSION['painel'] != 'painel-adm') {

    echo "<script language='javascript'> window.location='../index.php' </script>";
}



?>



<div class="row mt-4 mb-4">

    <a type="button" class="btn-info btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag ?>&funcao=novo">Novo Perfil</a>

    <a type="button" class="btn-info btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php echo $pag ?>&funcao=novo">+</a>



</div>







<!-- DataTales Example -->

<div class="card shadow mb-4">



    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>

                    <tr>

                        <th>Nome do Perfil</th>

                        <th>Cadastro de Perfil</th>

                        <th>Cadastro de Usuários</th>

                        <th>Gráfico Temperatura</th>

                        <th>Gráfico Amônia</th>

                        <th>Rel. Temperatura Frigorífico</th>

                        <th>Rel. Temperatura Produção 01</th>

                        <th>Rel. Temperatura Produção 02</th>

                        <th>Vazão ETA</th>

                        <th>Hist. Alarmes Amônia</th>

                        <th>Alarmes Amônia Just.</th>

                        <th>Alarmes Amônia não Just.</th>

                        <th>Rel. Fabrica Sub-Produto</th>

                        <th>Rel. Operações Sub-Produto</th>

                        <th>Ações</th>

                    </tr>

                </thead>



                <tbody>



                    <?php



                    $query = $pdo->query("SELECT * FROM perfil order by id desc ");

                    $res = $query->fetchAll(PDO::FETCH_ASSOC);



                    for ($i = 0; $i < count($res); $i++) {

                        foreach ($res[$i] as $key => $value) {
                        }



                        $nome = $res[$i]['nome'];

                        $perfil = $res[$i]['perfil'];

                        $perfil = validaPerfil($perfil);

                        $usuarios = $res[$i]['usuarios'];

                        $usuarios = validaPerfil($usuarios);

                        $grafTemp = $res[$i]['grafTemp'];

                        $grafTemp = validaPerfil($grafTemp);

                        $grafAmon = $res[$i]['grafAmon'];

                        $grafAmon = validaPerfil($grafAmon);

                        $relTempFrig = $res[$i]['relTempFrig'];

                        $relTempFrig = validaPerfil($relTempFrig);

                        $relTempProd01 = $res[$i]['relTempProd01'];

                        $relTempProd01 = validaPerfil($relTempProd01);

                        $relTempProd02 = $res[$i]['relTempProd02'];

                        $relTempProd02 = validaPerfil($relTempProd02);

                        $eta = $res[$i]['eta'];

                        $eta = validaPerfil($eta);

                        $histAlarmeAmon = $res[$i]['histAlarmeAmon'];

                        $histAlarmeAmon = validaPerfil($histAlarmeAmon);

                        $alarmeAmonJust = $res[$i]['alarmeAmonJust'];

                        $alarmeAmonJust = validaPerfil($alarmeAmonJust);

                        $alarmeAmonNaoJust = $res[$i]['alarmeAmonNaoJust'];

                        $alarmeAmonNaoJust = validaPerfil($alarmeAmonNaoJust);

                        $relFabricaFarinha = $res[$i]['relFabricaFarinha'];

                        $relFabricaFarinha = validaPerfil($relFabricaFarinha);

                        $relOperation = $res[$i]['relOperation'];

                        $relOperation = validaPerfil($relOperation);

                        $id = $res[$i]['id'];





                    ?>





                        <tr>

                            <td><?php echo $nome ?></td>

                            <td><?php echo $perfil ?></td>

                            <td><?php echo $usuarios ?></td>

                            <td><?php echo $grafTemp ?></td>

                            <td><?php echo $grafAmon ?></td>

                            <td><?php echo $relTempFrig ?></td>

                            <td><?php echo $relTempProd01 ?></td>

                            <td><?php echo $relTempProd02 ?></td>

                            <td><?php echo $eta ?></td>

                            <td><?php echo $histAlarmeAmon ?></td>

                            <td><?php echo $alarmeAmonJust ?></td>

                            <td><?php echo $alarmeAmonNaoJust ?></td>

                            <td><?php echo $relFabricaFarinha ?></td>

                            <td><?php echo $relOperation ?></td>





                            <td>

                                <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Dados'><i class='far fa-edit'></i></a>

                                <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>

                            </td>

                        </tr>

                    <?php } ?>











                </tbody>

            </table>

        </div>

    </div>

</div>











<!-- Modal -->

<div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <?php

                if (@$_GET['funcao'] == 'editar') {

                    $titulo = "Editar Registro";

                    $id2 = $_GET['id'];



                    $query = $pdo->query("SELECT * FROM perfil where id = '" . $id2 . "';");

                    $res = $query->fetchAll(PDO::FETCH_ASSOC);



                    $nome2 = $res[0]['nome'];

                    $perfil2 = $res[0]['perfil'];

                    $usuarios2 = $res[0]['usuarios'];

                    $grafTemp2 = $res[0]['grafTemp'];

                    $grafAmon2 = $res[0]['grafAmon'];

                    $relTempFrig2 = $res[0]['relTempFrig'];

                    $relTempProd01_2 = $res[0]['relTempProd01'];

                    $relTempProd02_2 = $res[0]['relTempProd02'];

                    $eta2 = $res[0]['eta'];

                    $histAlarmeAmon2 = $res[0]['histAlarmeAmon'];

                    $alarmeAmonJust2 = $res[0]['alarmeAmonJust'];

                    $alarmeAmonNaoJust2 = $res[0]['alarmeAmonNaoJust'];

                    $relFabricaFarinha2 = $res[0]['relFabricaFarinha'];

                    $relOperation2 = $res[0]['relOperation2'];
                } else {

                    $titulo = "Inserir Registro";
                }





                ?>



                <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo ?></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <form id="form" method="POST">

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-7">

                            <div class="form-group">

                                <label>Nome do Perfil</label>

                                <input value="<?php echo @$nome2 ?>" type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Perfil">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label><i><b><u>Menus</u></b></i></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group form-check ml-4">
                            <?php if (@$perfil2 == "on") {
                                echo '<input type="checkbox" class="form-check-input" id="perfil" name="perfil" checked>';
                            } else {
                                echo '<input type="checkbox" class="form-check-input" id="perfil" name="perfil">';
                            }
                            ?>

                            <label class="form-check-label" for="perfil">Cadastro de Perfil</label>
                        </div>


                        <div class="form-group form-check ml-4 rem">
                            <?php
                            if (@$usuarios2 == "on") {
                                echo '<input type="checkbox" class="form-check-input" id="usuarios" name="usuarios" checked>';
                            } else {
                                echo '<input type="checkbox" class="form-check-input" id="usuarios" name="usuarios">';
                            }
                            ?>

                            <label class="form-check-label" for="usuarios">Cadastro de Usuários</label>
                        </div>


                        <div class="form-group form-check ml-4 rem">
                            <?php
                            if (@$grafTemp2 == "on") {
                                echo '<input type="checkbox" class="form-check-input" id="grafTemp" name="grafTemp" checked>';
                            } else {
                                echo '<input type="checkbox" class="form-check-input" id="grafTemp" name="grafTemp">';
                            }
                            ?>

                            <label class="form-check-label" for="usuarios">Gráfico Temperatura</label>
                        </div>


                        <div class="form-group form-check ml-4 rem">
                            <?php
                            if (@$grafAmon2 == "on") {
                                echo '<input type="checkbox" class="form-check-input" id="grafAmon" name="grafAmon" checked>';
                            } else {
                                echo '<input type="checkbox" class="form-check-input" id="grafAmon" name="grafAmon">';
                            }
                            ?>

                            <label class="form-check-label" for="usuarios">Gráfico Amônia</label>
                        </div>


                        <div class="form-group form-check ml-4 rem">
                            <?php
                            if (@$relTempFrig2 == "on") {
                                echo '<input type="checkbox" class="form-check-input" id="relTempFrig" name="relTempFrig" checked>';
                            } else {
                                echo '<input type="checkbox" class="form-check-input" id="relTempFrig" name="relTempFrig">';
                            }
                            ?>

                            <label class="form-check-label" for="usuarios">Rel. Temp. Frigorífico</label>
                        </div>


                        <div class="form-group form-check ml-4 rem">
                            <?php
                            if (@$relTempProd01_2 == "on") {
                                echo '<input type="checkbox" class="form-check-input" id="relTempProd01" name="relTempProd01" checked>';
                            } else {
                                echo '<input type="checkbox" class="form-check-input" id="relTempProd01" name="relTempProd01">';
                            }
                            ?>

                            <label class="form-check-label" for="usuarios">Rel. Temp. Produção 01</label>
                        </div>


                        <div class="form-group form-check ml-4 rem">
                            <?php
                            if (@$relTempProd02_2 == "on") {
                                echo '<input type="checkbox" class="form-check-input" id="relTempProd02" name="relTempProd02" checked>';
                            } else {
                                echo '<input type="checkbox" class="form-check-input" id="relTempProd02" name="relTempProd02">';
                            }
                            ?>

                            <label class="form-check-label" for="usuarios">Rel. Temp. Produção 02</label>
                        </div>


                        <div class="form-group form-check ml-4 rem">
                            <?php
                            if (@$eta2 == "on") {
                                echo '<input type="checkbox" class="form-check-input" id="eta" name="eta" checked>';
                            } else {
                                echo '<input type="checkbox" class="form-check-input" id="eta" name="eta">';
                            }
                            ?>

                            <label class="form-check-label" for="usuarios">Rel. ETA</label>
                        </div>


                        <div class="form-group form-check ml-4 rem">
                            <?php
                            if (@$histAlarmeAmon2 == "on") {
                                echo '<input type="checkbox" class="form-check-input" id="histAlarmeAmon" name="histAlarmeAmon" checked>';
                            } else {
                                echo '<input type="checkbox" class="form-check-input" id="histAlarmeAmon" name="histAlarmeAmon">';
                            }
                            ?>

                            <label class="form-check-label" for="usuarios">Hist. Alarmes Amônia</label>
                        </div>


                        <div class="form-group form-check ml-4 rem">
                            <?php
                            if (@$alarmeAmonJust2 == "on") {
                                echo '<input type="checkbox" class="form-check-input" id="alarmeAmonJust" name="alarmeAmonJust" checked>';
                            } else {
                                echo '<input type="checkbox" class="form-check-input" id="alarmeAmonJust" name="alarmeAmonJust">';
                            }
                            ?>

                            <label class="form-check-label" for="usuarios">Alarmes Amônia Just.</label>
                        </div>


                        <div class="form-group form-check ml-4 rem">
                            <?php
                            if (@$alarmeAmonNaoJust2 == "on") {
                                echo '<input type="checkbox" class="form-check-input" id="alarmeAmonNaoJust" name="alarmeAmonNaoJust" checked>';
                            } else {
                                echo '<input type="checkbox" class="form-check-input" id="alarmeAmonNaoJust" name="alarmeAmonNaoJust">';
                            }
                            ?>

                            <label class="form-check-label" for="usuarios">Alarmes Amônia não Just.</label>
                        </div>


                        <div class="form-group form-check ml-4 rem">
                            <?php
                            if (@$relFabricaFarinha2 == "on") {
                                echo '<input type="checkbox" class="form-check-input" id="relFabricaFarinha" name="relFabricaFarinha" checked>';
                            } else {
                                echo '<input type="checkbox" class="form-check-input" id="relFabricaFarinha" name="relFabricaFarinha">';
                            }
                            ?>

                            <label class="form-check-label" for="usuarios">Rel. Fábrica Sub-Produto</label>
                        </div>

                        <div class="form-group form-check ml-4 rem">
                            <?php
                            if (@$relOperation2 == "on") {
                                echo '<input type="checkbox" class="form-check-input" id="relOperation" name="relOperation" checked>';
                            } else {
                                echo '<input type="checkbox" class="form-check-input" id="relOperation" name="relOperation">';
                            }
                            ?>

                            <label class="form-check-label" for="usuarios">Rel. Operações Sub-Produto</label>
                        </div>
                    </div>

                    <small>

                        <div id="mensagem">



                        </div>

                    </small>



                </div>







                <div class="modal-footer">







                    <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="txtid2" id="txtid2">



                    <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                    <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>

                </div>

            </form>

        </div>

    </div>

</div>













<div class="modal" id="modal-deletar" tabindex="-1" role="dialog">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Excluir Registro</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">



                <p>Deseja realmente Excluir este Registro?</p>



                <div align="center" id="mensagem_excluir" class="">



                </div>



            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-excluir">Cancelar</button>

                <form method="post">



                    <input type="hidden" id="id" name="id" value="<?php echo @$_GET['id'] ?>" required>



                    <button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>

                </form>

            </div>

        </div>

    </div>

</div>









<div class="modal" id="modal-endereco" tabindex="-1" role="dialog">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Dados do Perfil</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">



                <?php

                if (@$_GET['funcao'] == 'endereco') {



                    $id2 = $_GET['id'];



                    $query = $pdo->query("SELECT * FROM perfil where id = '$id2' ");

                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    $nome3 = $res[0]['nome'];

                    $perfil3 = $res[0]['perfil'];

                    $perfil3 = validaPerfil($perfil3);

                    $usuarios3 = $res[0]['usuarios'];

                    $usuarios3 = validaPerfil($usuarios3);

                    $justificados3 = $res[0]['alarmesJustificados'];

                    $justificados3 = validaPerfil($justificados3);

                    $naoJustificados3 = $res[0]['alarmesNaoJustificados'];

                    $naoJustificados3 = validaPerfil($naoJustificados3);

                    $alarmes3 = $res[0]['alarmes'];

                    $alarmes3 = validaPerfil($alarmes3);

                    $justificativa3 = $res[0]['justificativa'];

                    $justificativa3 = validaPerfil($justificativa3);
                }





                ?>



                <span><b>Nome: </b> <i><?php echo $nome3 ?></i></span><br><br>

                <span><b>Cadastro de Perfil: </b> <i><?php echo $perfil3 ?></i></span>

                <span class="ml-4"><b> Cadastro de Usuários: </b> <i><?php echo $usuarios3 ?></i></span><br><br>

                <span><b>Alarmes Justificados: </b> <i><?php echo $justificados3 ?></i></span>

                <span class="ml-4"><b> Não Justificados: </b> <i><?php echo $naoJustificados3 ?></i></span><br><br>

                <span><b>Alarmes Geral: </b> <i><?php echo $alarmes3 ?></i></span>

                <span class="ml-4"><b> Cadastrar Justificativa: </b> <i><?php echo $justificativa3 ?></i></span><br><br>


            </div>



        </div>

    </div>

</div>













<?php



if (@$_GET["funcao"] != null && @$_GET["funcao"] == "novo") {

    echo "<script>$('#modalDados').modal('show');</script>";
}



if (@$_GET["funcao"] != null && @$_GET["funcao"] == "editar") {

    echo "<script>$('#modalDados').modal('show');</script>";
}



if (@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir") {

    echo "<script>$('#modal-deletar').modal('show');</script>";
}



if (@$_GET["funcao"] != null && @$_GET["funcao"] == "endereco") {

    echo "<script>$('#modal-endereco').modal('show');</script>";
}



?>









<!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM IMAGEM -->

<script type="text/javascript">
    $("#form").submit(function() {

        var pag = "<?= $pag ?>";

        event.preventDefault();

        var formData = new FormData(this);



        $.ajax({

            url: pag + "/inserir.php",

            type: 'POST',

            data: formData,



            success: function(mensagem) {



                $('#mensagem').removeClass()



                if (mensagem.trim() == "Salvo com Sucesso!") {



                    //$('#nome').val('');

                    //$('#cpf').val('');

                    $('#btn-fechar').click();

                    window.location = "index.php?pag=" + pag;



                } else {



                    $('#mensagem').addClass('text-danger')

                }



                $('#mensagem').text(mensagem)



            },



            cache: false,

            contentType: false,

            processData: false,

            xhr: function() { // Custom XMLHttpRequest

                var myXhr = $.ajaxSettings.xhr();

                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload

                    myXhr.upload.addEventListener('progress', function() {

                        /* faz alguma coisa durante o progresso do upload */

                    }, false);

                }

                return myXhr;

            }

        });

    });
</script>











<!--AJAX PARA EXCLUSÃO DOS DADOS -->

<script type="text/javascript">
    $(document).ready(function() {

        var pag = "<?= $pag ?>";

        $('#btn-deletar').click(function(event) {

            event.preventDefault();



            $.ajax({

                url: pag + "/excluir.php",

                method: "post",

                data: $('form').serialize(),

                dataType: "text",

                success: function(mensagem) {



                    if (mensagem.trim() === 'Excluído com Sucesso!') {





                        $('#btn-cancelar-excluir').click();

                        window.location = "index.php?pag=" + pag;

                    }



                    $('#mensagem_excluir').text(mensagem)







                },



            })

        })

    })
</script>







<!--SCRIPT PARA CARREGAR IMAGEM -->

<script type="text/javascript">
    function carregarImg() {



        var target = document.getElementById('target');

        var file = document.querySelector("input[type=file]").files[0];

        var reader = new FileReader();



        reader.onloadend = function() {

            target.src = reader.result;

        };



        if (file) {

            reader.readAsDataURL(file);





        } else {

            target.src = "";

        }

    }
</script>











<script type="text/javascript">
    $(document).ready(function() {

        $('#dataTable').dataTable({

            "ordering": false

        })



    });
</script>