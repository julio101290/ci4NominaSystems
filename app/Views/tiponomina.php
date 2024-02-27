<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('modulesTiponomina/modalCaptureTiponomina') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
 <div class="card-header">
     <div class="float-right">
         <div class="btn-group">

             <button class="btn btn-primary btnAddTiponomina" data-toggle="modal" data-target="#modalAddTiponomina"><i class="fa fa-plus"></i>

                 <?= lang('tiponomina.add') ?>

             </button>

         </div>
     </div>
 </div>
 <div class="card-body">
     <div class="row">
         <div class="col-md-12">
             <div class="table-responsive">
                 <table id="tableTiponomina" class="table table-striped table-hover va-middle tableTiponomina">
                     <thead>
                         <tr>

                             <th>#</th>
                             <th><?= lang('tiponomina.fields.codigo') ?></th>
<th><?= lang('tiponomina.fields.nombre') ?></th>
<th><?= lang('tiponomina.fields.direccion') ?></th>
<th><?= lang('tiponomina.fields.colonia') ?></th>
<th><?= lang('tiponomina.fields.ciudad') ?></th>
<th><?= lang('tiponomina.fields.idEmpresa') ?></th>
<th><?= lang('tiponomina.fields.idSucursal') ?></th>
<th><?= lang('tiponomina.fields.porcISN') ?></th>
<th><?= lang('tiponomina.fields.entidadFederativa') ?></th>
<th><?= lang('tiponomina.fields.cxcNom') ?></th>
<th><?= lang('tiponomina.fields.cxpISN') ?></th>
<th><?= lang('tiponomina.fields.cxcInfonavit') ?></th>
<th><?= lang('tiponomina.fields.cxcIMSS') ?></th>
<th><?= lang('tiponomina.fields.cxcFonacot') ?></th>
<th><?= lang('tiponomina.fields.diasPeriodoNomina') ?></th>
<th><?= lang('tiponomina.fields.maxDias') ?></th>
<th><?= lang('tiponomina.fields.codigoPostal') ?></th>
<th><?= lang('tiponomina.fields.riesgoPto') ?></th>
<th><?= lang('tiponomina.fields.areaSalMin') ?></th>
<th><?= lang('tiponomina.fields.ejecutivo') ?></th>
<th><?= lang('tiponomina.fields.ctaNom') ?></th>
<th><?= lang('tiponomina.fields.NRP') ?></th>
<th><?= lang('tiponomina.fields.porcRiesgoTrabajo') ?></th>
<th><?= lang('tiponomina.fields.numSucBancaria') ?></th>
<th><?= lang('tiponomina.fields.created_at') ?></th>
<th><?= lang('tiponomina.fields.updated_at') ?></th>
<th><?= lang('tiponomina.fields.deleted_at') ?></th>

                             <th><?= lang('tiponomina.fields.actions') ?> </th>

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

 var tableTiponomina = $('#tableTiponomina').DataTable({
     processing: true,
     serverSide: true,
     responsive: true,
     autoWidth: false,
     order: [[1, 'asc']],

     ajax: {
         url: '<?= base_url(route_to('admin/tiponomina')) ?>',
         method: 'GET',
         dataType: "json"
     },
     columnDefs: [{
             orderable: false,
             targets: [28],
             searchable: false,
             targets: [28]

         }],
     columns: [{
             'data': 'id'
         },
        
          
{
    'data': 'codigo'
},

 
{
    'data': 'nombre'
},

 
{
    'data': 'direccion'
},

 
{
    'data': 'colonia'
},

 
{
    'data': 'ciudad'
},

 
{
    'data': 'idEmpresa'
},

 
{
    'data': 'idSucursal'
},

 
{
    'data': 'porcISN'
},

 
{
    'data': 'entidadFederativa'
},

 
{
    'data': 'cxcNom'
},

 
{
    'data': 'cxpISN'
},

 
{
    'data': 'cxcInfonavit'
},

 
{
    'data': 'cxcIMSS'
},

 
{
    'data': 'cxcFonacot'
},

 
{
    'data': 'diasPeriodoNomina'
},

 
{
    'data': 'maxDias'
},

 
{
    'data': 'codigoPostal'
},

 
{
    'data': 'riesgoPto'
},

 
{
    'data': 'areaSalMin'
},

 
{
    'data': 'ejecutivo'
},

 
{
    'data': 'ctaNom'
},

 
{
    'data': 'NRP'
},

 
{
    'data': 'porcRiesgoTrabajo'
},

 
{
    'data': 'numSucBancaria'
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
                             <button class="btn btn-warning btnEditTiponomina" data-toggle="modal" idTiponomina="${data.id}" data-target="#modalAddTiponomina">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
             }
         }
     ]
 });



 $(document).on('click', '#btnSaveTiponomina', function (e) {

     
var idTiponomina = $("#idTiponomina").val();
var codigo = $("#codigo").val();
var nombre = $("#nombre").val();
var direccion = $("#direccion").val();
var colonia = $("#colonia").val();
var ciudad = $("#ciudad").val();
var idEmpresa = $("#idEmpresa").val();
var idSucursal = $("#idSucursal").val();
var porcISN = $("#porcISN").val();
var entidadFederativa = $("#entidadFederativa").val();
var cxcNom = $("#cxcNom").val();
var cxpISN = $("#cxpISN").val();
var cxcInfonavit = $("#cxcInfonavit").val();
var cxcIMSS = $("#cxcIMSS").val();
var cxcFonacot = $("#cxcFonacot").val();
var diasPeriodoNomina = $("#diasPeriodoNomina").val();
var maxDias = $("#maxDias").val();
var codigoPostal = $("#codigoPostal").val();
var riesgoPto = $("#riesgoPto").val();
var areaSalMin = $("#areaSalMin").val();
var ejecutivo = $("#ejecutivo").val();
var ctaNom = $("#ctaNom").val();
var NRP = $("#NRP").val();
var porcRiesgoTrabajo = $("#porcRiesgoTrabajo").val();
var numSucBancaria = $("#numSucBancaria").val();

     $("#btnSaveTiponomina").attr("disabled", true);

     var datos = new FormData();
datos.append("idTiponomina", idTiponomina);
datos.append("codigo", codigo);
datos.append("nombre", nombre);
datos.append("direccion", direccion);
datos.append("colonia", colonia);
datos.append("ciudad", ciudad);
datos.append("idEmpresa", idEmpresa);
datos.append("idSucursal", idSucursal);
datos.append("porcISN", porcISN);
datos.append("entidadFederativa", entidadFederativa);
datos.append("cxcNom", cxcNom);
datos.append("cxpISN", cxpISN);
datos.append("cxcInfonavit", cxcInfonavit);
datos.append("cxcIMSS", cxcIMSS);
datos.append("cxcFonacot", cxcFonacot);
datos.append("diasPeriodoNomina", diasPeriodoNomina);
datos.append("maxDias", maxDias);
datos.append("codigoPostal", codigoPostal);
datos.append("riesgoPto", riesgoPto);
datos.append("areaSalMin", areaSalMin);
datos.append("ejecutivo", ejecutivo);
datos.append("ctaNom", ctaNom);
datos.append("NRP", NRP);
datos.append("porcRiesgoTrabajo", porcRiesgoTrabajo);
datos.append("numSucBancaria", numSucBancaria);


     $.ajax({

         url: "<?= route_to('admin/tiponomina/save') ?>",
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

                 tableTiponomina.ajax.reload();
                 $("#btnSaveTiponomina").removeAttr("disabled");


                 $('#modalAddTiponomina').modal('hide');
             } else {

                 Toast.fire({
                     icon: 'error',
                     title: respuesta
                 });

                 $("#btnSaveTiponomina").removeAttr("disabled");
                

             }

         }

     }

     )

 });



 /**
  * Carga datos actualizar
  */


 /*=============================================
  EDITAR Tiponomina
  =============================================*/
 $(".tableTiponomina").on("click", ".btnEditTiponomina", function () {

     var idTiponomina = $(this).attr("idTiponomina");
        
     var datos = new FormData();
     datos.append("idTiponomina", idTiponomina);

     $.ajax({

         url: "<?= base_url(route_to('admin/tiponomina/getTiponomina')) ?>",
         method: "POST",
         data: datos,
         cache: false,
         contentType: false,
         processData: false,
         dataType: "json",
         success: function (respuesta) {
             $("#idTiponomina").val(respuesta["id"]);
             
             $("#codigo").val(respuesta["codigo"]);
$("#nombre").val(respuesta["nombre"]);
$("#direccion").val(respuesta["direccion"]);
$("#colonia").val(respuesta["colonia"]);
$("#ciudad").val(respuesta["ciudad"]);
$("#idEmpresa").val(respuesta["idEmpresa"]);
$("#idSucursal").val(respuesta["idSucursal"]);
$("#porcISN").val(respuesta["porcISN"]);
$("#entidadFederativa").val(respuesta["entidadFederativa"]);
$("#cxcNom").val(respuesta["cxcNom"]);
$("#cxpISN").val(respuesta["cxpISN"]);
$("#cxcInfonavit").val(respuesta["cxcInfonavit"]);
$("#cxcIMSS").val(respuesta["cxcIMSS"]);
$("#cxcFonacot").val(respuesta["cxcFonacot"]);
$("#diasPeriodoNomina").val(respuesta["diasPeriodoNomina"]);
$("#maxDias").val(respuesta["maxDias"]);
$("#codigoPostal").val(respuesta["codigoPostal"]);
$("#riesgoPto").val(respuesta["riesgoPto"]);
$("#areaSalMin").val(respuesta["areaSalMin"]);
$("#ejecutivo").val(respuesta["ejecutivo"]);
$("#ctaNom").val(respuesta["ctaNom"]);
$("#NRP").val(respuesta["NRP"]);
$("#porcRiesgoTrabajo").val(respuesta["porcRiesgoTrabajo"]);
$("#numSucBancaria").val(respuesta["numSucBancaria"]);


         }

     })

 })


 /*=============================================
  ELIMINAR tiponomina
  =============================================*/
 $(".tableTiponomina").on("click", ".btn-delete", function () {

     var idTiponomina = $(this).attr("data-id");

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
                         url: `<?= base_url(route_to('admin/tiponomina')) ?>/` + idTiponomina,
                         method: 'DELETE',
                     }).done((data, textStatus, jqXHR) => {
                         Toast.fire({
                             icon: 'success',
                             title: jqXHR.statusText,
                         });


                         tableTiponomina.ajax.reload();
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
        