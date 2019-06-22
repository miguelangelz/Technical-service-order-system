<?php
require_once "../../Modelo/servicioTecnico.php";

if (empty($_POST['submit']))
{
    header("Location:" . ServicioTecnico::baseurl() . "Vista/Administrador/editarOrdenLocal.php");
    exit;
}
$args = array(
    'id'        => FILTER_VALIDATE_INT,
    'estado'  => FILTER_SANITIZE_STRING,
    'fecha'  => FILTER_SANITIZE_STRING,
    'observacion'  => FILTER_SANITIZE_STRING,
    'subtotal'  => FILTER_SANITIZE_STRING,
    'total'  => FILTER_SANITIZE_STRING,

);

$post = (object)filter_input_array(INPUT_POST, $args);

if( $post->id === false )
{
    header("Location:" . ServicioTecnico::baseurl() . "Vista/Administrador/editarOrdenLocal.php");
}

$db = new Database;
$client = new ServicioTecnico($db);
$client->setId($post->id);
$client->setEstado($post->estado);
$client->setFecha($post->fecha);
$client->setObservacion($post->observacion);
$client->setSubtotal($post->subtotal);
$client->setTotal($post->total);

$client->update();
header("Location:" . ServicioTecnico::baseurl() . "Vista/Administrador/listaOrdenLocal.php?orden=$post->idTecnico");