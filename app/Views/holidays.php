<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('modulesHolidays/modalCaptureHolidays') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddHolidays" data-toggle="modal" data-target="#modalAddHolidays"><i class="fa fa-plus"></i>

                    <?= lang('holidays.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableHolidays" class="table table-striped table-hover va-middle tableHolidays">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th><?= lang('holidays.fields.date') ?></th>
                                <th><?= lang('holidays.fields.created_at') ?></th>
                                <th><?= lang('holidays.fields.updated_at') ?></th>
                                <th><?= lang('holidays.fields.deleted_at') ?></th>

                                <th><?= lang('holidays.fields.actions') ?> </th>

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

    var tableHolidays = $('#tableHolidays').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url(route_to('admin/holidays')) ?>',
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
                'data': 'date'
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
                             <button class="btn btn-warning btnEditHolidays" data-toggle="modal" idHolidays="${data.id}" data-target="#modalAddHolidays">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
                }
            }
        ]
    });



    $(document).on('click', '#btnSaveHolidays', function (e) {


        var idHolidays = $("#idHolidays").val();
        var date = $("#date").val();

        $("#btnSaveHolidays").attr("disabled", true);

        var datos = new FormData();
        datos.append("idHolidays", idHolidays);
        datos.append("date", date);


        $.ajax({

            url: "<?= route_to('admin/holidays/save') ?>",
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

                    tableHolidays.ajax.reload();
                    $("#btnSaveHolidays").removeAttr("disabled");


                    $('#modalAddHolidays').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveHolidays").removeAttr("disabled");


                }

            }

        }

        )

    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR Holidays
     =============================================*/
    $(".tableHolidays").on("click", ".btnEditHolidays", function () {

        var idHolidays = $(this).attr("idHolidays");

        var datos = new FormData();
        datos.append("idHolidays", idHolidays);

        $.ajax({

            url: "<?= base_url(route_to('admin/holidays/getHolidays')) ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idHolidays").val(respuesta["id"]);

                $("#date").val(respuesta["date"]);


            }

        })

    })


    /*=============================================
     ELIMINAR holidays
     =============================================*/
    $(".tableHolidays").on("click", ".btn-delete", function () {

        var idHolidays = $(this).attr("data-id");

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
                            url: `<?= base_url(route_to('admin/holidays')) ?>/` + idHolidays,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableHolidays.ajax.reload();
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
        