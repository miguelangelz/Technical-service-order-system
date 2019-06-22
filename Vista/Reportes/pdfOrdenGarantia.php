<?php
/* 
 * Software creado por Miguel Angel Zhañay Guamán
 * Cifrado y riesgo de demanda por copyright si es necesario  * 
 */
include './reporteOrdenGarantia.php';
require '../../Modelo/Database.php';
$db = new Database;

        $id = filter_input(INPUT_GET, 'orden', FILTER_VALIDATE_INT);
           if($_GET['orden']){
             $ordenes = $db->prepare("SELECT * FROM orden_garantia OG INNER JOIN clientes C ON OG.cli_id = C.cli_id WHERE org_id = $id ");
           } 
$ordenes->execute();
$ord = $ordenes->fetchAll(PDO::FETCH_OBJ);

  $pdf = new reporteOrdenGarantia();
  $pdf->AliasNbPages($alias = '{nb}');
  $pdf->AddPage();
   $pdf->Ln();
  foreach ($ord as $result){
      $pdf->SetFont('Arial','B',15);
  $pdf->Cell(60,4,utf8_decode('NUMERO DE ORDEN : '),0,0,'L');
  $pdf->SetFont('Arial','B',15);
  $pdf->Cell(35,4,$result->org_numero,0,1,'L');
  $pdf->Ln();
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(36,4,utf8_decode('Fecha de recepción : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(35,4,$result->org_fecha,0,0,'L');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(35,4,utf8_decode('Lugar de recepción : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(50,4,utf8_decode($result->org_lugar),0,0,'L');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(20,4,utf8_decode('Nro Factura : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(10,4,$result->org_num_factura,0,1,'L');
  $pdf->Ln();
  /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(15,4,utf8_decode('Cliente : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(56,4,$result->org_cliente,0,0,'L');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(25,4,'Cedula/RUC : ',0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(60,4,$result->org_cedula,0,0,'L');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(10,4,'Telf : ',0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(10,4,$result->org_telefono,0,1,'L');
    $pdf->Ln();
      /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(19,4,utf8_decode('Dirección : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(52,4,utf8_decode($result->org_direccion),0,0,'L');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(15,4,'Celular : ',0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(30,4,$result->org_celular,0,0,'L');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(10,4,'Mail : ',0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(10,4,utf8_decode($result->org_mail),0,1,'L');
    $pdf->Ln();
      /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(15,4,'Equipo : ',0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(71,4,$result->org_equipo,0,0,'L');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(15,4,utf8_decode('Marca : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(30,4,$result->org_marca,0,1,'L');
   $pdf->Ln();
      /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(25,4,'Serie Equipo : ',0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(60,4,$result->org_serie_equipo,0,0,'L');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(27,4,utf8_decode('Serie Cargador : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(30,4,$result->org_serie_cargador,0,1,'L');
  $pdf->Ln();
    /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(12,4,utf8_decode('Daño : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->MultiCell(0,4,utf8_decode($result->org_danio),0,'L',0);
  $pdf->Ln();
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(60,4,utf8_decode('Observaciones fisicas del equipo : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->MultiCell(0,4,utf8_decode($result->org_observaciones),0,'L',0);
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
  $pdf->Cell(24,5, utf8_decode($result->org_dism),1,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,$result->org_disc,1,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,$result->org_diss,1,0,'C');
   $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,5,'MEMORIA',1,0,'L');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,utf8_decode($result->org_memm),1,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,$result->org_memc,1,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,$result->org_mems,1,1,'C');
   $pdf->Cell(24,5,'BATERIA',1,0,'L');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5, utf8_decode($result->org_batm),1,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,$result->org_batc,1,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,$result->org_bats,1,0,'C');
   $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,5,'ADAPTADOR',1,0,'L');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,utf8_decode($result->org_adam),1,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,$result->org_adac,1,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,$result->org_adas,1,1,'C');
 $pdf->Ln();
   /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(12,4,utf8_decode('Otros: '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->MultiCell(0,4,utf8_decode($result->org_otros),0,'L',0);
  $pdf->Ln();
    /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(25,4,utf8_decode('Diagnostico: '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->MultiCell(0,4,utf8_decode($result->org_diagnostico),0,'L',0);
  $pdf->Ln();
    /*****************************************************************************************************/

  }
$pdf->Output();
?>

