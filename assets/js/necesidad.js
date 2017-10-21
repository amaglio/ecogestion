//---- Validar alta necesidad


jq_va(function(){    

    jq_va('#form_alta_necesidad').validate({
        ignore: "",
        rules :{
                id_trabajo : {
                    required : true
                },
                fecha_limite : {
                    required : true
                } 
        },
        messages : {  
                id_trabajo : {
                     required : "Debe seleccionar el trabajo"
                },
                fecha_limite : {
                     required : "Debe ingresar la fecha limite de la necesidad"
                } 
        },
        submitHandler: function(form) {

            jq_va("#div_loadding_crear_necesidad").show();
            form.submit();    
        } 
    });    
});  

//---- Validar modificar necesidad

jq_va(function(){    

    jq_va('#form_modifica_necesidad').validate({
        ignore: "",
        rules :{
                id_necesidad : {
                    required : true
                },
                necesidad : {
                    required : true
                }
        },
        messages : {  

                id_necesidad : {
                     required : "Debe estar el id del necesidad"
                },
                necesidad : {
                     required : "Debe ingresar el nombre del necesidad"
                }
        },
        submitHandler: function(form) {

            jq_va("#div_loadding_modificar_necesidad").show();
            form.submit();    
        } 
    });    
});  

 

//---- Tabla necesidades ----
  
jq_dt(document).ready(function() {
    jq_dt('#tabla_necesidades').dataTable({
                "paging":   true,
                "ordering": true,
                "info":     true,
                "bFilter": true,
                "language": {
                    "lengthMenu": "Mostrando _MENU_ necesidades por pagina.",
                    "zeroRecords": "Ningun necesidad fue encontrada.",
                    "info": "<b> Mostrando pagina _PAGE_ de _PAGES_ </b>",
                    "infoEmpty": "Ningun necesidad disponible",
                    "infoFiltered": "(Filtrado de _MAX_ necesidades totales)",
                    "sSearch": " Buscar    ",
                    "oPaginate": {
                                    "sNext": "Pag. sig.",
                                    "sPrevious": "Pag. ant."
                                  }
                }

            });
} );


//----- eliminar necesidad ----

function eliminar_necesidad(id_necesidad)
{
  if (confirm('Seguro desea eliminar el necesidad ?')) 
  {     
    
        $.ajax({
                url: CI_ROOT+'index.php/necesidad/baja_necesidad',
                data: { id_necesidad: id_necesidad },
                async: true,
                type: 'POST',
                dataType: 'JSON',
                success: function(data)
                {
                  if(data.error == false)
                  {
                    //alert("Se ha eliminado el necesidad exitosamente");
                    //location.reload();
                    window.location = CI_ROOT+'index.php/necesidad/index'
                  }
                  else
                  {
                    //alert("No se ha eliminado el necesidad");
                    location.reload();
                  }
                },
                error: function(x, status, error){
                  alert(error);
                }
          });   
     
  }
}


/*------- FECHA DE LA NECESIDAD -----*/

jq_dt('.calendario').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy'
  });