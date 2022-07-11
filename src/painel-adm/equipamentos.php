<?php 

$pag = "equipamentos";

require_once("../conexao.php"); 



@session_start();

    //verificar se o usuário está autenticado

if(@$_SESSION['id_usuario'] == null || @$_SESSION['painel'] != 'painel-adm'){

    echo "<script language='javascript'> window.location='../index.php' </script>";



}



?>



<div class="row mt-4 mb-4">

    <a type="button" class="btn-info btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag ?>&funcao=novo">Novo Equipamento</a>

    <a type="button" class="btn-info btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php echo $pag ?>&funcao=novo">+</a>

    

</div>







<!-- DataTales Example -->

<div class="card shadow mb-4">



    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>

                    <tr>

                        <th>Tag</th>

                        <th>Fabricante</th>

                        <th>Modelo</th>

                        <th>Localização</th>

                        <th>Porta do Painel</th>

                        <th>IP</th>

                        <th>Ações</th>

                    </tr>

                </thead>



                <tbody>



                   <?php 



                   $query = $pdo->query("SELECT * FROM equipment order by id desc ");

                   $res = $query->fetchAll(PDO::FETCH_ASSOC);



                   for ($i=0; $i < count($res); $i++) { 

                      foreach ($res[$i] as $key => $value) {

                      }



                      $tag = $res[$i]['tag'];

                      $description = $res[$i]['description'];

                      $manufacturer = $res[$i]['manufacturer'];

                      $id = $res[$i]['id'];

                      $model = $res[$i]['model'];

                      $localization = $res[$i]['localization'];

                      $portPainel = $res[$i]['portPainel'];

                      $ip = $res[$i]['ip'];
            
                      $image = $res[$i]['image'];

                      $page = $res[$i]['page'];

                      $urlManual = $res[$i]['urlManual'];

                      $urlProjeto = $res[$i]['urlProjeto'];
                
                
                
                

                ?>





                <tr>

                    <td><?php echo $tag ?></td>

                    <td><?php echo $manufacturer ?></td>

                    <td><?php echo $model ?></td>

                    <td><?php echo $localization ?></td>

                    <td><?php echo $portPainel ?></td>

                    <td><?php echo $ip ?></td>
                    



                    <td>

                     <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Dados'><i class='far fa-edit'></i></a>

                     <a href="../equipamentos.php?tag=<?php echo $tag ?>" target="_blank" class='text-primary mr-1' title='Visualizar Dados'><i class='far fa-eye'></i></a>

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



                    $query = $pdo->query("SELECT * FROM equipment where id = '" . $id2 . "' ");

                    $res = $query->fetchAll(PDO::FETCH_ASSOC);



                    $tag2 = $res[0]['tag'];

                    $description2 = $res[0]['description'];

                    $manufacturer2 = $res[0]['manufacturer'];

                    $model2 = $res[0]['model'];

                    $localization2 = $res[0]['localization'];

                    $portPainel2 = $res[0]['portPainel'];

                    $ip2 = $res[0]['ip'];

                    $page2 = $res[0]['page'];

                    $image2 = $res[0]['image'];

                    $urlManual2 = $res[0]['urlManual'];

                    $urlProjeto2 = $res[0]['urlProjeto'];





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

                                <label >Tag</label>

                                <input value="<?php echo @$tag2 ?>" type="text" class="form-control" maxlength="99" id="tag" name="tag" placeholder="Tag">

                            </div>



                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label >Fabricante</label>

                                        <input value="<?php echo @$manufacturer2 ?>" type="text" class="form-control" maxlength="99" id="manufacturer" name="manufacturer" placeholder="Fabricante">

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label >Modelo</label>

                                        <input value="<?php echo @$model2 ?>" type="text" class="form-control" maxlength="99" id="model" name="model" placeholder="Modelo">

                                    </div>

                                </div>

                            </div>



                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label >Porta Painel</label>

                                        <input value="<?php echo @$portPainel2 ?>" type="text" class="form-control" maxlength="99" id="portPainel" name="portPainel" placeholder="Porta do Painel">

                                    </div>

                                </div>


                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label >IP</label>

                                        <input value="<?php echo @$ip2 ?>" type="text" class="form-control" maxlength="99" id="ip" name="ip" placeholder="IP">

                                    </div>

                                </div>

                            </div>



                            <div class="form-group">

                                <label >Localização</label>

                                <input value="<?php echo @$localization2 ?>" type="text" maxlength="99" class="form-control" id="localization" name="localization" placeholder="Localização">

                            </div>



                            <div class="form-group">

                                <label >Descrição</label>

                                <textarea class="form-control" id="description" name="description" rows="10" maxlength="999" placeholder="Descrição"><?php echo @$description2 ?></textarea>

                            </div>

                        </div>
                        

                        <div class="col-md-5">

                            <div class="form-group">

                                <label >Imagem</label>

                                <input type="file" value="<?php echo @$image2 ?>"  class="form-control-file" id="imagem" name="imagem" onChange="carregarImg();">

                            </div>



                            <div id="divImgConta">

                            <?php if(@$image2 != ""){ ?>

                                <img src="../img/equipment/<?php echo $image2 ?>" width="200" id="target">

                            <?php  }else{ ?>

                                <img src="../img/equipment/sem-foto.jpg" width="200" id="target">

                            <?php } ?>

                            </div>

                            

                            <div class="form-group">

                                <label >Manual</label>

                                <input type="file" value="<?php echo @$urlManual2 ?>"  class="form-control-file" id="manual" name="manual" onChange="carregarManual();">

                                <div class="progress mt-2" id="progressManual" style="display:none;">

                                    <div class="progress-bar progress-bar-striped progress-bar-animated" id="progressManualPorc" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>

                                </div>

                                <input value="<?php echo @$urlManual2 ?>" type="text" class="form-control mt-2" id="targetManual" disabled="disabled" placeholder="Manual">

                            </div>

                            <div class="form-group">

                                <label >Projeto</label>

                                <input type="file" value="<?php echo @$urlProjeto2 ?>"  class="form-control-file" id="project" name="project" onChange="carregarProject();">

                                <div class="progress mt-2" id="progressProject" style="display:none;">

                                    <div class="progress-bar progress-bar-striped progress-bar-animated" id="progressProjectPorc" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>

                                </div>

                                <input value="<?php echo @$urlProjeto2 ?>" type="text" class="form-control mt-2" id="targetProject" disabled="disabled" placeholder="Projeto">

                            </div>

                            

                                <div class="form-group">

                                    <label >Página Projeto</label>

                                    <input value="<?php echo @$page2 ?>" type="text" class="form-control" id="pageProject" name="pageProject" placeholder="Página">

                                </div>

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



                    <input type="hidden" id="id"  name="id" value="<?php echo @$_GET['id'] ?>" required>



                    <button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>

                </form>

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



?>









<!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM IMAGEM -->

<script type="text/javascript">

    $("#form").submit(function () {

        var pag = "<?=$pag?>";

        event.preventDefault();

        var formData = new FormData(this);



        $.ajax({

            url: pag + "/inserir.php",

            type: 'POST',

            data: formData,



            success: function (mensagem) {



                $('#mensagem').removeClass()



                if (mensagem.trim() == "Salvo com Sucesso!") {

                    

                    //$('#nome').val('');

                    //$('#cpf').val('');

                    $('#btn-fechar').click();

                    window.location = "index.php?pag="+pag;



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











<!--AJAX PARA EXCLUSÃO DOS DADOS -->

<script type="text/javascript">

    $(document).ready(function () {

        var pag = "<?=$pag?>";

        $('#btn-deletar').click(function (event) {

            event.preventDefault();



            $.ajax({

                url: pag + "/excluir.php",

                method: "post",

                data: $('form').serialize(),

                dataType: "text",

                success: function (mensagem) {



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



        reader.onloadend = function () {

            target.src = reader.result;

        };



        if (file) {

            reader.readAsDataURL(file);


        } else {

            target.src = "";
        }

    }



</script>


<!--SCRIPT PARA CARREGAR O MANUAL -->

<script type="text/javascript">



    function carregarManual() {

        var progressManualPorc = document.getElementById('progressManualPorc');

        var targetManual = document.getElementById('targetManual');

        var fileManual = document.getElementById('manual').files[0];

        var readerManual = new FileReader();



        readerManual.onloadend = function () {

            targetManual.value = fileManual.name;

        };



        $('#progressManual').show();

        for (var i = 5; i <= 50; i++) {

            progressManualPorc.style.width = i + "%";

        }



        if (fileManual) {

            readerManual.readAsDataURL(fileManual);

            for (var i = 51; i <= 100; i++) {

                progressManualPorc.style.width = i + "%";

            }
            

            readerManual.onloadend = function () {

                if (progressManualPorc.style.width == "100%") {

                    targetManual.value = fileManual.name;

                    $('#progressManual').hide();


                }

                


            };



        } else {

            targetManual.Value = "";

            
        }
    }



</script>

<!--SCRIPT PARA CARREGAR O PROJETO -->

<script type="text/javascript">



    function carregarProject() {

        var progressProjectPorc = document.getElementById('progressProjectPorc');

        var targetProject = document.getElementById('targetProject');

        var fileProject = document.getElementById('project').files[0];

        var readerProject = new FileReader();



       


        $('#progressProject').show();

        for (var i = 5; i <= 50; i++) {

            progressProjectPorc.style.width = i + "%";

        }



        if (fileProject) {

            readerProject.readAsDataURL(fileProject);

            for (var i = 51; i <= 100; i++) {

                progressProjectPorc.style.width = i + "%";

            }
            

            readerProject.onloadend = function () {

                if (progressProjectPorc.style.width == "100%") {

                    targetProject.value = fileProject.name;

                    $('#progressProject').hide();


                }

                


            };




        } else {

            targetProject.value = "";

        }

    }



</script>











<script type="text/javascript">

    $(document).ready(function () {

        $('#dataTable').dataTable({

            "ordering": false

        })



    });

</script>







