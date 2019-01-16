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
if(!empty($_GET))//verifica que GET no sea vacio
{

         $ClaveMaestro=$_GET['ClaveMaestro'];
         $query="select * from personal where ClaveMaestro='$ClaveMaestro'";
         $resultado=$conexion->query($query);
         $ro=$resultado->fetch_array();
         
         $Area=$ro['AreaPersonal'];
           
         $areas="select ClaveArea,NombreArea from areas";
         $resultadoareas=$conexion->query($areas);

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
                                        <h3 class="panel-title">Modificar Personal<!--<i class="fa fa-users fa-2x pull-right"></i>-->
                                        </h3>
                              </div>
                        
                             
                              <div class="panel-body" >
                                <form action="" class="form-horizontal" id="FormModificarPersonal" method="post" >
                                    
                        <div class="col-sm-offset-1 col-sm-10">
                                            
                                    
                                    <div class="form-group">
                                    <label for="ClaveMaestro" class="sr-only">
                                            No de Tarjeta:
                                        </label>
                                        <div class="input-group">
                                          <span class="input-group-addon">
                                                No de Tarjeta: <?php echo $ro['ClaveMaestro'] ?>
                                          </span>
                                        <input  type="hidden" id="ClaveMaestro" name="ClaveMaestro" value="<?php echo $ro['ClaveMaestro'] ?>" class="form-control" placeholder="">
                                      </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                    <label for="Rfc" class="sr-only">
                                            RFC:
                                        </label>
                                        <div class="input-group">
                                          <span class="input-group-addon">
                                                RFC:
                                          </span>
                                        <input  type="text" id="Rfc" name="Rfc"  value="<?php echo $ro['Rfc'] ?>" class="form-control" placeholder="">
                                      </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="Nombre" class="sr-only">
                                            Nombre de tutor:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                     Nombre de tutor:
                                                </span>
                                                 <input type="text" id="Nombre" name="Nombre" value="<?php echo $ro['Nombre'] ?>" class="form-control" placeholder=""> <!--placeholder es para poner texto en el textbox-->
                                       </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label for="AreaPersonal" class="sr-only">
                                            Area:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    Area:
                                                      <!--<i class="fa fa-lock"></i>-->
                                                </span>
                                                <select  id="AreaPersonal" name="AreaPersonal" class="form-control" placeholder="" required>
                                                        <<option value="<?php echo $ro['AreaPersonal']; ?>">
                                                            <?php
                                                                $query="select NombreArea from areas where ClaveArea='$Area'";
                                                                $resultadoarea=$conexion->query($query);
                                                                $NombreArea=$resultadoarea->fetch_array();
                                                                echo $NombreArea['NombreArea'];
                                                            ?>
                                                        </option>
                                                        <?php while($row=$resultadoareas->fetch_assoc()){ ?>
                                                        <option value="<?php echo $row['ClaveArea']; ?>"><?php echo $row['NombreArea']; ?></option>
                                                        
                                                       <?php } ?>
                                                 </select>
                                        </div>
                                    </div>
                                    
                                      
                                                 
                                    
                                </div>                                      
                                </form>
                                
                                        <div class="row">
                                                        <div class="col-sm-offset-4 col-sm-4">
                                                             
                                                                    <button id="ModificarPersonal" class="btn btn-primary btn-small btn-block">
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