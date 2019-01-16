<?php
require 'conexion.php';
session_start();
//validar que se haya creado una session si no redirijir a index.php
if(!isset($_SESSION['ClaveMaestro']))
{
        header("Location:index.php");
}


    
if(!empty($_GET))//verifica que GET no sea vacio
{

         $ClaveActividadComple=$_GET['ClaveActividadComple'];
         $query="select * from tablaactividadescomplementarias where ClaveActividadComple='$ClaveActividadComple'";
         $resultado=$conexion->query($query);
         $ro=$resultado->fetch_array();
         
           
        

}
else
{
        header("Location: welcome.php"); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
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
        <nav class="navbar navbar-default" style="background: rgb(0,0,0);">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed"
                    data-toggle="collapse"
                    data-target="#bs-activacion"
                    aria-expanded="false">
                <span class="sr-only">menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
      
      </div>
     
         <!-- recopile los viculos de navegacin, formularios y otros contenidos para activar-->
        <div class="collapse navbar-collapse" id="bs-activacion">
           <ul class="nav navbar-nav">
                
                
                <!--para usuarios Administrador-->
                <?php if($_SESSION['Tipo']=='A'){?>
                <li>
                    <a href="Firmas.php">Firmas<span class="sr-only">(actual)</span></a>
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
              <div class="row">
            
                        <div class="col-sm-offset-2 col-sm-9">
                          <div class="panel panel-primary"><!--success, primary o default-->
                              <div class="panel-heading">
                                        <h3 class="panel-title">Modificar Actividad Complementaria<!--<i class="fa fa-users fa-2x pull-right"></i>-->
                                        </h3>
                              </div>
                        
                             
                              <div class="panel-body" >
                                
                    <form action="" class="form-horizontal" id="FormModificarActividadComple" method="post" >
                                    
                        <div class="col-sm-offset-1 col-sm-10">
                                    <div class="form-group">
                                    <label for="ClaveActividadComple" class="sr-only">
                                            Clave: <?php echo $ro['ClaveActividadComple']; ?>
                                        </label>
                                        <div class="input-group">
                                          <span class="input-group-addon">
                                                        Clave: <?php echo $ro['ClaveActividadComple']; ?>
                                          </span>
                                        <input  type="hidden" id="ClaveActividadComple" name="ClaveActividadComple" value="<?php echo $ro['ClaveActividadComple']; ?>" class="form-control" placeholder=""  required>
                                      </div>
                                    </div>
                        
                                    
                                    
                        
                                    
                                    <div class="form-group">
                                        <label for="NombreGenericoActividadComple" class="sr-only">
                                            NombreGenericoActividadComple:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                     NombreGenericoActividadComple:
                                                </span>
                                                 <input type="text" id="NombreGenericoActividadComple" name="NombreGenericoActividadComple" value="<?php echo $ro['NombreGenericoActividadComple']; ?>" class="form-control" placeholder="" required> <!--placeholder es para poner texto en el textbox-->
                                       </div>
                                    </div>
                                    
                                    
                                      
                                    <div class="form-group">
                                        <label for="NombreActividadComple" class="sr-only">
                                            NombreActividadComple:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                     NombreActividadComple:
                                                </span>
                                                 <input type="text" id="NombreActividadComple" name="NombreActividadComple" value="<?php echo $ro['NombreActividadComple']; ?>" class="form-control" placeholder="" required> <!--placeholder es para poner texto en el textbox-->
                                       </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="CriterioActividadComple" class="sr-only">
                                            CriterioActividadComple:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                     CriterioActividadComple:
                                                </span>
                                                 <input type="text" id="CriterioActividadComple" name="CriterioActividadComple" value="<?php echo $ro['CriterioActividadComple']; ?>" class="form-control" placeholder="" required> <!--placeholder es para poner texto en el textbox-->
                                       </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="CriterioActividadComple" class="sr-only">
                                           Evidencia:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                     Evidencia:
                                                </span>
                                                 <input type="text" id="EvidenciaActividadComple" name="EvidenciaActividadComple" value="<?php echo $ro['EvidenciaActividadComple']; ?>" class="form-control" placeholder="" required> <!--placeholder es para poner texto en el textbox-->
                                       </div>
                                    </div>
                                    
                                    
                                     <div class="form-group">
                                        <label for="CreditosActividadComple" class="sr-only">
                                           Creditos:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                        Creditos:
                                                </span>
                                                 <input type="text" id="CreditosActividadComple" name="CreditosActividadComple" value="<?php echo $ro['CreditosActividadComple']; ?>" class="form-control" placeholder="" required> <!--placeholder es para poner texto en el textbox-->
                                       </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="HorasActividadComple" class="sr-only">
                                           Horas:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                        Horas:
                                                </span>
                                                 <input type="text" id="HorasActividadComple" name="HorasActividadComple" value="<?php echo $ro['HorasActividadComple']; ?>" class="form-control" placeholder="" required> <!--placeholder es para poner texto en el textbox-->
                                       </div>
                                    </div>
                                    
                                    
                                
                                </div>                                      
                         </form>
                                                <div class="row">
                                                                <div class="col-sm-offset-4 col-sm-4">
                                                                     
                                                                            <button id="ModificarActividadComple" class="btn btn-primary btn-small btn-block">
                                                                                   <i class="fa fa-user">
                                                                       Actualizar
                                                                                   </i>
                                                                            </button>
                                                                     
                                                                </div>
                                                </div> 
                               
                                
                              </div>
                             
                          </div>
                        </div>
                  </div>
            </div>
      </div>
    
    <aside> </aside>
    <footer> </footer>
    
    <div class="modal fade" id="Error" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" arial-label="Close"><span aria-hidden="true">&times;</span>    
                        </button>
                        <h4 class="modal-title">Error.</h4>
                        
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                                <label>No se pudo guardar, verifique sus datos sean correctos.</label>
                        </div>
                        
                    </div><!--modal body-->
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 
               
   <div class="modal fade" id="Success" tabindex="-1" role="dialog" >
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
    
</body>
</html>