<?php
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

   $clave=$_GET['NoControl'];
 
      $query="select * from alumnos as a inner join carreras as c where c.ClaveCarrera=a.ClaveCarrera and NoControl in (select ControlAlumno from subtablaliberaciones where ControlAlumno='$clave')";
      $resultadom=$conexion->query($query);
      $row=mysqli_fetch_array($resultadom);
      
      
//para info de firmas
        $que="select * from tablafirmas where ClaveFirma='1'";
        $resul=$conexion->query($que);
        $ro=mysqli_fetch_array($resul);


$pdf=new FPDF();


$pdf->AddPage();

$pdf->SetFont('Arial','I','18');
$pdf->SetXY(45,70);
$pdf->Cell(70,10,utf8_decode('Constancia de Acreditación de Tutorías'),0,1);

$pdf->SetFont('Arial','B','14');
$pdf->SetXY(20,80);
$pdf->Cell(70,10,utf8_decode($ro['JefeServiciosEscolares']));

$pdf->SetXY(20,87);
$pdf->SetFont('Arial','B','12');
$pdf->Cell(70,10,'Jefe del departamento de Servicios Escolares');

$pdf->SetXY(20,95);
$pdf->SetFont('Arial','','12');
$pdf->Cell(70,10,'Del '.$ro['NombreTecnologico']);

$pdf->SetXY(20,105);
$pdf->SetFont('Arial','','15');
$pdf->Cell(70,10,'PRESENTE.-');


$pdf->SetFont('Arial','','11');
$pdf->SetXY(20,120);
$pdf->Cell(0,0,utf8_decode('Por medio de la presente se hace constar que'));
//$pdf->Cell(30,6,'ClaveLiberacion: '.$clave,0,0,'C');

 $pdf->SetFont('Arial','B','11');
 $pdf->SetXY(20,127);
 $pdf->Cell(40,0,'Nombre de Alumno: ');
  $pdf->SetFont('Arial','','11');
 $pdf->Cell(0,0,$row['Nombre']);
 
 $pdf->SetFont('Arial','B','11');
 $pdf->SetXY(20,134);
 $pdf->Cell(25,0,'No Control: ');
  $pdf->SetFont('Arial','','11');
  $pdf->Cell(20,0,$row['NoControl']);
   $pdf->SetFont('Arial','B','11');
   $pdf->Cell(33,0,' de la Carrera de ');
    $pdf->SetFont('Arial','','11');
    $pdf->Cell(0,0,$row['NombreCarrera']);
 
 
 $pdf->SetFont('Arial','','10');
 $pdf->SetXY(20,143);
 $pdf->Cell(120,0,utf8_decode('Cumplió con los requisitos necesarios para acreditar la actividad complementaria de TUTORIAS'),0,1);
$pdf->SetXY(20,150);
 $pdf->Cell(128,0,utf8_decode('(Talleres, Conferencias, sesiones individuales y grupales), con valor curricular de '),0);    
 $pdf->SetFont('Arial','B','10');
 $pdf->Cell(120,0,utf8_decode('2(Dos Creditos)'));  
 
 
$pdf->SetFont('Arial','','10');
$pdf->SetXY(20,170);
$pdf->Cell(120,0,'Se extiende la presente el dia '.date('j').' de '.date('M').' del '.date('Y'));

$pdf->SetXY(20,180);
$pdf->SetFont('Arial','','11');
$pdf->Cell(170,0,'ATENTAMENTE',0,0,'C');

$pdf->SetXY(20,188);
$pdf->SetFont('Arial','I','11');
$pdf->Cell(170,0,'"'.$ro['LemaTecnologico'].'"',0,0,'C');

$pdf->SetXY(20,230);
$pdf->SetFont('Arial','B','11');
$pdf->Cell(80,0,utf8_decode($ro['CoordinadorTutorias']),0,0,'C');
$pdf->Cell(80,0,utf8_decode($ro['JefeDesarrolloAcademico']),0,0,'C');

$pdf->SetXY(20,235);
$pdf->SetFont('Arial','B','11');
$pdf->Cell(80,0,'Coordinador/a Tutorias',0,0,'C');
$pdf->Cell(80,0,'Jefe/a Desarrollo Academico',0,0,'C');


$pdf->Output();
?>