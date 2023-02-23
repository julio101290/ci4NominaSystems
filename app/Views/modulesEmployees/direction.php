<p>
<h3><?= lang("employees.tab.direction") ?></h3>
<div class="form-group row">
    <label for="street" class="col-sm-2 col-form-label"><?= lang('employees.fields.street') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="street" id="street" class="form-control <?= session('error.street') ? 'is-invalid' : '' ?>" value="<?= old('street') ?>" placeholder="<?= lang('employees.fields.street') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="number" class="col-sm-2 col-form-label"><?= lang('employees.fields.number') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="number" id="number" class="form-control <?= session('error.number') ? 'is-invalid' : '' ?>" value="<?= old('number') ?>" placeholder="<?= lang('employees.fields.number') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="cologne" class="col-sm-2 col-form-label"><?= lang('employees.fields.cologne') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="cologne" id="cologne" class="form-control <?= session('error.cologne') ? 'is-invalid' : '' ?>" value="<?= old('cologne') ?>" placeholder="<?= lang('employees.fields.cologne') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="state" class="col-sm-2 col-form-label"><?= lang('employees.fields.state') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="state" id="state" class="form-control <?= session('error.state') ? 'is-invalid' : '' ?>" value="<?= old('state') ?>" placeholder="<?= lang('employees.fields.state') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="postalCode" class="col-sm-2 col-form-label"><?= lang('employees.fields.postalCode') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="postalCode" id="postalCode" class="form-control <?= session('error.postalCode') ? 'is-invalid' : '' ?>" value="<?= old('postalCode') ?>" placeholder="<?= lang('employees.fields.postalCode') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="phone" class="col-sm-2 col-form-label"><?= lang('employees.fields.phone') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="phone" id="phone" class="form-control <?= session('error.phone') ? 'is-invalid' : '' ?>" value="<?= old('phone') ?>" placeholder="<?= lang('employees.fields.phone') ?>" autocomplete="off">
        </div>
    </div>
</div>

</p>