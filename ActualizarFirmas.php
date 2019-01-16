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

if(!empty($_POST)){
     
            foreach($_POST as $variable=>$valor)
            {
                $swap=$variable;
                $$variable=$valor;
            }
            
            $que="update tablafirmas set SubDirectorAcademico='$SubDirectorAcademico',JefeDesarrolloAcademico='$JefeDesarrolloAcademico',
            CoordinadorTutorias='$CoordinadorTutorias',JefeServiciosEscolares='$JefeServiciosEscolares',CiudadTecnologico='$CiudadTecnologico',
            NombreTecnologico='$NombreTecnologico',LemaTecnologico='$LemaTecnologico',JefeAcademico='$JefeAcademico',
            DirectorTecnologico='$DirectorTecnologico'where ClaveFirma='1'";
            
            echo $que;
            
            $resultadoinsert=$conexion->query($que);
            
            if($resultadoinsert)
            {
                
                header('location:firmas.php');    
            }
            else
            {
                header('location:firmas.php');   
                echo ('Error');
            }

}else
{
    header('location:welcome.php');  
}
?>