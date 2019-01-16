<?php
require 'conexion.php';
session_start();
//validar que se haya creado una session si no redirijir a index.php
if(!isset($_SESSION['ClaveMaestro']))
{
        header("Location:index.php");
}


if(isset($_POST['pasa']) && $_POST['pasa']=='123')
{
       
        
        foreach($_POST as $variable=>$valor)
        {
         $swap=$variable;
         $$variable=$valor;//forma de afecta la memoria y crear una variable
        }

        $query="Insert into tablaactividades (`FechaActividad`,`NombreActividad`,`HorasActividad`,`SemestreActividad`,`ActividadComple`)
        values ('$FechaActividad','$NombreActividad','$HorasActividad','$SemestreActividad','$ActividadComple')";
       
      
        $resultadoinsert=$conexion->query($query);
        
        if($resultadoinsert){
         header('location:ActividadAlumnos.php');
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
                        <div class="col-sm-offset-1 col-sm-10">
                          <div class="panel panel-primary"  ><!--success, primary o default-->
                              <div class="panel-heading" >  <!--style="background: rgb(0,0,0);"-->
                                        <h3 class="panel-title">Nuevo Actividad<!--<i class="fa fa-users fa-2x pull-right"></i>-->
                                        </h3>
                              </div>
                        
                              <div class="panel-body" >
                                
                                <form action="" class="form-horizontal" method="post" >
                                  
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="ActividadComple" class="sr-only">
                                            ClaveActComple:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    ClaveActComple:
                                                      <!--<i class="fa fa-lock"></i>-->
                                                </span>
                                                 <select  id="ActividadComple" name="ActividadComple" class="form-control" placeholder="">
                                                        <option value="0">Selecciona</option>
                                                        <?php while($row=$resultadocomple->fetch_assoc()){ ?>
                                                        <option value="<?php echo $row['ClaveActividadComple']; ?>"><?php echo $row['ClaveActividadComple'].'  |  '.$row['NombreActividadComple'];?></option>
                                                       <?php } ?>
                                                 </select> 
                                        </div>
                                    </div>
                                    
                                    
                                    
                                  <div class="form-group">
                                        <label for="FechaActividad" class="sr-only">
                                            Fecha Actividad:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    Fecha Actividad:
                                                </span>
                                                       <input  type="date" id="FechaActividad" name="FechaActividad" class="form-control" placeholder=""> 
                                       </div>
                                    </div>
                                
                                    
                                    <div class="form-group">
                                        <label for="NombreActividad" class="sr-only">
                                            Nombre:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    Nombre:
                                                </span>
                                                         <input  id="NombreActividad" name="NombreActividad" class="form-control" placeholder=""> 
                                                
                                       </div>
                                    </div>
                                </div>
                                   
                                <div class="col-sm-offset-1 col-sm-5">
                                   <div class="form-group">
                                        <label for="HorasActividad" class="sr-only">
                                            Horas:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                   Horas:
                                                </span>
                                                 <input  id="HorasActividad" name="HorasActividad" class="form-control" placeholder=""> 
                                       </div>
                                    </div>
                                   
                                   
                                   
                                 
                                
                                   
                                    <div class="form-group">
                                        <label for="Periodo" class="sr-only">
                                                Periodo:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                   Periodo:
                                                </span>
                                                 <select  id="SemestreActividad" name="SemestreActividad" class="form-control " placeholder="">
                                                        <option value="0">Selecciona</option>
                                                        <?php while($row=$resultadoperiodos->fetch_assoc()){ ?>
                                                        <option value="<?php echo $row['ClaveSemestre']; ?>"><?php echo $row['ClaveSemestre'].' | '.$row['NombreSemestre']; ?></option>
                                                       <?php } ?>
                                                 </select> 
                                       </div>
                                        <br>
                                        <input type="hidden" id="pasa" name="pasa" value="123">
                                           <button class="btn btn-primary col-sm-">Guardar</button>
                                </div>
                            
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