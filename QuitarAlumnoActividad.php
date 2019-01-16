<?php
require 'conexion.php';
session_start();
//validar que se haya creado una session si no redirijir a index.php
if(!isset($_SESSION['ClaveMaestro']))
{
        header("Location:index.php");
}


//$Claveasigna=$_POST['ClaveAsignaTutor'];
$NoControl=$_POST['NoControl'];
$ClaveActividad=$_POST['ClaveActividad'];



$query="delete from subtablaactividades where NoControl='$NoControl' and ClaveActividad='$ClaveActividad'";
$resultado=$conexion->query($query);

$array=array();
$array=($resultado)?array('exito'=>true):array('exito'=>false);
                                        
echo json_encode($array);
?>