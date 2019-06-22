<?php
require_once "../../Modelo/Personas.php";

if (empty($_POST['submit']))
{
    header("Location:" . Personas::baseurl() . "Vista/Administrador/editarAdmin.php");
    exit;
}
$args = array(
    'id' => FILTER_VALIDATE_INT,
    'nombre' => FILTER_SANITIZE_STRING,
    'username'  => FILTER_SANITIZE_STRING,
    'password'  => FILTER_SANITIZE_STRING,
    'direccion'  => FILTER_SANITIZE_STRING,
    'tipo'  => FILTER_SANITIZE_STRING,
);

$post = (object)filter_input_array(INPUT_POST, $args);

if( $post->id === false )
{
    header("Location:" . Personas::baseurl() . "Vista/Administrador/editarAdmin.php");
}

$db = new Database;
$user = new Personas($db);
$user->setId($post->id);
$user->setNombre($post->nombre);
$user->setUsername($post->username);
$user->setPassword($post->password);
$user->setDireccion($post->direccion);
$user->setTipo($post->tipo);
$user->actualizarUsuario();
header("Location:" . Personas::baseurl() . "Vista/Administrador/listaUsuarios.php");