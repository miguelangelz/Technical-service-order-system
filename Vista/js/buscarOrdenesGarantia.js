/* 
 * Software creado por Miguel Angel Zhañay Guamán
 * Cifrado y riesgo de demanda por copyright si es necesario  * 
 */
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   async: true, 
   url:"../../Modelo/buscarOrdenesGarantia.php",
   method:"GET",
   data:{query:query},
   success:function(data)
   {
    $('#resultado').html(data);
   }
  });
 }
 
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});


