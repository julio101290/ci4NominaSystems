<!-- Modal Departments -->
  <div class="modal fade" id="modalAddDepartments" tabindex="-1" role="dialog" aria-labelledby="modalAddDepartments" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title"><?= lang('departments.createEdit') ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form id="form-departments" class="form-horizontal">
                      <input type="hidden" id="idDepartments" name="idDepartments" value="0">

                      <div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label"><?= lang('departments.fields.description') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="description" id="description" class="form-control <?= session('error.description') ? 'is-invalid' : '' ?>" value="<?= old('description') ?>" placeholder="<?= lang('departments.fields.description') ?>" autocomplete="off">
        </div>
    </div>
</div>

        
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                  <button type="button" class="btn btn-primary btn-sm" id="btnSaveDepartments"><?= lang('boilerplate.global.save') ?></button>
              </div>
          </div>
      </div>
  </div>

  <?= $this->section('js') ?>


  <script>

      $(document).on('click', '.btnAddDepartments', function (e) {


          $(".form-control").val("");

          $("#idDepartments").val("0");

          $("#btnSaveDepartments").removeAttr("disabled");

      });

      /* 
       * AL hacer click al editar
       */



      $(document).on('click', '.btnEditDepartments', function (e) {


          var idDepartments = $(this).attr("idDepartments");

          //LIMPIAMOS CONTROLES
          $(".form-control").val("");

          $("#idDepartments").val(idDepartments);
          $("#btnGuardarDepartments").removeAttr("disabled");

      });




  </script>


  <?= $this->endSection() ?>
        