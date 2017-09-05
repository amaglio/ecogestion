//---- Validar alta cargo


jq_va(function(){    

    jq_va('#form_alta_cargo').validate({
        ignore: "",
        rules :{

                nombre_cargo : {
                    required : true
                },
                area : {
                    required : true
                } 
        },
        messages : {  

                nombre_cargo : {
                    required : "Debe ingresar el nombre del cargo"
                },
                area : {
                    required : "Debe seleccionar el area"
                }    
        },
        submitHandler: function(form) {

            jq_va("#div_loadding_cargar_cargo").show();
            form.submit();    
        } 
    });    
});  

//---- Validar modificar cargo

jq_va(function(){    

    jq_va('#form_modifica_cargo').validate({
        ignore: "",
        rules :{
                id_cargo : {
                    required : true
                },
                nombre_cargo : {
                    required : true
                },
                area : {
                    required : true
                }   
        },
        messages : {  

                id_cargo : {
                     required : "Debe estar el id del cargo"
                },
                nombre_cargo : {
                    required : "Debe estar el nombre de la cargo"
                },
                area : {
                    required : "Debe seleccionar el area"
                }  
        },
        submitHandler: function(form) {

            jq_va("#div_loadding_modificar_cargo").show();
            form.submit();    
        } 
    });    
});  

 

//---- Tabla cargos ----
  
jq_dt(document).ready(function() {
    jq_dt('#tabla_cargo').dataTable({
                "paging":   true,
                "ordering": true,
                "info":     true,
                "bFilter": true,
                "language": {
                    "lengthMenu": "Mostrando _MENU_ cargos por pagina.",
                    "zeroRecords": "Ningun cargo fue encontrado.",
                    "info": "<b> Mostrando pagina _PAGE_ de _PAGES_ </b>",
                    "infoEmpty": "Ningun cargo disponible",
                    "infoFiltered": "(Filtrado de _MAX_ cargos totales)",
                    "sSearch": " Buscar    ",
                    "oPaginate": {
                                    "sNext": "Pag. sig.",
                                    "sPrevious": "Pag. ant."
                                  }
                }

            });
} );


//----- eliminar cargo ----

function eliminar_cargo(id_cargo)
{
  if (confirm('Seguro desea eliminar el cargo ?')) 
  {     
    
        $.ajax({
                url: CI_ROOT+'index.php/cargo/baja_cargo',
                data: { id_cargo: id_cargo },
                async: true,
                type: 'POST',
                dataType: 'JSON',
                success: function(data)
                {
                  if(data.error == false)
                  {
                    //alert("Se ha eliminado el cargo exitosamente");
                    //location.reload();
                    window.location = CI_ROOT+'index.php/cargo/index'
                  }
                  else
                  {
                    //alert("No se ha eliminado el cargo");
                    location.reload();
                  }
                },
                error: function(x, status, error){
                  alert(error);
                }
          });   
     
  }
}