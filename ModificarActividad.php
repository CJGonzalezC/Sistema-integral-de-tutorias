<?php
require 'conexion.php';
session_start();
//validar que se haya creado una session si no redirijir a index.php
if(!isset($_SESSION['ClaveMaestro']))
{
        header("Location:index.php");
}


$ClaveActividad=$_GET['ClaveActividad'];
$query="select * from tablaactividades where ClaveActividad='$ClaveActividad'";
$resultado=$conexion->query($query);
$ro=$resultado->fetch_array();

//para llenar lista de alumnos en esa actividad
$query1="select * from alumnos inner join carreras where alumnos.ClaveCarrera=carreras.ClaveCarrera and NoControl in (select NoControl from subtablaactividades where ClaveActividad='$ClaveActividad')";
$listalumnos=$conexion->query($query1);

//$ClaveCarrera=$ro['ClaveCarrera'];
//$ClaveSemestre=$ro['PeriodoIngreso'];

$querycom="select * from tablaactividadescomplementarias";
$resultadoactcom=$conexion->query($querycom);
  
$carreras="select ClaveCarrera,NombreCarrera from carreras";
$resultadocarreras=$conexion->query($carreras);
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
            
                        <div class="col-sm-12">
                          <div class="panel panel-primary"><!--success, primary o default-->
                              <div class="panel-heading">
                                        <h3 class="panel-title">Modificar Actividad<!--<i class="fa fa-users fa-2x pull-right"></i>-->
                                        </h3>
                              </div>
                        
                             
                              <div class="panel-body" >
                                
                                 <form action="" id="FormModificarActividad" class="form-horizontal" method="post" >
                                    
                                <div class="col-sm-12">
                                         <div class="col-sm-5">
                                                  <div class="form-group">
                                                  <label for="ClaveActividad" class="sr-only">
                                                          Clave Actividad: <?php echo $ro['ClaveActividad']; ?> 
                                                      </label>
                                                      <div class="input-group">
                                                        <span class="input-group-addon">
                                                              Clave Actividad: <?php echo $ro['ClaveActividad']; ?> 
                                                        </span>
                                                      <input  type="hidden" id="ClaveActividad" name="ClaveActividad" class="form-control" value="<?php echo $ro['ClaveActividad']; ?>"  placeholder="">
                                                    </div>
                                                  </div>
                                                 
                                              
                        
                                    
                                    
                                  
                                                    <div class="form-group">
                                                        <label for="FechaActividad" class="sr-only">
                                                            Fecha:
                                                        </label>
                                                        <div class="input-group">
                                                                <span class="input-group-addon">
                                                                     Fecha:
                                                                </span>
                                                                 <input type="date" id="FechaActividad" name="FechaActividad" class="form-control" placeholder="" value="<?php echo $ro['FechaActividad']; ?>" required> <!--placeholder es para poner texto en el textbox-->
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
                                                         <input type="text" id="NombreActividad" name="NombreActividad" class="form-control" placeholder="" value="<?php echo $ro['NombreActividad']; ?>" required> <!--placeholder es para poner texto en el textbox-->
                                               </div>
                                            </div>
                                        
                                        </div>
                                      
                             
                                    
                                <div class="col-sm-offset-1 col-sm-6">
                                              <div class="form-group">
                                                <label for="HorasActividad" class="sr-only">
                                                        Horas:
                                                </label>
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                          Horas:
                                                        </span>
                                                         <input type="text" id="HorasActividad" name="HorasActividad" class="form-control" placeholder="" value="<?php echo $ro['HorasActividad']; ?>" required> <!--placeholder es para poner texto en el textbox-->
                                               </div>
                                            </div>
                                     
                                            
                                           
                                            <div class="form-group">
                                                <label for="SemestreActividad" class="sr-only">
                                                    Periodo:
                                                </label>
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            Periodo:
                                                              <!--<i class="fa fa-lock"></i>-->
                                                        </span>
                                                         <select  id="SemestreActividad" name="SemestreActividad" class="form-control" placeholder="" required>
                                                                <<option value="<?php echo $ro['SemestreActividad']; ?>">
                                                                    <?php
                                                                    $ClaveSemestre=$ro['SemestreActividad'];
                                                                        $query="select NombreSemestre from periodos where ClaveSemestre='$ClaveSemestre'";
                                                                        $resultadoClaveSemestre=$conexion->query($query);
                                                                        $NombreSemestre=$resultadoClaveSemestre->fetch_array();
                                                                        echo $NombreSemestre['NombreSemestre'];
                                                                    ?>
                                                                </option>
                                                                <?php while($row=$resultadoperiodos->fetch_assoc()){ ?>
                                                                <option value="<?php echo $row['ClaveSemestre']; ?>"><?php echo $row['NombreSemestre']; ?></option>
                                                                
                                                               <?php } ?>
                                                         </select> <!--placeholder es para poner texto en el textbox-->
                                               </div>
                                             </div>
                                          
                                          
                                               
                                                  <div class="form-group">
                                                      <label for="ActividadComple" class="sr-only">
                                                          Actividad:
                                                      </label>
                                                      <div class="input-group">
                                                              <span class="input-group-addon">
                                                                  Actividad:
                                                              </span>
                                                               <select  id="ActividadComple" name="ActividadComple" class="form-control" placeholder="" required>
                                                                      <<option value="<?php echo $ro['ActividadComple']; ?>">
                                                                          <?php
                                                                          $ClaveActividadComplen=$ro['ActividadComple'];
                                                                              $query="select NombreActividadComple from tablaactividadescomplementarias where ClaveActividadComple='$ClaveActividadComplen'";
                                                                              $resultado=$conexion->query($query);
                                                                              $NombreAct=mysqli_fetch_array($resultado);
                                                                              echo $NombreAct['NombreActividadComple'];
                                                                          ?>
                                                                      </option>
                                                                      <?php while($ro=$resultadoactcom->fetch_assoc()){ ?>
                                                                      <option value="<?php echo $ro['ClaveActividadComple']; ?>"><?php echo $ro['NombreActividadComple']; ?></option>
                                                                      
                                                                     <?php } ?>
                                                               </select> <!--placeholder es para poner texto en el textbox-->
                                                     </div>
                                                   </div>
                                                 
                                              </div>
                                             <input type="hidden" id="pasa" name="pasa" value="123">
                                             
                                             </div>
                                               
                                      
                                </form>
                                                <div class="row">
                                                                <div class="col-sm-offset-4 col-sm-4">
                                                                     
                                                                            <button id="ModificarActividad" class="btn btn-primary btn-small btn-block">
                                                                                   <i class="fa fa-user">
                                                                       Modificar
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
    
</div>
      
      
  
      
      
      
    <div class="row">
                                <div class="col-sm-offset-3 col-sm-3">
                                        <label for="NoControl" class="sr-only">
                                            NoControl:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    NoControl:
                                                </span>
                                                 <input  id="NoControl" name="NoControl" class="form-control" placeholder="">
                                       </div>
                                    </div>
                                 
                                    <div class="col-sm-2">
                                        <button type="button" class="btn  btn-primary " id="AgregaAlumnoActividad"><i class="fa fa-user"></i>
                                            Agregar Alumno
                                        </button>
                                        
                                    </div>
                                 
    </div>

<br>

<!--tabla que muestra la lista de los alumnos tutorados en esa asignacion-->
<div class="container">
    <div class="row table-responsive">
                    <table class="display" id="Tabla"><!--table class="table table-striped"-->
                        <thead>
                                <tr>
                                        <th>NoControl</th>
                                        <th>Nombre</th>
                                        <th>Carrera</th>
                                        <th style="text-align: center;">Quitar</th>
                                </tr>
                        </thead>
                        
                         <tbody>
                                <?php while($row=$listalumnos->fetch_array()){?>
                                <tr>
                                   <td><?php echo $row['NoControl'];?></td>     
                                   <td><?php echo $row['Nombre'];?></td>
                                   <td><?php echo $row['NombreCarrera']?></td>
                                   <td style="text-align: center;"><a onclick="QuitarAlumnosActividad('<?php echo $row['NoControl']?>');"><span class="glyphicon glyphicon-trash"></span></a></td> <!--a href="QuitarAlumnoTutoria.php?NoControl=<php echo $row['NoControl'];?>"-->
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
    </div>
</div>      
      
      
      
 <!--ventanas modales-->
 
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
                                <label>&nbsp Modificado Correctamente.</label>
                        </div>
                        
                    </div><!--modal body-->
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 
 
  
    
    <aside> </aside>
    <footer> </footer>
    
</body>
</html>