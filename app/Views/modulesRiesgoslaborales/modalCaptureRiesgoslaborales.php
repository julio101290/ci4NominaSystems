<!-- Modal Riesgoslaborales -->
<div class="modal fade" id="modalAddRiesgoslaborales" tabindex="-1" role="dialog" aria-labelledby="modalAddRiesgoslaborales" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('riesgoslaborales.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-riesgoslaborales" class="form-horizontal">
                    <input type="hidden" id="idRiesgoslaborales" name="idRiesgoslaborales" value="0">

                    <div class="form-group row">
                        <label for="idEmpresa" class="col-sm-2 col-form-label">Empresa</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control idEmpresa form-control" name="idEmpresa" id="idEmpresa" style="width:80%;">

                                    <?php
                                    $contadorEmpresas = 0;
                                    foreach ($empresas as $key => $value) {


                                        if ($contadorEmpresas == 0) {

                                            echo "<option selected value='$value[id]'>$value[id] - $value[nombre] </option>  ";
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
                        <label for="clase" class="col-sm-2 col-form-label"><?= lang('riesgoslaborales.fields.clase') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="clase" id="clase" class="form-control <?= session('error.clase') ? 'is-invalid' : '' ?>" value="<?= old('clase') ?>" placeholder="<?= lang('riesgoslaborales.fields.clase') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="porcentaje" class="col-sm-2 col-form-label"><?= lang('riesgoslaborales.fields.porcentaje') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="porcentaje" id="porcentaje" class="form-control <?= session('error.porcentaje') ? 'is-invalid' : '' ?>" value="<?= old('porcentaje') ?>" placeholder="<?= lang('riesgoslaborales.fields.porcentaje') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveRiesgoslaborales"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>

    $(document).on('click', '.btnAddRiesgoslaborales', function (e) {

        var idEmpresa = $(".idEmpresa").val();
        
        $(".form-control").val("");

        $("#idRiesgoslaborales").val("0");

        $("#btnSaveRiesgoslaborales").removeAttr("disabled");
        
        $(".idEmpresa").val(idEmpresa);

    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditRiesgoslaborales', function (e) {

    
        var idRiesgoslaborales = $(this).attr("idRiesgoslaborales");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idRiesgoslaborales").val(idRiesgoslaborales);
        $("#btnGuardarRiesgoslaborales").removeAttr("disabled");

    });




</script>


<?= $this->endSection() ?>
        