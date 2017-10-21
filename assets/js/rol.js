
jq_puro( document ).ready(function() 
{   
    jq_puro( ".modulos_check").each(function() 
     {  
        if(this.checked) 
        {
            jq_puro('#'+this.value).show();            
        }
        else
        {
            jq_puro('#'+this.value).hide();
        
        }
    });

    jq_puro(".modulos_check").change(function() {

        if(this.checked) 
        {
            jq_puro('#'+this.value).show();
            jq_puro( ".submodulos_check_"+this.value ).prop( "checked", true );

            
        }
        else
        {
            jq_puro('#'+this.value).hide();
            jq_puro( ".submodulos_check_"+this.value ).prop( "checked", false );
 
        }
    }); 


    jq_puro(".submodulos").change(function() {
        
        var todos_uncheck = 0;

            jq_puro( ".submodulos_check_"+this.title ).each(function() 
             {  

                var c = this.checked;
                 
                if (this.checked) 
                {
                    todos_uncheck = 1;
                }


            });

            if( todos_uncheck == 0)
            {
              jq_puro( "#modulo_"+this.title ).prop( "checked", false );
              jq_puro('#'+this.title).hide();
            } 
    }); 
});

//---- Validar alta usuario


jq_va(function(){    

    jq_va('#form_alta_rol').validate({
        ignore: "",
        rules :{

                rol : {
                    required : true
                },
                'id_modulo[]' : {
                    required : true
                }
        },
        messages : {  

                rol : {
                     required : "Debe ingresar el nombre del rol"
                },
                'id_modulo[]' : {
                     required : "Debe seleccionar algun modulo"
                }
        },
        submitHandler: function(form) {

            jq_va("#div_loadding_crear_rol").show();
            form.submit();    
        } 
    });    
});  

//---- Validar modificar usuario

jq_va(function(){    

    jq_va('#form_modifica_rol').validate({
        ignore: "",
        rules :{
                id_rol : {
                    required : true
                },
                rol : {
                    required : true
                }
        },
        messages : {  

                id_rol : {
                     required : "Debe estar el id del rol"
                },
                rol : {
                     required : "Debe ingresar el nombre del rol"
                }
        },
        submitHandler: function(form) {

            jq_va("#div_loadding_modificar_rol").show();
            form.submit();    
        } 
    });    
});  

 

//---- Tabla roles ----
  
jq_dt(document).ready(function() {
    jq_dt('#tabla_roles').dataTable({
                "paging":   true,
                "ordering": true,
                "info":     true,
                "bFilter": true,
                "language": {
                    "lengthMenu": "Mostrando _MENU_ roles por pagina.",
                    "zeroRecords": "Ningun rol fue encontrado.",
                    "info": "<b> Mostrando pagina _PAGE_ de _PAGES_ </b>",
                    "infoEmpty": "Ningun rol disponible",
                    "infoFiltered": "(Filtrado de _MAX_ roles totales)",
                    "sSearch": " Buscar    ",
                    "oPaginate": {
                                    "sNext": "Pag. sig.",
                                    "sPrevious": "Pag. ant."
                                  }
                }

            });
} );


//----- eliminar usuario ----

function eliminar_rol(id_rol)
{
  if (confirm('Seguro desea eliminar el rol? El rol sera desasignado de todos los usuarios')) 
  {     
    
        $.ajax({
                url: CI_ROOT+'index.php/rol/baja_rol',
                data: { id_rol: id_rol },
                async: true,
                type: 'POST',
                dataType: 'JSON',
                success: function(data)
                {
                  if(data.error == false)
                  {
                    //alert("Se ha eliminado el usuario exitosamente");
                    //location.reload();
                    window.location = CI_ROOT+'index.php/rol/index'
                  }
                  else
                  {
                    //alert("No se ha eliminado el usuario");
                    location.reload();
                  }
                },
                error: function(x, status, error){
                  alert(error);
                }
          });   
     
  }
}
