<?php
require '../assets/pdf/fpdf.php';
require '../../Modelo/Database.php';
$db = new Database;
class pdfOrdenLocal extends FPDF
{
     function Header()
   {
   
  $this->SetFont('Arial','B',10);
  $this->Cell(36,27,utf8_decode(''),0,1,'L');


   }
}
        $id = filter_input(INPUT_GET, 'orden', FILTER_VALIDATE_INT);
           if($_GET['orden']){
             $ordenes = $db->prepare("SELECT * FROM orden_local OL INNER JOIN clientes C ON OL.cli_id = C.cli_id WHERE orl_id = $id ");
           } 
           
$ordenes->execute();
$ord = $ordenes->fetchAll(PDO::FETCH_OBJ);

date_default_timezone_set('America/Lima');
$fecha = date('Y-m-d');

  $pdf = new pdfOrdenLocal();
//  $pdf->AliasNbPages($alias = '{nb}');
  $pdf->AddPage();
   
  foreach ($ord as $result){
//       $pdf->SetFont('Arial','B',15);
//  $pdf->Cell(60,4,utf8_decode('NUMERO DE ORDEN : '),0,0,'L');
//  $pdf->SetFont('Arial','B',15);
//  $pdf->SetTextColor(255,0,0);
//  $pdf->Cell(35,4,$result->orl_numero,0,1,'L');
 
  
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(35,4,utf8_decode(''),0,0,'L');
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(35,3,$result->orl_fecha,0,0,'L');
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(45,3,utf8_decode(''),0,0,'L');
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(45,3,$result->orl_fecha_entrega,0,0,'L');
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(10,3,utf8_decode(''),0,0,'L');
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(10,3,$result->orl_garantia,0,1,'L');
  $pdf->Ln();
  /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(15,3,utf8_decode(''),0,0,'L');
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(56,3,$result->orl_cliente,0,0,'L');
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(35,3,'',0,0,'L');
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(38,3,$result->cli_cedula,0,0,'L');
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(25,3,'',0,0,'L');
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(10,3,$result->orl_telefono,0,1,'L');
    $pdf->Ln();
      /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(19,3,utf8_decode(''),0,0,'L');
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(52,3,utf8_decode($result->orl_direccion),0,0,'L');
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(35,3,'',0,0,'L');
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(30,3,$result->cli_celular,0,0,'L');
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(10,3,'',0,0,'L');
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(10,3,utf8_decode($result->cli_correo),0,1,'L');
    $pdf->Ln();
      /****************************************************************************************************/
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(15,3,'',0,0,'L');
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(56,3,$result->orl_tipo,0,0,'L');
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(35,3,utf8_decode(''),0,0,'L');
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(30,3,$result->orl_marca,0,0,'L');
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(20,3,utf8_decode(''),0,0,'L');
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(10,3,$result->orl_numero_Serie,0,1,'L');
  $pdf->Ln();
    /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(30,4,utf8_decode(''),0,0,'L');
  $pdf->SetFont('Arial','',8);
  $pdf->MultiCell(0,4,utf8_decode($result->orl_defecto),0,'L',0);
  $pdf->Ln();
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(33,9,'',0,1,'C');
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(45,4,utf8_decode(''),0,0,'L');
  $pdf->SetFont('Arial','',8);
  $pdf->MultiCell(0,4,utf8_decode($result->orl_observacion),0,'L',0);
    $pdf->Ln();
      /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(33,4,'',0,1,'C');
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(33,4,'',0,0,'L');
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(75,4,utf8_decode($result->orl_trabajado),0,0,'L');
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(1,4,'',0,0,'L');
  $pdf->SetFont('Arial','',8);
  $pdf->MultiCell(0,4,utf8_decode($result->orl_reparado),0,'L',0);
  $pdf->Ln();
    /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(33,22,'',0,1,'C');
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(25,4,'',0,0,'L');
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(75,4,utf8_decode($result->orl_accesorios),0,1,'L');
      $pdf->Ln();
    /*****************************************************************************************************/
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,4,'',0,1,'L');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,8,'',0,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,8,'',0,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,8,'',0,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,8,'',0,0,'L');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,8,'',0,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,8,'',0,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,8,'',0,1,'C');
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,'',0,0,'L');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(15,5, utf8_decode($result->orl_dism),0,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,$result->orl_disc,0,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,$result->orl_diss,0,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,'',0,0,'L');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(20,5,utf8_decode($result->orl_memm),0,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,$result->orl_memc,0,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,$result->orl_mems,0,1,'C');
   $pdf->Cell(24,5,'',0,0,'L');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(15,5, utf8_decode($result->orl_batm),0,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,$result->orl_batc,0,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,$result->orl_bats,0,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,'',0,0,'L');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(20,5,utf8_decode($result->orl_adam),0,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,$result->orl_adac,0,0,'C');
   $pdf->SetFont('Arial','',8);
  $pdf->Cell(24,5,$result->orl_adas,0,1,'C');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(25,10,utf8_decode(''),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(0,10,utf8_decode($result->orl_articulo),0,1,'L');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(40,4,utf8_decode(''),0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->MultiCell(0,4,utf8_decode($result->orl_repuestos),0,'L',0);
  $pdf->Ln();
    /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(33,15,'',0,1,'C');
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(60,4,utf8_decode(''),0,0,'L');
  $pdf->SetFont('Arial','',15);
  $pdf->Cell(30,7,$result->orl_total,0,1,'L');
    /*****************************************************************************************************/
  $pdf->SetFont('Arial','B',2);
  $pdf->Cell(30,4,'zz',0,1,'L');
  $pdf->SetFont('Arial','B',2);
  $pdf->Cell(30,4,'zz',0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->MultiCell(0,4,utf8_decode($result->orl_observacion),0,'L',0);
  }
$pdf->Output();

?>
