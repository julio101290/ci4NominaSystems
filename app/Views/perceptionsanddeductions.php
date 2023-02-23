<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('modulesPerceptionsanddeductions/modalCapturePerceptionsanddeductions') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddPerceptionsanddeductions" data-toggle="modal" data-target="#modalAddPerceptionsanddeductions"><i class="fa fa-plus"></i>

                    <?= lang('perceptionsanddeductions.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tablePerceptionsanddeductions" class="table table-striped table-hover va-middle tablePerceptionsanddeductions">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th><?= lang('perceptionsanddeductions.fields.code') ?></th>
                                <th><?= lang('perceptionsanddeductions.fields.name') ?></th>
                                <th><?= lang('perceptionsanddeductions.fields.nameAbrev') ?></th>
                                <th><?= lang('perceptionsanddeductions.fields.type') ?></th>
                                <th><?= lang('perceptionsanddeductions.fields.Area') ?></th>
                                <th><?= lang('perceptionsanddeductions.fields.SATConcept') ?></th>
                                <th><?= lang('perceptionsanddeductions.fields.calc') ?></th>
                                <th><?= lang('perceptionsanddeductions.fields.orden') ?></th>
                                <th><?= lang('perceptionsanddeductions.fields.payType') ?></th>
                                <th><?= lang('perceptionsanddeductions.fields.ordinary') ?></th>
                                <th><?= lang('perceptionsanddeductions.fields.otherPay') ?></th>
                                <th><?= lang('perceptionsanddeductions.fields.created_at') ?></th>
                                <th><?= lang('perceptionsanddeductions.fields.updated_at') ?></th>
                                <th><?= lang('perceptionsanddeductions.fields.deleted_at') ?></th>

                                <th><?= lang('perceptionsanddeductions.fields.actions') ?> </th>

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

    var tablePerceptionsanddeductions = $('#tablePerceptionsanddeductions').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url(route_to('admin/perceptionsanddeductions')) ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [15],
                searchable: false,
                targets: [15]

            }],
        columns: [{
                'data': 'id'
            },

            {
                'data': 'code'
            },

            {
                'data': 'name'
            },

            {
                'data': 'nameAbrev'
            },

            {
                'data': 'type'
            },

            {
                'data': 'Area'
            },

            {
                'data': 'SATConcept'
            },

            {
                'data': 'calc'
            },

            {
                'data': 'orden'
            },

            {
                'data': 'payType'
            },

            {
                'data': 'ordinary'
            },

            {
                'data': 'otherPay'
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
                             <button class="btn btn-warning btnEditPerceptionsanddeductions" data-toggle="modal" idPerceptionsanddeductions="${data.id}" data-target="#modalAddPerceptionsanddeductions">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
                }
            }
        ]
    });



    $(document).on('click', '#btnSavePerceptionsanddeductions', function (e) {


        var idPerceptionsanddeductions = $("#idPerceptionsanddeductions").val();
        var code = $("#code").val();
        var name = $("#name").val();
        var nameAbrev = $("#nameAbrev").val();
        var type = $("#type").val();
        var Area = $("#Area").val();
        var SATConcept = $("#SATConcept").val();
        var calc = $("#calc").val();
        var orden = $("#orden").val();
        var payType = $("#payType").val();
        var ordinary = $("#ordinary").val();
        var otherPay = $("#otherPay").val();

        $("#btnSavePerceptionsanddeductions").attr("disabled", true);

        var datos = new FormData();
        datos.append("idPerceptionsanddeductions", idPerceptionsanddeductions);
        datos.append("code", code);
        datos.append("name", name);
        datos.append("nameAbrev", nameAbrev);
        datos.append("type", type);
        datos.append("Area", Area);
        datos.append("SATConcept", SATConcept);
        datos.append("calc", calc);
        datos.append("orden", orden);
        datos.append("payType", payType);
        datos.append("ordinary", ordinary);
        datos.append("otherPay", otherPay);


        $.ajax({

            url: "<?= route_to('admin/perceptionsanddeductions/save') ?>",
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

                    tablePerceptionsanddeductions.ajax.reload();
                    $("#btnSavePerceptionsanddeductions").removeAttr("disabled");


                    $('#modalAddPerceptionsanddeductions').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSavePerceptionsanddeductions").removeAttr("disabled");


                }

            }

        }

        )

    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR Perceptionsanddeductions
     =============================================*/
    $(".tablePerceptionsanddeductions").on("click", ".btnEditPerceptionsanddeductions", function () {

        var idPerceptionsanddeductions = $(this).attr("idPerceptionsanddeductions");

        var datos = new FormData();
        datos.append("idPerceptionsanddeductions", idPerceptionsanddeductions);

        $.ajax({

            url: "<?= base_url(route_to('admin/perceptionsanddeductions/getPerceptionsanddeductions')) ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idPerceptionsanddeductions").val(respuesta["id"]);

                $("#code").val(respuesta["code"]);
                $("#name").val(respuesta["name"]);
                $("#nameAbrev").val(respuesta["nameAbrev"]);
                $("#type").val(respuesta["type"]);
                $("#Area").val(respuesta["Area"]);
                $("#SATConcept").val(respuesta["SATConcept"]);
                $("#calc").val(respuesta["calc"]);
                $("#orden").val(respuesta["orden"]);
                $("#payType").val(respuesta["payType"]);
                $("#ordinary").val(respuesta["ordinary"]);
                $("#otherPay").val(respuesta["otherPay"]);


            }

        })

    })


    /*=============================================
     ELIMINAR perceptionsanddeductions
     =============================================*/
    $(".tablePerceptionsanddeductions").on("click", ".btn-delete", function () {

        var idPerceptionsanddeductions = $(this).attr("data-id");

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
                            url: `<?= base_url(route_to('admin/perceptionsanddeductions')) ?>/` + idPerceptionsanddeductions,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tablePerceptionsanddeductions.ajax.reload();
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
        