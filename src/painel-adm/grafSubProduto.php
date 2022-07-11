<?php
session_start();

set_time_limit(0);

$pag = "grafSubProduto";

if (@$_SESSION['painel'] != 'painel-adm') {
    echo "<script language='javascript'> window.location='../index.php' </script>";
}

require_once("../conexao.php");


$dataIni = date('Y-m-d');
$horaIni = date('H:i', strtotime('-240 seconds'));

$dataFim = date('Y-m-d');
$horaFim = date('H:i');


?>

<input type="hidden" name="dataBase" id="dataBase" value="cMT-Graxaria_Graxaria_data">
<input type="hidden" name="page" id="page" value="<?php echo $pag; ?>">


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
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="form-group">
                                                <span>Data Inicial:</span>
                                                <input class="form-control" type="date" id="dataIni" name="dataIni" value="<?php echo @$dataIni; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 col-xl-2">
                                            <div class="form-group">
                                                <span>Hora Inicial:</span>
                                                <input class="form-control" type="time" id="horaIni" name="horaIni" value="<?php echo @$horaIni; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="form-group">
                                                <span>Data Final:</span>
                                                <input class="form-control" type="date" id="dataFim" name="dataFim" value="<?php echo @$dataFim; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 col-xl-2">
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
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card shadow mb-2">
                    <div class="card-body col-md-12 col-lg-12 col-xl-12">
                        <form>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="form-group">
                                                <span>Linha 01:</span>
                                                <select id="linha01" style="width: 100%;">
                                                    <option></option>
                                                </select>
                                                <div class="row pl-4 pt-2">
                                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                                        <input type="checkbox" class="form-check-input" id="check01Linha01">
                                                        <label class="form-check-label" for="check01Linha01">Temp.</label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                                        <input type="checkbox" class="form-check-input" id="check02Linha01">
                                                        <label class="form-check-label" for="check02Linha01">Corrente</label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                                        <input type="checkbox" class="form-check-input" id="check03Linha01">
                                                        <label class="form-check-label" for="check03Linha01">Pressão</label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                                        <input type="checkbox" class="form-check-input" id="check04Linha01">
                                                        <label class="form-check-label" for="check04Linha01">Nível</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="form-group">
                                                <span>Linha 02:</span>
                                                <select id="linha02" style="width: 100%;">
                                                    <option></option>
                                                </select>
                                                <div class="row pl-4 pt-2">
                                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                                        <input type="checkbox" class="form-check-input" id="check01Linha02">
                                                        <label class="form-check-label" for="check01Linha02">Temp.</label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                                        <input type="checkbox" class="form-check-input" id="check02Linha02">
                                                        <label class="form-check-label" for="check02Linha02">Corrente</label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                                        <input type="checkbox" class="form-check-input" id="check03Linha02">
                                                        <label class="form-check-label" for="check03Linha02">Pressão</label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                                        <input type="checkbox" class="form-check-input" id="check04Linha02">
                                                        <label class="form-check-label" for="check04Linha02">Nível</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="form-group">
                                                <span>Linha 03:</span>
                                                <select id="linha03" style="width: 100%;">
                                                    <option></option>
                                                </select>
                                                <div class="row pl-4 pt-2">
                                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                                        <input type="checkbox" class="form-check-input" id="check01Linha03">
                                                        <label class="form-check-label" for="check01Linha03">Temp.</label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                                        <input type="checkbox" class="form-check-input" id="check02Linha03">
                                                        <label class="form-check-label" for="check02Linha03">Corrente</label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                                        <input type="checkbox" class="form-check-input" id="check03Linha03">
                                                        <label class="form-check-label" for="check03Linha03">Pressão</label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                                        <input type="checkbox" class="form-check-input" id="check04Linha03">
                                                        <label class="form-check-label" for="check04Linha03">Nível</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="form-group">
                                                <span>Linha 04:</span>
                                                <select id="linha04" style="width: 100%;">
                                                    <option></option>
                                                </select>
                                                <div class="row pl-4 pt-2">
                                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                                        <input type="checkbox" class="form-check-input" id="check01Linha04">
                                                        <label class="form-check-label" for="check01Linha04">Temp.</label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                                        <input type="checkbox" class="form-check-input" id="check02Linha04">
                                                        <label class="form-check-label" for="check02Linha04">Corrente</label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                                        <input type="checkbox" class="form-check-input" id="check03Linha04">
                                                        <label class="form-check-label" for="check03Linha04">Pressão</label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                                        <input type="checkbox" class="form-check-input" id="check04Linha04">
                                                        <label class="form-check-label" for="check04Linha04">Nível</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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

                <div class="row" id="carregadoGrafico" style="display:none">
                    <div class="col-md-12 pb-0">
                        <div class="card shadow mb-4">
                            <div class="card-body col-md-11">

                                <div id="graf01"></div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row  justify-content-md-center" id="semDados" style="display:none">
                    <div class="col-md-12 pb-0">
                        <div class="card shadow mb-4">
                            <div class="card-body col-md-11">

                                <div style="text-align-last: center;">
                                    <h4>Dados não encontrados!!!</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="../js/subProdutoLineGraf.js"></script>
<script type="text/javascript" src="../js/grafSubProduto.js"></script>