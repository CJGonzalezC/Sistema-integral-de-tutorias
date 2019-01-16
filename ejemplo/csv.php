<?php
require_once('lib/fpdf/fpdf.php');
require_once('claseUsuarios.php');
     $usuarios=new Usuarios;
     $listar=$usuarios->listarUsuarios();
#Archivos de texto plano
//nombre se sugiere agregue fecha y hora de creacion
$archivo=fopen('archivos/usuarios.csv','w+');
fwrite($archivo,"USUARIO,NOMBRE,CORREO,TIPO\n");
foreach($listar as $datosUsuarios){
    fwrite($archivo,$datosUsuarios['usuario'].','.$datosUsuarios['nombre'].','.$datosUsuarios['email'].','.$datosUsuarios['tipo']."\n");
}
fclose($archivo);
$resultado=array('exito'=>true);
echo json_encode($resultado);
?>