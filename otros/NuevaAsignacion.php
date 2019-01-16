<?php
require 'conexion.php';
session_start();
if(!isset($_SESSION['ClaveMaestro'])){
        header("Location: index.php");
    }
    

if(isset($_POST['pasa']) && $_POST['pasa']=='123')
{
       
        /*
        foreach($_POST as $variable=>$valor)
        {
         $swap=$variable;
         $$variable=$valor;//forma de afecta la memoria y crear una variable
        }
        
        $que="Insert into alumnos(NoControl,ClaveCarrera,Semestre,Sexo,FechaNacimiento,PeriodoIngreso,Nombre)
        values ('$NoControl','$ClaveCarrera','$Semestre','$Sexo','$FechaNacimiento','$PeriodoIngreso','$Nombre')";
        $resultadoinsert=$conexion->query($que);
}*/
}

$personal="select ClaveMaestro,Nombre from personal";
$resultadopersonal=$conexion->query($personal);

$periodos="select ClaveSemestre,NombreSemestre from periodos";
$resultadoperiodos=$conexion->query($periodos);



$siguiente="select ClaveAsignaTutor from subtablaasigna group by ClaveAsignaTutor limit 1,1";
$rsiguiente=$conexion->query($siguiente);
$r=mysqli_fetch_array($rsiguiente);

       
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
        $( "#ClaveTutoria").autocomplete({
      source: "./buscartutor.php",
      minLength: 1
    });
 
    $("#ClaveTutoria").focusout(function(){
      $.ajax({
        url:'./tutor.php',
          type:'POST',
          dataType:'json',
          data:{ ClaveMaestro:$('#ClaveTutoria').val()}}).done(function(respuesta){
          $("#Nombre").val(respuesta.Nombre);
          $("#RFC").val(respuesta.Rfc);
      });
    });
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
   
    <!--Utilizar bootstrap-->
    <!--sistema de rejilla(grid)-->
        
        
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
                        <a href="">Cambiar Nip</a>
                  </li>
               <!--   <li>
                        <a href="">Imprimir</a>
                  </li>
                  <li role="separator" class="divider">   
                  </li>-->
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
        <!--                        
        <?php /*
        if(isset($_POST['pasa']) && $_POST['pasa']=='123')
        if($resultadoinsert){ ?>
        <h3>Agregado correctamente</h3>        
        <?php } else{ ?>
        <h3>Error al guardar</h3>
        <?php } */ ?> -->
        
            </div>
        </div> 
    </div>
        
        
        
    <div class="container">
      <div id="contenido">
              <div  class="row">
                        <div class="col-sm-offset-0 col-sm-12">
                          <div class="panel panel-primary"  ><!--success, primary o default-->
                              <div class="panel-heading" >  <!--style="background: rgb(0,0,0);"-->
                                        <h3 class="panel-title">Nuevo Asignacion<!--<i class="fa fa-users fa-2x pull-right"></i>-->
                                        </h3>
                              </div>
                        
                              <div class="panel-body" >
                                
                                <form action="" class="form-horizontal" method="post" >
                                  
                                
                                  <div class="col-sm-2">
                                        <label for="ClaveTutoria" class="sr-only">
                                            Tutoria:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    Tutoria:
                                                      <!--<i class="fa fa-lock"></i>-->
                                                </span>
                                                 <input  id="ClaveTutoria" name="ClaveTutoria" class="form-control" value="<?php echo $r['ClaveAsignaTutor']; ?>" placeholder="">
                                        </div>
                                    </div>
                                  
                                  
                                    <div class="col-sm-4">
                                        <label for="ClaveM" class="sr-only">
                                            Tutor:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    Tutor:
                                                      <!--<i class="fa fa-lock"></i>-->
                                                </span>
                                                 <select  id="ClaveM" name="ClaveM" class="form-control" placeholder="">
                                                        <option value="0">Selecciona</option>
                                                        <?php while($row=$resultadopersonal->fetch_assoc()){ ?>
                                                        <option value="<?php echo $row['ClaveMaestro']; ?>"><?php echo $row['ClaveMaestro'].'  |  '.$row['Nombre'];?></option>
                                                       <?php } ?>
                                                 </select> 
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="Nombre" class="sr-only">
                                            Nombre:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    Nombre:
                                                      <!--<i class="fa fa-lock"></i>-->
                                                </span>
                                                <div id="Nombretutor">
                                                         <input  id="Nombre" name="Nombre" class="form-control" placeholder=""> 
                                                </div>
                                       </div>
                                    </div>
                                   
                                   <div class="col-sm-3">
                                        <label for="Nombre" class="sr-only">
                                            RFC:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    RFC:
                                                      <!--<i class="fa fa-lock"></i>-->
                                                </span>
                                                <div id="RFCTutor">
                                                       <input  id="RFC" name="RFC" class="form-control" placeholder=""> 
                                                </div>
                                       </div>
                                    </div>
                                   
                                
                                    <div class="col-xs-3">
                                        <label for="Periodo" class="sr-only">
                                                Periodo:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                   Periodo:
                                                </span>
                                                 <select  id="Periodo" name="Periodo" class="form-control " placeholder="">
                                                        <option value="0">Selecciona</option>
                                                        <?php while($row=$resultadoperiodos->fetch_assoc()){ ?>
                                                        <option value="<?php echo $row['ClaveSemestre']; ?>"><?php echo $row['ClaveSemestre'].' | '.$row['NombreSemestre']; ?></option>
                                                       <?php } ?>
                                                 </select> 
                                       </div>
                                    </div>
                               
                               
                                   
                        <div class="col-sm-12">
                                <a class="btn btn-primary" href="ImprimirLista.php?clave=1" target="_blank">Imprimir Lista</a>
                        </div>
                        
                                </form>
                               
                                <div id="Mostrar"></div>
                                
                                <div class="col-sm-12">
                                <a class="btn btn-primary" id="boton" target="_blank">Imprimir Lista</a>
                        </div>
                                 
                                    
                         </div>  
                                 <!--div id="Nombreee">
                                <input type="text" id="inp" name="inp" value="0"> 
                                </div-->
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
                                        <button type="button" class="btn  btn-primary " id="AgregaAlumnoNuevaTutoria"><i class="fa fa-car"></i>
                                            Agregar
                                        </button>
                                        
                                    </div>
                                 
                 </div>
                
                
                <div class="row table-responsive">
                     <table class="display" id="TablaTutorias"><!--table class="table table-striped"-->
                        <thead>
                                <tr>
                                        <th>ClaveAsignacion</th>
                                        <th>ClaveTutor</th>
                                        <th>FechaAsignacion</th>
                                        
                                </tr>
                        </thead>
                        
                         <tbody>
                                
                                <tr>
                                   <td></td>     
                                   <td></td>
                                   <td></td>
                                 
                        </tbody>
                     </table>
                </div>
                

    </section>
    
    <aside></aside>
    <footer></footer>
</body>
</html>