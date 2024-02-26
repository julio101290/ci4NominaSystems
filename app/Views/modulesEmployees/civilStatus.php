<p>
<h3><?= lang("employees.tab.civilStatus") ?></h3> 
<div class="form-group row">
    <label for="civilStatus" class="col-sm-2 col-form-label"><?= lang('employees.fields.civilStatus') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <select class="form-control select" name="civilStatus" id="civilStatus" style="width: 80%;">
                
                <option value="1"><?= lang('employees.fields.civilStatusSingle') ?></option>
                <option value="2"><?= lang('employees.fields.civilStatusMarried') ?></option>
                <option value="3"><?= lang('employees.fields.civilStatusFreeunion') ?></option>
                <option value="4"><?= lang('employees.fields.civilStatusDivorced') ?></option>
                <option value="5"><?= lang('employees.fields.civilStatusWidower') ?></option>

            </select>

        </div>
    </div>
</div>
<div class="form-group row">
    <label for="sons" class="col-sm-2 col-form-label"><?= lang('employees.fields.sons') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="sons" id="sons" class="form-control <?= session('error.sons') ? 'is-invalid' : '' ?>" value="<?= old('sons') ?>" placeholder="<?= lang('employees.fields.sons') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="spouse" class="col-sm-2 col-form-label"><?= lang('employees.fields.spouse') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="spouse" id="spouse" class="form-control <?= session('error.spouse') ? 'is-invalid' : '' ?>" value="<?= old('spouse') ?>" placeholder="<?= lang('employees.fields.spouse') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="father" class="col-sm-2 col-form-label"><?= lang('employees.fields.father') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="father" id="father" class="form-control <?= session('error.father') ? 'is-invalid' : '' ?>" value="<?= old('father') ?>" placeholder="<?= lang('employees.fields.father') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="mother" class="col-sm-2 col-form-label"><?= lang('employees.fields.mother') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="mother" id="mother" class="form-control <?= session('error.mother') ? 'is-invalid' : '' ?>" value="<?= old('mother') ?>" placeholder="<?= lang('employees.fields.mother') ?>" autocomplete="off">
        </div>
    </div>
</div>
</p>