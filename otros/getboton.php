<?php
 require ('conexion.php');

 $ClaveMaestro=$_POST['ClaveMaestro'];
 
 $querym="select Nombre from personal where ClaveMaestro='$ClaveMaestro'";

 $resultadom=$conexion->query($querym);
 
 //$html= '<option value="0">Seleccionaa</option>';
 //while($rowm=$resultadom->fetch_assoc())
 //{
 $rowm=mysqli_fetch_array($resultadom);
 //$html= "<option value='".$rowm['Nombre']."'>".$rowm['Nombre']."</option>";
 //$html3= "<value='".$rowm['Nombre']."'>".$rowm['Nombre'].">";
  //$html2="<input type='text' value'".$rowm['Nombre']."' text='".$rowm['Nombre']."' id='N' name='N' placeholder=''>";

  #$html2='<input value="'.$rowm['Nombre'].'">';
  
  $html2='<div class="col-sm-12">
                                <a class="btn btn-primary" id="botonn" target="_blank">Imprimir Lista</a>
                        </div> ';
 
 /*$html2='<div class="row table-responsive">
                  <table class="table table-striped">
                                                <thead>
                                                        <tr>
                                                                <th>'.$rowm['Nombre'].'</th>
                                                                <th>Nombre</th>
                                                                <th>Carrera</th>
                                                                <th>Semestre</th>
                                                                <th></th>
                                                                <th></th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                                <td>Id</td>
                                                                <td>Nombre</td>
                                                                <td>Carrera</td>
                                                                <td>Semestre</td>
                                                                <td></td>
                                                                <td></td>
                                                        </tr>
                                                </tbody>
                                        </table>
                                </div>';*/
 echo $html2;


 /*
 if(!empty($_POST['ClaveMaestro']))
 {
    $Clave =$_POST['ClaveMaestro'];
    if($Clave=='LUIS'){
        $return=array('telefono'=>'66565665','direccion'=>'No existe calle');
    }
    else
    {
        return=array('El nombre no esta guardado en la base de datos');
    }
    die(json_encode($return));
 }
 */
?>