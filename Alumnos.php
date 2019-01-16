<?php
require 'conexion.php';
session_start();
//validar que se haya creado una session si no redirijir a index.php
if(!isset($_SESSION['ClaveMaestro']))
{
        header("Location:index.php");
}


//consulta para la tabla   
$query="select * from alumnos inner join carreras where carreras.ClaveCarrera=alumnos.ClaveCarrera ";
$lista= $conexion->query($query);

//consulta para los datos de los select
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

<section>
        <div class="container">
                <div class="row">
                          <div class="panel panel-primary"><!--success, primary o default-->
                              <div class="panel-heading" style="background: rgb(255,255,255);">
                                        <h3 class="panel-title" style="text-align: center; color: rgb(0,0,0);">ALUMNOS<!--<i class="fa fa-users fa-2x pull-right"></i>-->
                                        </h3>
                              </div>
                            </div>
                   </div>
                        
                
                
                
                <div class="row">
                         <a class="btn btn-primary " href="#NuevoAlumno" data-toggle="modal">REGISTRAR NUEVO</a> 
                </div>
                <br>
                <br>
                <div class="row table-responsive">
                     <table class="display" id="Tabla"><!--table class="table table-striped"-->
                        <thead>
                                <tr>
                                        <th>NoControl</th>
                                        <th>Nombre</th>
                                        <th>Carrera</th>
                                        <th>Semestre</th>
                                        <th>FechaNac</th>
                                        <th>Periodo</th>
                                        <th style="text-align: center;">Modificar</th>
                                </tr>
                        </thead>
                        
                         <tbody>
                                <?php while($row=mysqli_fetch_array($lista)){?>
                                <tr>
                                   <td><?php echo $row['NoControl'];?></td>     
                                   <td><?php echo $row['Nombre'];?></td>
                                   <td><?php echo $row['NombreCarrera']?></td>
                                   <td><?php echo $row['Semestre']?></td>
                                   <td><?php  echo $row['FechaNacimiento']?></td>
                                   <td><?php  echo $row['PeriodoIngreso']?></td>
                                   <td style="text-align: center;"><a href="ModificarAlumno.php?NoControl=<?php echo $row['NoControl'];?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                </tr>
                                <?php } ?>
                        </tbody>
                     </table>
                </div>
        </div>
</section>


    <aside> </aside>
    <footer> </footer>
    
   <!-- Ventana modal-->

        <div class="modal fade" id="NuevoAlumno" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" arial-label="Close"><span aria-hidden="true">&times;</span>    
                        </button>
                        <h4 class="modal-title">NUEVO ALUMNO</h4>
                        
                    </div>
                    <div class="modal-body">
                        
                        <form action="" class="form-horizontal" id="FormAlumno" method="post" >
                                    
                        <div class="col-sm-offset-1 col-sm-10">
                                    <div class="form-group">
                                    <label for="No_Control" class="sr-only">
                                            No de Control:
                                        </label>
                                        <div class="input-group">
                                          <span class="input-group-addon">
                                                No de Control:
                                          </span>
                                        <input  type="text" id="NoControl" name="NoControl" class="form-control" placeholder=""  required>
                                      </div>
                                    </div>
                        
                                    
                                    
                        
                                    
                                    <div class="form-group">
                                        <label for="NombreAlumno" class="sr-only">
                                            Nombre de Alumno:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                     Nombre de Alumno:
                                                </span>
                                                 <input type="text" id="Nombre" name="Nombre" class="form-control" placeholder="" required> <!--placeholder es para poner texto en el textbox-->
                                       </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label for="Carrera" class="sr-only">
                                            Carrera:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    Carrera:
                                                      <!--<i class="fa fa-lock"></i>-->
                                                </span>
                                                 <select  id="ClaveCarrera" name="ClaveCarrera" class="form-control" placeholder="" required>
                                                        <option value="0">Selecciona</option>
                                                        <?php while($row=$resultadocarreras->fetch_assoc()){ ?>
                                                        <option value="<?php echo $row['ClaveCarrera']; ?>"><?php echo $row['NombreCarrera']; ?></option>
                                                        
                                                       <?php } ?>
                                                 </select> 
                                       </div>
                                    </div>
                                    
                                      <div  class="form-group">
                                        <label for="Semestre" class="sr-only">
                                            Semestre:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                      Semestre:
                                                      <!--<i class="fa fa-lock"></i>-->
                                                </span>
                                                <select  id="Semestre" name="Semestre" class="form-control" placeholder="" required>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                 </select>
                                        </div>
                                    </div>
                                      
                                      <div class="form-group">
                                        <label for="Sexo" class="sr-only">
                                            Sexo:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                      Sexo:
                                                      <!--<i class="fa fa-lock"></i>-->
                                                </span>
                                                <select  id="Sexo" name="Sexo" class="form-control" placeholder="" required>
                                                        <option value="">Seleccione</option>
                                                        <option value="F">FEMENINO</option>
                                                        <option value="M">MASCULINO</option>
                                                 </select>
                                        </div>
                                    </div>
                                    
                                    <div  class="form-group">
                                        <label for="FechaNac" class="sr-only">
                                            Fecha de nacimiento:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                      Fecha de Nacimiento:
                                                      <!--<i class="fa fa-lock"></i>-->
                                                </span>
                                                 <input type="date" id="FechaNacimiento" name="FechaNacimiento" class="form-control" placeholder=""  required> <!--placeholder es para poner texto en el textbox-->
                                       </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <label for="Carrera" class="sr-only">
                                            Periodo:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    Periodo:
                                                      <!--<i class="fa fa-lock"></i>-->
                                                </span>
                                                 <select  id="PeriodoIngreso" name="PeriodoIngreso" class="form-control" placeholder="" required>
                                                        <option value="0">Selecciona</option>
                                                        <?php while($row=$resultadoperiodos->fetch_assoc()){ ?>
                                                        <option value="<?php echo $row['ClaveSemestre']; ?>"><?php echo $row['NombreSemestre']; ?></option>
                                                        
                                                       <?php } ?>
                                                 </select> <!--placeholder es para poner texto en el textbox-->
                                       </div>
                                    </div>
                                </div>                                      
                                </form>
                        
                    </div><!--modal body-->
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        <button type="button" id="GuardarAlumno" class="btn btn-primary" >Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        
        
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