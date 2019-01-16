<?php
require 'conexion.php';
session_start();
/*if(!isset($_SESSION['ClaveMaestro'])){
        header("Location: index.php");
    }
    */

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
                              <a href="">Cambiar Nip</a>
                        </li>
                     </ul>
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
                                <?php
                                if(isset($_POST['pasa']) && $_POST['pasa']=='123')
                                if($resultadoinsert){ ?>
                                <h3>Agregado correctamente</h3>        
                                <?php } else{ ?>
                                <h3>Error al guardar</h3>
                                <?php } ?>
                        </div>
                </div> 
        </div>
        
    </section>
    
    
    <div class="container">
      <div id="contenido">
              <div class="row">
            
                        <div class="col-sm-offset-0 col-sm-12">
                          <div class="panel panel-primary"><!--success, primary o default-->
                              <div class="panel-heading">
                                        <h3 class="panel-title">Formulario de Alumnos<!--<i class="fa fa-users fa-2x pull-right"></i>-->
                                        </h3>
                              </div>
                        
                             
                              <div class="panel-body" >
                                <form action="" class="form-horizontal" method="post" >
                                    
                                    
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
                                                    Selecciona Carrera:
                                                      <!--<i class="fa fa-lock"></i>-->
                                                </span>
                                                 <select  id="ClaveCarrera" name="ClaveCarrera" class="form-control" placeholder="" required>
                                                        <option value="0">Selecciona</option>
                                                        <?php while($row=$resultadocarreras->fetch_assoc()){ ?>
                                                        <option value="<?php echo $row['ClaveCarrera']; ?>"><?php echo $row['NombreCarrera']; ?></option>
                                                        
                                                       <?php } ?>
                                                 </select> <!--placeholder es para poner texto en el textbox-->
                                       </div>
                                    </div>
                                    
                                      <div class="form-group">
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
                                                        <option value="3">2</option>
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
                                                        <option value="F">FEMENINO</option>
                                                        <option value="M">Masculino</option>
                                                 </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
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
                                            Carrera:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    Selecciona Carrera:
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
                                    
                                          <div class="row">
                                                <div class="col-sm-offset-4 col-sm-4">
                                                     <input type="hidden" id="pasa" name="pasa" value="123">
                                                            <button class="btn btn-primary btn-small btn-block">
                                                                   <i class="fa fa-user">
                                                            Agregar Nuevo
                                                                   </i>
                                                            </button>
                                                     
                                                </div>
                                          </div>                                    
                                </form>
                              </div>
                             <!-- 
                              <div class="panel-footer">
                                    <strong ><i class="fa fa-copyright"></i></strong>
                                    <em>Derechos Reservados, Empresas Tecnologicas, S.A. de C.V.</em>
                              </div>-->
                          </div>
                        </div>
                  </div>
            </div>
      </div>
    
    <aside> </aside>
    <footer> </footer>
    
</body>
</html>