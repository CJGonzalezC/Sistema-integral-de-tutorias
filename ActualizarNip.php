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

$password=sha1($password);
$query="update personal set Password='$password'
 where ClaveMaestro=".$_SESSION['ClaveMaestro']."";

$resultado=$conexion->query($query);

$array=array();
$array=($resultado)?array('exito'=>true,'nom'=>$_SESSION['ClaveMaestro']):array('exito'=>false);
        
echo json_encode($array);
?>