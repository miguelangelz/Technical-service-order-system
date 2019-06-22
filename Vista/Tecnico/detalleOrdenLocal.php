<?php  
session_start();
 if(isset($_POST["orden_id"]))  
 {  
      $output = '';  
        require ('../Modelo/Database.php');
                $link = new Database; 
                $query = $link->query("SELECT * FROM orden_local WHERE orl_id = '".$_POST["orden_id"]."'");
                    
                        
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      foreach ($query as $row){  
        
           $output .= '  
                <tr>  
                     <td width="25%"><label>NOMBRE</label></td>  
                     <td width="25%">'.$row["orl_cliente"].'</td> 
                         <td width="25%"><label>ORDEN N°</label></td>  
                     <td width="25%">'.$row["orl_numero"].'</td> 
                </tr> 
                <tr>  
                     <td width="25%"><label>CELULAR</label></td>  
                     <td width="25%">'.$row["orl_celular"].'</td>
                     <td width="25%"><label>TELÉFONO</label></td>  
                     <td width="25%">'.$row["orl_telefono"].'</td>
                </tr>   
                <tr>  
                     <td width="25%"><label>ARTICULO</label></td>  
                     <td width="25%">'.$row["orl_articulo"].'</td> 
                         <td width="25%"><label>MARCA</label></td>  
                     <td width="25%">'.$row["orl_marca"].'</td> 
                </tr>   
                <tr>  
                     <td width="25%"><label>MODELO</label></td>  
                     <td width="25%">'.$row["orl_modelo"].'</td> 
                         <td width="25%"><label>N° DE SERIE</label></td>  
                     <td width="25%">'.$row["orl_numero_Serie"].'</td> 
                </tr>   
                <tr>  
                     
                         <td width="25%"><label>DEFECTO</label></td>  
                     <td width="25%">'.$row["orl_defecto"].'</td> 
                </tr>  
                <tr>  
                     <td width="25%"><label>DIAGNÓSTICO</label></td>  
                     <td width="25%">'.$row["orl_diagnostico"].'</td>
                         <td width="25%"><label>OBSERVACIONES</label></td>  
                     <td width="25%">'.$row["orl_observacion"].'</td>
                </tr>  
                <tr>  
                     <td width="25%"><label>SOFTWARE A INSTALAR</label></td>  
                     <td width="25%">'.$row["orl_software"].'</td>  
                </tr>
               
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
