   <?php
require_once "servicioTecnico.php";
$db = new Database;
//$orden = new Clientes($db);

if(isset($_GET["orden"]))
{           
$q = $_GET["orden"];
$ordens = $db->prepare("SELECT * FROM orden_domicilio OD INNER JOIN users U ON OD.usu_id = U.usu_id WHERE ord_cliente LIKE '%" .$q. "%'"
                                                . "OR ord_tecnico LIKE '%" .$q. "%'"
                                                . "OR ord_fecha LIKE '%" .$q. "%'");        
}else{
$ordens = $db->prepare("SELECT * FROM orden_domicilio OD INNER JOIN users U ON OD.usu_id = U.usu_id " );
}
$ordens->execute();
$cli = $ordens->fetchAll(PDO::FETCH_OBJ);
    if(!empty($cli)){
 foreach($cli as $orden){                
                    
                         echo  
                        '<tr>'.
                            '<td>'. $orden->ord_cliente .'</td>'.
                            '<td>'. $orden->ord_tecnico .'</td>'.
                            '<td>'. $orden->ord_fecha .'</td>'.
                            '<td>
                                <a class="btn btn-primary" href="../Reportes/pdfOrdenDomicilio.php?orden='. $orden->ord_id .'" target="blank"><i class="fa fa-file-pdf-o fa-fw"></i> Vista previa</a> 
                            </td>',
                        '</tr> ';
                        
                       
                                
                    }
     } else
         {
         echo '<div class="alert alert-danger col-lg-12" style="margin-top: 100px">Ninguna orden a sido registrada</div>
                </div>';
         }        
         
     