<?php
require_once "../../Modelo/Personas.php";

if (empty($_POST['submit']))
{
    header("Location:" . Personas::baseurl() . "Vista/Administrador/editarClientes.php");
    exit;
}
$args = array(
    'id'        => FILTER_VALIDATE_INT,
    'cedula'  => FILTER_SANITIZE_STRING,
    'nombre'  => FILTER_SANITIZE_STRING,
    'apellido'  => FILTER_SANITIZE_STRING,
    'empresa'  => FILTER_SANITIZE_STRING,
    'direccion'  => FILTER_SANITIZE_STRING,
    'telefono'  => FILTER_SANITIZE_STRING,
    'celular'  => FILTER_SANITIZE_STRING,
    'correo'  => FILTER_SANITIZE_STRING,
);

$post = (object)filter_input_array(INPUT_POST, $args);

if( $post->id === false )
{
    header("Location:" . Personas::baseurl() . "Vista/Administrador/editarClientes.php");
}

$db = new Database;
$client = new Personas($db);
$client->setId($post->id);
$client->setCedula($post->cedula);
$client->setNombre($post->nombre);
$client->setApellido($post->apellido);
$client->setEmpresa($post->empresa);
$client->setDireccion($post->direccion);
$client->setTelefono($post->telefono);
$client->setCelular($post->celular);
$client->setCorreo($post->correo);
$client->actualizarCliente();
header("Location:" . Personas::baseurl() . "Vista/Administrador/listaClientes.php");