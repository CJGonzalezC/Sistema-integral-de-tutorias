<?php
require 'conexion.php';
session_start();
//validar que se haya creado una session si no redirijir a index.php
if(!isset($_SESSION['ClaveMaestro']))
{
        header("Location:index.php");
}


foreach($_POST as $variable=>$valor)
{
    $swap=$variable;
    $$variable=$valor;
}

$que="Insert into alumnos(NoControl,ClaveCarrera,Semestre,Sexo,FechaNacimiento,PeriodoIngreso,Nombre)
values ('$NoControl','$ClaveCarrera','$Semestre','$Sexo','$FechaNacimiento','$PeriodoIngreso','$Nombre')";

$resultadoinsert=$conexion->query($que);

$nuevo=array();
$nuevo=($resultadoinsert)?array('exito'=>true):array('exito'=>false);
        
echo json_encode($nuevo);
?>
