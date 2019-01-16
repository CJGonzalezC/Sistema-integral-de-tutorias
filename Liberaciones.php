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

//Para listar los alumnos liberados
$quer="select * from subtablaliberaciones as s inner join alumnos as a where s.ControlAlumno=a.NoControl";
$listaralumnos= $conexion->query($quer);


//Para listar las liberaciones existentes
$query="select * from tablaliberaciones";
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
                                        <h3 class="panel-title" style="text-align: center; color: rgb(0,0,0);">LIBERACIONES<!--<i class="fa fa-users fa-2x pull-right"></i>-->
                                        </h3>
                              </div>
                            </div>
                   </div>
                
                
                <div class="row">
                         <a class="btn btn-primary " href="NuevaLiberacion.php">NUEVA LIBERACIÓN</a>
                </div>
                
                <br><br>
                
            <div class="col-sm-6">
                <h3>Lista de liberaciones</h3>
                <div class="row table-responsive">
                     <table class="display" id="Tabla"><!--table class="table table-striped"-->
                        <thead>
                                <tr>
                                        <th>Clave Liberación</th>
                                        <th>Fecha</th>
                                        <th>Observaciones</th>
                                        <th style="text-align: center;">Modificar</th>
                                        <th>Imprimir</th>
                                </tr>
                        </thead>
                        
                         <tbody>
                                <?php while($row=mysqli_fetch_array($lista)){?>
                                <tr>
                                   <td><?php echo $row['ClaveLibera'];?></td>     
                                   <td><?php echo $row['FechaLiberacion'];?></td>
                                   <td><?php echo $row['ObservacionesLibera']?></td>
                                   <td style="text-align: center;"><a href="ModificarLiberacion.php?ClaveLibera=<?php echo $row['ClaveLibera'];?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                   <td><a class="btn btn-primary" href="ImprimirListaLiberacion.php?ClaveLibera=<?php echo $row['ClaveLibera'];?>" target="_blank"><span class="glyphicon glyphicon-print"></a></td>
                                </tr>
                                <?php } ?>
                        </tbody>
                     </table>
                </div>
        </div>
                <div class="col-sm-offset-1 col-sm-5">
                        <h3>Lista de alumnos liberados</h3>
                <div class="row table-responsive">
                     <table class="display" id="Tabla1"><!--table class="table table-striped"-->
                        <thead>
                                <tr>
                                        <th>NoControl</th>
                                        <th>Nombre</th>
                                        <th>Imprimir</th>
                                        
                                </tr>
                        </thead>
                        
                         <tbody>
                                <?php while($row=mysqli_fetch_array($listaralumnos)){?>
                                <tr>
                                   <td><?php echo $row['NoControl'];?></td>     
                                   <td><?php echo $row['Nombre'];?></td>
                                   <td><a class="btn btn-primary" href="ImprimirLiberacion.php?NoControl=<?php echo $row['NoControl'];?>" target="_blank"><span class="glyphicon glyphicon-print"></a></td>
                                </tr>
                                <?php } ?>
                        </tbody>
                     </table>
                </div>
        </div>
                
        </div>

    
    <aside></aside>
    <footer></footer>
</body>
</html>