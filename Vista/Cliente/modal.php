<?php  
session_start();
 if(isset($_POST["orden_id"]))  
 {  
      $output = '';  
        require ('../../Modelo/Database.php');
                $id = $_SESSION['orden'];
                $link = new Database; 
                $query = $link->query("SELECT * FROM orden_local OL INNER JOIN"
                . " users U ON OL.usu_id = U.usu_id  WHERE orl_id = '".$_POST["orden_id"]."'");
                    
                        
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      foreach ($query as $row){  
        
           $output .= '  
                 
                <tr>  
                     <td width="30%"><label>FECHA</label></td>  
                     <td width="70%">'.$row["orl_fecha"].'</td>  
                </tr>  
              
                <tr>  
                     <td width="30%"><label>NÚMERO DE ORDEN</label></td>  
                     <td width="70%">'.$row["orl_numero"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>TÉCNICO</label></td>  
                     <td width="70%">'.$row["usu_nombre"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>FECJA DE ENTREGA</label></td>  
                     <td width="70%">'.$row["orl_fecha_entrega"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>TIPO DE EQUIPO</label></td>  
                     <td width="70%">'.$row["orl_tipo"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>ARTICULO</label></td>  
                     <td width="70%">'.$row["orl_articulo"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>MARCA</label></td>  
                     <td width="70%">'.$row["orl_marca"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>MODELO</label></td>  
                     <td width="70%">'.$row["orl_modelo"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>NÚMERO DE SERIE</label></td>  
                     <td width="70%">'.$row["orl_numero_Serie"].'</td>  
                </tr>  
                
                <tr>  
                     <td width="30%"><label>DEFECTO</label></td>  
                     <td width="70%">'.$row["orl_defecto"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>DIAGNÓSTICO</label></td>  
                     <td width="70%">'.$row["orl_diagnostico"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>OBSERVACIONES</label></td>  
                     <td width="70%">'.$row["orl_observacion"].'</td>  
                </tr>
                
                     <td width="30%"><label>GARANTIA</label></td>  
                     <td width="70%">'.$row["orl_garantia"].'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>SUBTOTAL</label></td>  
                     <td width="70%">'.$row["orl_subtotal"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>IVA 12%</label></td>  
                     <td width="70%">'.$row["orl_iva"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>TOTAL</label></td>  
                     <td width="70%">'.$row["orl_total"].'</td>  
                </tr> 
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
