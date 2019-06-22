<?php
require_once("Database.php");
$db = new Database();
            $titulo = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);
            $apelli = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

//SQL para selecionar os registros
$resultado_titulo = "SELECT * FROM clientes WHERE cli_nombre LIKE '%".$titulo."%' OR"
        . "                                       cli_apellido LIKE '%".$titulo."%' "
        . "                                       ORDER BY cli_id ASC LIMIT 7";

//Seleciona os registros
$resultado_contenido = $db->prepare($resultado_titulo);
$resultado_contenido->execute();

while($registros = $resultado_contenido->fetch(PDO::FETCH_ASSOC)){
    $data[] = $registros['cli_nombre'];
    $data[] = $registros['cli_apellido'];
}
echo json_encode($data);

?>

