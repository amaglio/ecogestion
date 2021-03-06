//---- Validar alta trabajo


jq_va(function(){    

    jq_va('#form_alta_trabajo').validate({
        ignore: "",
        rules :{

                descripcion : {
                    required : true
                },
                id_area : {
                    required : true
                }
        },
        messages : {  

                descripcion : {
                     required : "Debe ingresar la descripcio/nombre del trabajo"
                },
                id_area : {
                     required : "Debe seleccionar el area"
                } 
        },
        submitHandler: function(form) {

            jq_va("#div_loadding_crear_trabajo").show();
            form.submit();    
        } 
    });    
});  

//---- Validar modificar trabajo

jq_va(function(){    

    jq_va('#form_modifica_trabajo').validate({
        ignore: "",
        rules :{
                id_trabajo : {
                    required : true
                },
                id_area : {
                    required : true
                },
                 descripcion : {
                     required : true
                },
        },
        messages : {  

                id_trabajo : {
                     required : "Debe estar el id del trabajo"
                },
                id_area : {
                     required : "Debe seleccionar el area"
                },
                descripcion : {
                     required : "Debe ingresar la descripcio/nombre del trabajo"
                },
        },
        submitHandler: function(form) {

            jq_va("#div_loadding_modificar_trabajo").show();
            form.submit();    
        } 
    });    
});  

 

//---- Tabla trabajos ----
  
jq_dt(document).ready(function() {
    jq_dt('#tabla_trabajos').dataTable({
                "paging":   true,
                "ordering": true,
                "info":     true,
                "bFilter": true,
                "language": {
                    "lengthMenu": "Mostrando _MENU_ trabajos por pagina.",
                    "zeroRecords": "Ningun trabajo fue encontrado.",
                    "info": "<b> Mostrando pagina _PAGE_ de _PAGES_ </b>",
                    "infoEmpty": "Ningun trabajo disponible",
                    "infoFiltered": "(Filtrado de _MAX_ trabajos totales)",
                    "sSearch": " Buscar    ",
                    "oPaginate": {
                                    "sNext": "Pag. sig.",
                                    "sPrevious": "Pag. ant."
                                  }
                }

            });
} );


//----- eliminar trabajo ----

function eliminar_trabajo(id_trabajo)
{
  if (confirm('Seguro desea eliminar el trabajo? ')) 
  {     
    
        $.ajax({
                url: CI_ROOT+'index.php/trabajo/baja_trabajo',
                data: { id_trabajo: id_trabajo },
                async: true,
                type: 'POST',
                dataType: 'JSON',
                success: function(data)
                {
                  if(data.error == false)
                  {
                    //alert("Se ha eliminado el trabajo exitosamente");
                    //location.reload();
                    window.location = CI_ROOT+'index.php/trabajo/index'
                  }
                  else
                  {
                    //alert("No se ha eliminado el trabajo");
                    location.reload();
                  }
                },
                error: function(x, status, error){
                 window.location = CI_ROOT+'index.php/trabajo/index'
                }
          });   
     
  }
}


function ver_crear_necesidad()
{
   jq_dt("div_crear_necesidad").show();
}

/*------- FECHA DE LA NECESIDAD -----*/

jq_dt('.calendario').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy'
  });