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

$query="update tablaactividadescomplementarias set NombreGenericoActividadComple='$NombreGenericoActividadComple',
NombreActividadComple='$NombreActividadComple',
CriterioActividadComple='$CriterioActividadComple',EvidenciaActividadComple='$EvidenciaActividadComple',
CreditosActividadComple='$CreditosActividadComple',HorasActividadComple='$HorasActividadComple' where ClaveActividadComple='$ClaveActividadComple'";

$resultado=$conexion->query($query);

$array=array();
$array=($resultado)?array('exito'=>true):array('exito'=>false);
        
echo json_encode($array);
?>