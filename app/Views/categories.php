<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('modulesCategories/modalCaptureCategories') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
 <div class="card-header">
     <div class="float-right">
         <div class="btn-group">

             <button class="btn btn-primary btnAddCategories" data-toggle="modal" data-target="#modalAddCategories"><i class="fa fa-plus"></i>

                 <?= lang('categories.add') ?>

             </button>

         </div>
     </div>
 </div>
 <div class="card-body">
     <div class="row">
         <div class="col-md-12">
             <div class="table-responsive">
                 <table id="tableCategories" class="table table-striped table-hover va-middle tableCategories">
                     <thead>
                         <tr>

                             <th>#</th>
                             <th><?= lang('categories.fields.name') ?></th>
<th><?= lang('categories.fields.minimumSalary') ?></th>
<th><?= lang('categories.fields.maximunSalary') ?></th>
<th><?= lang('categories.fields.created_at') ?></th>
<th><?= lang('categories.fields.updated_at') ?></th>
<th><?= lang('categories.fields.deleted_at') ?></th>

                             <th><?= lang('categories.fields.actions') ?> </th>

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

 var tableCategories = $('#tableCategories').DataTable({
     processing: true,
     serverSide: true,
     autoWidth: false,
     order: [[1, 'asc']],

     ajax: {
         url: '<?= base_url(route_to('admin/categories')) ?>',
         method: 'GET',
         dataType: "json"
     },
     columnDefs: [{
             orderable: false,
             targets: [7],
             searchable: false,
             targets: [7]

         }],
     columns: [{
             'data': 'id'
         },
        
          
{
    'data': 'name'
},

 
{
    'data': 'minimumSalary'
},

 
{
    'data': 'maximunSalary'
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
                             <button class="btn btn-warning btnEditCategories" data-toggle="modal" idCategories="${data.id}" data-target="#modalAddCategories">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
             }
         }
     ]
 });



 $(document).on('click', '#btnSaveCategories', function (e) {

     
var idCategories = $("#idCategories").val();
var name = $("#name").val();
var minimumSalary = $("#minimumSalary").val();
var maximunSalary = $("#maximunSalary").val();

     $("#btnSaveCategories").attr("disabled", true);

     var datos = new FormData();
datos.append("idCategories", idCategories);
datos.append("name", name);
datos.append("minimumSalary", minimumSalary);
datos.append("maximunSalary", maximunSalary);


     $.ajax({

         url: "<?= route_to('admin/categories/save') ?>",
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

                 tableCategories.ajax.reload();
                 $("#btnSaveCategories").removeAttr("disabled");


                 $('#modalAddCategories').modal('hide');
             } else {

                 Toast.fire({
                     icon: 'error',
                     title: respuesta
                 });

                 $("#btnSaveCategories").removeAttr("disabled");
                

             }

         }

     }

     )

 });



 /**
  * Carga datos actualizar
  */


 /*=============================================
  EDITAR Categories
  =============================================*/
 $(".tableCategories").on("click", ".btnEditCategories", function () {

     var idCategories = $(this).attr("idCategories");
        
     var datos = new FormData();
     datos.append("idCategories", idCategories);

     $.ajax({

         url: "<?= base_url(route_to('admin/categories/getCategories')) ?>",
         method: "POST",
         data: datos,
         cache: false,
         contentType: false,
         processData: false,
         dataType: "json",
         success: function (respuesta) {
             $("#idCategories").val(respuesta["id"]);
             
             $("#name").val(respuesta["name"]);
$("#minimumSalary").val(respuesta["minimumSalary"]);
$("#maximunSalary").val(respuesta["maximunSalary"]);


         }

     })

 })


 /*=============================================
  ELIMINAR categories
  =============================================*/
 $(".tableCategories").on("click", ".btn-delete", function () {

     var idCategories = $(this).attr("data-id");

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
                         url: `<?= base_url(route_to('admin/categories')) ?>/` + idCategories,
                         method: 'DELETE',
                     }).done((data, textStatus, jqXHR) => {
                         Toast.fire({
                             icon: 'success',
                             title: jqXHR.statusText,
                         });


                         tableCategories.ajax.reload();
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
        