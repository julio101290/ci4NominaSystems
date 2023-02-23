<!-- Modal Employees -->
<div class="modal fade" id="modalAddEmployees" tabindex="-1" role="dialog" aria-labelledby="modalAddEmployees" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('employees.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#personalData" type="button" role="tab" aria-controls="home" aria-selected="true"><?= lang("employees.tab.personalData") ?></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#otherData" type="button" role="tab" aria-controls="profile" aria-selected="false"><?= lang("employees.tab.otherData") ?></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#direction" type="button" role="tab" aria-controls="contact" aria-selected="false"><?= lang("employees.tab.direction") ?></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#civilStatusTab" type="button" role="tab" aria-controls="contact" aria-selected="false"><?= lang("employees.tab.civilStatus") ?></button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#IMSSINFONAVIT" type="button" role="tab" aria-controls="contact" aria-selected="false"><?= lang("employees.tab.IMSSINFONAVIT") ?></button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#banksBenefiers" type="button" role="tab" aria-controls="contact" aria-selected="false"><?= lang("employees.tab.banksBeneficiers") ?></button>
                    </li>
                </ul>


                <form id="form-employees" class="form-horizontal">


                    <div class="tab-content" id="myTabContent">



                        <div class="tab-pane fade show active" id="personalData" role="tabpanel" aria-labelledby="personalData">

                            <?= $this->include('modulesEmployees/personalData') ?>

                        </div>
                        <div class="tab-pane fade" id="otherData" role="tabpanel" aria-labelledby="otherData">

                            <?= $this->include('modulesEmployees/otherData') ?>

                        </div>
                        <div class="tab-pane fade" id="direction" role="tabpanel" aria-labelledby="contact-tab">

                            <?= $this->include('modulesEmployees/direction') ?>

                        </div>

                        <div class="tab-pane fade" id="civilStatusTab" role="tabpanel" aria-labelledby="contact-tab">

                            <?= $this->include('modulesEmployees/civilStatus') ?>

                        </div>

                        <div class="tab-pane fade" id="IMSSINFONAVIT" role="tabpanel" aria-labelledby="contact-tab">

                            <?= $this->include('modulesEmployees/IMSSINFONAVIT') ?>

                        </div>

                        <div class="tab-pane fade" id="banksBenefiers" role="tabpanel" aria-labelledby="contact-tab">

                            <?= $this->include('modulesEmployees/banksBeneficiers') ?>

                        </div>



                    </div>




                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveEmployees"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>

    $(document).on('click', '.btnAddEmployees', function (e) {


        $(".form-control").val("");

        $("#idEmployees").val("0");

        $("#btnSaveEmployees").removeAttr("disabled");

    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditEmployees', function (e) {


        var idEmployees = $(this).attr("idEmployees");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idEmployees").val(idEmployees);
        $("#btnGuardarEmployees").removeAttr("disabled");

    });




</script>


<?= $this->endSection() ?>
        