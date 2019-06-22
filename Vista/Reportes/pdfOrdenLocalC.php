<?php
include 'reporteOrdenLocal.php';
require '../../Modelo/Database.php';
$db = new Database;

        $id = filter_input(INPUT_GET, 'orden', FILTER_VALIDATE_INT);
           if($_GET['orden']){
             $ordenes = $db->prepare("SELECT * FROM orden_local OL INNER JOIN clientes C ON OL.cli_id = C.cli_id WHERE orl_id = $id ");
           } 
$ordenes->execute();
$ord = $ordenes->fetchAll(PDO::FETCH_OBJ);

date_default_timezone_set('America/Lima');
$fecha = date('Y-m-d');

  $pdf = new reporteOrdenLocal();
  $pdf->AliasNbPages($alias = '{nb}');
  $pdf->AddPage();
   $pdf->Ln();
  foreach ($ord as $result){
       $pdf->SetFont('Arial','B',15);
  $pdf->Cell(60,4,utf8_decode('NUMERO DE ORDEN : '),0,0,'L');
  $pdf->SetFont('Arial','B',15);
  $pdf->Cell(35,4,$result->orl_numero,0,1,'L');
  $pdf->Ln();
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(36,4,utf8_decode('Fecha de recepción : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(35,4,$result->orl_fecha,0,0,'L');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(33,4,utf8_decode('Fecha de entrega : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(30,4,$result->orl_fecha_entrega,0,0,'L');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(20,4,utf8_decode('Garantia : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(10,4,$result->orl_garantia,0,1,'L');
  $pdf->Ln();
  /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(15,4,utf8_decode('Cliente : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(56,4,$result->orl_cliente,0,0,'L');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(25,4,'Cedula/RUC : ',0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(38,4,$result->cli_cedula,0,0,'L');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(10,4,'Telf : ',0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(10,4,$result->orl_telefono,0,1,'L');
    $pdf->Ln();
      /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(19,4,utf8_decode('Dirección : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(52,4,utf8_decode($result->orl_direccion),0,0,'L');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(15,4,'Celular : ',0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(30,4,$result->cli_celular,0,0,'L');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(10,4,'Mail : ',0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(10,4,utf8_decode($result->cli_correo),0,1,'L');
    $pdf->Ln();
      /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(15,4,'Equipo : ',0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(56,4,$result->orl_tipo,0,0,'L');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(15,4,utf8_decode('Marca : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(30,4,$result->orl_marca,0,0,'L');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(12,4,utf8_decode('Serie : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(10,4,$result->orl_numero_Serie,0,1,'L');
  $pdf->Ln();
    /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(30,4,utf8_decode('Daño reportado : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->MultiCell(0,4,utf8_decode($result->orl_defecto),0,'L',0);
  $pdf->Ln();
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(45,4,utf8_decode('Estado fisico del equipo : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->MultiCell(0,4,utf8_decode($result->orl_observacion),0,'L',0);
    $pdf->Ln();
      /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(33,4,'Trabajo Realizado : ',0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(75,4,utf8_decode($result->orl_trabajado),0,0,'L');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(20,4,'Reparado : ',0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->MultiCell(0,4,utf8_decode($result->orl_reparado),0,'L',0);
  $pdf->Ln();
    /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(25,4,'Accesorios : ',0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(75,4,utf8_decode($result->orl_accesorios),0,1,'L');
      $pdf->Ln();
        /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(15,4,utf8_decode('Descripción de las partes internas del equipo ingresado '),0,1,'L');
  $pdf->Ln();
    /*****************************************************************************************************/
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,'',0,0,'L');
   $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,5,'MARCA',1,0,'C');
   $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,5,'CAPACIDAD',1,0,'C');
   $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,5,'SERIE',1,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,'',0,0,'L');
   $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,5,'MARCA',1,0,'C');
   $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,5,'CAPACIDAD',1,0,'C');
   $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,5,'SERIE',1,1,'C');
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,5,'DISCO DURO',1,0,'L');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5, utf8_decode($result->orl_dism),1,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,$result->orl_disc,1,0,'C');
   $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,5,$result->orl_diss,1,0,'C');
   $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,5,'MEMORIA',1,0,'L');
   $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,5,utf8_decode($result->orl_memm),1,0,'C');
   $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,5,$result->orl_memc,1,0,'C');
   $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,5,$result->orl_mems,1,1,'C');
   $pdf->Cell(24,5,'BATERIA',1,0,'L');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5, utf8_decode($result->orl_batm),1,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,$result->orl_batc,1,0,'C');
   $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,5,$result->orl_bats,1,0,'C');
   $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,5,'ADAPTADOR',1,0,'L');
   $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,5,utf8_decode($result->orl_adam),1,0,'C');
   $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,5,$result->orl_adac,1,0,'C');
   $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,5,$result->orl_adas,1,1,'C');
 $pdf->Ln();
   /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(10,4,utf8_decode('Otros: '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->MultiCell(0,4,utf8_decode($result->orl_articulo),0,'L',0);
  $pdf->Ln();
    /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(40,4,utf8_decode('Repuestos utilizados: '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->MultiCell(0,4,utf8_decode($result->orl_repuestos),0,'L',0);
  $pdf->Ln();
    /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(80,4,utf8_decode('VALOR TOTAL A COBRAR INCLUIDO IVA : '),0,0,'L');
    $pdf->SetFillColor(161,168,166);
  $pdf->SetFont('Arial','',15);
  $pdf->Cell(30,7,$result->orl_total,1,1,'L',1);
  $pdf->Ln();
    /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(30,4,utf8_decode('Observaciónes : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->MultiCell(0,4,utf8_decode($result->orl_observacion),0,'L',0);
  }
$pdf->Output();
?>
