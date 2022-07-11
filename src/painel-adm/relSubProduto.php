    <?php

    $pag = "relSubProduto";

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
                                <div class="row justify-content-md-center">
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="row justify-content-md-center">
                                            <div class="col-md-6 col-lg-5 col-xl-3">
                                                <div class="form-group">
                                                    <span>Data Inicial:</span>
                                                    <input class="form-control" type="date" id="dataIni" name="dataIni" value="<?php echo @$dataIni; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-5 col-xl-3">
                                                <div class="form-group">
                                                    <span>Relatório:</span>
                                                    <select class="form-control" id="relatorio">
                                                        <option value="geral">Geral</option>
                                                        <option value="visceras01">Visceras 01</option>
                                                        <option value="visceras02">Visceras 02</option>
                                                        <option value="visceras03">Visceras 03</option>
                                                        <option value="penas01">Penas 01</option>
                                                        <option value="penas02">Penas 02</option>
                                                        <option value="penas03">Penas 03</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xl-2">
                                                <div class="form-group">
                                                    <input class="form-control btn btn-primary mt-4" type="button" id="button" name="button" value="Buscar">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xl-2">
                                                <div class="form-group">
                                                    <a id="pdf" href="#" class="text-danger" title="Gerar relatório PDF"><i class="far fa-file-pdf" style="font-size: 35px; margin-top: 26px"></i>
                                                    </a>

                                                    <a id="excel" href="#" class="text-success" title="Gerar relatório EXCEL"><i class="far fa-file-excel ml-2" style="font-size: 35px; margin-top: 26px"></i>
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
                                <table style="text-align-last:center;" class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">

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
            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
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





    <script type="text/javascript" src="../js/relSubProduto.js"></script>