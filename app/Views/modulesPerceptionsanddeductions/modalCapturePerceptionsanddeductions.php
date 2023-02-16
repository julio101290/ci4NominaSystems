<!-- Modal Perceptionsanddeductions -->
  <div class="modal fade" id="modalAddPerceptionsanddeductions" tabindex="-1" role="dialog" aria-labelledby="modalAddPerceptionsanddeductions" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title"><?= lang('perceptionsanddeductions.createEdit') ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form id="form-perceptionsanddeductions" class="form-horizontal">
                      <input type="hidden" id="idPerceptionsanddeductions" name="idPerceptionsanddeductions" value="0">

                      <div class="form-group row">
    <label for="code" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.code') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="code" id="code" class="form-control <?= session('error.code') ? 'is-invalid' : '' ?>" value="<?= old('code') ?>" placeholder="<?= lang('perceptionsanddeductions.fields.code') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.name') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="name" id="name" class="form-control <?= session('error.name') ? 'is-invalid' : '' ?>" value="<?= old('name') ?>" placeholder="<?= lang('perceptionsanddeductions.fields.name') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="nameAbrev" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.nameAbrev') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="nameAbrev" id="nameAbrev" class="form-control <?= session('error.nameAbrev') ? 'is-invalid' : '' ?>" value="<?= old('nameAbrev') ?>" placeholder="<?= lang('perceptionsanddeductions.fields.nameAbrev') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="type" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.type') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="type" id="type" class="form-control <?= session('error.type') ? 'is-invalid' : '' ?>" value="<?= old('type') ?>" placeholder="<?= lang('perceptionsanddeductions.fields.type') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="Area" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.Area') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="Area" id="Area" class="form-control <?= session('error.Area') ? 'is-invalid' : '' ?>" value="<?= old('Area') ?>" placeholder="<?= lang('perceptionsanddeductions.fields.Area') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="SATConcept" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.SATConcept') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="SATConcept" id="SATConcept" class="form-control <?= session('error.SATConcept') ? 'is-invalid' : '' ?>" value="<?= old('SATConcept') ?>" placeholder="<?= lang('perceptionsanddeductions.fields.SATConcept') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="calc" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.calc') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="calc" id="calc" class="form-control <?= session('error.calc') ? 'is-invalid' : '' ?>" value="<?= old('calc') ?>" placeholder="<?= lang('perceptionsanddeductions.fields.calc') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="orden" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.orden') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="orden" id="orden" class="form-control <?= session('error.orden') ? 'is-invalid' : '' ?>" value="<?= old('orden') ?>" placeholder="<?= lang('perceptionsanddeductions.fields.orden') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="payType" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.payType') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="payType" id="payType" class="form-control <?= session('error.payType') ? 'is-invalid' : '' ?>" value="<?= old('payType') ?>" placeholder="<?= lang('perceptionsanddeductions.fields.payType') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="ordinary" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.ordinary') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="ordinary" id="ordinary" class="form-control <?= session('error.ordinary') ? 'is-invalid' : '' ?>" value="<?= old('ordinary') ?>" placeholder="<?= lang('perceptionsanddeductions.fields.ordinary') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="otherPay" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.otherPay') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="otherPay" id="otherPay" class="form-control <?= session('error.otherPay') ? 'is-invalid' : '' ?>" value="<?= old('otherPay') ?>" placeholder="<?= lang('perceptionsanddeductions.fields.otherPay') ?>" autocomplete="off">
        </div>
    </div>
</div>

        
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                  <button type="button" class="btn btn-primary btn-sm" id="btnSavePerceptionsanddeductions"><?= lang('boilerplate.global.save') ?></button>
              </div>
          </div>
      </div>
  </div>

  <?= $this->section('js') ?>


  <script>

      $(document).on('click', '.btnAddPerceptionsanddeductions', function (e) {


          $(".form-control").val("");

          $("#idPerceptionsanddeductions").val("0");

          $("#btnSavePerceptionsanddeductions").removeAttr("disabled");

      });

      /* 
       * AL hacer click al editar
       */



      $(document).on('click', '.btnEditPerceptionsanddeductions', function (e) {


          var idPerceptionsanddeductions = $(this).attr("idPerceptionsanddeductions");

          //LIMPIAMOS CONTROLES
          $(".form-control").val("");

          $("#idPerceptionsanddeductions").val(idPerceptionsanddeductions);
          $("#btnGuardarPerceptionsanddeductions").removeAttr("disabled");

      });




  </script>


  <?= $this->endSection() ?>
        