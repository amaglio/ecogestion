//---- Validar alta usuario


jq_va(function(){    

    jq_va('#form_alta_usuario').validate({
        ignore: "",
        rules :{

                alias : {
                    required : true
                },
                nombre : {
                    required : true
                },
                apellido : {
                    required : true
                },
                password : {
                    required : true
                }
        },
        messages : {  

                alias : {
                     required : "Debe ingresar el alias del usuario"
                },
                nombre : {
                    required : "Debe ingresar el nombre del usuario"
                },
                apellido : {
                    required : "Debe ingresar el apellido del usuario"
                },
                password : {
                    required : "Debe ingresar el password del usuario"
                } 
        },
        submitHandler: function(form) {

            jq_va("#div_loadding_cargar_usuario").show();
            form.submit();    
        } 
    });    
});  


//---- Validar alta usuario


jq_va(function(){    

    jq_va('#form_cambiar_password').validate({
        ignore: "",
        rules :{

                password_actual : {
                    required : true
                },
                nuevo_password : {
                    required : true
                },
                repite_nuevo_password : {
                    required : true,
                     equalTo: "#nuevo_password",
                } 
        },
        messages : {  

                password_actual : {
                     required : "Debe ingresar su password actual"
                },
                nuevo_password : {
                    required : "Debe ingresar su nuevo password"
                },
                repite_nuevo_password : {
                    required : "Debe repetir su nuevo password",
                     equalTo: "Loa password deben ser iguales"
                } 
        },
        submitHandler: function(form) {

            jq_va("#div_cambiar_password").show();
            form.submit();    
        } 
    });    
});  
//---- Validar modificar usuario

jq_va(function(){    

    jq_va('#form_modificar_usuario').validate({
        ignore: "",
        rules :{
                id_usuario : {
                    required : true
                },
                alias : {
                    required : true
                },
                nombre : {
                    required : true
                },
                apellido : {
                    required : true
                }  
        },
        messages : {  

                id_usuario : {
                     required : "Debe estar el id del usuario"
                },
                alias : {
                     required : "Debe ingresar el alias del usuario"
                },
                nombre : {
                    required : "Debe ingresar el nombre del usuario"
                },
                apellido : {
                    required : "Debe ingresar el apellido del usuario"
                }  
        },
        submitHandler: function(form) {

            jq_va("#div_loadding_modificar_usuario").show();
            form.submit();    
        } 
    });    
});  

//---- Validar desbloquear usuario

jq_va(function(){    

    jq_va('#form_desbloquear_usuario').validate({
        ignore: "",
        rules :{
                id_usuario : {
                    required : true
                },
                password : {
                    required : true
                }
        },
        messages : {  

                id_usuario : {
                     required : "Debe estar el id del usuario"
                },
                password : {
                    required : "Debe ingresar el password para el usuario"
                } 
        },
        submitHandler: function(form) {

            jq_va("#div_loadding_desbloquear_usuario").show();
            form.submit();    
        } 
    });    
}); 

//---- Validar asignar roles

jq_va(function(){    

    jq_va('#form_asignar_roles_usuario').validate({
        ignore: "",
        rules :{
                'rol[]' : {
                    required : true
                } 
        },
        messages : {  

                'rol[]' : {
                     required : "Debe seleccionar algun rol"
                } 
        },
        submitHandler: function(form) {

            form.submit();    
        } 
    });    
}); 
//---- Tabla usuarios ----
  
jq_dt(document).ready(function() {
    jq_dt('#universidades_convenios').dataTable({
                "paging":   true,
                "ordering": true,
                "info":     true,
                "bFilter": true,
                "language": {
                    "lengthMenu": "Mostrando _MENU_ usuarios por pagina.",
                    "zeroRecords": "Ningun usuario fue encontrado.",
                    "info": "<b> Mostrando pagina _PAGE_ de _PAGES_ </b>",
                    "infoEmpty": "Ningun usuario disponible",
                    "infoFiltered": "(Filtrado de _MAX_ usuarios totales)",
                    "sSearch": " Buscar    ",
                    "oPaginate": {
                                    "sNext": "Pag. sig.",
                                    "sPrevious": "Pag. ant."
                                  }
                }

            });
} );


//---- Tabla roles ----
  
jq_dt(document).ready(function() {
    jq_dt('#tabla_roles').dataTable({
                "paging":   false,
                "ordering": true,
                "info":     false,
                "bFilter": false,
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

function eliminar_usuario(id_usuario)
{
  if (confirm('Seguro queres eliminar al usuario ?')) 
  {     
    
        $.ajax({
                url: CI_ROOT+'index.php/usuario/baja_usuario',
                data: { id_usuario: id_usuario },
                async: true,
                type: 'POST',
                dataType: 'JSON',
                success: function(data)
                {
                  if(data.error == false)
                  {
                    //alert("Se ha eliminado el usuario exitosamente");
                    //location.reload();
                    window.location = CI_ROOT+'index.php/usuario/index'
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
