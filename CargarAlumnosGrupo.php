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

$verifica="select * from subtablaasigna where ClaveAsignaTutor='$Claveasigna' and NoControl='$NoControl'";
$resultadoverifica=$conexion->query($verifica);
$r=mysqli_fetch_array($resultadoverifica);


if(empty($r))//verifica si hay un alumnos registrado 
{
$query="Insert into subtablaasigna (ClaveAsignaTutor,NoControl) values ('$Claveasigna','$NoControl')";
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