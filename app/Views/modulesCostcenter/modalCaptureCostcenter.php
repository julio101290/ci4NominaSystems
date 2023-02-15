<!-- Modal Costcenter -->
<div class="modal fade" id="modalAddCostcenter" tabindex="-1" role="dialog" aria-labelledby="modalAddCostcenter" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('costcenter.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-costcenter" class="form-horizontal">
                    <input type="hidden" id="idCostcenter" name="idCostcenter" value="0">

                    <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label"><?= lang('costcenter.fields.code') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="code" id="code" class="form-control <?= session('error.code') ? 'is-invalid' : '' ?>" value="<?= old('code') ?>" placeholder="<?= lang('costcenter.fields.code') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label"><?= lang('costcenter.fields.name') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control <?= session('error.name') ? 'is-invalid' : '' ?>" value="<?= old('name') ?>" placeholder="<?= lang('costcenter.fields.name') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-sm-2 col-form-label"><?= lang('costcenter.fields.type') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="type" id="type" class="form-control <?= session('error.type') ? 'is-invalid' : '' ?>" value="<?= old('type') ?>" placeholder="<?= lang('costcenter.fields.type') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="branchoffice" class="col-sm-2 col-form-label"><?= lang('costcenter.fields.branchoffice') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>


                                <select class="form-control select" name="branchoffice" id="branchoffice" style="width: 100%;">

                                    <option value="0"><?= lang('costcenter.fields.branchoffice') ?></option>
                                    <?php
                                    foreach ($branchoffices as $key => $value) {

                                        echo '<option value="' . $value->id . '">' . $value->id . ' - ' . $value->name . '</option>';
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveCostcenter"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>

    $(document).on('click', '.btnAddCostcenter', function (e) {


        $(".form-control").val("");

        $("#idCostcenter").val("0");

        $("#btnSaveCostcenter").removeAttr("disabled");

    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditCostcenter', function (e) {


        var idCostcenter = $(this).attr("idCostcenter");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idCostcenter").val(idCostcenter);
        $("#btnGuardarCostcenter").removeAttr("disabled");

    });




</script>


<?= $this->endSection() ?>
        