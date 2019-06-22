<?php
require_once "../../Modelo/servicioTecnico.php";
$db = new Database;
$servicio_domicilio = new ServicioTecnico($db);

if (empty($_POST['submit']))
{
    header("Location:" . ServicioTecnico::baseurl() . "Vista/Tecnico/servicio-domicilio.php");

    exit;
}

$args = array(
    'id' => FILTER_VALIDATE_INT,
    'idCliente' => FILTER_VALIDATE_INT,
    'numero'  => FILTER_SANITIZE_STRING,
    'cliente'  => FILTER_SANITIZE_STRING,
    'direccion'  => FILTER_SANITIZE_STRING,
    'telefono'  => FILTER_VALIDATE_INT,
    'idTecnico'  => FILTER_VALIDATE_INT,
    'tecnico'  => FILTER_SANITIZE_STRING,
    'total'  => FILTER_VALIDATE_FLOAT,
    'subtotal'  => FILTER_VALIDATE_FLOAT,
    'defecto'  => FILTER_SANITIZE_STRING,
    
);

$post = (object)filter_input_array(INPUT_POST, $args);
$servicio_domicilio->setId($post->id);
$servicio_domicilio->setIdCliente($post->idCliente);
$servicio_domicilio->setNumero($post->numero);
$servicio_domicilio->setCliente($post->cliente);
$servicio_domicilio->setDireccion($post->direccion);
$servicio_domicilio->setTelefono($post->telefono);
$servicio_domicilio->setIdTecnico($post->idTecnico);
$servicio_domicilio->setTecnico($post->tecnico);
$servicio_domicilio->setTotal($post->total);
$servicio_domicilio->setSubtotal($post->subtotal);
$servicio_domicilio->setDefecto($post->defecto);
$servicio_domicilio->guardarOrdenDomicilio();

header("Location:" . ServicioTecnico::baseurl() . "Vista/Reportes/pdfOrdenDomicilio.php?orden=$post->id");
