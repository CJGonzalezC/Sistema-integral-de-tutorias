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

$query="update alumnos set ClaveCarrera='$ClaveCarrera',
Semestre='$Semestre',Sexo='$Sexo',FechaNacimiento='$FechaNacimiento',
PeriodoIngreso='$PeriodoIngreso',Nombre='$Nombre' where NoControl='$NoControl'";

$resultado=$conexion->query($query);

$array=array();
$array=($resultado)?array('exito'=>true):array('exito'=>false);
        
echo json_encode($array);
?>