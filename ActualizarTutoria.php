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

$que="update tablaasignatutor set ClaveTutor='$ClaveTutor',
FechaAsignacion='$FechaAsignacion',OficioNombramiento='$OficioNombramiento',HoraFechaTutoria='$HoraFechaTutoria',
NombreGrupo='$NombreGrupo',PeriodoGrupo='$PeriodoGrupo' where ClaveAsignaTutor='$ClaveAsignaTutor'";

$resultadoinsert=$conexion->query($que);

$nuevo=array();
$nuevo=($resultadoinsert)?array('exito'=>true):array('exito'=>false);
        
echo json_encode($nuevo);
?>