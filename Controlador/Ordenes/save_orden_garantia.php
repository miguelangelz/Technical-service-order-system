<?php

/* 
 * Software creado por Miguel Angel ZhaÃ±ay GuamÃ¡n
 * Cifrado y riesgo de demanda por copyright si es necesario  * 
 */
require_once "../../Modelo/servicioTecnico.php";
$db = new Database;
$servicio_garantia = new ServicioTecnico($db);

if (empty($_POST['submit']))
{
    header("Location:" . ServicioTecnico::baseurl() . "Vista/Tecnico/servicioGarantia.php");

    exit;
}

$args = array(
        'id' => FILTER_VALIDATE_INT,
    'idCliente' => FILTER_SANITIZE_STRING,
    'idTecnico'  => FILTER_SANITIZE_STRING,
    'numero'  => FILTER_SANITIZE_STRING,
    'lugar'  => FILTER_SANITIZE_STRING,
    'factura'  => FILTER_SANITIZE_STRING,
    'cliente'  => FILTER_SANITIZE_STRING,
    'direccion'  => FILTER_SANITIZE_STRING,
    'cedula'  => FILTER_SANITIZE_STRING,
    'telefono'  => FILTER_SANITIZE_STRING,
    'celular' => FILTER_SANITIZE_STRING,
    'correo'  => FILTER_SANITIZE_STRING,
    'tipo'  => FILTER_SANITIZE_STRING,
    'marca'  => FILTER_SANITIZE_STRING,
    'numero_serie'  => FILTER_SANITIZE_STRING,
    'serieCargador'  => FILTER_SANITIZE_STRING,
    'defecto'  => FILTER_SANITIZE_STRING,
    'observacion'  => FILTER_SANITIZE_STRING,
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
    'articulo'  => FILTER_SANITIZE_STRING,
    'diagnostico'  => FILTER_SANITIZE_STRING,
    'vendedor'  => FILTER_SANITIZE_STRING,
    'garantia'  => FILTER_SANITIZE_STRING,
    'transportista'  => FILTER_SANITIZE_STRING,
    'proveedor'  => FILTER_SANITIZE_STRING,    
    'numeroFactura'  => FILTER_VALIDATE_INT,
    'guia'  => FILTER_VALIDATE_INT,

);

$post = (object)filter_input_array(INPUT_POST, $args);


$servicio_garantia->setId($post->id);
$servicio_garantia->setIdCliente($post->idCliente);
$servicio_garantia->setIdTecnico($post->idTecnico);
$servicio_garantia->setNumero($post->numero);
$servicio_garantia->setLugar($post->lugar);
$servicio_garantia->setNumeroFactura($post->factura);
$servicio_garantia->setCliente($post->cliente);
$servicio_garantia->setDireccion($post->direccion);
$servicio_garantia->setCedula($post->cedula);
$servicio_garantia->setTelefono($post->telefono);
$servicio_garantia->setCelular($post->celular);
$servicio_garantia->setCorreo($post->correo);
$servicio_garantia->setEquipo($post->tipo);
$servicio_garantia->setMarca($post->marca);
$servicio_garantia->setNumeroSerie($post->numero_serie);
$servicio_garantia->setSerieCargador($post->serieCargador);
$servicio_garantia->setDefecto($post->defecto);
$servicio_garantia->setObservacion($post->observacion);
$servicio_garantia->setMarcaDis($post->marcaDisco);
$servicio_garantia->setCapaDis($post->capaDisco);
$servicio_garantia->setSerieDis($post->serieDisco);
$servicio_garantia->setMarcaAda($post->marcaAda);
$servicio_garantia->setCapaAda($post->capaAda);
$servicio_garantia->setSerieAda($post->serieAda);
$servicio_garantia->setMarcaBat($post->marcaBat);
$servicio_garantia->setCapaBat($post->capaBat);
$servicio_garantia->setSerieBat($post->serieBat);
$servicio_garantia->setMarcaMem($post->marcaMem);
$servicio_garantia->setCapaMem($post->capaMem);
$servicio_garantia->setSerieMem($post->serieMem);
$servicio_garantia->setArticulo($post->articulo);
$servicio_garantia->setDiagnostico($post->diagnostico);
$servicio_garantia->setVendedor($post->vendedor);
$servicio_garantia->setGarantia($post->garantia);
$servicio_garantia->setTransportista($post->transportista);
$servicio_garantia->setProveedor($post->proveedor);
$servicio_garantia->setFacturaEmpresa($post->numeroFactura);
$servicio_garantia->setNumeroGuia($post->guia);
$servicio_garantia->guardarOrdenGarantia();

header("Location:" . ServicioTecnico::baseurl() . "Vista/Reportes/pdfOrdenGarantia.php?orden=$post->id");
