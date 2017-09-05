//---- Validar alta recurso


jq_va(function(){    

    jq_va('#form_alta_recurso').validate({
        ignore: "",
        rules :{

                nombre_recurso : {
                    required : true
                },
                id_rama : {
                    required : true
                }  
        },
        messages : {  

                nombre_recurso : {
                     required : "Debe ingresar el nombre del recurso"
                },
                id_rama : {
                    required : "Debe seleccionar la rama"
                }   
        },
        submitHandler: function(form) {

            jq_va("#div_loadding_cargar_recurso").show();
            form.submit();    
        } 
    });    
});  

//---- Validar modificar recurso

jq_va(function(){    

    jq_va('#form_modifica_recurso').validate({
        ignore: "",
        rules :{
                id_recurso : {
                    required : true
                },
                nombre_recurso : {
                    required : true
                },
                id_rama : {
                    required : true
                }   
        },
        messages : {  

                id_recurso : {
                     required : "Debe estar el id del recurso"
                },
                nombre_recurso : {
                    required : "Debe estar el nombre de la recurso"
                },
                id_rama : {
                    required : "Debe seleccionar la rama"
                }  
        },
        submitHandler: function(form) {

            jq_va("#div_loadding_modificar_recurso").show();
            form.submit();    
        } 
    });    
});  

 

//---- Tabla recursos ----
  
jq_dt(document).ready(function() {
    jq_dt('#tabla_recurso').dataTable({
                "paging":   true,
                "ordering": true,
                "info":     true,
                "bFilter": true,
                "language": {
                    "lengthMenu": "Mostrando _MENU_ recursos por pagina.",
                    "zeroRecords": "Ningun recurso fue encontrado.",
                    "info": "<b> Mostrando pagina _PAGE_ de _PAGES_ </b>",
                    "infoEmpty": "Ningun recurso disponible",
                    "infoFiltered": "(Filtrado de _MAX_ recursos totales)",
                    "sSearch": " Buscar    ",
                    "oPaginate": {
                                    "sNext": "Pag. sig.",
                                    "sPrevious": "Pag. ant."
                                  }
                }

            });
} );


//----- eliminar recurso ----

function eliminar_recurso(id_recurso)
{
  if (confirm('Seguro desear eliminar el recurso ?')) 
  {     
    
        $.ajax({
                url: CI_ROOT+'index.php/recurso/baja_recurso',
                data: { id_recurso: id_recurso },
                async: true,
                type: 'POST',
                dataType: 'JSON',
                success: function(data)
                {
                  if(data.error == false)
                  {
                    //alert("Se ha eliminado el recurso exitosamente");
                    location.reload();
                  }
                  else
                  {
                    //alert("No se ha eliminado el recurso");
                    location.reload();
                  }
                },
                error: function(x, status, error){
                  alert(error);
                }
          });   
     
  }
}