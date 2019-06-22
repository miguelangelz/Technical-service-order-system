<?php
require_once "../../Modelo/Personas.php";
if (empty($_POST['submit']))
{
    header("Location:" . Personas::baseurl() . "Vista/Administrador/agregarUsuario.php");
    exit;
}

$args = array(
    'nombre'  => FILTER_SANITIZE_STRING,
    'username'  => FILTER_SANITIZE_STRING,
    'password'  => FILTER_SANITIZE_STRING,
    'direccion'  => FILTER_SANITIZE_STRING,
    'tipo'  => FILTER_SANITIZE_STRING,
);

$post = (object)filter_input_array(INPUT_POST, $args);

$db = new Database;
$user = new Personas($db);
$user->setNombre($post->nombre);
$user->setUsername($post->username);
$user->setPassword($post->password);
$user->setDireccion($post->direccion);
$user->settipo($post->tipo);
$user->guardarUsuario();
header("Location:" . Personas::baseurl() . "Vista/Administrador/listaUsuarios.php");