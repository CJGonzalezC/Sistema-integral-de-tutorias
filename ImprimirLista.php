<?php
include 'plantillaasistencia.php';
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
      $clave=$_GET['ClaveAsignaTutor'];
      $query="select * from alumnos inner join carreras where alumnos.ClaveCarrera=carreras.ClaveCarrera and NoControl in (select NoControl from subtablaasigna where ClaveAsignaTutor=$clave )";
      $resultadom=$conexion->query($query);
      
            $quer="select * from tablaasignatutor inner join periodos where periodos.ClaveSemestre=tablaasignatutor.PeriodoGrupo and ClaveAsignaTutor='$clave'";
            $resulta=$conexion->query($quer);
            $row=mysqli_fetch_array($resulta);
            
            $queryp="select Nombre from personal where ClaveMaestro in (select ClaveTutor from tablaasignatutor where ClaveAsignaTutor='$clave')";
            $personal=$conexion->query($queryp);
            $rowm=mysqli_fetch_array($personal);

     
    
$pdf=new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetXY(70,25);
$pdf->SetFont('Arial','B','10');
$pdf->SetXY(10,20);
$pdf->Cell(30,6,'ClaveTutoria: '.$clave,0,0,'C');

$pdf->SetXY(150,20);
$pdf->Cell(30,6,'Tutor: '.$rowm['Nombre'],0,0,'C');


$pdf->SetXY(10,30);

$pdf->Cell(55,6,utf8_decode('FechaAsignación: '.$row['FechaAsignacion']),0,0,'L');
$pdf->Cell(30,6,utf8_decode('Hora: '.($row['HoraFechaTutoria'])),0,0,'L');
$pdf->Cell(40,6,utf8_decode('Periodo: '.($row['NombreSemestre'])),0,0,'L');
$pdf->Cell(30,6,utf8_decode('OficioN: '.($row['OficioNombramiento'])),0,0,'L');

/*
$pdf->SetFont('Arial','B','16');
$pdf->SetXY(10,20);
$pdf->Cell(190,6,'Lista de asistencia',0,0,'C');
*/
//$pdf->Line(10,39,200,39);
$pdf->SetY(40);

$pdf->SetFont('Arial','B','10');
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(232,232,232);

$pdf->Cell(18,10,'NoControl','TL',0,'C',1);
$pdf->Cell(60,10,'Nombre','TL',0,'C',1);
$pdf->Cell(60,10,'Carrera','TL',0,'C',1);
$pdf->Cell(50,10,'','TLR',1,'C',1);

$pdf->SetFont('Arial','','10');
$pdf->SetTextColor(0,0,0);
 //foreach($resultadom as $datosUsuarios)
 while($datosUsuarios=mysqli_fetch_array($resultadom))
{
    $pdf->Cell(18,10,$datosUsuarios['NoControl'],'BL',0,'C');
    $pdf->Cell(60,10,$datosUsuarios['Nombre'],'BL',0,'C');
    $pdf->Cell(60,10,$datosUsuarios['NombreCarrera'],'BL',0,'C');
    $pdf->Cell(50,10,'','BLR',1,'C',0);

 }

//$pdf->SetFont('Arial','B','16');
//$pdf->SetXY(10,-35);
//$pdf->Cell(190,6,''.date('j').' de '.date('M').' del '.date('Y'),0,0,'R');

$pdf->Output();
?>