  
<?php

require '../assets/pdf/fpdf.php';
class reporteOrdenDomicilio extends FPDF{
    
    function Header(){
        $this->SetFont('Arial','B',15);
        $this->Cell(100,10,$this->Image('../assets/img/LOGO_APC.png', $this->GetX()+01, $this->GetY()+5, 30) ,0,"L");
        $this->Cell(10,10,utf8_decode('ORDEN DE SERVICIO TÉCNICO A DOMICILIO'),0,1,'C');
        $this->SetFont('Arial','B',8);
        $this->Cell(80,4,'Matriz : ',0,0,'C');
        $this->SetFont('Arial','',8);
        $this->Cell(20,4,utf8_decode('Cornelio Merchan 1-127 y José Peralta esq'),0,0,'R');
        $this->SetFont('Arial','B',10);
        $this->Cell(40,4,'RUC : 0190341933001',0,1,'L');
        $this->SetFont('Arial','B',8);
        $this->Cell(45,4,'Telfs : ',0,0,'R');
        $this->SetFont('Arial','',8);
        $this->Cell(25,4,'4103067 / 4103069 / 4103072',0,1,'L');
        $this->SetFont('Arial','B',8);
        $this->Cell(80,4,'Centro : ',0,0,'C');
        $this->SetFont('Arial','',8);
        $this->Cell(15,4,utf8_decode('Tomás Ordoñez 6-37 y Juan Jaramillo'),0,1,'R');
        $this->SetFont('Arial','B',8);
        $this->Cell(43,4,'Telf : ',0,0,'R');
        $this->SetFont('Arial','',8);
        $this->Cell(25,4,'2828-797 / 2839-793 / 2828-388 / 2836-364',0,1,'L');
        $this->SetFont('Arial','B',8);
        $this->Cell(88,4,'Mall del Rio : ',0,0,'C');
        $this->SetFont('Arial','',8);
        $this->Cell(10,4,utf8_decode('Av. Felipe II s/n, Piso 2, Of. C-41 - '),0,0,'R');
        $this->SetFont('Arial','B',8);
        $this->Cell(10,4,'Telf : ',0,0,'R');
        $this->SetFont('Arial','',8);
        $this->Cell(25,4,'2887500',0,1,'L');
        $this->SetFont('Arial','',8);
        $this->Cell(117,4,'Email : ventasapc@hotmail.com - web : www.apctecnologia.com',0,1,'R');
        $this->SetFont('Arial','',8);
        $this->Cell(59,4,'Cuenca - Ecuador',0,1,'R');
        
    }
    function Footer() {
        $this->SetY(-60);
        $this->SetFont('Arial','B',8);
        $this->Cell(0,4,utf8_decode('CONDICIONES DE RECEPCIÓN : '),0,1,'L');
        $this->SetFont('Arial','',8);
        $this->MultiCell(0,4,utf8_decode('Abraham Pañi Cajamarca Cia. Ltda. no se responsabiliza por defectos y daños '
                . 'ocultos que no se hayan detectado al momento de ingresar el equipo ni por dispositivos ni accesorios'
                . ' que no se registren en el documento de ingreso.'),0,'L',0);
        $this->SetFont('Arial','B',8);
        $this->Cell(0,4,utf8_decode('OBLIGACIONES DEL CLIENTE : '),0,1,'L');
        $this->SetFont('Arial','',8);
        $this->MultiCell(0,4,utf8_decode('1.- ´Cancelación de valores (50% pedido y 50% entrega) de repuestos que solo se '
                . 'importen bajo pedido, y en caso de servicio que se origine luego del diagnóstico.'),0,'L',0);
        $this->SetFont('Arial','',8);
        $this->MultiCell(0,4,utf8_decode('2.- El costo minimo por revisión del equipo es de $5.60 incluido IVA.'),0,'L',0);
        $this->SetFont('Arial','',8);
        $this->MultiCell(0,4,utf8_decode('3.- Es responsabilidad del cliente mantener un respaldo del software preinstalado'
                . 'y de información adicional(archivos,documentos,fotos,etc)y sistemas preinstalados por el cliente diferente'
                . 'a la configuración original del equipo determinado por el fabricante.'),0,'L',0);
        $this->SetFont('Arial','',8);
        $this->MultiCell(0,4,utf8_decode('4.- Abraham Pañi Cajamarca Cia Ltda. no se responsabiliza por la mercaderia que no'
                . 'se retire despues de 90 dias posterior al aviso de entrega caso contrario la empresa se reserva el derecho'
                . ' de disponer de manera total del equipo del cliente sin opción a reclamo y se cobrará el valor por bodegaje'
                . ' a partir de los 30 días.'),0,'L',0);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
