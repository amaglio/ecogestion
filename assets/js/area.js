//---- Validar alta area


jq_va(function(){    

    jq_va('#form_alta_area').validate({
        ignore: "",
        rules :{

                nombre_area : {
                    required : true
                },
                id_rama : {
                    required : true
                }  
        },
        messages : {  

                nombre_area : {
                     required : "Debe ingresar el nombre del area"
                },
                id_rama : {
                    required : "Debe seleccionar la rama"
                }   
        },
        submitHandler: function(form) {

            jq_va("#div_loadding_cargar_area").show();
            form.submit();    
        } 
    });    
});  

//---- Validar modificar area

jq_va(function(){    

    jq_va('#form_modifica_area').validate({
        ignore: "",
        rules :{
                id_area : {
                    required : true
                },
                nombre_area : {
                    required : true
                },
                id_rama : {
                    required : true
                }   
        },
        messages : {  

                id_area : {
                     required : "Debe estar el id del area"
                },
                nombre_area : {
                    required : "Debe estar el nombre de la area"
                },
                id_rama : {
                    required : "Debe seleccionar la rama"
                }  
        },
        submitHandler: function(form) {

            jq_va("#div_loadding_modificar_area").show();
            form.submit();    
        } 
    });    
});  

 

//---- Tabla areas ----
  
jq_dt(document).ready(function() {
    
    jq_dt('#tabla_area').dataTable({
                "paging":   true,
                "ordering": true,
                "info":     true,
                "bFilter": true,
                "language": {
                    "lengthMenu": "Mostrando _MENU_ areas por pagina.",
                    "zeroRecords": "Ningun area fue encontrado.",
                    "info": "<b> Mostrando pagina _PAGE_ de _PAGES_ </b>",
                    "infoEmpty": "Ningun area disponible",
                    "infoFiltered": "(Filtrado de _MAX_ areas totales)",
                    "sSearch": " Buscar    ",
                    "oPaginate": {
                                    "sNext": "Pag. sig.",
                                    "sPrevious": "Pag. ant."
                                  }
                }

            });
} );


//----- eliminar area ----

function eliminar_area(id_area)
{
  if (confirm('Seguro queres eliminar la area ?')) 
  {     
    
        $.ajax({
                url: CI_ROOT+'index.php/area/baja_area',
                data: { id_area: id_area },
                async: true,
                type: 'POST',
                dataType: 'JSON',
                success: function(data)
                {
                  if(data.error == false)
                  {
                    //alert("Se ha eliminado el area exitosamente");
                    //location.reload();
                    window.location = CI_ROOT+'index.php/area/index'
                  }
                  else
                  {
                    //alert("No se ha eliminado el area");
                    location.reload();
                  }
                },
                error: function(x, status, error){
                  alert(error);
                }
          });   
     
  }
}