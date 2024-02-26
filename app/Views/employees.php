<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('modulesEmployees/modalCaptureEmployees') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddEmployees" data-toggle="modal" data-target="#modalAddEmployees"><i class="fa fa-plus"></i>

                    <?= lang('employees.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableEmployees"  class="table table-striped table-hover va-middle tableEmployees">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th>Código</th>
                                <th><?= lang('employees.fields.firstname') ?></th>
                                <th><?= lang('employees.fields.lastname') ?></th>
                                <th><?= lang('employees.fields.motherLastName') ?></th>
                                <th><?= lang('employees.fields.nameAbrev') ?></th>
                                <th><?= lang('employees.fields.birthdate') ?></th>
                                <th><?= lang('employees.fields.placebirth') ?></th>
                                <th><?= lang('employees.fields.RFC') ?></th>
                                <th><?= lang('employees.fields.CURP') ?></th>


                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.card -->

<?= $this->endSection() ?>


<?= $this->section('js') ?>
<script>

    /**
     * Cargamos la tabla
     */

    var tableEmployees = $('#tableEmployees').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url(route_to('admin/employees')) ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [10],
                searchable: false,
                targets: [10]

            }],
        columns: [{
                'data': 'id'
            },

            {
                'data': 'codigo'
            },

            {
                'data': 'firstname'
            },

            {
                'data': 'lastname'
            },

            {
                'data': 'motherLastName'
            },

            {
                'data': 'nameAbrev'
            },

            {
                'data': 'birthdate'
            },

            {
                'data': 'placebirth'
            },

            {
                'data': 'RFC'
            },

            {
                'data': 'CURP'
            },

            {
                "data": function (data) {
                    return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                             <button class="btn btn-warning btnEditEmployees" data-toggle="modal" idEmployees="${data.id}" data-target="#modalAddEmployees">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
                }
            }
        ]
    });



    $(document).on('click', '#btnSaveEmployees', function (e) {

        var idEmpresa = $("#idEmpresaEmpleados").val();
        var codigo = $("#codigo").val();

        var idEmployees = $("#idEmployees").val();
        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var motherLastName = $("#motherLastName").val();
        var nameAbrev = $("#nameAbrev").val();
        var sex = $("#sex").val();
        var birthdate = $("#birthdate").val();
        var placebirth = $("#placebirth").val();
        var RFC = $("#RFC").val();
        var CURP = $("#CURP").val();
        var scholarship = $("#scholarship").val();
        var initials = $("#initials").val();
        var email = $("#email").val();
        var nip = $("#nip").val();
        var turn = $("#turn").val();
        var street = $("#street").val();
        var number = $("#number").val();
        var cologne = $("#cologne").val();
        var state = $("#state").val();
        var postalCode = $("#postalCode").val();
        var phone = $("#phone").val();
        var civilStatus = $("#civilStatus").val();
        var sons = $("#sons").val();
        var spouse = $("#spouse").val();
        var father = $("#father").val();
        var mother = $("#mother").val();
        var socialSecurity = $("#socialSecurity").val();
        var familyMedicalUnit = $("#familyMedicalUnit").val();
        var infonavit = $("#infonavit").val();
        var factor = $("#factor").val();
        var date = $("#date").val();
        var numberInfonavit = $("#numberInfonavit").val();
        var nameBeneficiary = $("#nameBeneficiary").val();
        var relationBeneficiary = $("#relationBeneficiary").val();
        var porcenBeneficiary = $("#porcenBeneficiary").val();
        var nameBeneficiary2 = $("#nameBeneficiary2").val();
        var relationBeneficiary2 = $("#relationBeneficiary2").val();
        var porcenBeneficiary2 = $("#porcenBeneficiary2").val();
        var bank = $("#bank").val();
        var bankAccount = $("#bankAccount").val();
        var creditCard = $("#creditCard").val();
        var statusCard = $("#statusCard").val();
        var CLABE = $("#CLABE").val();

        $("#btnSaveEmployees").attr("disabled", true);

        var datos = new FormData();

        console.log("Escolaridad", scholarship);

        datos.append("idEmpresa", idEmpresa);
        datos.append("codigo", codigo);
        datos.append("idEmployees", idEmployees);
        datos.append("firstname", firstname);
        datos.append("lastname", lastname);
        datos.append("motherLastName", motherLastName);
        datos.append("nameAbrev", nameAbrev);
        datos.append("sex", sex);
        datos.append("birthdate", birthdate);
        datos.append("placebirth", placebirth);
        datos.append("RFC", RFC);
        datos.append("CURP", CURP);
        datos.append("scholarship", scholarship);
        datos.append("initials", initials);
        datos.append("email", email);
        datos.append("nip", nip);
        datos.append("turn", turn);
        datos.append("street", street);
        datos.append("number", number);
        datos.append("cologne", cologne);
        datos.append("state", state);
        datos.append("postalCode", postalCode);
        datos.append("phone", phone);
        datos.append("civilStatus", civilStatus);
        datos.append("sons", sons);
        datos.append("spouse", spouse);
        datos.append("father", father);
        datos.append("mother", mother);
        datos.append("socialSecurity", socialSecurity);
        datos.append("familyMedicalUnit", familyMedicalUnit);
        datos.append("infonavit", infonavit);
        datos.append("factor", factor);
        datos.append("date", date);
        datos.append("numberInfonavit", numberInfonavit);
        datos.append("nameBeneficiary", nameBeneficiary);
        datos.append("relationBeneficiary", relationBeneficiary);
        datos.append("porcenBeneficiary", porcenBeneficiary);
        datos.append("nameBeneficiary2", nameBeneficiary2);
        datos.append("relationBeneficiary2", relationBeneficiary2);
        datos.append("porcenBeneficiary2", porcenBeneficiary2);
        datos.append("bank", bank);
        datos.append("bankAccount", bankAccount);
        datos.append("creditCard", creditCard);
        datos.append("statusCard", statusCard);
        datos.append("CLABE", CLABE);



        $.ajax({

            url: "<?= route_to('admin/employees/save') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                if (respuesta.match(/Correctamente.*/)) {

                    Toast.fire({
                        icon: 'success',
                        title: "Guardado Correctamente"
                    });

                    tableEmployees.ajax.reload();
                    $("#btnSaveEmployees").removeAttr("disabled");


                    $('#modalAddEmployees').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveEmployees").removeAttr("disabled");


                }

            }

        }

        )

    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR Employees
     =============================================*/
    $(".tableEmployees").on("click", ".btnEditEmployees", function () {

        var idEmployees = $(this).attr("idEmployees");

        var datos = new FormData();
        datos.append("idEmployees", idEmployees);

        $.ajax({

            url: "<?= base_url(route_to('admin/employees/getEmployees')) ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idEmployees").val(respuesta["id"]);
                $("#codigo").val(respuesta["codigo"]);
                $("#idEmpresaEmpleados").val(respuesta["idEmpresa"]).trigger("change");

                $("#firstname").val(respuesta["firstname"]);
                $("#lastname").val(respuesta["lastname"]);
                $("#motherLastName").val(respuesta["motherLastName"]);
                $("#nameAbrev").val(respuesta["nameAbrev"]);
                $("#sex").val(respuesta["sex"]);
                $("#sex").trigger("change");
                $("#birthdate").val(respuesta["birthdate"]);
                $("#placebirth").val(respuesta["placebirth"]);
                $("#RFC").val(respuesta["RFC"]);
                $("#CURP").val(respuesta["CURP"]);
                $("#scholarship").val(respuesta["scholarship"]);
                $("#scholarship").trigger("change");
                $("#initials").val(respuesta["initials"]);
                $("#email").val(respuesta["email"]);
                $("#nip").val(respuesta["nip"]);
                $("#turn").val(respuesta["turn"]);
                $("#turn").trigger("change");
                $("#street").val(respuesta["street"]);
                $("#number").val(respuesta["number"]);
                $("#cologne").val(respuesta["cologne"]);
                $("#state").val(respuesta["state"]);
                $("#postalCode").val(respuesta["postalCode"]);
                $("#phone").val(respuesta["phone"]);
                $("#civilStatus").val(respuesta["civilStatus"]);
                $("#civilStatus").trigger("change");
                $("#sons").val(respuesta["sons"]);
                $("#spouse").val(respuesta["spouse"]);
                $("#father").val(respuesta["father"]);
                $("#mother").val(respuesta["mother"]);
                $("#socialSecurity").val(respuesta["socialSecurity"]);
                $("#familyMedicalUnit").val(respuesta["familyMedicalUnit"]);
                $("#infonavit").val(respuesta["infonavit"]);

                $("#infonavit").trigger("change");

                $("#factor").val(respuesta["factor"]);
                $("#date").val(respuesta["date"]);
                $("#numberInfonavit").val(respuesta["numberInfonavit"]);
                $("#nameBeneficiary").val(respuesta["nameBeneficiary"]);
                $("#relationBeneficiary").val(respuesta["relationBeneficiary"]);
                $("#relationBeneficiary").trigger("change");
                $("#porcenBeneficiary").val(respuesta["porcenBeneficiary"]);
                $("#nameBeneficiary2").val(respuesta["nameBeneficiary2"]);
                $("#relationBeneficiary2").val(respuesta["relationBeneficiary2"]);
                $("#relationBeneficiary2").trigger("change");
                $("#porcenBeneficiary2").val(respuesta["porcenBeneficiary2"]);
                $("#bank").val(respuesta["bank"]).trigger("change");
                $("#bankAccount").val(respuesta["bankAccount"]);
                $("#creditCard").val(respuesta["creditCard"]);
                $("#statusCard").val(respuesta["statusCard"]).trigger("change");
                $("#CLABE").val(respuesta["CLABE"]);


            }

        })

    })


    /*=============================================
     ELIMINAR employees
     =============================================*/
    $(".tableEmployees").on("click", ".btn-delete", function () {

        var idEmployees = $(this).attr("data-id");

        Swal.fire({
            title: '<?= lang('boilerplate.global.sweet.title') ?>',
            text: "<?= lang('boilerplate.global.sweet.text') ?>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '<?= lang('boilerplate.global.sweet.confirm_delete') ?>'
        })
                .then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: `<?= base_url(route_to('admin/employees')) ?>/` + idEmployees,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableEmployees.ajax.reload();
                        }).fail((error) => {
                            Toast.fire({
                                icon: 'error',
                                title: error.responseJSON.messages.error,
                            });
                        })
                    }
                })
    })


    $("#civilStatus").select2();
    $("#sex").select2();
    $("#scholarship").select2();
    $("#relationBeneficiary2").select2();
    $("#relationBeneficiary").select2();
    $("#turn").select2();
    $("#bank").select2();


</script>
<?= $this->endSection() ?>
        