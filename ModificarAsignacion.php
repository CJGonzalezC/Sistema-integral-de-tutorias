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

$Claveasigna=$_GET['ClaveAsignacion'];
$query="select * from tablaasignatutor inner join periodos where tablaasignatutor.PeriodoGrupo=periodos.ClaveSemestre and ClaveAsignaTutor='$Claveasigna'";
$resultado=$conexion->query($query);
$ro=$resultado->fetch_array();

//para llenar lista de alumnos tutorados
$query1="select * from alumnos inner join carreras where alumnos.ClaveCarrera=carreras.ClaveCarrera and NoControl in (select NoControl from subtablaasigna  where ClaveAsignaTutor='$Claveasigna')";
$listalumnos=$conexion->query($query1);


$personal="select ClaveMaestro,Nombre from personal";
$resultadopersonal=$conexion->query($personal);  
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
    
    
    
      <div id="contenido">
              <div class="row">
            
                        <div class="col-sm-12">
                          <!--success, primary o default-->
                             
                        
                             
                              <div class="panel-body" >
                                    
                                    
                                    
                                    <div class="panel panel-primary"><!--success, primary o default-->
                              <div class="panel-heading" style="background: rgb(255,255,255);">
                                        <h3 class="panel-title" style="text-align: center; color: rgb(0,0,0);">Modificar Asignacion<!--<i class="fa fa-users fa-2x pull-right"></i>-->
                                        </h3>
                              </div>
                            </div>
                                    
                                    
                                <form action="" id="FormModificarTutoria" class="form-horizontal" method="post" >
                                    
                                    
                                    <div class="col-sm-offset-0 col-sm-3">
                                    <label for="ClaveAsignaTutor" class="sr-only">
                                            ClaveAsignacion:<?php echo $ro['ClaveAsignaTutor']; ?>
                                        </label>
                                        <div class="input-group">
                                          <span class="input-group-addon">
                                                ClaveAsignacion:<?php echo $ro['ClaveAsignaTutor']; ?>
                                          </span>
                                        <input  type="hidden" id="ClaveAsignaTutor" name="ClaveAsignaTutor" class="form-control" placeholder="" value="<?php echo $ro['ClaveAsignaTutor']; ?>" required>
                                      </div>
                                    </div>
                        
                                    
                                    
                        
                                    
                                    <div class="col-sm-offset-1 col-sm-4">
                                        <label for="ClaveTutor" class="sr-only">
                                            ClaveTutor:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                     ClaveTutor:
                                                </span>
                                                 <select  id="ClaveTutor" name="ClaveTutor" class="form-control" placeholder="">
                                                        <option value="<?php echo $ro['ClaveTutor']; ?>"><?php echo $ro['ClaveTutor']; ?></option>
                                                        <?php while($row=$resultadopersonal->fetch_assoc()){ ?>
                                                        <option value="<?php echo $row['ClaveMaestro']; ?>"><?php echo $row['ClaveMaestro'].'  |  '.$row['Nombre'];?></option>
                                                       <?php } ?>
                                                 </select> 
                                       </div>
                                    </div>
                                    
                                    
                                    
                                      <div class="col-sm-4">
                                        <label for="FechaAsignacion" class="sr-only">
                                            FechaAsignacion:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                      FechaAsignacion:
                                                      <!--<i class="fa fa-lock"></i>-->
                                                </span>
                                                <input type="date" id="FechaAsignacion" name="FechaAsignacion" class="form-control" placeholder=""  value="<?php echo $ro['FechaAsignacion']; ?>"  required>         
                                        </div>
                                    </div>
                                      
                                      <br><br>
                                    
                                    <div class="col-sm-4">
                                        <label for="OficioNombramiento" class="sr-only">
                                            OficioNombramiento:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                      OficioNombramiento:
                                                      <!--<i class="fa fa-lock"></i>-->
                                                </span>
                                                 <input type="text" id="OficioNombramiento" name="OficioNombramiento" class="form-control" placeholder=""  value="<?php echo $ro['OficioNombramiento']; ?>"  required> <!--placeholder es para poner texto en el textbox-->
                                       </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <label for="HoraFechaTutoria" class="sr-only">
                                            HoraTutoria:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                      HoraTutoria:
                                                      <!--<i class="fa fa-lock"></i>-->
                                                </span>
                                                 <input type="text" id="HoraFechaTutoria" name="HoraFechaTutoria" class="form-control" placeholder=""  value="<?php echo $ro['HoraFechaTutoria']; ?>"  required> <!--placeholder es para poner texto en el textbox-->
                                       </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <label for="NombreGrupo" class="sr-only">
                                            NombreGrupo:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                     NombreGrupo:
                                                </span>
                                                 <input type="text" id="NombreGrupo" name="NombreGrupo" class="form-control" placeholder="" value="<?php echo $ro['NombreGrupo']; ?>" required> <!--placeholder es para poner texto en el textbox-->
                                       </div>
                                    </div>
                                    
                                    <br><br>
                                    
                                    <div class="col-sm-4">
                                        <label for="PeriodoGrupo" class="sr-only">
                                            PeriodoGrupo:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                     PeriodoGrupo:
                                                </span>
                                                <select  id="PeriodoGrupo" name="PeriodoGrupo" class="form-control" placeholder="">
                                                        <option value="<?php echo $ro['PeriodoGrupo']; ?>"><?php echo $ro['PeriodoGrupo'].'  |  '.$ro['NombreSemestre'];?></option>
                                                        <?php while($row=$resultadoperiodos->fetch_assoc()){ ?>
                                                        <option value="<?php echo $row['ClaveSemestre']; ?>"><?php echo $row['ClaveSemestre'].'  |  '.$row['NombreSemestre'];?></option>
                                                       <?php } ?>
                                                 </select> 
                                                 
                                       </div>
                                    </div>
                                    
                                    <br><br>
                                    
                                  
                                           <div class="col-sm-12">
                                                <div class="col-sm-offset-5">
                                                     <input type="hidden" id="pasa" name="pasa" value="123">
                                                            <button type="button" id="ModificarAsignacion" class="btn btn-primary" >Modificar</button>
                                                     
                                                </div>
                                        </div>
                                                
                                    
                                     
                                     
                           
                                            <!-- 
                                      <div class="panel-footer">
                                            <strong ><i class="fa fa-copyright"></i></strong>
                                            <em>Derechos Reservados, Empresas Tecnologicas, S.A. de C.V.</em>
                                      </div>-->
                                </form>
                              
                        </div>
                  </div>
            </div>
    </div>
      
      
      <br><br>
      
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
                                        <button type="button" class="btn  btn-primary " id="AgregaAlumno"><i class="fa fa-user"></i>
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
                                <?php while($row=mysqli_fetch_array($listalumnos)){?>
                                <tr>
                                   <td><?php echo $row['NoControl'];?></td>     
                                   <td><?php echo $row['Nombre'];?></td>
                                   <td><?php echo $row['NombreCarrera']?></td>
                                   <td style="text-align: center;"><a onclick="QuitarAlumnos('<?php echo $row['NoControl']?>');"><span class="glyphicon glyphicon-trash"></span></a></td> <!--a href="QuitarAlumnoTutoria.php?NoControl=<php echo $row['NoControl'];?>"-->
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
                                <label>Modificado Correctamente.</label>
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