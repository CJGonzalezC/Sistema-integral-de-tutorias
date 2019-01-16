<?php
require_once('lib/fpdf/fpdf.php');
require_once('claseUsuarios.php');
     $usuarios=new Usuarios;
     $listar=$usuarios->listarUsuarios();
#Archivos de texto plano
//nombre se sugiere agregue fecha y hora de creacion
$archivo=fopen('archivos/usuarios.xml','w+');
fwrite($archivo,"<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n<usuarios>\n");
foreach($listar as $datosUsuarios){
    fwrite($archivo,"<usuario>\n<idusuario>".$datosUsuarios['usuario']."</idusuario>\n<nombre>".$datosUsuarios['nombre']."</nombre>\n<correo>".$datosUsuarios['email']."</correo>\n<tipo>".$datosUsuarios['tipo']."</tipo>\n</usuario>\n");
}
fwrite($archivo,"</usuarios>");
fclose($archivo);
?>