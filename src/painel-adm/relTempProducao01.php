    <?php 

    $pag = "relTempProducao01";

    require_once("../conexao.php"); 



    @session_start();

    //verificar se o usuário está autenticado

    if(@$_SESSION['id_usuario'] == null || @$_SESSION['painel'] != 'painel-adm'){

        echo "<script language='javascript'> window.location='../index.php' </script>";
    }

    $dataIni = date('Y-m-d');

    $horaIni = '00:00';

    $dataFim = date('Y-m-d');

    $horaFim = '23:59';


    ?>


    <!-- DataTales -->

    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card shadow mb-2">
                        <div class="card-body col-md-12 col-lg-12 col-xl-12">
                            <form>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                      <div class="row">
                                            <div class="col-md-6 col-lg-5 col-xl-3">
                                                <div class="form-group">
                                                    <span>Data Inicial:</span>
                                                    <input class="form-control" type="date" id="dataIni" name="dataIni" value="<?php echo @$dataIni;?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-5 col-xl-2">
                                                <div class="form-group">
                                                    <span>Hora Inicial:</span>
                                                    <input class="form-control" type="time" id="horaIni" name="horaIni"  value="<?php echo @$horaIni;?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-5 col-xl-3">
                                                <div class="form-group">
                                                    <span>Data Final:</span>
                                                    <input class="form-control" type="date" id="dataFim" name="dataFim"  value="<?php echo @$dataFim;?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-5 col-xl-2">
                                                <div class="form-group">
                                                    <span>Hora Final:</span>
                                                    <input class="form-control" type="time" id="horaFim" name="horaFim"  value="<?php echo @$horaFim;?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xl-2">
                                                <div class="form-group">
                                                    <input class="form-control btn btn-primary mt-4" type="button" id="button" name="button" value="Buscar">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xl-2">
                                                <div class="form-group">
                                                    <a id="pdf" href="#" class="text-danger" title="Gerar relatório PDF">    <i class="far fa-file-pdf" style="font-size: 35px; margin-top: 26px"></i>
                                                    </a>

                                                    <a id="excel" href="#" class="text-success" title="Gerar relatório EXCEL">
                                                        <i class="far fa-file-excel ml-2" style="font-size: 35px; margin-top: 26px"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="table" style="display:none">
        <div class="col">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card shadow mb-2">
                        <div class="card-body col-md-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Data e Hora</th>
                                            <th>
                                                Pré-Chiller 01 - V
                                                <br>
                                                <a id="atualizar_pre_chiller_01_V" href="#" class="text-primary" title="Pre Chiller 01 V">
                                                    <i class="fas fa-sync-alt" ></i>
                                                </a>
                                            </th>
                                            <th>
                                                Chiller 01 - V
                                                <br>
                                                <a id="atualizar_chiller_01_V" href="#" class="text-primary" title="Chiller 01 - V">
                                                    <i class="fas fa-sync-alt" ></i>
                                            </th>
                                            <th>
                                                Pré-Chiller 02 - N
                                                <br>
                                                <a id="atualizar_pre_chiller_02_N" href="#" class="text-primary" title="Pré-Chiller 02 - N">
                                                    <i class="fas fa-sync-alt" ></i>
                                            </th>
                                            <th>
                                                Chiller 02 - N
                                                <br>
                                                <a id="atualizar_chiller_02_N" href="#" class="text-primary" title="Chiller 02 - N">
                                                    <i class="fas fa-sync-alt" ></i>
                                            </th>
                                            <th>
                                                Pré-Resfriamento 01
                                                <br>
                                                <a id="atualizar_pre_resfriamento_01" href="#" class="text-primary" title="Pré-Resfriamento 01">
                                                    <i class="fas fa-sync-alt" ></i>
                                            </th>
                                            <th>
                                                Pré-Resfriamento 02
                                                <br>
                                                <a id="atualizar_pre_resfriamento_02" href="#" class="text-primary" title="Pré-Resfriamento 02">
                                                    <i class="fas fa-sync-alt" ></i>
                                            </th>
                                            <th>
                                                Câmara de Resfriado 01
                                                <br>
                                                <a id="atualizar_camara_resfriado_01" href="#" class="text-primary" title="Câmara de Resfriado 01">
                                                    <i class="fas fa-sync-alt" ></i>
                                            </th>
                                            <th>
                                                Câmara de Resfriado 02
                                                <br>
                                                <a id="atualizar_camara_resfriado_02" href="#" class="text-primary" title="Câmara de Resfriado 02">
                                                    <i class="fas fa-sync-alt" ></i>
                                            </th>
                                            <th>
                                                Girofreezer
                                                <br>
                                                <a id="atualizar_girofreezer" href="#" class="text-primary" title="Girofreezer">
                                                    <i class="fas fa-sync-alt" ></i>
                                            </th>
                                            <th>
                                                Seção Embalagem 01
                                                <br>
                                                <a id="atualizar_secao_embalagem_01" href="#" class="text-primary" title="Seção Embalagem 01">
                                                    <i class="fas fa-sync-alt" ></i>
                                            </th>
                                            <th>
                                                Seção Embalagem 02
                                                <br>
                                                <a id="atualizar_secao_embalagem_02" href="#" class="text-primary" title="Seção Embalagem 02">
                                                    <i class="fas fa-sync-alt" ></i>
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody id="conteudoTable">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="carregando" style=" display: none; margin-top: 10%;">
        <div class="row justify-content-md-center">
            <div class="col-sm-1 col-md-1 col-lg-1 col-xl-1">
                <i class="fa fa-cog fa-spin fa-5x fa-fw" style="left: 45%;"></i>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-sm-1 col-md-1 col-lg-1 col-xl-2">
                <h4 id="buscando" style="left: 42%; margin-top: 7%;">Buscando Registros...</h4>
            </div>
        </div>
    </div>

    <div class="row" id="semDados" style="display:none">
        <div class="col-md-12 pb-0">
            <div class="card shadow mb-4">
                <div class="card-body col-md-11">
                    <div style="text-align-last: center;">
                        <h4>Nenhum Registro Encontrado!</h4>
                    </div>
                </div>
            </div>                      
        </div>
    </div>





<script>



    var btn = document.getElementById("button")

    var contador = 0;


    btn.addEventListener("click", function(){



        btn.disabled = "disabled";



        // variaveis que serão enviadas


        var dataIni = document.getElementById("dataIni").value;
        var horaIni = document.getElementById("horaIni").value;
        var dataFim = document.getElementById("dataFim").value;
        var horaFim = document.getElementById("horaFim").value;

        // Fim


        $('#carregando').show();
        $('#table').hide();


        //Fim


        // Metodo que envia os dados para consulta

        $.get( "../class/relTempProducao01.php", {
            "dataIni":dataIni,
            "horaIni":horaIni,
            "dataFim":dataFim,
            "horaFim":horaFim}
        )



            //Retorno dos dados

            .done(function(data) {

                var json = JSON.parse(data);


                var table = "";


                for (var i = 0; i < json.dataHora.length; i++) {

                    var dataHora = "<tr><td>" + json.dataHora[i] + "</td>";
                    var preChiller01 = "<td>" + json.preChiller01[i] + "</td>";
                    var chiller01 = "<td>" + json.chiller01[i] + "</td>";
                    var preChiller02 = "<td>" + json.preChiller02[i] + "</td>";
                    var chiller02 = "<td>" + json.chiller02[i] + "</td>";
                    var preResfri01 = "<td>" + json.preResfri01[i] + "</td>";
                    var preResfri02 = "<td>" + json.preResfri02[i] + "</td>";
                    var camResfriado01 = "<td>" + json.camResfriado01[i] + "</td>";
                    var camResfriado02 = "<td>" + json.camResfriado02[i] + "</td>";
                    var giroFreezer = "<td>" + json.giroFreezer[i] + "</td>";
                    var secaoEmbalagem01 = "<td>" + json.secaoEmbalagem01[i] + "</td>";
                    var secaoEmbalagem02 = "<td>" + json.secaoEmbalagem02[i] + "</td></tr>";

                    table += dataHora += preChiller01 += chiller01 += preChiller02 += chiller02 += preResfri01 += preResfri02 += camResfriado01 += camResfriado02 += giroFreezer += secaoEmbalagem01 += secaoEmbalagem02;


                }



                if (contador == 1 ) {

                    $('#dataTable1').DataTable().destroy();
                    $('#conteudoTable').html(table);
                    $('#dataTable1').DataTable().draw();

                }else{

                    $('#conteudoTable').html(table);
                    $('#dataTable1').DataTable();
                }



                contador = 1;

                $('#carregando').hide();
                $('#table').show();

                btn.disabled = "";

                $('#pdf').attr('href', '../rel/relTempProducao01.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim)
                $('#pdf').attr('target', '_blank');

                $('#excel').attr('href', '../rel/relTempProducao01Excel.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim)

                $('#atualizar_pre_chiller_01_V').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=pre_chiller_01_V')

                $('#atualizar_chiller_01_V').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=chiller_01_V')

                $('#atualizar_pre_chiller_02_N').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=pre_chiller_02_N')

                $('#atualizar_chiller_02_N').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=chiller_02_N')

                $('#atualizar_pre_resfriamento_01').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=pre_resfriamento_01')

                $('#atualizar_pre_resfriamento_02').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=pre_resfriamento_02')

                $('#atualizar_camara_resfriado_01').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=camara_resfriado_01')

                $('#atualizar_camara_resfriado_02').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=camara_resfriado_02')

                $('#atualizar_girofreezer').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=girofreezer')

                $('#atualizar_secao_embalagem_01').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_embalagem_01')

                $('#atualizar_secao_embalagem_02').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_embalagem_02')




            });


    });



</script>





