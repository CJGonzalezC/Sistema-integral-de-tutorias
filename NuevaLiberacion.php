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
    

if(isset($_POST['pasa']) && $_POST['pasa']=='123')
{
       
        
        foreach($_POST as $variable=>$valor)
        {
         $swap=$variable;
         $$variable=$valor;//forma de afecta la memoria y crear una variable
        }

        $query="Insert into tablaliberaciones (`FechaLiberacion`,`ObservacionesLibera`)
        values ('$FechaLiberacion','$Observaciones')";
       
        $resultadoinsert=$conexion->query($query);
        
        if($resultadoinsert){
         header('location:./LiberacionAlumnos.php');
        }
        
        
}

$comple="select ClaveActividadComple,NombreActividadComple from tablaactividadescomplementarias";
$resultadocomple=$conexion->query($comple);
       
$periodos="select ClaveSemestre,NombreSemestre from periodos";
$resultadoperiodos=$conexion->query($periodos);       
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/layer.css">
    <link rel="stylesheet" href="js/jquery/jquery-ui.min.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/datatables.min.js"></script>
    
    <script>
        $(document).ready(function(){
        
      });  
    </script>

    
    <script type="text/javascript" src="funciones.js"></script>
    
                     
        <div class="row" style="background: #fff;">
              <!--div class="col-xs-1"><span class="glyphicon glyphicon-pencil"></span></div-->
              <div class="col-sm-4"> <img src="imagenes/sep.jpg" width=100% height=150px></div>
                    <div class="col-sm-4">
                         <h1 style="color: rgb(0,0,0); font-size: xx-large; text-align: center">   
                            Sistema Integral de Información
                        </h1>
                         <h2 style="color: rgb(0,0,0); font-size: large; text-align:center">
                                  Instituto Tecnológico de Delicias <small style="color: rgb(0,0,200);"> SII TUTORIAS</small>
                            </h2>
                    </div>
                <div class="col-sm-4"> <img src="imagenes/tec.png" width=100% height=150px></div>  
        </div>
        
</head>

<body>
   
    
        
        
<header>
      
 <div class="row">
        <nav class="navbar navbar-default" style="background: rgb(0,0,0);">  <!--style="background: rgb(0,0,0);"-->
        <div class="navbar-header" >
            <button type="button" class="navbar-toggle collapsed"
                    data-toggle="collapse"
                    data-target="#bs-activacion"
                    aria-expanded="false">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
      
      </div>
     
         <!-- recopile los viculos de navegacin, formularios y otros contenidos para activar-->
        <div class="collapse navbar-collapse" id="bs-activacion" >
           <ul class="nav navbar-nav">
                
                
                <!--para usuarios Administrador-->
                <?php if($_SESSION['Tipo']=='A'){?>
                <li>
                    <a href="Firmas.php">Firmas<span class="sr-only" >(actual)</span></a>
                </li>
                <li>
                    <a href="Personal.php">Actualizar Personal</a>
                </li>
                <li>
                    <a href="Alumnos.php">Actualizar Alumnos</a>
                </li>
                 
                <li>
                    <a href="Asigna.php">Asigna Tutor</a>
                </li>
               
                <li>
                    <a href="Actividades.php">Actividades</a>
                </li>
                <li>
                    <a href="Liberaciones.php">Liberaciones</a>
                </li> 
                <?php } ?>
                
                <!--para usuarios sin permisos-->
                <?php if($_SESSION['Tipo']=='P'){?>
                <li>
                    <a href="Alumnos.php">Actualizar Alumnos</a>
                </li>
                <li>
                    <a href="Actividades.php">Actividades</a>
                </li>
                <?php } ?>
                
              <li class="dropdown">
                                <a href="#" class="dropdown-toggle"
                                   role="button" data-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false">Utilerias
                                   <span class="caret"></span></a>
                            
                             <ul class="dropdown-menu">
                                <li>
                                      <a href="./VerificaPassword.php">Cambiar Nip</a>
                                </li>
                             
                             </ul>
                </li>
              <li>
                    <a href="welcome.php"><?php echo $_SESSION['Nombre'];?> </a>
                </li>
              
               <li>
                    <a href="Salir.php">Salir</a>
                </li>
            </ul>
        </div>
      </div>
  </nav>
    </header>

     <section class="container">
        <div class="container">
                <div class="row">
                        <div class="row" style="text-align: center">
      
            </div>
        </div> 
    </div>
        
        
        
<div class="container">
        <div id="contenido">
                <div  class="row">
                        <div class="col-sm-offset-2 col-sm-8">
                          <div class="panel panel-primary"  ><!--success, primary o default-->
                              <div class="panel-heading" >  <!--style="background: rgb(0,0,0);"-->
                                        <h3 class="panel-title">Nueva Liberacion<!--<i class="fa fa-users fa-2x pull-right"></i>-->
                                        </h3>
                              </div>
                        
                              <div class="panel-body" >
                                
                                <form action="" class="form-horizontal" method="post" >
                                <div class="col-sm-offset-1 col-sm-10">
                                  <div class="form-group">
                                        <label for="FechaLiberacion" class="sr-only">
                                            Fecha Liberacion:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    Fecha Liberacion:
                                                </span>
                                                       <input  type="date" id="FechaLiberacion" name="FechaLiberacion" required class="form-control" placeholder=""> 
                                       </div>
                                    </div>
                                
                                    
                                    <div class="form-group">
                                        <label for="Observaciones" class="sr-only">
                                            Observaciones:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    Observaciones:
                                                </span>
                                                         <input  id="Observaciones" name="Observaciones" maxlength=86 class="form-control" required placeholder=""> 
                                                
                                       </div>
                                    </div>
                                        
                                        <input type="hidden" id="pasa" name="pasa" value="123">
                                        
                                </div>
                                <div class="col-sm-offset-5 col-sm-2">
                                <button class="btn btn-primary col-sm-">Guardar</button>
                                </div>
                                </form>
                                       
                                </div>  
                          </div>
                     </div>
                </div>
        </div>
</div>
    
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" arial-label="Close"><span aria-hidden="true">&times;</span>    
                        </button>
                       
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                                <label>Agregado Correctamente.</label>
                        </div>
                        
                    </div><!--modal body-->
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 
          

    </section>
    
    <aside></aside>
    <footer></footer>
</body>
</html>