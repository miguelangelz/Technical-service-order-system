

<?php

include './reporteOrdenDomicilio.php';
require '../../Modelo/Database.php';
$db = new Database;

        $id = filter_input(INPUT_GET, 'orden', FILTER_VALIDATE_INT);
           if($_GET['orden']){
             $ordenes = $db->prepare("SELECT * FROM orden_domicilio OD INNER JOIN clientes C ON OD.cli_id = C.cli_id WHERE ord_id = $id ");
           } 
$ordenes->execute();
$ord = $ordenes->fetchAll(PDO::FETCH_OBJ);

date_default_timezone_set('America/Lima');
$fecha = date('Y-m-d');

  $pdf = new reporteOrdenDomicilio();
  $pdf->AliasNbPages($alias = '{nb}');
  $pdf->AddPage();
   $pdf->Ln();
  foreach ($ord as $result){
       $pdf->SetFont('Arial','B',15);
  $pdf->Cell(60,4,utf8_decode('NUMERO DE ORDEN : '),0,0,'L');
  $pdf->SetFont('Arial','B',15);
  $pdf->Cell(35,4,$result->ord_numero,0,1,'L');
  $pdf->Ln();
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(36,4,utf8_decode('Fecha de recepción : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(35,4,$result->ord_fecha,0,0,'L');

  $pdf->Ln();
  /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(15,4,utf8_decode('Cliente : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(56,4,utf8_decode($result->ord_cliente),0,0,'L');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(25,4,utf8_decode('Dirección : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(38,4,utf8_decode($result->ord_direccion),0,0,'L');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(10,4,'Telf : ',0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(10,4,$result->ord_telefono,0,1,'L');
    $pdf->Ln();
      /*****************************************************************************************************/

  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(30,4,utf8_decode('Daño reportado : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->MultiCell(0,4,utf8_decode($result->ord_defecto),0,'L',0);
  $pdf->Ln();

    $pdf->Ln();
      /*****************************************************************************************************/
      $pdf->SetFont('Arial','B',10);
  $pdf->Cell(40,4,utf8_decode('Técnico responsable : '),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->MultiCell(0,4,utf8_decode($result->ord_tecnico),0,'L',0);
  $pdf->Ln();

    $pdf->Ln();
      /*****************************************************************************************************/

  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(80,4,utf8_decode('VALOR TOTAL A COBRAR INCLUIDO IVA : '),0,0,'L');
    $pdf->SetFillColor(161,168,166);
  $pdf->SetFont('Arial','',15);
  $pdf->Cell(30,7,$result->ord_total,1,1,'L',1);
  $pdf->Ln();
    /*****************************************************************************************************/
  }
$pdf->Output();
?>

