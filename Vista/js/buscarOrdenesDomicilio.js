/* 
 * Software creado por Miguel Angel Zhañay Guamán
 * Cifrado y riesgo de demanda por copyright si es necesario  * 
 */
$(document).ready(function(){

 carga_datos();

 function carga_datos(orden)
 {
  $.ajax({
   async: true, 
   url:"../../Modelo/buscarOrdenesDomicilio.php",
   method:"GET",
   data:{orden:orden},
   success:function(data)
   {
    $('#resultadoOrdenes').html(data);
   }
  });
 }
 
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search !== '')
  {
   carga_datos(search);
  }
  else
  {
   carga_datos();
  }
 });
});

