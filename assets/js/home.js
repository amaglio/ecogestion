function cancelar_solicitud_cobro(id_movimiento)
{
  $( "#dialog_cancelar_solicitud_pago" ).dialog({
      autoOpen: true,
      modal: true,
      closeOnEscape: true,
      draggable: true,
      resizable: false,
      width: "40%",
      buttons: {
        "Aceptar": function() { 
            
            $.ajax({
                  url: CI_ROOT+'index.php/operar/procesa_cancelar_cobro',
                  data: { id_movimiento: id_movimiento },
                  async: false,
                  type: 'POST',
                  dataType: 'JSON',
                  success: function(data)
                  {
                     if(data.error == false)
                    {
                      location.reload();
                    }
                    else
                    {
                      alert("No se ha eliminado la etiqueta");
                    } 
                  },
                  error: function(x, status, error){
                    alert(status);
                  }
            }); 
 
        },
        Cancelar: function() {
          $( this ).dialog( "close" );
        }
      } 

    }); 
}
/*
function pagar_solicitud_cobro(id_movimiento)
{
   
}
*/