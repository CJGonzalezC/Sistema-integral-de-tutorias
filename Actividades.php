<?php
require 'conexion.php';
session_start();
//validar que se haya creado una session si no redirijir a index.php
if(!isset($_SESSION['ClaveMaestro']))
{
        header("Location:index.php");
}


$query="select * from tablaactividades as t inner join tablaactividadescomplementarias as tc where t.ActividadComple=tc.ClaveActividadComple";
$lista= $conexion->query($query);

    
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

   
      <div class="container">
                <div class="row">
                          <div class="panel panel-primary"><!--success, primary o default-->
                              <div class="panel-heading" style="background: rgb(255,255,255);">
                                        <h3 class="panel-title" style="text-align: center; color: rgb(0,0,0);">ACTIVIDADES<!--<i class="fa fa-users fa-2x pull-right"></i>-->
                                        </h3>
                              </div>
                            </div>
                   </div>
                
                
                <div class="row">
                         <a class="btn btn-primary " href="NuevaActividad.php">REGISTRAR ACTIVIDAD</a>
                         <a class="btn btn-primary " href="Complementarias.php">ACTIVIDADES COMPLEMENTARIAS</a> 
                </div>
                
                <br><br>
                
                
                <div class="row table-responsive">
                     <table class="display" id="Tabla"><!--table class="table table-striped"-->
                        <thead>
                                <tr>
                                        <th>ClaveActividad</th>
                                        <th>Fecha</th>
                                        <th>Nombre</th>
                                        <th>Horas</th>
                                        <th>Actividad</th>
                                        <th style="text-align: center;">Modificar</th>
                                        <th>Imprimir</th>
                                </tr>
                        </thead>
                        
                         <tbody>
                                <?php while($row=$lista->fetch_array()){?>
                                <tr>
                                   <td><?php echo $row['ClaveActividad'];?></td>     
                                   <td><?php echo $row['FechaActividad'];?></td>
                                   <td><?php echo $row['NombreActividad']?></td>
                                   <td><?php echo $row['HorasActividad']?></td>
                                   <td><?php echo $row['ActividadComple']?></td>
                                   <td style="text-align: center;"><a href="ModificarActividad.php?ClaveActividad=<?php echo $row['ClaveActividad'];?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                   <td><a class="btn btn-primary" href="ImprimirListaActividad.php?ClaveActividad=<?php echo $row['ClaveActividad'];?>" target="_blank"><span class="glyphicon glyphicon-print"></a></td>
                                </tr>
                                <?php } ?>
                        </tbody>
                     </table>
                </div>
        </div>

    
    <aside></aside>
    <footer></footer>
</body>
</html>