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
$matricula = $_POST['ClaveMaestro'];
$consulta = "SELECT Nombre,Rfc FROM personal WHERE ClaveMaestro = '$matricula'";
$result = $conexion->query($consulta);
 
$respuesta = new stdClass();
if($result->num_rows > 0){
    $fila = $result->fetch_array();
    $respuesta->Nombre = $fila['Nombre'];
    $respuesta->Rfc = $fila['Rfc'];
}

echo json_encode($respuesta);
?>