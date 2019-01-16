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
    

if(isset($_POST['pasa']) && $_POST['pasa']=='123$123')
{
       
        
        foreach($_POST as $variable=>$valor)
        {
         $swap=$variable;
         $$variable=$valor;//forma de afecta la memoria y crear una variable
        }

        $query="Insert into tablaasignatutor(ClaveTutor,FechaAsignacion,OficioNombramiento,HoraFechaTutoria,NombreGrupo,PeriodoGrupo)
        values ('$ClaveTutor','$FechaAsignacion','$OficioNombramiento','$HoraFechaTutoria','$NombreGrupo','$Periodo')";
       
        
        $resultadoinsert=$conexion->query($query);
        
        if($resultadoinsert){
                header('location:NuevoGrupo.php');
        }
        else{
                
                echo "<script type='text/javascript'>
$(document).ready(function(){
$('#Modal').modal('show');
});
</script>";

        }
        
}

$personal="select ClaveMaestro,Nombre from personal";
$resultadopersonal=$conexion->query($personal);

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
                        <div class="col-sm-offset-1 col-sm-10">
                          <div class="panel panel-primary"  ><!--success, primary o default-->
                              <div class="panel-heading" >  <!--style="background: rgb(0,0,0);"-->
                                        <h3 class="panel-title">Nuevo Asignacion<!--<i class="fa fa-users fa-2x pull-right"></i>-->
                                        </h3>
                              </div>
                        
                              <div class="panel-body" >
                                
                                <form action="" class="form-horizontal" method="post" >
                                  
                                <div class="col-sm-12">
                                 <div class="col-sm-3"> 
                                    <div class="form-group">
                                        <label for="ClaveTutor" class="sr-only">
                                            Tutor:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    Tutor:
                                                      <!--<i class="fa fa-lock"></i>-->
                                                </span>
                                                 <select  id="ClaveTutor" name="ClaveTutor" class="form-control" placeholder="">
                                                        <option value="0">Selecciona</option>
                                                        <?php while($row=$resultadopersonal->fetch_assoc()){ ?>
                                                        <option value="<?php echo $row['ClaveMaestro']; ?>"><?php echo $row['ClaveMaestro'].'  |  '.$row['Nombre'];?></option>
                                                       <?php } ?>
                                                 </select> 
                                        </div>
                                    </div>
                                 </div>
                                    
                                    <div class="col-sm-offset-1 col-sm-4"> 
                                    <div class="form-group">
                                        <label for="Nombre" class="sr-only">
                                            Nombre:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    Nombre:
                                                      <!--<i class="fa fa-lock"></i>-->
                                                </span>
                                                <input  id="Nombre" name="Nombre" class="form-control" placeholder=""> 
                                                
                                       </div>
                                    </div>
                                    </div>
                                   
                                  <div class="col-sm-offset-1 col-sm-2"> 
                                   <div class="form-group">
                                        <label for="RFC" class="sr-only">
                                            RFC:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    RFC:
                                                      <!--<i class="fa fa-lock"></i>-->
                                                </span>
                                                 <input  id="RFC" name="RFC" class="form-control" placeholder=""> 
                                       </div>
                                    </div>
                                  </div>
                                
                                </div>
                                
                                <div class="col-sm-12">
                                <div class="col-sm-6">
                                   <div class="form-group">
                                        <label for="NombreGrupo" class="sr-only">
                                            Nombre Grupo:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    Nombre Grupo:
                                                </span>
                                                       <input  type="text" id="NombreGrupo" name="NombreGrupo" class="form-control" placeholder=""> 
                                                
                                       </div>
                                    </div>
                                
                                   
                                 <div class="form-group">
                                        <label for="OficioNombramiento" class="sr-only">
                                            Oficio de Nombramiento:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    Oficio de Nombramiento:
                                                      <!--<i class="fa fa-lock"></i>-->
                                                </span>
                                                       <input  type="text" id="OficioNombramiento" name="OficioNombramiento" class="form-control" placeholder="11 caracteres maximo"> 
                                                
                                       </div>
                                    </div>
                                
                                 <div class="form-group">
                                        <label for="HoraFechaTutoria" class="sr-only">
                                            Hora y dia Tutoria:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    Hora y dia Tutoria:
                                                </span>
                                                       <input  type="text" id="HoraFechaTutoria" name="HoraFechaTutoria" class="form-control" placeholder=""> 
                                                
                                       </div>
                                    </div>
                              </div>
                                 
                                 <div class="col-sm-offset-1 col-sm-5">
                                  <div class="form-group">
                                        <label for="FechaAsignacion" class="sr-only">
                                            Fecha Asignación:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    Fecha Asignación:
                                                      <!--<i class="fa fa-lock"></i>-->
                                                </span>
                                                       <input  type="date" id="FechaAsignacion" name="FechaAsignacion" class="form-control" placeholder="" required> 
                                                
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
                                                 <select  id="Periodo" name="Periodo" class="form-control " required placeholder="">
                                                        <option value="0">Selecciona</option>
                                                        <?php while($row=$resultadoperiodos->fetch_assoc()){ ?>
                                                        <option value="<?php echo $row['ClaveSemestre']; ?>"><?php echo $row['ClaveSemestre'].' | '.$row['NombreSemestre']; ?></option>
                                                       <?php } ?>
                                                 </select> 
                                       </div>
                                        <input type="hidden" id="pasa" name="pasa" value="123$123">
                                        
                                    </div>
                                    
                                    <button class="btn btn-primary col-sm-offset-6 col-sm-6">Guardar</button>
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