<?php
require_once "../../Modelo/servicioTecnico.php";
$db = new Database;
$servicio_tecnico = new ServicioTecnico($db);

if (empty($_POST['submit']))
{
    header("Location:" . ServicioTecnico::baseurl() . "Vista/Tecnico/servicio-local.php");

    exit;
}

$args = array(
    'id' => FILTER_VALIDATE_INT,
    'idCliente' => FILTER_SANITIZE_STRING,
    'numero'  => FILTER_SANITIZE_STRING,
    'cliente'  => FILTER_SANITIZE_STRING,
    'direccion'  => FILTER_SANITIZE_STRING,
    'telefono'  => FILTER_SANITIZE_STRING,
    'celular' => FILTER_SANITIZE_STRING,
    'idTecnico'  => FILTER_VALIDATE_INT,
    'fecha'  => FILTER_SANITIZE_STRING,
    'articulo'  => FILTER_SANITIZE_STRING,
    'defecto'  => FILTER_SANITIZE_STRING,
    'diagnostico'  => FILTER_SANITIZE_STRING,
    'marca'  => FILTER_SANITIZE_STRING,
    'modelo'  => FILTER_SANITIZE_STRING,
    'numero_serie'  => FILTER_SANITIZE_STRING,
    'observacion'  => FILTER_SANITIZE_STRING,
    'tipo'  => FILTER_SANITIZE_STRING,
    'total'  => FILTER_VALIDATE_INT,
    'subtotal'  => FILTER_VALIDATE_INT,
    'iva'  => FILTER_VALIDATE_INT,
    'garantia'  => FILTER_SANITIZE_STRING,
    'software' => FILTER_SANITIZE_STRING,
    'marcaDisco'  => FILTER_SANITIZE_STRING,
    'capaDisco' => FILTER_SANITIZE_STRING,
    'serieDisco' => FILTER_SANITIZE_STRING,
    'marcaAda'  => FILTER_SANITIZE_STRING,
    'capaAda' => FILTER_SANITIZE_STRING,
    'serieAda' => FILTER_SANITIZE_STRING,
    'marcaBat'  => FILTER_SANITIZE_STRING,
    'capaBat' => FILTER_SANITIZE_STRING,
    'serieBat' => FILTER_SANITIZE_STRING,
    'marcaMem'  => FILTER_SANITIZE_STRING,
    'capaMem' => FILTER_SANITIZE_STRING,
    'serieMem' => FILTER_SANITIZE_STRING,
    'accesorio' => FILTER_SANITIZE_STRING,
    'trabajado' => FILTER_SANITIZE_STRING,
    'reparado' => FILTER_SANITIZE_STRING,
    'repuestos' => FILTER_SANITIZE_STRING,
);

$post = (object)filter_input_array(INPUT_POST, $args);


$servicio_tecnico->setId($post->id);
$servicio_tecnico->setIdCliente($post->idCliente);
$servicio_tecnico->setNumero($post->numero);
$servicio_tecnico->setCliente($post->cliente);
$servicio_tecnico->setDireccion($post->direccion);
$servicio_tecnico->setTelefono($post->telefono);
$servicio_tecnico->setCelular($post->celular);
$servicio_tecnico->setIdTecnico($post->idTecnico);
$servicio_tecnico->setFecha($post->fecha);
$servicio_tecnico->setArticulo($post->articulo);
$servicio_tecnico->setDefecto($post->defecto);
$servicio_tecnico->setDiagnostico($post->diagnostico);
$servicio_tecnico->setMarca($post->marca);
$servicio_tecnico->setModelo($post->modelo);
$servicio_tecnico->setNumeroSerie($post->numero_serie);
$servicio_tecnico->setObservacion($post->observacion);
$servicio_tecnico->setTipo($post->tipo);
$servicio_tecnico->setTotal($post->total);
$servicio_tecnico->setSubtotal($post->subtotal);
$servicio_tecnico->setIva($post->iva);
$servicio_tecnico->setGarantia($post->garantia);
$servicio_tecnico->setSoftware($post->software);
$servicio_tecnico->setMarcaDis($post->marcaDisco);
$servicio_tecnico->setCapaDis($post->capaDisco);
$servicio_tecnico->setSerieDis($post->serieDisco);
$servicio_tecnico->setMarcaAda($post->marcaAda);
$servicio_tecnico->setCapaAda($post->capaAda);
$servicio_tecnico->setSerieAda($post->serieAda);
$servicio_tecnico->setMarcaBat($post->marcaBat);
$servicio_tecnico->setCapaBat($post->capaBat);
$servicio_tecnico->setSerieBat($post->serieBat);
$servicio_tecnico->setMarcaMem($post->marcaMem);
$servicio_tecnico->setCapaMem($post->capaMem);
$servicio_tecnico->setSerieMem($post->serieMem);
$servicio_tecnico->setAccesorio($post->accesorio);
$servicio_tecnico->setTrabajado($post->trabajado);
$servicio_tecnico->setReparado($post->reparado);
$servicio_tecnico->setRepuestos($post->repuestos);
$servicio_tecnico->guardarOrdenLocal();

header("Location:" . ServicioTecnico::baseurl() . "Vista/Reportes/pdfOrdenLocal.php?orden=$post->id");