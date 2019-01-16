<?php
session_start();
//verificar que si hay se sesion creada
if(isset($_SESSION['ClaveMaestro']))
{
        header("Location:welcome.php");
}


if(isset($_POST['pasa']) && $_POST['pasa']=='123')
{
            require 'conexion.php';
      #if(!empty($_POST))
      
            $usuario=$_POST['usuario'];
            $password=sha1($_POST['password']);
	     //$password=$_POST['password'];
            
            $query="select * from personal where Nombre='$usuario' and Password='$password'";
            $login= $conexion->query($query);
            $resultado=mysqli_fetch_array($login);
            
            if($resultado['Nombre']==$usuario && $resultado['Password']==$password){
		$_SESSION['Nombre']= $resultado['Nombre'];
                        $_SESSION['ClaveMaestro']= $resultado['ClaveMaestro'];
                        $_SESSION['Tipo']= $resultado['Tipo'];

                        header("Location:welcome.php");
                        
                    //Se incia la session tiempo
                    $_SESSION['tiempo'] = time();
	}
	else {
		echo "Failed to login!";
	}
            
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
        <nav class="navbar navbar-default" style="background: rgb(0,0,0);"></nav>
</div>
</header>
    
    <section class="container">
    <div class="container">
      <div id="contenido">
              <div class="row">
            
                        <div class="col-sm-offset-3 col-sm-6">
                          <div class="panel panel-primary"><!--success, primary o default-->
                              <div class="panel-heading">
                                        <h3 class="panel-title">
                                            Login<i class="fa fa-key fa-2x pull-right"></i><br><small>
                                                Introduzca usuario y password
                                            </small>
                                        </h3>
                              </div>
                              
                              <div class="panel-body">
			
			
                                <form action="" class="form-horizontal" method="POST" autocomplete="off">
                                    
                                    <div class="form-group">
                                        <label for="usuario" class="sr-only">
                                            Usuario:
                                        </label>
                                        <input type="text" id="usuario" name="usuario" class="form-control" placeholder="usuario" autocomplete="off">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="password" class="sr-only">
                                            Password:
                                        </label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="password"  autocomplete="off"> 
                                    </div>
			
			
			
                                    <input type="hidden" id="pasa" name="pasa" value="123">
			
			
                                    <button class="btn btn-primary btn-lg">
                                        Iniciar
                                    </button>
                                    
                                </form>
                              </div>
                              
                              <div class="panel-footer">
                                    <h6>Solo para usuarios registrados</h6>
                              </div>
                          </div>
                        </div>
                  </div>
            </div>
      </div>
    </section>
    
    <aside>
        
    </aside>
    <footer>
        
    </footer>
    
</body>

</html>