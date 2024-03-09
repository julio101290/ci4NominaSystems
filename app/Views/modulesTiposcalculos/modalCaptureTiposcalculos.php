<!-- Modal Tiposcalculos -->
<div class="modal fade" id="modalAddTiposcalculos" tabindex="-1" role="dialog" aria-labelledby="modalAddTiposcalculos" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('tiposcalculos.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-tiposcalculos" class="form-horizontal">
                    <input type="hidden" id="idTiposcalculos" name="idTiposcalculos" value="0">

                    <div class="form-group row">
                        <label for="idEmpresa" class="col-sm-2 col-form-label"><?= lang('tiposcalculos.fields.idEmpresa') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>


                                <select class="form-control idEmpresa form-control" name="idEmpresa" id="idEmpresa" style="width:80%;">
                                    
                                    <option value="0"> Seleccione Empresa </option>
                                    <?php
                                    $contadorEmpresas = 0;
                                    foreach ($empresas as $key => $value) {


                                        if ($contadorEmpresas == 0) {

                                            echo "<option value='$value[id]'>$value[id] - $value[nombre] </option>  ";
                                        } else {

                                            echo "<option value='$value[id]'>$value[id] - $value[nombre] </option>  ";
                                        }
                                    }
                                    ?>

                                </select>


                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 col-form-label"><?= lang('tiposcalculos.fields.nombre') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="nombre" id="nombre" class="form-control <?= session('error.nombre') ? 'is-invalid' : '' ?>" value="<?= old('nombre') ?>" placeholder="<?= lang('tiposcalculos.fields.nombre') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="claveTimbrado" class="col-sm-2 col-form-label"><?= lang('tiposcalculos.fields.claveTimbrado') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="claveTimbrado" id="claveTimbrado" class="form-control <?= session('error.claveTimbrado') ? 'is-invalid' : '' ?>" value="<?= old('claveTimbrado') ?>" placeholder="<?= lang('tiposcalculos.fields.claveTimbrado') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="claveCalculo" class="col-sm-2 col-form-label"><?= lang('tiposcalculos.fields.claveCalculo') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="claveCalculo" id="claveCalculo" class="form-control <?= session('error.claveCalculo') ? 'is-invalid' : '' ?>" value="<?= old('claveCalculo') ?>" placeholder="<?= lang('tiposcalculos.fields.claveCalculo') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="claveImpresion" class="col-sm-2 col-form-label"><?= lang('tiposcalculos.fields.claveImpresion') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="claveImpresion" id="claveImpresion" class="form-control <?= session('error.claveImpresion') ? 'is-invalid' : '' ?>" value="<?= old('claveImpresion') ?>" placeholder="<?= lang('tiposcalculos.fields.claveImpresion') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="claveLiquidacion" class="col-sm-2 col-form-label"><?= lang('tiposcalculos.fields.claveLiquidacion') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="claveLiquidacion" id="claveLiquidacion" class="form-control <?= session('error.claveLiquidacion') ? 'is-invalid' : '' ?>" value="<?= old('claveLiquidacion') ?>" placeholder="<?= lang('tiposcalculos.fields.claveLiquidacion') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="satTipoNomina" class="col-sm-2 col-form-label"><?= lang('tiposcalculos.fields.satTipoNomina') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>


                                <select class="form-control satTipoNomina form-control" name="satTipoNomina" id="satTipoNomina" style="width:80%;">

                                    <option value="0" >Seleccione tipo nomina SAT</option>
                                    <option value="1" >Ordinaria</option>
                                    <option value="2" >Extraordinaria</option>

                                </select>

                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveTiposcalculos"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>

    $(document).on('click', '.btnAddTiposcalculos', function (e) {


        $(".form-control").val("");

        $("#idTiposcalculos").val("0");

        $("#btnSaveTiposcalculos").removeAttr("disabled");

        $("#idEmpresa").val("0").trigger("change");

        $("#satTipoNomina").val("0").trigger("change");

    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditTiposcalculos', function (e) {


        var idTiposcalculos = $(this).attr("idTiposcalculos");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idTiposcalculos").val(idTiposcalculos);
        $("#btnGuardarTiposcalculos").removeAttr("disabled");

    });


    $("#idEmpresa").select2();
    
    $("#satTipoNomina").select2();

</script>


<?= $this->endSection() ?>
        