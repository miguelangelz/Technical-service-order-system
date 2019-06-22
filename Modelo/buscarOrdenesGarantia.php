<?php

/* 
 * Software creado por Miguel Angel Zhañay Guamán
 * Cifrado y riesgo de demanda por copyright si es necesario  * 
 */
require_once "servicioTecnico.php";
$db = new Database;
//$orden = new Clientes($db);

if(isset($_GET["query"]))
{           
$q = $_GET["query"];
$ordens = $db->prepare("SELECT * FROM orden_garantia OG INNER JOIN users U ON OG.usu_id = U.usu_id WHERE org_cliente LIKE '%" .$q. "%'"
                                                . "OR org_lugar LIKE '%" .$q. "%'"
                                                . "OR org_fecha LIKE '%" .$q. "%'"
                                                . "OR org_num_factura LIKE '%" .$q. "%'");        
}else{
$ordens = $db->prepare("SELECT * FROM orden_garantia OG INNER JOIN users U ON OG.usu_id = U.usu_id " );
}
$ordens->execute();
$cli = $ordens->fetchAll(PDO::FETCH_OBJ);
    if(!empty($cli)){
 foreach($cli as $orden){                
                    
                         echo  
                        '<tr>'.
                            '<td>'. $orden->org_cliente .'</td>'.
                            '<td>'. $orden->org_lugar .'</td>'.
                            '<td>'. $orden->org_fecha.'</td>'.
                            '<td>'. $orden->org_num_factura .'</td>'.
                            '<td>
                                <a class="btn btn-primary" href="../Reportes/pdfOrdenGarantia.php?orden='. $orden->org_id .'" target="blank"><i class="fa fa-file-pdf-o fa-fw"></i> Vista previa</a> 
                                </td>',
                        '</tr> ';
                        
                       
                                
                    }
     } else
         {
         echo '<div class="alert alert-danger col-lg-12" style="margin-top: 100px">Ninguna orden a sido registrada</div>
                </div>';
         }        
         
     
