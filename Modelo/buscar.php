   <?php
require_once "Personas.php";
$db = new Database;
//$client = new Clientes($db);

if(isset($_GET["query"]))
{           
$q = $_GET["query"];
$clients = $db->prepare("SELECT * FROM clientes WHERE cli_cedula LIKE '%" .$q. "%'"
                                                . "OR cli_nombre LIKE '%" .$q. "%'"
                                                . "OR cli_apellido LIKE '%" .$q. "%'"
                                                . "OR cli_empresa LIKE '%" .$q. "%'"
                                                . "OR cli_direccion LIKE '%" .$q. "%'"
                                                . "OR cli_telefono LIKE '%" .$q. "%'"
                                                . "OR cli_celular LIKE '%" .$q. "%'"
                                                . "OR cli_correo LIKE '%" .$q. "%'");        
}else{
$clients = $db->prepare("SELECT * FROM clientes " );
}
$clients->execute();
$cli = $clients->fetchAll(PDO::FETCH_OBJ);
    if(!empty($cli)){
 foreach($cli as $client){                
                    
                         echo  
                        '<tr>'.
                            '<td>'. $client->cli_cedula .'</td>'.
                            '<td>'. $client->cli_nombre .'</td>'.
                            '<td>'. $client->cli_apellido .'</td>'.
                            '<td>'. $client->cli_empresa .'</td>'.
                            '<td>'. $client->cli_direccion .'</td>'.
                            '<td>'. $client->cli_telefono .'</td>'.
                            '<td>'. $client->cli_celular .'</td>'.
                            '<td>'. $client->cli_correo .'</td>'.
                            '<td>
                                <a class="btn btn-primary" href="editarClientes.php?client='. $client->cli_id .'"><i class="fa fa-edit fa-fw"></i> Actualizar</a> 
                                <a class="btn btn-danger" href="../../Controlador/Persona/deleteCliente.php?client='. $client->cli_id .'"><i class="fa fa-trash fa-fw"></i> Borrar</a>   
                            </td>',
                        '</tr> ';
                                 
                    }
     } else
         {
         echo '<div class="alert alert-danger col-lg-12" style="margin-top: 100px">Ningun cliente con esas credenciales a sido registrado</div>
                </div>';
         }        
         
     