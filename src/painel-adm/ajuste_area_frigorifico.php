<?php

$pag = "ajuste_area_frigorifico";

require_once("../conexao.php");



@session_start();

//verificar se o usuário está autenticado

if (@$_SESSION['id_usuario'] == null || @$_SESSION['painel'] != 'painel-adm') {

    echo "<script language='javascript'> window.location='../index.php' </script>";
}



?>



<div class="row mt-4 mb-4">

    <a type="button" class="btn-info btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag ?>&funcao=atualizar">Editar Dados</a>

    <a type="button" class="btn-info btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php echo $pag ?>&funcao=atualizar">+</a>



</div>







<!-- DataTales Example -->

<div class="card shadow mb-4">



    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>

                    <tr>

                        <th>Câmara 01</th>

                        <th>Câmara 02</th>

                        <th>Câmara 03</th>

                        <th>Câmara 04</th>

                        <th>Tunel Estático</th>

                        <th>Tunel Continuo</th>

                        <th>Embalagem Secundaria 01</th>

                        <th>Embalagem Secundaria 02</th>

                        <th>Expedição</th>

                        <th>Paletização</th>

                    </tr>

                </thead>



                <tbody>



                    <?php



                    $query = $pdo->query("SELECT * FROM ajuste_area_frigorifico");

                    $res = $query->fetchAll(PDO::FETCH_ASSOC);



                    for ($i = 0; $i < count($res); $i++) {

                        foreach ($res[$i] as $key => $value) {
                        }



                        $camara_01_min = $res[$i]['camara_01_min'];
                        $camara_01_max = $res[$i]['camara_01_max'];
                        $camara_01_habilita = $res[$i]['camara_01_habilita'];

                        $camara_02_min = $res[$i]['camara_02_min'];
                        $camara_02_max = $res[$i]['camara_02_max'];
                        $camara_02_habilita = $res[$i]['camara_02_habilita'];

                        $camara_03_min = $res[$i]['camara_03_min'];
                        $camara_03_max = $res[$i]['camara_03_max'];
                        $camara_03_habilita = $res[$i]['camara_03_habilita'];

                        $camara_04_min = $res[$i]['camara_04_min'];
                        $camara_04_max = $res[$i]['camara_04_max'];
                        $camara_04_habilita = $res[$i]['camara_04_habilita'];


                        $tunel_estatico_min = $res[$i]['tunel_estatico_min'];
                        $tunel_estatico_max = $res[$i]['tunel_estatico_max'];
                        $tunel_estatico_habilita = $res[$i]['tunel_estatico_habilita'];

                        $tunel_continuo_min = $res[$i]['tunel_continuo_min'];
                        $tunel_continuo_max = $res[$i]['tunel_continuo_max'];
                        $tunel_continuo_habilita = $res[$i]['tunel_continuo_habilita'];

                        $embalagem_secundaria_01_min = $res[$i]['embalagem_secundaria_01_min'];
                        $embalagem_secundaria_01_max = $res[$i]['embalagem_secundaria_01_max'];
                        $embalagem_secundaria_01_habilita = $res[$i]['embalagem_secundaria_01_habilita'];

                        $embalagem_secundaria_02_min = $res[$i]['embalagem_secundaria_02_min'];
                        $embalagem_secundaria_02_max = $res[$i]['embalagem_secundaria_02_max'];
                        $embalagem_secundaria_02_habilita = $res[$i]['embalagem_secundaria_02_habilita'];

                        $expedicao_min = $res[$i]['expedicao_min'];
                        $expedicao_max = $res[$i]['expedicao_max'];
                        $expedicao_habilita = $res[$i]['expedicao_habilita'];

                        $paletizacao_min = $res[$i]['paletizacao_min'];
                        $paletizacao_max = $res[$i]['paletizacao_max'];
                        $paletizacao_habilita = $res[$i]['paletizacao_habilita'];


                    ?>
                        <tr>
                            <td>
                                <b>Min: </b> <?php echo $camara_01_min  ?> <br>
                                <b>Máx: </b> <?php echo $camara_01_max  ?> <br>
                            </td>
                            <td>
                                <b>Min: </b> <?php echo $camara_02_min  ?> <br>
                                <b>Máx: </b> <?php echo $camara_02_max  ?> <br>
                            </td>
                            <td>
                                <b>Min: </b> <?php echo $camara_03_min  ?> <br>
                                <b>Máx: </b> <?php echo $camara_03_max  ?> <br>
                            </td>
                            <td>
                                <b>Min: </b> <?php echo $camara_04_min  ?> <br>
                                <b>Máx: </b> <?php echo $camara_04_max  ?> <br>
                            </td>
                            <td>
                                <b>Min: </b> <?php echo $tunel_estatico_min  ?> <br>
                                <b>Máx: </b> <?php echo $tunel_estatico_max  ?> <br>
                            </td>
                            <td>
                                <b>Min: </b> <?php echo $tunel_continuo_min  ?> <br>
                                <b>Máx: </b> <?php echo $tunel_continuo_max  ?> <br>
                            </td>
                            <td>
                                <b>Min: </b> <?php echo $embalagem_secundaria_01_min  ?> <br>
                                <b>Máx: </b> <?php echo $embalagem_secundaria_01_max  ?> <br>
                            </td>
                            <td>
                                <b>Min: </b> <?php echo $embalagem_secundaria_02_min  ?> <br>
                                <b>Máx: </b> <?php echo $embalagem_secundaria_02_max  ?> <br>
                            </td>
                            <td>
                                <b>Min: </b> <?php echo $expedicao_min  ?> <br>
                                <b>Máx: </b> <?php echo $expedicao_max  ?> <br>
                            </td>
                            <td>
                                <b>Min: </b> <?php echo $paletizacao_min  ?> <br>
                                <b>Máx: </b> <?php echo $paletizacao_max  ?> <br>
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

                if (@$_GET['funcao'] == 'atualizar') {

                    $titulo = "Editar Dados Ajuste";





                    $query = $pdo->query("SELECT * FROM ajuste_area_frigorifico");

                    $res = $query->fetchAll(PDO::FETCH_ASSOC);


                    $camara_01_min = $res[0]['camara_01_min'];
                    $camara_01_max = $res[0]['camara_01_max'];
                    $camara_01_habilita = $res[0]['camara_01_habilita'];

                    $camara_02_min = $res[0]['camara_02_min'];
                    $camara_02_max = $res[0]['camara_02_max'];
                    $camara_02_habilita = $res[0]['camara_02_habilita'];

                    $camara_03_min = $res[0]['camara_03_min'];
                    $camara_03_max = $res[0]['camara_03_max'];
                    $camara_03_habilita = $res[0]['camara_03_habilita'];

                    $camara_04_min = $res[0]['camara_04_min'];
                    $camara_04_max = $res[0]['camara_04_max'];
                    $camara_04_habilita = $res[0]['camara_04_habilita'];

                    $embalagem_secundaria_01_min = $res[0]['embalagem_secundaria_01_min'];
                    $embalagem_secundaria_01_max = $res[0]['embalagem_secundaria_01_max'];
                    $embalagem_secundaria_01_habilita = $res[0]['embalagem_secundaria_01_habilita'];

                    $embalagem_secundaria_02_min = $res[0]['embalagem_secundaria_02_min'];
                    $embalagem_secundaria_02_max = $res[0]['embalagem_secundaria_02_max'];
                    $embalagem_secundaria_02_habilita = $res[0]['embalagem_secundaria_02_habilita'];

                    $expedicao_min = $res[0]['expedicao_min'];
                    $expedicao_max = $res[0]['expedicao_max'];
                    $expedicao_habilita = $res[0]['expedicao_habilita'];

                    $paletizacao_min = $res[0]['paletizacao_min'];
                    $paletizacao_max = $res[0]['paletizacao_max'];
                    $paletizacao_habilita = $res[0]['paletizacao_habilita'];

                    $tunel_estatico_min = $res[0]['tunel_estatico_min'];
                    $tunel_estatico_max = $res[0]['tunel_estatico_max'];
                    $tunel_estatico_habilita = $res[0]['tunel_estatico_habilita'];

                    $tunel_continuo_min = $res[0]['tunel_continuo_min'];
                    $tunel_continuo_max = $res[0]['tunel_continuo_max'];
                    $tunel_continuo_habilita = $res[0]['tunel_continuo_habilita'];
                } else {

                    $titulo = "Editar Dados Ajuste";
                }





                ?>



                <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo ?></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <form id="form" method="POST">

                <div class="modal-body col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="camara_01"><b>Câmara 01</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="camara_01_min">Min.</label>
                                    <input type="number" class="form-control" id="camara_01_min" name="camara_01_min" value="<?php echo $camara_01_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="camara_01_max">Máx.</label>
                                    <input type="number" class="form-control" id="camara_01_max" name="camara_01_max" value="<?php echo $camara_01_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="camara_01_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="camara_01_habilita" name="camara_01_habilita">
                                        <option value="on" <?php if ($camara_01_habilita == 'on') {
                                                                echo "selected";
                                                            } ?>>Sim</option>
                                        <option value="off" <?php if ($camara_01_habilita == 'off') {
                                                                echo "selected";
                                                            } ?>>Não</option>
                                    </select>
                                </div>
                            </div>

                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <label for="camara_02"><b>Câmara 02</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="camara_02_min">Min.</label>
                                    <input type="number" class="form-control" id="camara_02_min" name="camara_02_min" value="<?php echo $camara_02_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="camara_02_max">Máx.</label>
                                    <input type="number" class="form-control" id="camara_02_max" name="camara_02_max" value="<?php echo $camara_02_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="camara_02_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="camara_02_habilita" name="camara_02_habilita">
                                        <option value="on" <?php if ($camara_02_habilita == 'on') {
                                                                echo "selected";
                                                            } ?>>Sim</option>
                                        <option value="off" <?php if ($camara_02_habilita == 'off') {
                                                                echo "selected";
                                                            } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <label for="camara_03"><b>Câmara 03</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="camara_03_min">Min.</label>
                                    <input type="number" class="form-control" id="camara_03_min" name="camara_03_min" value="<?php echo $camara_03_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="camara_03_max">Máx.</label>
                                    <input type="number" class="form-control" id="camara_03_max" name="camara_03_max" value="<?php echo $camara_03_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="camara_03_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="camara_03_habilita" name="camara_03_habilita">
                                        <option value="on" <?php if ($camara_03_habilita == 'on') {
                                                                echo "selected";
                                                            } ?>>Sim</option>
                                        <option value="off" <?php if ($camara_03_habilita == 'off') {
                                                                echo "selected";
                                                            } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <label for="camara_04"><b>Câmara 04</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="camara_04_min">Min.</label>
                                    <input type="number" class="form-control" id="camara_04_min" name="camara_04_min" value="<?php echo $camara_04_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="camara_04_max">Máx.</label>
                                    <input type="number" class="form-control" id="camara_04_max" name="camara_04_max" value="<?php echo $camara_04_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="camara_04_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="camara_04_habilita" name="camara_04_habilita">
                                        <option value="on" <?php if ($camara_04_habilita == 'on') {
                                                                echo "selected";
                                                            } ?>>Sim</option>
                                        <option value="off" <?php if ($camara_04_habilita == 'off') {
                                                                echo "selected";
                                                            } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <label for="tunel_estatico"><b>Tunel Estático</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="tunel_estatico_min">Min.</label>
                                    <input type="number" class="form-control" id="tunel_estatico_min" name="tunel_estatico_min" value="<?php echo $tunel_estatico_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="tunel_estatico_max">Máx.</label>
                                    <input type="number" class="form-control" id="tunel_estatico_max" name="tunel_estatico_max" value="<?php echo $tunel_estatico_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="tunel_estatico_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="tunel_estatico_habilita" name="tunel_estatico_habilita">
                                        <option value="on" <?php if ($tunel_estatico_habilita == 'on') {
                                                                echo "selected";
                                                            } ?>>Sim</option>
                                        <option value="off" <?php if ($tunel_estatico_habilita == 'off') {
                                                                echo "selected";
                                                            } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>

                        </div>
                        <div class="col-lg-6">
                            <label for="tunel_continuo"><b>Tunel Continuo</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="tunel_continuo_min">Min.</label>
                                    <input type="number" class="form-control" id="tunel_continuo_min" name="tunel_continuo_min" value="<?php echo $tunel_continuo_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="tunel_continuo_max">Máx.</label>
                                    <input type="number" class="form-control" id="tunel_continuo_max" name="tunel_continuo_max" value="<?php echo $tunel_continuo_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="tunel_continuo_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="tunel_continuo_habilita" name="tunel_continuo_habilita">
                                        <option value="on" <?php if ($tunel_continuo_habilita == 'on') {
                                                                echo "selected";
                                                            } ?>>Sim</option>
                                        <option value="off" <?php if ($tunel_continuo_habilita == 'off') {
                                                                echo "selected";
                                                            } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <label for="embalagem_secundaria_01"><b>Embalagem Secundária 01</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="embalagem_secundaria_01_min">Min.</label>
                                    <input type="number" class="form-control" id="embalagem_secundaria_01_min" name="embalagem_secundaria_01_min" value="<?php echo $embalagem_secundaria_01_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="embalagem_secundaria_01_max">Máx.</label>
                                    <input type="number" class="form-control" id="embalagem_secundaria_01_max" name="embalagem_secundaria_01_max" value="<?php echo $embalagem_secundaria_01_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="embalagem_secundaria_01_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="embalagem_secundaria_01_habilita" name="embalagem_secundaria_01_habilita">
                                        <option value="on" <?php if ($embalagem_secundaria_01_habilita == 'on') {
                                                                echo "selected";
                                                            } ?>>Sim</option>
                                        <option value="off" <?php if ($embalagem_secundaria_01_habilita == 'off') {
                                                                echo "selected";
                                                            } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <label for="embalagem_secundaria_02"><b>Embalagem Secundária 02</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="embalagem_secundaria_02_min">Min.</label>
                                    <input type="number" class="form-control" id="embalagem_secundaria_02_min" name="embalagem_secundaria_02_min" value="<?php echo $embalagem_secundaria_02_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="embalagem_secundaria_02_max">Máx.</label>
                                    <input type="number" class="form-control" id="embalagem_secundaria_02_max" name="embalagem_secundaria_02_max" value="<?php echo $embalagem_secundaria_02_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="embalagem_secundaria_02_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="embalagem_secundaria_02_habilita" name="embalagem_secundaria_02_habilita">
                                        <option value="on" <?php if ($embalagem_secundaria_02_habilita == 'on') {
                                                                echo "selected";
                                                            } ?>>Sim</option>
                                        <option value="off" <?php if ($embalagem_secundaria_02_habilita == 'off') {
                                                                echo "selected";
                                                            } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <label for="expedicao"><b>Expedição</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="expedicao_min">Min.</label>
                                    <input type="number" class="form-control" id="expedicao_min" name="expedicao_min" value="<?php echo $expedicao_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="expedicao_max">Máx.</label>
                                    <input type="number" class="form-control" id="expedicao_max" name="expedicao_max" value="<?php echo $expedicao_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="expedicao_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="expedicao_habilita" name="expedicao_habilita">
                                        <option value="on" <?php if ($expedicao_habilita == 'on') {
                                                                echo "selected";
                                                            } ?>>Sim</option>
                                        <option value="off" <?php if ($expedicao_habilita == 'off') {
                                                                echo "selected";
                                                            } ?>>Não</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <label for="paletizacao"><b>Paletização</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="paletizacao_min">Min.</label>
                                    <input type="number" class="form-control" id="paletizacao_min" name="paletizacao_min" value="<?php echo $paletizacao_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="paletizacao_max">Máx.</label>
                                    <input type="number" class="form-control" id="paletizacao_max" name="paletizacao_max" value="<?php echo $paletizacao_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="paletizacao_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="paletizacao_habilita" name="paletizacao_habilita">
                                        <option value="on" <?php if ($paletizacao_habilita == 'on') {
                                                                echo "selected";
                                                            } ?>>Sim</option>
                                        <option value="off" <?php if ($paletizacao_habilita == 'off') {
                                                                echo "selected";
                                                            } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div>
                    <small>

                        <div id="mensagem">



                        </div>

                    </small>



                </div>







                <div class="modal-footer">



                    <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                    <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>

                </div>

            </form>

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






















    <?php



    if (@$_GET["funcao"] != null && @$_GET["funcao"] == "atualizar") {

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