<?php
require_once "../Modelo/servicioDomicilio.php";

if (empty($_POST['submit']))
{
    header("Location:" . ServicioDomicilio::baseurl() . "Vista/editarOrdenDomicilio.php");
    exit;
}
$args = array(
    'id'        => FILTER_VALIDATE_INT,
    'idTecnico'        => FILTER_VALIDATE_INT,
    'estado'  => FILTER_SANITIZE_STRING,
    'subtotal'  => FILTER_SANITIZE_STRING,
    'total'  => FILTER_SANITIZE_STRING,

);

$post = (object)filter_input_array(INPUT_POST, $args);

if( $post->id === false )
{
    header("Location:" . ServicioDomicilio::baseurl() . "Vista/editarOrdenDomicilio.php");
}

$db = new Database;
$orden_domicilio = new ServicioDomicilio($db);
$orden_domicilio->setId($post->id);
$orden_domicilio->setIdTecnico($post->idTecnico);
$orden_domicilio->setEstado($post->estado);
$orden_domicilio->setSubtotal($post->subtotal);
$orden_domicilio->setTotal($post->total);

$orden_domicilio->update();
header("Location:" . ServicioDomicilio::baseurl() . "Vista/listaOrdenDomicilio.php?orden=$post->idTecnico");