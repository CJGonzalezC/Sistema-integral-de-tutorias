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

$ClaveLiberacion=$_POST['Clave'];
$NoControl=$_POST['NoControl'];

$verifica="select * from subtablaliberaciones where ControlAlumno='$NoControl'";
$resultadoverifica=$conexion->query($verifica);
$r=mysqli_fetch_array($resultadoverifica);
//if($r['ClaveActividad']==$ClaveActividad && $r['NoControl']==$NoControl)
if(empty($r))//verifica si hay un alumnos registrado en esa actividad
{
$query="Insert into subtablaliberaciones (ClaveLibera,ControlAlumno) values ('$ClaveLiberacion','$NoControl')";
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