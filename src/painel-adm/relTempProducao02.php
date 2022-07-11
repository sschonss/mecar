<?php

$pag = "relTempProducao02";

require_once("../conexao.php");



@session_start();

//verificar se o usuário está autenticado

if (@$_SESSION['id_usuario'] == null || @$_SESSION['painel'] != 'painel-adm') {

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
                                                <input class="form-control" type="date" id="dataIni" name="dataIni" value="<?php echo @$dataIni; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-5 col-xl-2">
                                            <div class="form-group">
                                                <span>Hora Inicial:</span>
                                                <input class="form-control" type="time" id="horaIni" name="horaIni" value="<?php echo @$horaIni; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-5 col-xl-3">
                                            <div class="form-group">
                                                <span>Data Final:</span>
                                                <input class="form-control" type="date" id="dataFim" name="dataFim" value="<?php echo @$dataFim; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-5 col-xl-2">
                                            <div class="form-group">
                                                <span>Hora Final:</span>
                                                <input class="form-control" type="time" id="horaFim" name="horaFim" value="<?php echo @$horaFim; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-xl-2">
                                            <div class="form-group">
                                                <input class="form-control btn btn-primary mt-4" type="button" id="button" name="button" value="Buscar">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-xl-2">
                                            <div class="form-group">
                                                <a id="pdf" href="#" class="text-danger" title="Gerar relatório PDF"> <i class="far fa-file-pdf" style="font-size: 35px; margin-top: 26px"></i>
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
                                            Seção de Corte 01
                                            <br>
                                            <a id="atualizar_secao_de_corte_01" href="#" class="text-primary" title="Seção de Corte 01">
                                                <i class="fas fa-sync-alt"></i>
                                            </a>
                                        </th>
                                        <th>
                                            Seção de Corte 02
                                            <br>
                                            <a id="atualizar_secao_de_corte_02" href="#" class="text-primary" title="Seção de Corte 02">
                                                <i class="fas fa-sync-alt"></i>
                                        </th>
                                        <th>
                                            Seção de Corte 03
                                            <br>
                                            <a id="atualizar_secao_de_corte_03" href="#" class="text-primary" title="Seção de Corte 03">
                                                <i class="fas fa-sync-alt"></i>
                                        </th>
                                        <th>
                                            Seção de Corte 04
                                            <br>
                                            <a id="atualizar_secao_de_corte_04" href="#" class="text-primary" title="Seção de Corte 04">
                                                <i class="fas fa-sync-alt"></i>
                                        </th>
                                        <th>
                                            Seção de Salgado
                                            <br>
                                            <a id="atualizar_secao_de_salgado" href="#" class="text-primary" title="Seção de Salgado">
                                                <i class="fas fa-sync-alt"></i>
                                        </th>
                                        <th>
                                            Seção de Bandeja
                                            <br>
                                            <a id="atualizar_secao_de_bandeja" href="#" class="text-primary" title="Seção de Bandeja">
                                                <i class="fas fa-sync-alt"></i>
                                        </th>
                                        <th>
                                            Seção de Emb. IQF
                                            <br>
                                            <a id="atualizar_secao_de_emb_IQF" href="#" class="text-primary" title="Seção de Emb. IQF">
                                                <i class="fas fa-sync-alt"></i>
                                        </th>
                                        <th>
                                            Seção de IQF
                                            <br>
                                            <a id="atualizar_secao_de_IQF" href="#" class="text-primary" title="Seção de IQF">
                                                <i class="fas fa-sync-alt"></i>
                                        </th>
                                        <th>
                                            Seção de CMS
                                            <br>
                                            <a id="atualizar_secao_de_CMS" href="#" class="text-primary" title="Seção de CMS">
                                                <i class="fas fa-sync-alt"></i>
                                        </th>
                                        <th>
                                            Seção de CMR
                                            <br>
                                            <a id="atualizar_secao_de_CMR" href="#" class="text-primary" title="Seção de CMR">
                                                <i class="fas fa-sync-alt"></i>
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


    btn.addEventListener("click", function() {



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

        $.get("../class/relTempProducao02.php", {
                "dataIni": dataIni,
                "horaIni": horaIni,
                "dataFim": dataFim,
                "horaFim": horaFim
            })



            //Retorno dos dados

            .done(function(data) {

                var json = JSON.parse(data);


                var table = "";


                for (var i = 0; i < json.dataHora.length; i++) {

                    var dataHora = "<tr><td>" + json.dataHora[i] + "</td>";
                    var secaoCorte01 = "<td>" + json.secaoCorte01[i] + "</td>";
                    var secaoCorte02 = "<td>" + json.secaoCorte02[i] + "</td>";
                    var secaoCorte03 = "<td>" + json.secaoCorte03[i] + "</td>";
                    var secaoCorte04 = "<td>" + json.secaoCorte04[i] + "</td>";
                    var secaoSalgado = "<td>" + json.secaoSalgado[i] + "</td>";
                    var secaoBandeja = "<td>" + json.secaoBandeja[i] + "</td>";
                    var secaoEmbIQF = "<td>" + json.secaoEmbIQF[i] + "</td>";
                    var secaoIQF = "<td>" + json.secaoIQF[i] + "</td>";
                    var secaoCMS = "<td>" + json.secaoCMS[i] + "</td>";
                    var secaoCMR = "<td>" + json.secaoCMR[i] + "</td></tr>";

                    table += dataHora += secaoCorte01 += secaoCorte02 += secaoCorte03 += secaoCorte04 += secaoSalgado += secaoBandeja += secaoEmbIQF += secaoIQF += secaoCMS += secaoCMR;


                }



                if (contador == 1) {

                    $('#dataTable1').DataTable().destroy();
                    $('#conteudoTable').html(table);
                    $('#dataTable1').DataTable().draw();

                } else {

                    $('#conteudoTable').html(table);
                    $('#dataTable1').DataTable();
                }



                contador = 1;

                $('#carregando').hide();
                $('#table').show();

                btn.disabled = "";

                $('#pdf').attr('href', '../rel/relTempProducao02.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim)
                $('#pdf').attr('target', '_blank');

                $('#excel').attr('href', '../rel/relTempProducao02Excel.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim)

                $('#atualizar_secao_de_corte_01').attr('href', '../painel-users/ajuste_area_producao_02/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_de_corte_01')

                $('#atualizar_secao_de_corte_02').attr('href', '../painel-users/ajuste_area_producao_02/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_de_corte_02')

                $('#atualizar_secao_de_corte_03').attr('href', '../painel-users/ajuste_area_producao_02/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_de_corte_03')

                $('#atualizar_secao_de_corte_04').attr('href', '../painel-users/ajuste_area_producao_02/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_de_corte_04')

                $('#atualizar_secao_de_salgado').attr('href', '../painel-users/ajuste_area_producao_02/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_de_salgado')

                $('#atualizar_secao_de_bandeja').attr('href', '../painel-users/ajuste_area_producao_02/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_de_bandeja')

                $('#atualizar_secao_de_emb_IQF').attr('href', '../painel-users/ajuste_area_producao_02/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_de_emb_IQF')

                $('#atualizar_secao_de_IQF').attr('href', '../painel-users/ajuste_area_producao_02/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_de_IQF')

                $('#atualizar_secao_de_CMS').attr('href', '../painel-users/ajuste_area_producao_02/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_de_CMS')

                $('#atualizar_secao_de_CMR').attr('href', '../painel-users/ajuste_area_producao_02/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_de_CMR')


            });


    });
</script>