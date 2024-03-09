<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('modulesNominas/modalCaptureNominas') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddNominas" data-toggle="modal" data-target="#modalAddNominas"><i class="fa fa-plus"></i>

                    <?= lang('nominas.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableNominas" class="table table-striped table-hover va-middle tableNominas">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th><?= lang('nominas.fields.idEmpresa') ?></th>
                                <th><?= lang('nominas.fields.idTipoNominas') ?></th>
                                <th><?= lang('nominas.fields.clave') ?></th>
                                <th><?= lang('nominas.fields.fechaInicial') ?></th>
                                <th><?= lang('nominas.fields.fechaFinal') ?></th>
                                <th><?= lang('nominas.fields.diasTrab') ?></th>
                                <th><?= lang('nominas.fields.cerrada') ?></th>
                                <th><?= lang('nominas.fields.descripcion') ?></th>
                                <th><?= lang('nominas.fields.usuarioAperturo') ?></th>
                                <th><?= lang('nominas.fields.fechaCerrado') ?></th>
                                <th><?= lang('nominas.fields.usuarioCerrado') ?></th>
                                <th><?= lang('nominas.fields.diasPagados') ?></th>
                                <th><?= lang('nominas.fields.fechaAplicacion') ?></th>
                                <th><?= lang('nominas.fields.porcISN') ?></th>
                                <th><?= lang('nominas.fields.diasFestivos') ?></th>
                                <th><?= lang('nominas.fields.ise') ?></th>
                                <th><?= lang('nominas.fields.proveedorISN') ?></th>
                                <th><?= lang('nominas.fields.porrsg') ?></th>
                                <th><?= lang('nominas.fields.UMA') ?></th>
                                <th><?= lang('nominas.fields.created_at') ?></th>
                                <th><?= lang('nominas.fields.updated_at') ?></th>
                                <th><?= lang('nominas.fields.deleted_at') ?></th>

                                <th><?= lang('nominas.fields.actions') ?> </th>

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

    var tableNominas = $('#tableNominas').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url('admin/nominas') ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [23],
                searchable: false,
                targets: [23]

            }],
        columns: [{
                'data': 'id'
            },

            {
                'data': 'idEmpresa'
            },

            {
                'data': 'idTipoNominas'
            },

            {
                'data': 'clave'
            },

            {
                'data': 'fechaInicial'
            },

            {
                'data': 'fechaFinal'
            },

            {
                'data': 'diasTrab'
            },

            {
                'data': 'cerrada'
            },

            {
                'data': 'descripcion'
            },

            {
                'data': 'usuarioAperturo'
            },

            {
                'data': 'fechaCerrado'
            },

            {
                'data': 'usuarioCerrado'
            },

            {
                'data': 'diasPagados'
            },

            {
                'data': 'fechaAplicacion'
            },

            {
                'data': 'porcISN'
            },

            {
                'data': 'diasFestivos'
            },

            {
                'data': 'ise'
            },

            {
                'data': 'proveedorISN'
            },

            {
                'data': 'porrsg'
            },

            {
                'data': 'UMA'
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
                             <button class="btn btn-warning btnEditNominas" data-toggle="modal" idNominas="${data.id}" data-target="#modalAddNominas">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
                }
            }
        ]
    });



    $(document).on('click', '#btnSaveNominas', function (e) {


        var idNominas = $("#idNominas").val();
        var idEmpresa = $("#idEmpresa").val();
        var idTipoNominas = $("#idTipoNominas").val();
        var clave = $("#clave").val();
        var fechaInicial = $("#fechaInicial").val();
        var fechaFinal = $("#fechaFinal").val();
        var diasTrab = $("#diasTrab").val();
        var cerrada = $("#cerrada").val();
        var descripcion = $("#descripcion").val();
        var usuarioAperturo = $("#usuarioAperturo").val();
        var fechaCerrado = $("#fechaCerrado").val();
        var usuarioCerrado = $("#usuarioCerrado").val();
        var diasPagados = $("#diasPagados").val();
        var fechaAplicacion = $("#fechaAplicacion").val();
        var porcISN = $("#porcISN").val();
        var diasFestivos = $("#diasFestivos").val();
        var ise = $("#ise").val();
        var proveedorISN = $("#proveedorISN").val();
        var porrsg = $("#porrsg").val();
        var UMA = $("#UMA").val();


        /*
        if (idEmpresa == 0 || idEmpresa == null) {

            Toast.fire({
                icon: 'error',
                title: "Tiene que seleccionar la empresa"
            });

            return;

        }
        */

        if (idTipoNominas == 0 || idTipoNominas == null) {

            Toast.fire({
                icon: 'error',
                title: "Tiene que seleccionar el tipo de nomina"
            });

            return;

        }

        $("#btnSaveNominas").attr("disabled", true);

        var datos = new FormData();
        datos.append("idNominas", idNominas);
        datos.append("idEmpresa", idEmpresa);
        datos.append("idTipoNominas", idTipoNominas);
        datos.append("clave", clave);
        datos.append("fechaInicial", fechaInicial);
        datos.append("fechaFinal", fechaFinal);
        datos.append("diasTrab", diasTrab);
        datos.append("cerrada", cerrada);
        datos.append("descripcion", descripcion);
        datos.append("usuarioAperturo", usuarioAperturo);
        datos.append("fechaCerrado", fechaCerrado);
        datos.append("usuarioCerrado", usuarioCerrado);
        datos.append("diasPagados", diasPagados);
        datos.append("fechaAplicacion", fechaAplicacion);
        datos.append("porcISN", porcISN);
        datos.append("diasFestivos", diasFestivos);
        datos.append("ise", ise);
        datos.append("proveedorISN", proveedorISN);
        datos.append("porrsg", porrsg);
        datos.append("UMA", UMA);


        $.ajax({

            url: "<?= base_url('admin/nominas/save') ?>",
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

                    tableNominas.ajax.reload();
                    $("#btnSaveNominas").removeAttr("disabled");


                    $('#modalAddNominas').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveNominas").removeAttr("disabled");


                }

            }

        }

        ).fail(function (jqXHR, textStatus, errorThrown) {

            if (jqXHR.status === 0) {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "No hay conexión.!" + jqXHR.responseText
                });

                $("#btnSaveNominas").removeAttr("disabled");


            } else if (jqXHR.status == 404) {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Requested page not found [404]" + jqXHR.responseText
                });

                $("#btnSaveNominas").removeAttr("disabled");

            } else if (jqXHR.status == 500) {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Internal Server Error [500]." + jqXHR.responseText
                });


                $("#btnSaveNominas").removeAttr("disabled");

            } else if (textStatus === 'parsererror') {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Requested JSON parse failed." + jqXHR.responseText
                });

                $("#btnSaveNominas").removeAttr("disabled");

            } else if (textStatus === 'timeout') {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Time out error." + jqXHR.responseText
                });

                $("#btnSaveNominas").removeAttr("disabled");

            } else if (textStatus === 'abort') {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Ajax request aborted." + jqXHR.responseText
                });

                $("#btnSaveNominas").removeAttr("disabled");

            } else {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: 'Uncaught Error: ' + jqXHR.responseText
                });


                $("#btnSaveNominas").removeAttr("disabled");

            }
        })

    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR Nominas
     =============================================*/
    $(".tableNominas").on("click", ".btnEditNominas", function () {

        var idNominas = $(this).attr("idNominas");

        var datos = new FormData();
        datos.append("idNominas", idNominas);

        $.ajax({

            url: "<?= base_url('admin/nominas/getNominas') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idNominas").val(respuesta["id"]);

                $("#idEmpresa").val(respuesta["idEmpresa"]).trigger("change");
                $("#idTipoNominas").val(respuesta["idTipoNominas"]).trigger("change");
                $("#clave").val(respuesta["clave"]);
                $("#fechaInicial").val(respuesta["fechaInicial"]);
                $("#fechaFinal").val(respuesta["fechaFinal"]);
                $("#diasTrab").val(respuesta["diasTrab"]);
                $("#cerrada").val(respuesta["cerrada"]);
                $("#descripcion").val(respuesta["descripcion"]);
                $("#usuarioAperturo").val(respuesta["usuarioAperturo"]);
                $("#fechaCerrado").val(respuesta["fechaCerrado"]);
                $("#usuarioCerrado").val(respuesta["usuarioCerrado"]);
                $("#diasPagados").val(respuesta["diasPagados"]);
                $("#fechaAplicacion").val(respuesta["fechaAplicacion"]);
                $("#porcISN").val(respuesta["porcISN"]);
                $("#diasFestivos").val(respuesta["diasFestivos"]);
                $("#ise").val(respuesta["ise"]);
                $("#proveedorISN").val(respuesta["proveedorISN"]);
                $("#porrsg").val(respuesta["porrsg"]);
                $("#UMA").val(respuesta["UMA"]);


            }

        })

    })


    /*=============================================
     ELIMINAR nominas
     =============================================*/
    $(".tableNominas").on("click", ".btn-delete", function () {

        var idNominas = $(this).attr("data-id");

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
                            url: `<?= base_url('admin/nominas') ?>/` + idNominas,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableNominas.ajax.reload();
                        }).fail((error) => {
                            Toast.fire({
                                icon: 'error',
                                title: error.responseJSON.messages.error,
                            });
                        })
                    }
                })
    })

    $(function () {
        $("#modalAddNominas").draggable();

    });



    $(document).ready(function () {

        var empresa = $("#idEmpresa").val();
        var tipoNomina = $("#idTipoNominas").val();

        ultimoFolio(empresa, tipoNomina);

    });



    $('#idTipoNominas').on("change", function () {

        var empresa = $("#idEmpresa").val();
        var tipoNomina = $(this).val();
        
        
        console.log("Tipo Nomina:",tipoNomina);

        ultimoFolio(empresa, tipoNomina);

    })



    function ultimoFolio(empresa = 0, tipoNomina = 0) {





        var datos = new FormData();
        datos.append("empresa", empresa);
        datos.append("tipoNomina", tipoNomina);


        $.ajax({

            url: "<?= base_url('admin/nominas/obtenerUltimoFolio') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {


                $("#clave").val(respuesta);

            }
        });
    }


</script>
<?= $this->endSection() ?>
        