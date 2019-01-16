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
foreach($_POST as $variable=>$valor)
{
    $swap=$variable;
    $$variable=$valor;
}

$que="Insert into personal(ClaveMaestro,Rfc,Nombre,Activo,AreaPersonal,Password,Tipo)
values ('$ClaveMaestro','$Rfc','$Nombre','$Activo','$AreaPersonal','".sha1($Password)."','$Tipo')";


$resultadoinsert=$conexion->query($que);

$nuevo=array();
$nuevo=($resultadoinsert)?array('exito'=>true):array('exito'=>false);
        
echo json_encode($nuevo);
?>
