jq_val(function(){

  jq_val("#cargando").hide();   
});

jq_val(function(){

        jq_val('#form_logueo').validate({

            rules :{

                    usuario : {
                        required : true
                    },
                    password : {
                        required : true
                    }
            },
            messages : {

                    usuario : {
                        required : "Debe ingresar su usuario."
                    },

                    password : {
                        required :  "Debe ingresar su password."
                    }
            },
             submitHandler: function(form) {

               jq_val('#cargando').show();
                form.submit();
               
            }

        });    
}); 

// password anterior distinto a password nuevo

jq_val.validator.addMethod("password_nuevo", function(value, element) {

  
  if( jq_val('#password_nuevo').val() ==  jq_val('#password_anterior').val() )
  {
    return false; 
  }
  else
  {
    return true; 
  } 
 
 
}, "El password nuevo tiene que ser distinto al viejo");

jq_val(function(){

        jq_val('#form_cambiar_primer_password').validate({

            rules :{

                    alias : {
                        required : true
                    },
                    password_anterior : {
                        required : true
                    },
                    password_nuevo : {
                        required : true,
                        password_nuevo: true
                    },
                    repite_password_nuevo : {
                        required : true,
                        equalTo: '#password_nuevo'
                    }
            },
            messages : {

                    alias : {
                        required : "Debe ingresar su usuario"
                    },
                    password_anterior : {
                        required :  "Debe ingresar su password anterior"
                    },
                    password_nuevo : {
                        required :  "Debe ingresar su nuevo password"
                    },
                    repite_password_nuevo : {
                        required :  "Debe repetir su nuevo password",
                        equalTo: "Los passwords no coinciden"
                    }
            },
             submitHandler: function(form) {

               jq_val('#cargando').show();
                form.submit();
               
            }

        });    
}); 