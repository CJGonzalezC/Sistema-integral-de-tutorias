<?php
require 'conexion.php';
session_start();
//validar que se haya creado una session si no redirijir a index.php
if(!isset($_SESSION['ClaveMaestro']))
{
        header("Location:index.php");
}


$ClaveActividad=$_POST['ClaveActividad'];
$NoControl=$_POST['NoControl'];

$verifica="select * from subtablaactividades where ClaveActividad='$ClaveActividad' and NoControl='$NoControl'";
$resultadoverifica=$conexion->query($verifica);
$r=mysqli_fetch_array($resultadoverifica);
//if($r['ClaveActividad']==$ClaveActividad && $r['NoControl']==$NoControl)
if(empty($r))//verifica si hay un alumnos registrado en esa actividad
{
$query="Insert into subtablaactividades (ClaveActividad,NoControl) values ('$ClaveActividad','$NoControl')";
$resultadoins=$conexion->query($query);
$array=array();
$array=($resultadoins)?array('exito'=>true):array('exito'=>false);
}
else
{
$array=array('exito'=>false);
}

                                        
echo json_encode($array);

?>