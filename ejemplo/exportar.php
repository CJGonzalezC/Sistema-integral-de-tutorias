<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empresas Tecnologicas</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/layer.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="jquery/bootstrapValidator.min.css">
</head>

<body>
     <header>
      <div class="container logo" style="background: #81F75D">
        <h1 class="titulo">Empresas Tecnol&oacute;gicas, S.A. de C.V. <br><small>Dedicada a la Tecnolog&iacute;a</small></h1>
      </div>
      <div class="container-fluid">
             <nav class="navbar navbar-default">
               <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed"
                          data-toggle="collapse"
                          data-target="#bs-activacion"
                          aria-expanded="false">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    
                    <a href="index.php" class="navbar-brand">
                         <i class="fa fa-reddit fa-2x"></i>
                    </a>
              </div>
                <div class="collapse navbar-collapse" id="bs-activacion">
                    <ul class="nav navbar-nav">
                      <li><a href="login.php">Login
                      </a></li>
                      <li><a href="usuarios.php">Usuarios</a></li>
                      <li class="dropdown">
                         <a href="#" class="dropdown-toggle"
                      data-toggle="dropdown"
                      role="button"
                      aria-haspopup="true"
                      aria-expanded="false"
                      >Utilerias<span class="caret"></span></a>
                         <ul class="dropdown-menu">
                            <li class="active">
                                 <a href="exportar.php">Exportar</a>
                            </li>
                            <li>
                                 <a href="imprimir.php">Imprimir</a>
                            </li>
                            <li role="separator" class="divider">
                                 
                            </li>
                            <li>
                                 <a href="salir.php">Salir</a>
                            </li>
                            
                         </ul>
                      </li>
                    </ul>
               </div>
             </nav>  
      </div>
    
     </header>
     <section class="container">
     <?php if(isset($_SESSION['autorizado']) && $_SESSION['autorizado']=='abcd4567$'){  ?>
          <!-- aqui iba la tabla, ahora sera la tabla -->
     <?php
     require_once('claseUsuarios.php'); 
     $usuarios=new Usuarios;
     $listar=$usuarios->listarUsuarios();
     //echo var_dump($listar);
     ?>
     <div id="contenido">
          <div class="row">
            <div class="col-sm-12 table-responsive">
               <table class="table table-striped table-hover">
                    <tr>
                         <th>Fotograf&iacute;a</th>
                         <th>Usuario</th>
                         <th>Nombre</th>
                         <th>Correo</th>
                         <th>Tipo</th>
                         <td colspan="3">Opciones</td>
                    </tr>
                    <?php foreach($listar as $datosUsuarios){ ?>
                    <tr>
                         <td><img src="data:image/jpg;base64,<?php echo base64_encode($datosUsuarios['fotografia']); ?>"></td>
                         <td><?php echo $datosUsuarios['usuario'] ?></td>
                         <td><?php echo $datosUsuarios['nombre'] ?></td>
                         <td><?php echo $datosUsuarios['email'] ?></td>
                         <td><?php echo $datosUsuarios['tipo'] ?></td>
                         <td><a class="btn btn-success btn-sm" href="modificar.php"><i class="fa fa-pencil"></i></a></td>
                         <td><a class="btn btn-success btn-sm" href="borrar.php"><i class="fa fa-eraser"></i></a></td>
                         <td><a class="btn btn-success btn-sm" href="imprimirUsuario.php?usuario=<?php echo $datosUsuarios['usuario'] ?>&nombre=<?php echo $datosUsuarios['nombre'] ?>&email=<?php echo $datosUsuarios['email'] ?>&tipo=<?php echo $datosUsuarios['tipo'] ?>" target="_blank"><i class="fa fa-print"></i></a></td>
                    </tr>
                    <?php } ?>
               </table>
            </div>
          </div> <!-- /.row -->
          <div class="row">
               <div class="col-sm-12">
                    <button id="csv" href="csv.php" target="_blank" class="btn btn-success btn-block">Exportar a CSV</button>
                    <a href="xml.php" target="_blank" class="btn btn-success btn-block">Exportar a XML</a>
               </div>
          </div>
     </div><!-- /#contenido -->
     <?php } ?>
        
    </section>
    <footer>
      <div class="container-fluid">
         <strong><i class="fa fa-copyright"></i></strong> <em>Derechos Reservados, Empresas Tecnol&oacute;gicas, S.A. de C.V.</em> 1986-<?php echo date('Y');  ?>
      </div>
       <?php
        if(isset($_SESSION['autorizado']) && $_SESSION['autorizado']=='abcd4567$'){  ?>
            <strong>Bienvenido/a:<?php echo $_SESSION['nombre']; ?></strong>
        <?php } else  { ?>
        <strong>No esta registrado/a</strong>
        <?php }
        ?>
    </footer>
    <!--zona de ventanas modal-->
    <div class="modal fade" id="alert" tabindex="-1" role="dialog">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" <span aria-hidden="true">&times;</span>></button>
                    <h4 class="modal-title">Avisos</h4>
               </div>
               <div class="modal-body">
                    <p>Archivo Creado&hellip;</p>
               </div>
               <div clas="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
               </div>
          </div>
     </div>
    </div>
    <script src="js/jquery/jquery-1.11.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/bootstrapValidator.min.js"></script>
    <script src="js/validarLogin.js"></script>
    <script src="js/encrypt/sha1.min.js"></script>
    <script>
        $(document).ready(
                          function(){
                          $('#csv').click(function(){
                            
                            $.ajax({
                                
                             type:'POST',
                             dataType:'Json',
                             url:'csv.php',
                             success:function(resultado){
                                if (resultado.exito){
                                    $('#alert').modal('show');  
                                }
                                else {
                                    alert('Archivo no creado');
                                }
                                },
                             error:function(){}
                                
                             
                            });//fin ajax
                            
                            });//fin click
                          
                          });//fin ready
    </script>
    
 
</body>

</html>