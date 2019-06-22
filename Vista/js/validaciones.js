function calculo() {
    
    //tasa de impuesto
    var tasa = 12;

    //monto a calcular el impuesto
    var monto = $("input[name=subtotal]").val();

    //calsulo del impuesto
    var iva = (monto * tasa) / 100;

    //se carga el iva en el campo correspondien te
    $("input[name=iva]").val(iva);

    //se carga el total en el campo correspondiente
    $("input[name=total]").val(parseFloat(monto) + parseFloat(iva));
    }
function calculoSoftware() {
    var si = document.getElementById('optionsRadiosInline1');
    var no = document.getElementById('optionsRadiosInline2');
    if(si.checked === true){
    //tasa de impuesto
    var tasa = 12;
    
    //monto a calcular el impuesto
    var monto = $("input[name=precio]").val();

    //calsulo del impuesto
    var iva = (monto * tasa) / 100;

    $("input[name=iva]").val(iva);
    //se carga el total en el campo correspondiente
    $("input[name=precioIva]").val(parseFloat(monto) + parseFloat(iva));
}else if(no.checked === true){
    
    var sinIva = "";
    $("input[name=precioIva]").val(sinIva);

}
}
    function filterFloat(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;    
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{       
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 0) {     
              return true;              
          }else if(key == 46){
                if(filter(tempValue)=== false){
                    return false;
                }else{       
                    return true;
                }
          }else{
              return false;
          }
    }
}
function disable() {
    document.getElementById('subtotal').disable = true;
}
function enable() {
    document.getElementById('subtotal').disabled = false;
}
    function mostrarReferencia() {

        if (document.fcontacto.solicitud[1].checked == true) {

            document.getElementById('desdeotro').style.display = 'block';

        } else {

            document.getElementById('desdeotro').style.display = 'none';
        }
    }
    
      