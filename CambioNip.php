<?php
require 'conexion.php';
session_start();
//validar que se haya creado una session si no redirijir a index.php
if(!isset($_SESSION['ClaveMaestro']))
{
        header("Location:index.php");
}


if(!($_GET['pasa']=='1'))//verifica que GET no sea vacio
{
header("Location:VerificaPassword.php");
 
}

  
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
    <link rel="stylesheet" href="css/bootstrapValidator.min.css">
    
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="css/bootstrapValidator.min.js"></script>

    <script type="text/javascript" src="Validar.js"></script>
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
        <div id="contenido">
                <div  class="row">
                        <div class="col-sm-offset-3 col-sm-6">
                          <div class="panel panel-primary"  ><!--success, primary o default-->
                              <div class="panel-heading" >  <!--style="background: rgb(0,0,0);"-->
                                        <h3 class="panel-title">Nuevo Contraseña<!--<i class="fa fa-users fa-2x pull-right"></i>-->
                                        </h3>
                              </div>
                        
                              <div class="panel-body" >
                                <form action="" class="form-horizontal" method="post" id="ValidaPassword">
                                  
                                <input id="ClaveMaestro" name="ClaveMaestro" type="hidden" value="<?php echo $_SESSION['ClaveMaestro'] ?>">  
                                  
                                <div class="col-sm-12">
                                  <div class="form-group">
                                        <label for="Contraseña" class="sr-only">
                                            Contraseña:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    Contraseña:
                                                </span>
                                                       <input type="password" id="password" name="password" class="form-control" placeholder=""> 
                                       </div>
                                    </div>
                                  
                                  <div class="form-group">
                                        <label for="confirmar" class="sr-only">
                                           Confirmar:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    Confirmar:
                                                </span>
                                                       <input type="password" id="confirmar" name="confirmar" class="form-control" placeholder=""> 
                                       </div>
                                    </div>
                                
                                
                                
                                        <div class="col-sm-offset-4">
                                                <button class="btn btn-primary" id="CambiarNipButton">Cambiar NIP</button>
                                        </div>
                                </div>
                                </form>
                                </div>  
                          </div>
                     </div>
                </div>
        </div>
</div>

    
    <aside></aside>
    <footer></footer>
</body>
</html>