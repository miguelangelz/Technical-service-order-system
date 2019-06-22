<?php
/* 
 * Software creado por Miguel Angel Zhañay Guamán
 * Cifrado y riesgo de demanda por copyright si es necesario  
 */
require_once "../../Modelo/servicioTecnico.php";
if (empty($_POST['submit']))
{
    header("Location:" . ServicioTecnico::baseurl() . "Vista/Tecnico/servicio-local.php");
    exit;
}
$args = array(
    'equipo'  => FILTER_SANITIZE_STRING,
);

$post = (object)filter_input_array(INPUT_POST, $args);

$db = new Database;
$equipo = new ServicioTecnico($db);
$equipo->setEquipo($post->equipo);
$equipo->guardaEquipo();
header("Location:" . ServicioTecnico::baseurl() . "Vista/Tecnico/servicio-local.php");