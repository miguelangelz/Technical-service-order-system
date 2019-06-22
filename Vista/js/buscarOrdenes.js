$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   async: true, 
   url:"../../Modelo/buscarOrdenes.php",
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
/****
 * 
 * @ordenes a domicilio*
 * *
 * *
 * *
 */

