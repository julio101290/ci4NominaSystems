<p>
<h3><?= lang("employees.tab.IMSSINFONAVIT") ?></h3> 
<div class="form-group row">
    <label for="socialSecurity" class="col-sm-2 col-form-label"><?= lang('employees.fields.socialSecurity') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="socialSecurity" id="socialSecurity" class="form-control <?= session('error.socialSecurity') ? 'is-invalid' : '' ?>" value="<?= old('socialSecurity') ?>" placeholder="<?= lang('employees.fields.socialSecurity') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="familyMedicalUnit" class="col-sm-2 col-form-label"><?= lang('employees.fields.familyMedicalUnit') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="familyMedicalUnit" id="familyMedicalUnit" class="form-control <?= session('error.familyMedicalUnit') ? 'is-invalid' : '' ?>" value="<?= old('familyMedicalUnit') ?>" placeholder="<?= lang('employees.fields.familyMedicalUnit') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="infonavit" class="col-sm-2 col-form-label"><?= lang('employees.fields.infonavit') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="infonavit" id="infonavit" class="form-control <?= session('error.infonavit') ? 'is-invalid' : '' ?>" value="<?= old('infonavit') ?>" placeholder="<?= lang('employees.fields.infonavit') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="factor" class="col-sm-2 col-form-label"><?= lang('employees.fields.factor') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="factor" id="factor" class="form-control <?= session('error.factor') ? 'is-invalid' : '' ?>" value="<?= old('factor') ?>" placeholder="<?= lang('employees.fields.factor') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="date" class="col-sm-2 col-form-label"><?= lang('employees.fields.date') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="date" name="date" id="date" class="form-control <?= session('error.date') ? 'is-invalid' : '' ?>" value="<?= old('date') ?>" placeholder="<?= lang('employees.fields.date') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="numberInfonavit" class="col-sm-2 col-form-label"><?= lang('employees.fields.numberInfonavit') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="numberInfonavit" id="numberInfonavit" class="form-control <?= session('error.numberInfonavit') ? 'is-invalid' : '' ?>" value="<?= old('numberInfonavit') ?>" placeholder="<?= lang('employees.fields.numberInfonavit') ?>" autocomplete="off">
        </div>
    </div>
</div>
</p>