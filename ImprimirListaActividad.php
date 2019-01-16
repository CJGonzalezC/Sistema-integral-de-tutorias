<?php
include 'plantilla.php';
require 'conexion.php';
session_start();
//validar que se haya creado una session si no redirijir a index.php
if(!isset($_SESSION['ClaveMaestro']))
{
        header("Location:index.php");
}
else
{
    //que el usuario sea de tipo administrador si no redirijir a welcome
        if(!($_SESSION['Tipo']=='A'))
        {
             header("Location:welcome.php");   
        }
        
}
require_once('lib/fpdf181/fpdf.php');
                //$usuarios=new Usuarios;
      $clave=$_GET['ClaveActividad'];
      $query="select * from alumnos inner join carreras where alumnos.ClaveCarrera=carreras.ClaveCarrera and NoControl in (select NoControl from subtablaactividades where ClaveActividad=$clave )";
      $resultadom=$conexion->query($query);
      
            $quer="select * from tablaactividades inner join periodos where periodos.ClaveSemestre=tablaactividades.SemestreActividad and ClaveActividad='$clave'";
            $resulta=$conexion->query($quer);
            $row=mysqli_fetch_array($resulta);
            $ClaveComple=$row['ActividadComple'];
            
            $queryp="select * from tablaactividadescomplementarias where ClaveActividadComple='$ClaveComple'";
            $p=$conexion->query($queryp);
            $rowm=mysqli_fetch_array($p);

     
    
$pdf=new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetXY(70,25);
$pdf->SetFont('Arial','B','10');
$pdf->SetXY(10,20);
$pdf->Cell(30,6,'Clave Actividad: '.$clave,0,0,'C');

$pdf->SetXY(150,20);
$pdf->Cell(30,6,utf8_decode('Fecha Actividad: '.$row['FechaActividad']),0,0,'C');

$pdf->SetXY(80,25);
$pdf->Cell(30,6,utf8_decode($row['NombreSemestre']),0,0,'C');


$pdf->SetXY(10,30);

$pdf->MultiCell(160,6,'Actividad Complementaria: '.$rowm['NombreActividadComple'],0,'L',0);




$pdf->SetY(42);

$pdf->SetFont('Arial','B','10');
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(232,232,232);

$pdf->Cell(18,10,'NoControl','TL',0,'C',1);
$pdf->Cell(60,10,'Nombre','TL',0,'C',1);
$pdf->Cell(60,10,'Carrera','TL',0,'C',1);
$pdf->Cell(50,10,'','TLR',1,'C',1);

$pdf->SetFont('Arial','','10');
$pdf->SetTextColor(0,0,0);

 while($datosUsuarios=mysqli_fetch_array($resultadom))
{
    $pdf->Cell(18,10,$datosUsuarios['NoControl'],'BL',0,'C');
    $pdf->Cell(60,10,$datosUsuarios['Nombre'],'BL',0,'C');
    $pdf->Cell(60,10,$datosUsuarios['NombreCarrera'],'BL',0,'C');
    $pdf->Cell(50,10,'','BLR',1,'C',0);

 }



$pdf->Output();
?>