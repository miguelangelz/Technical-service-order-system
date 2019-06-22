<?php
require_once "../../Modelo/servicioTecnico.php";

if (empty($_POST['submit']))
{
    header("Location:" . ServicioTecnico::baseurl() . "Vista/Tecnico/listaOrdenLocalU.php?orden=$post->idTecnico");
    exit;
}
$args = array(
    'id'        => FILTER_VALIDATE_INT,
    'estado'  => FILTER_SANITIZE_STRING,
    'trabajado'  => FILTER_SANITIZE_STRING,
    'reparado'  => FILTER_SANITIZE_STRING,
    'repuestos'  => FILTER_SANITIZE_STRING,
);

$post = (object)filter_input_array(INPUT_POST, $args);

if( $post->id === false )
{
    header("Location:" . ServicioTecnico::baseurl() . "Vista/Tecnico/listaOrdenLocalU.php?orden=$post->idTecnico");
}

$db = new Database;
$servicio_tecnico = new ServicioTecnico($db);
$servicio_tecnico->setId($post->id);
$servicio_tecnico->setEstado($post->estado);
$servicio_tecnico->setTrabajado($post->trabajado);
$servicio_tecnico->setReparado($post->reparado);
$servicio_tecnico->setRepuestos($post->repuestos);
$servicio_tecnico->updateEstado();
header("Location:" . ServicioTecnico::baseurl() . "Vista/Tecnico/listaOrdenLocalU.php?orden=$post->idTecnico");