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

$Claveasigna=$_POST['ClaveAsignaTutor'];
$NoControl=$_POST['NoControl'];



$query="delete from subtablaasigna where NoControl='$NoControl' and ClaveAsignaTutor='$Claveasigna'";
$resultado=$conexion->query($query);

$array=array();
$array=($resultado)?array('exito'=>true):array('exito'=>false);
                                        
echo json_encode($array);
?>