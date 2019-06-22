   <?php
require_once "servicioTecnico.php";
$db = new Database;
//$orden = new Clientes($db);

if(isset($_GET["query"]))
{           
$q = $_GET["query"];
$ordens = $db->prepare("SELECT * FROM orden_local OL INNER JOIN users U ON OL.usu_id = U.usu_id WHERE orl_cliente LIKE '%" .$q. "%'"
                                                . "OR usu_nombre LIKE '%" .$q. "%'"
                                                . "OR orl_fecha LIKE '%" .$q. "%'"
                                                . "OR orl_fecha_entrega LIKE '%" .$q. "%'"
                                                . "AND   orl_estado = 'ENTREGADO' OR orl_estado = 'SIN REPARO'");        
}else{
$ordens = $db->prepare("SELECT * FROM orden_local OL INNER JOIN users U ON OL.usu_id = U.usu_id WHERE orl_estado = 'ENTREGADO' OR orl_estado = 'SIN REPARO'" );
}
$ordens->execute();
$cli = $ordens->fetchAll(PDO::FETCH_OBJ);
    if(!empty($cli)){
 foreach($cli as $orden){                
                    
                         echo  
                        '<tr>'.
                            '<td>'. $orden->orl_cliente .'</td>'.
                            '<td>'. $orden->usu_nombre .'</td>'.
                            '<td>'. $orden->orl_fecha.'</td>'.
                            '<td>'. $orden->orl_fecha_entrega .'</td>'.
                            '<td>
                                <a class="btn btn-primary" href="../Reportes/pdfOrdenLocal.php?orden='. $orden->orl_id .'" target="blank"><i class="fa fa-file-pdf-o fa-fw"></i> Vista previa</a> 

                                </td>',
                        '</tr> ';
                        
                       
                                
                    }
     } else
         {
         echo '<div class="alert alert-danger col-lg-12" style="margin-top: 100px">Ninguna orden a sido registrada</div>
                </div>';
         }        
         
     