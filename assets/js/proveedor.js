//---- Validar alta proveedor


jq_va(function(){    

    jq_va('#form_alta_proveedor').validate({
        ignore: "",
        rules :{

                nombre_proveedor : {
                    required : true
                }   
        },
        messages : {  

                nombre_proveedor : {
                     required : "Debe ingresar el nombre del proveedor"
                }   
        },
        submitHandler: function(form) {

            jq_va("#div_loadding_cargar_proveedor").show();
            form.submit();    
        } 
    });    
});  

//---- Validar modificar proveedor

jq_va(function(){    

    jq_va('#form_modifica_proveedor').validate({
        ignore: "",
        rules :{
                id_proveedor : {
                    required : true
                },
                nombre_proveedor : {
                    required : true
                },
                id_rama : {
                    required : true
                }   
        },
        messages : {  

                id_proveedor : {
                     required : "Debe estar el id del proveedor"
                },
                nombre_proveedor : {
                    required : "Debe estar el nombre de la proveedor"
                },
                id_rama : {
                    required : "Debe seleccionar la rama"
                }  
        },
        submitHandler: function(form) {

            jq_va("#div_loadding_modificar_proveedor").show();
            form.submit();    
        } 
    });    
});  

 

//---- Tabla proveedores ----
  
jq_dt(document).ready(function() {
    jq_dt('#tabla_proveedores').dataTable({
                "paging":   true,
                "ordering": true,
                "info":     true,
                "bFilter": true,
                "language": {
                    "lengthMenu": "Mostrando _MENU_ proveedores por pagina.",
                    "zeroRecords": "Ningun proveedor fue encontrado.",
                    "info": "<b> Mostrando pagina _PAGE_ de _PAGES_ </b>",
                    "infoEmpty": "Ningun proveedor disponible",
                    "infoFiltered": "(Filtrado de _MAX_ proveedores totales)",
                    "sSearch": " Buscar    ",
                    "oPaginate": {
                                    "sNext": "Pag. sig.",
                                    "sPrevious": "Pag. ant."
                                  }
                }

            });
} );


//----- eliminar proveedor ----

function eliminar_proveedor(id_proveedor)
{
  if (confirm('Seguro queres eliminar la proveedor ?')) 
  {     
    
        $.ajax({
                url: CI_ROOT+'index.php/proveedor/baja_proveedor',
                data: { id_proveedor: id_proveedor },
                async: true,
                type: 'POST',
                dataType: 'JSON',
                success: function(data)
                {
                  if(data.error == false)
                  {
                    //alert("Se ha eliminado el proveedor exitosamente");
                    location.reload();
                  }
                  else
                  {
                    //alert("No se ha eliminado el proveedor");
                    location.reload();
                  }
                },
                error: function(x, status, error){
                  alert(error);
                }
          });   
     
  }
}