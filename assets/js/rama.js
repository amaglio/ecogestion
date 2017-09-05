//---- Validar alta rama


jq_va(function(){    

    jq_va('#form_alta_rama').validate({
        ignore: "",
        rules :{

                nombre_rama : {
                    required : true
                } 
        },
        messages : {  

                nombre_rama : {
                     required : "Debe ingresar el nombre del rama"
                } 
        },
        submitHandler: function(form) {

            jq_va("#div_loadding_cargar_rama").show();
            form.submit();    
        } 
    });    
});  

//---- Validar modificar rama

jq_va(function(){    

    jq_va('#form_modifica_rama').validate({
        ignore: "",
        rules :{
                id_rama : {
                    required : true
                },
                nombre_rama : {
                    required : true
                }  
        },
        messages : {  

                id_rama : {
                     required : "Debe estar el id del rama"
                },
                nombre_rama : {
                    required : "Debe estar el nombre de la rama"
                } 
        },
        submitHandler: function(form) {

            jq_va("#div_loadding_modificar_rama").show();
            form.submit();    
        } 
    });    
});  

 

//---- Tabla ramas ----
  
jq_dt(document).ready(function() {
    jq_dt('#tabla_rama').dataTable({
                "paging":   true,
                "ordering": true,
                "info":     true,
                "bFilter": true,
                "language": {
                    "lengthMenu": "Mostrando _MENU_ ramas por pagina.",
                    "zeroRecords": "Ningun rama fue encontrado.",
                    "info": "<b> Mostrando pagina _PAGE_ de _PAGES_ </b>",
                    "infoEmpty": "Ningun rama disponible",
                    "infoFiltered": "(Filtrado de _MAX_ ramas totales)",
                    "sSearch": " Buscar    ",
                    "oPaginate": {
                                    "sNext": "Pag. sig.",
                                    "sPrevious": "Pag. ant."
                                  }
                }

            });
} );


//----- eliminar rama ----

function eliminar_rama(id_rama)
{   
    //CI_ROOT  : "/rama/index";

  if (confirm('Seguro desea eliminar la rama?')) 
  {     
       
        
        $.ajax({
                url: CI_ROOT+'index.php/rama/baja_rama',
                data: { id_rama: id_rama },
                async: true,
                type: 'POST',
                dataType: 'JSON',
                success: function(data)
                {
                  if(data.error == false)
                  {
                    //alert("Se ha eliminado el rama exitosamente");
                    //location.reload();
                    window.location = CI_ROOT+'index.php/rama/index'
                  }
                  else
                  {
                    //alert("No se ha eliminado el rama");
                    location.reload();
                  }
                },
                error: function(x, status, error){
                  alert(error);
                }
          });   
     
  }
}