<?php

$conexion=  new mysqli('localhost','id1846893_root','Kurosaki0895','id1846893_tutorias');

if($conexion->connect_error){
    
    die('Error en la conexion'.$conexion->connect_error);
}

?>