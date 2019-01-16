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

$que="update tablaactividades set FechaActividad='$FechaActividad',NombreActividad='$NombreActividad',
HorasActividad='$HorasActividad',SemestreActividad='$SemestreActividad',ActividadComple='$ActividadComple' where ClaveActividad='$ClaveActividad'";

$resultadoinsert=$conexion->query($que);

$nuevo=array();
$nuevo=($resultadoinsert)?array('exito'=>true):array('exito'=>false);
        
echo json_encode($nuevo);
?>