<?php
require_once "../../Modelo/Personas.php";

if (empty($_POST['submit']))
{
    header("Location:" . Personas::baseurl() . "Vista/Tecnico/editarUsuario.php");
    exit;
}
$args = array(
    'id'        => FILTER_VALIDATE_INT,
    'username'  => FILTER_SANITIZE_STRING,
    'password'  => FILTER_SANITIZE_STRING,
);

$post = (object)filter_input_array(INPUT_POST, $args);

if( $post->id === false )
{
    header("Location:" . Personas::baseurl() . "Vista/Tecnico/editarUsuario.php");
}

$db = new Database;
$user = new Personas($db);
$user->setId($post->id);
$user->setUsername($post->username);
$user->setPassword($post->password);
$user->actualizarUsuario();
header("Location:" . Personas::baseurl() . "Vista/Tecnico/main.php");