<!-- Modal Additionalfeaturespeople -->
  <div class="modal fade" id="modalAddAdditionalfeaturespeople" tabindex="-1" role="dialog" aria-labelledby="modalAddAdditionalfeaturespeople" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title"><?= lang('additionalfeaturespeople.createEdit') ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form id="form-additionalfeaturespeople" class="form-horizontal">
                      <input type="hidden" id="idAdditionalfeaturespeople" name="idAdditionalfeaturespeople" value="0">

                      <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label"><?= lang('additionalfeaturespeople.fields.name') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="name" id="name" class="form-control <?= session('error.name') ? 'is-invalid' : '' ?>" value="<?= old('name') ?>" placeholder="<?= lang('additionalfeaturespeople.fields.name') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="format" class="col-sm-2 col-form-label"><?= lang('additionalfeaturespeople.fields.format') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="format" id="format" class="form-control <?= session('error.format') ? 'is-invalid' : '' ?>" value="<?= old('format') ?>" placeholder="<?= lang('additionalfeaturespeople.fields.format') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="type" class="col-sm-2 col-form-label"><?= lang('additionalfeaturespeople.fields.type') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="type" id="type" class="form-control <?= session('error.type') ? 'is-invalid' : '' ?>" value="<?= old('type') ?>" placeholder="<?= lang('additionalfeaturespeople.fields.type') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="cid" class="col-sm-2 col-form-label"><?= lang('additionalfeaturespeople.fields.cid') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="cid" id="cid" class="form-control <?= session('error.cid') ? 'is-invalid' : '' ?>" value="<?= old('cid') ?>" placeholder="<?= lang('additionalfeaturespeople.fields.cid') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="code" class="col-sm-2 col-form-label"><?= lang('additionalfeaturespeople.fields.code') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="code" id="code" class="form-control <?= session('error.code') ? 'is-invalid' : '' ?>" value="<?= old('code') ?>" placeholder="<?= lang('additionalfeaturespeople.fields.code') ?>" autocomplete="off">
        </div>
    </div>
</div>

        
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                  <button type="button" class="btn btn-primary btn-sm" id="btnSaveAdditionalfeaturespeople"><?= lang('boilerplate.global.save') ?></button>
              </div>
          </div>
      </div>
  </div>

  <?= $this->section('js') ?>


  <script>

      $(document).on('click', '.btnAddAdditionalfeaturespeople', function (e) {


          $(".form-control").val("");

          $("#idAdditionalfeaturespeople").val("0");

          $("#btnSaveAdditionalfeaturespeople").removeAttr("disabled");

      });

      /* 
       * AL hacer click al editar
       */



      $(document).on('click', '.btnEditAdditionalfeaturespeople', function (e) {


          var idAdditionalfeaturespeople = $(this).attr("idAdditionalfeaturespeople");

          //LIMPIAMOS CONTROLES
          $(".form-control").val("");

          $("#idAdditionalfeaturespeople").val(idAdditionalfeaturespeople);
          $("#btnGuardarAdditionalfeaturespeople").removeAttr("disabled");

      });




  </script>


  <?= $this->endSection() ?>
        