   <?php
require_once "../Modelo/Database.php";
$db = new Database;
//$orden = new Clientes($db);
if(isset($_POST['cobrar'])){
      $cobrar = $_POST['cobro'];
      $idOrden = $_POST['id_orden'];
      $id = $_POST['id'];
      $tec = $_POST['tecnico'];
      $fec = $_POST['fecha'];
      $tot= $_POST['valor'];
      $est= $_POST['estado'];
      $sql = "UPDATE orden_local SET orl_estado_cobro = :cobrado WHERE orl_id = :id_orden";

$stmt = $db->prepare($sql);
//bind parameterscom"
$stmt->bindValue(":id_orden", $idOrden);
$stmt->bindValue(":cobrado", $cobrar);
$stmt->execute();

    $sql1 = "INSERT INTO sueldos(usu_id,sue_tecnico,sue_fecha,sue_valor,sue_estado)VALUES(:id,:tec,:fec,:tot,:est)";
    $stmt = $db->prepare($sql1);


$stmt->bindValue(":id", $id);
$stmt->bindValue(":tec", $tec);
$stmt->bindParam(":fec", $fec);
$stmt->bindParam(":tot", $tot);
$stmt->bindParam(":est", $est);
$stmt->execute();
unset($stmt);
unset($db);
header("Location:../Vista/caja.php");
}