    <?php

    $pag = "relTempFrigorifico";

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
                                                Câmara 01 <br>
                                                <a id="atualizar_camara_01" href="#" class="text-primary" title="Câmara 01">
                                                    <i class="fas fa-sync-alt"></i>
                                                </a>

                                            </th>
                                            <th>
                                                Câmara 02 <br>
                                                <a id="atualizar_camara_02" href="#" class="text-primary" title="Câmara 02">
                                                    <i class="fas fa-sync-alt"></i>

                                            </th>
                                            <th>
                                                Câmara 03 <br> <a id="atualizar_camara_03" href="#" class="text-primary" title="Câmara 03">
                                                    <i class="fas fa-sync-alt"></i>
                                            </th>
                                            <th>
                                                Câmara 04 <br> <a id="atualizar_camara_04" href="#" class="text-primary" title="Câmara 04">
                                                    <i class="fas fa-sync-alt"></i>
                                            </th>
                                            <th>
                                                Túnel Estático <br> <a id="atualizar_tunel_estatico" href="#" class="text-primary" title="Túnel Estático">
                                                    <i class="fas fa-sync-alt"></i>
                                            </th>
                                            <th>
                                                Túnel Contínuo <br> <a id="atualizar_tunel_continuo" href="#" class="text-primary" title="Túnel Contínuo">
                                                    <i class="fas fa-sync-alt"></i>
                                            </th>
                                            <th>
                                                Embalagem Secundária 01 <br> <a id="atualizar_embalagem_secundaria_01" href="#" class="text-primary" title="Embalagem Secundária 1">
                                                    <i class="fas fa-sync-alt"></i>
                                            </th>
                                            <th>
                                                Embalagem Secundária 02 <br> <a id="atualizar_embalagem_secundaria_02" href="#" class="text-primary" title="Embalagem Secundária 2">
                                                    <i class="fas fa-sync-alt"></i>
                                            </th>
                                            <th>
                                                Expedição <br> <a id="atualizar_expedicao" href="#" class="text-primary" title="Expedição">
                                                    <i class="fas fa-sync-alt"></i>
                                            </th>
                                            <th>
                                                Paletização <br> <a id="atualizar_paletizacao" href="#" class="text-primary" title="Paletização">
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
        var btn = document.getElementById('button')

        var contador = 0

        btn.addEventListener('click', function() {
            btn.disabled = 'disabled'

            // variaveis que serão enviadas

            var dataIni = document.getElementById('dataIni').value
            var horaIni = document.getElementById('horaIni').value
            var dataFim = document.getElementById('dataFim').value
            var horaFim = document.getElementById('horaFim').value

            // Fim

            $('#carregando').show()
            $('#table').hide()

            //Fim

            // Metodo que envia os dados para consulta

            $.get('../class/relTempFrigorifico.php', {
                    dataIni: dataIni,
                    horaIni: horaIni,
                    dataFim: dataFim,
                    horaFim: horaFim,
                })

                //Retorno dos dados

                .done(function(data) {
                    var json = JSON.parse(data)

                    var table = ''

                    for (var i = 0; i < json.dataHora.length; i++) {
                        var dataHora = '<tr><td>' + json.dataHora[i] + '</td>'
                        var camara01 = '<td>' + json.camara01[i] + '</td>'
                        var camara02 = '<td>' + json.camara02[i] + '</td>'
                        var camara03 = '<td>' + json.camara03[i] + '</td>'
                        var camara04 = '<td>' + json.camara04[i] + '</td>'
                        var tunelEst = '<td>' + json.tunelEst[i] + '</td>'
                        var tunelCont = '<td>' + json.tunelCont[i] + '</td>'
                        var embSecund01 = '<td>' + json.embSecund01[i] + '</td>'
                        var embSecund02 = '<td>' + json.embSecund02[i] + '</td>'
                        var expedicao = '<td>' + json.expedicao[i] + '</td>'
                        var paletizacao = '<td>' + json.paletizacao[i] + '</td></tr>'

                        table += dataHora += camara01 += camara02 += camara03 += camara04 += tunelEst += tunelCont += embSecund01 += embSecund02 += expedicao += paletizacao
                    }

                    if (contador == 1) {
                        $('#dataTable1').DataTable().destroy()
                        $('#conteudoTable').html(table)
                        $('#dataTable1').DataTable().draw()
                    } else {
                        $('#conteudoTable').html(table)
                        $('#dataTable1').DataTable()
                    }

                    contador = 1

                    $('#carregando').hide()
                    $('#table').show()

                    btn.disabled = ''

                    $('#pdf').attr(
                        'href',
                        '../rel/relTempFrigorifico.php?dataIni=' +
                        dataIni +
                        '&horaIni=' +
                        horaIni +
                        '&dataFim=' +
                        dataFim +
                        '&horaFim=' +
                        horaFim,
                    )
                    $('#pdf').attr('target', '_blank')

                    $('#excel').attr(
                        'href',
                        '../rel/relTempFrigorificoExcel.php?dataIni=' +
                        dataIni +
                        '&horaIni=' +
                        horaIni +
                        '&dataFim=' +
                        dataFim +
                        '&horaFim=' +
                        horaFim,
                    )

                    $('#atualizar_camara_01').attr(
                        'href',
                        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
                        dataIni +
                        '&horaIni=' +
                        horaIni +
                        '&dataFim=' +
                        dataFim +
                        '&horaFim=' +
                        horaFim +
                        '&coluna=camara_01',
                    )


                    $('#atualizar_camara_02').attr(
                        'href',
                        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
                        dataIni +
                        '&horaIni=' +
                        horaIni +
                        '&dataFim=' +
                        dataFim +
                        '&horaFim=' +
                        horaFim +
                        '&coluna=camara_02',
                    )

                    $('#atualizar_camara_03').attr(
                        'href',
                        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
                        dataIni +
                        '&horaIni=' +
                        horaIni +
                        '&dataFim=' +
                        dataFim +
                        '&horaFim=' +
                        horaFim +
                        '&coluna=camara_03',
                    )

                    $('#atualizar_camara_04').attr(
                        'href',
                        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
                        dataIni +
                        '&horaIni=' +
                        horaIni +
                        '&dataFim=' +
                        dataFim +
                        '&horaFim=' +
                        horaFim +
                        '&coluna=camara_04',
                    )

                    $('#atualizar_tunel_estatico').attr(
                        'href',
                        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
                        dataIni +
                        '&horaIni=' +
                        horaIni +
                        '&dataFim=' +
                        dataFim +
                        '&horaFim=' +
                        horaFim +
                        '&coluna=tunel_estatico',
                    )

                    $('#atualizar_tunel_continuo').attr(

                        'href',
                        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
                        dataIni +
                        '&horaIni=' +
                        horaIni +
                        '&dataFim=' +
                        dataFim +
                        '&horaFim=' +
                        horaFim +
                        '&coluna=tunel_continuo',
                    )



                    $('#atualizar_embalagem_secundaria_01').attr(
                        'href',
                        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
                        dataIni +
                        '&horaIni=' +
                        horaIni +
                        '&dataFim=' +
                        dataFim +
                        '&horaFim=' +
                        horaFim +
                        '&coluna=embalagem_secundaria_01',
                    )


                    $('#atualizar_embalagem_secundaria_02').attr(
                        'href',
                        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
                        dataIni +
                        '&horaIni=' +
                        horaIni +
                        '&dataFim=' +
                        dataFim +
                        '&horaFim=' +
                        horaFim +
                        '&coluna=cembalagem_secundaria_02',
                    )


                    $('#atualizar_expedicao').attr(
                        'href',
                        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
                        dataIni +
                        '&horaIni=' +
                        horaIni +
                        '&dataFim=' +
                        dataFim +
                        '&horaFim=' +
                        horaFim +
                        '&coluna=expedicao',
                    )

                    $('#atualizar_paletizacao').attr(
                        'href',
                        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
                        dataIni +
                        '&horaIni=' +
                        horaIni +
                        '&dataFim=' +
                        dataFim +
                        '&horaFim=' +
                        horaFim +
                        '&coluna=paletizacao',
                    )
                })
        })
    </script>