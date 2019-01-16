<?php

require_once('lib/fpdf181/fpdf.php');



class PDF extends FPDF
{
    function Header()
    {       include 'conexion.php';
            $query="select * from tablafirmas where ClaveFirma='1'";
            $resultado=$conexion->query($query);
            $row=mysqli_fetch_array($resultado);
            $NombreTecnologico=$row['NombreTecnologico'];
            
            
            
        $this->Image('./imagenes/sep.png',10,10,30);//datos del logo
        $this->SetFont('Arial','B','15');
        $this->Cell(30);//para que no se encime el logo
        $this->Cell(120,10,$NombreTecnologico,'0','1','C');//sin contorno,sin salto de linea y centrado7
        $this->SetFont('Arial','B','14');
        $this->Cell(170,5,'Registro Actividad','0','0','C');//sin contorno,sin salto de linea y centrado
        $this->Ln(20);//saltos de linea
    }
    
    
    
    function Footer()
    {
        $this->SetY(-15);//15 hacia arriba
        $this->SetFont('Arial','I','15');//arial italica, de 8
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');//sin contorno,sin salto de linea y centrado
        
    }
    
}

?>