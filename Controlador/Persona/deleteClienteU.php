<?php
require_once "../../Modelo/Personas.php";
$db = new Database;
$client = new Personas($db);
$id = filter_input(INPUT_GET, 'client', FILTER_VALIDATE_INT);

if( $id )
{
    $client->setId($id);
    $client->eliminarCLiente();
}
header("Location:" . Personas::baseurl() . "Vista/Tecnico/listaClientesU.php");