<?php  
session_start();
 if(isset($_POST["orden_id"]))  
 {  
      $output = '';  
        require ('../../Modelo/Database.php');
                $id = $_SESSION['orden'];
                $link = new Database; 
                $query = $link->query("SELECT * FROM orden_domicilio WHERE ord_id = '".$_POST["orden_id"]."'");
                    
                        
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      foreach ($query as $row){  
        
           $output .= '  
                <tr>  
                     <td width="30%"><label>NOMBRE</label></td>  
                     <td width="70%">'.$row["ord_cliente"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>DIRECCIÓN</label></td>  
                     <td width="70%">'.$row["ord_direccion"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>TELÉFONO</label></td>  
                     <td width="70%">'.$row["ord_telefono"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>FECHA</label></td>  
                     <td width="70%">'.$row["ord_fecha"].'</td>  
                </tr>  
               
                <tr>  
                     <td width="30%"><label>NÚMERO DE ORDEN</label></td>  
                     <td width="70%">'.$row["ord_numero"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>TÉCNICO</label></td>  
                     <td width="70%">'.$row["usu_id"].'</td>  
                </tr>  
                
                <tr>  
                     <td width="30%"><label>DEFECTO</label></td>  
                     <td width="70%">'.$row["ord_defecto"].'</td>  
                </tr>  

                <tr>  
                     <td width="30%"><label>SUBTOTAL</label></td>  
                     <td width="70%">'.$row["ord_subtotal"].'</td>  
                </tr>  
               
                <tr>  
                     <td width="30%"><label>TOTAL</label></td>  
                     <td width="70%">'.$row["ord_total"].'</td>  
                </tr> 
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
