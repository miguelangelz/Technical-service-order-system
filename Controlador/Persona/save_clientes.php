<?php
require_once "../../Modelo/Personas.php";
if (empty($_POST['submit']))
{
    header("Location:" . Personas::baseurl() . "Vista/Tecnico/clientes.php");
    exit;
}

$args = array(
    'cedula'  => FILTER_SANITIZE_NUMBER_INT,
    'nombre'  => FILTER_SANITIZE_STRING,
    'apellido'  => FILTER_SANITIZE_STRING,
    'empresa'  => FILTER_SANITIZE_STRING,
    'direccion'  => FILTER_SANITIZE_STRING,
    'telefono'  => FILTER_SANITIZE_NUMBER_INT,
    'celular'  => FILTER_SANITIZE_STRING,
    'correo'  => FILTER_SANITIZE_EMAIL,
 
);

$post = (object)filter_input_array(INPUT_POST, $args);

$db = new Database;
$client = new Personas($db);
$client->setCedula($post->cedula);
$client->setNombre($post->nombre);
$client->setApellido($post->apellido);
$client->setEmpresa($post->empresa);
$client->setDireccion($post->direccion);
$client->setTelefono($post->telefono);
$client->setCelular($post->celular);
$client->setCorreo($post->correo);
$client->guardarCliente();
header("Location:" . Personas::baseurl() . "Vista/Tecnico/main.php");
 