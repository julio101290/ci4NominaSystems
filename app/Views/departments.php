<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('modulesDepartments/modalCaptureDepartments') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddDepartments" data-toggle="modal" data-target="#modalAddDepartments"><i class="fa fa-plus"></i>

                    <?= lang('departments.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableDepartments" class="table table-striped table-hover va-middle tableDepartments">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th><?= lang('departments.fields.description') ?></th>
                                <th><?= lang('departments.fields.created_at') ?></th>
                                <th><?= lang('departments.fields.updated_at') ?></th>
                                <th><?= lang('departments.fields.deleted_at') ?></th>

                                <th><?= lang('departments.fields.actions') ?> </th>

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

    var tableDepartments = $('#tableDepartments').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url(route_to('admin/departments')) ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [5],
                searchable: false,
                targets: [5]

            }],
        columns: [{
                'data': 'id'
            },

            {
                'data': 'description'
            },

            {
                'data': 'created_at'
            },

            {
                'data': 'updated_at'
            },

            {
                'data': 'deleted_at'
            },

            {
                "data": function (data) {
                    return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                             <button class="btn btn-warning btnEditDepartments" data-toggle="modal" idDepartments="${data.id}" data-target="#modalAddDepartments">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
                }
            }
        ]
    });



    $(document).on('click', '#btnSaveDepartments', function (e) {


        var idDepartments = $("#idDepartments").val();
        var description = $("#description").val();

        $("#btnSaveDepartments").attr("disabled", true);

        var datos = new FormData();
        datos.append("idDepartments", idDepartments);
        datos.append("description", description);


        $.ajax({

            url: "<?= route_to('admin/departments/save') ?>",
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

                    tableDepartments.ajax.reload();
                    $("#btnSaveDepartments").removeAttr("disabled");


                    $('#modalAddDepartments').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveDepartments").removeAttr("disabled");


                }

            }

        }

        )

    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR Departments
     =============================================*/
    $(".tableDepartments").on("click", ".btnEditDepartments", function () {

        var idDepartments = $(this).attr("idDepartments");

        var datos = new FormData();
        datos.append("idDepartments", idDepartments);

        $.ajax({

            url: "<?= base_url(route_to('admin/departments/getDepartments')) ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idDepartments").val(respuesta["id"]);

                $("#description").val(respuesta["description"]);


            }

        })

    })


    /*=============================================
     ELIMINAR departments
     =============================================*/
    $(".tableDepartments").on("click", ".btn-delete", function () {

        var idDepartments = $(this).attr("data-id");

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
                            url: `<?= base_url(route_to('admin/departments')) ?>/` + idDepartments,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableDepartments.ajax.reload();
                        }).fail((error) => {
                            Toast.fire({
                                icon: 'error',
                                title: error.responseJSON.messages.error,
                            });
                        })
                    }
                })
    })




</script>
<?= $this->endSection() ?>
        