<!-- Modal Categories -->
<div class="modal fade" id="modalAddCategories" tabindex="-1" role="dialog" aria-labelledby="modalAddCategories" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('categories.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-categories" class="form-horizontal">
                    <input type="hidden" id="idCategories" name="idCategories" value="0">

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label"><?= lang('categories.fields.name') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control <?= session('error.name') ? 'is-invalid' : '' ?>" value="<?= old('name') ?>" placeholder="<?= lang('categories.fields.name') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="minimumSalary" class="col-sm-2 col-form-label"><?= lang('categories.fields.minimumSalary') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="minimumSalary" id="minimumSalary" class="form-control <?= session('error.minimumSalary') ? 'is-invalid' : '' ?>" value="<?= old('minimumSalary') ?>" placeholder="<?= lang('categories.fields.minimumSalary') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="maximunSalary" class="col-sm-2 col-form-label"><?= lang('categories.fields.maximunSalary') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="maximunSalary" id="maximunSalary" class="form-control <?= session('error.maximunSalary') ? 'is-invalid' : '' ?>" value="<?= old('maximunSalary') ?>" placeholder="<?= lang('categories.fields.maximunSalary') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveCategories"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>

    $(document).on('click', '.btnAddCategories', function (e) {


        $(".form-control").val("");

        $("#idCategories").val("0");

        $("#btnSaveCategories").removeAttr("disabled");

    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditCategories', function (e) {


        var idCategories = $(this).attr("idCategories");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idCategories").val(idCategories);
        $("#btnGuardarCategories").removeAttr("disabled");

    });




</script>


<?= $this->endSection() ?>
        