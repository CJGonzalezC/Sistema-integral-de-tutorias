<?php
require 'conexion.php';

$Claveasigna='1';
$NoControl=$_POST['No'];

#$query="Insert into subtablaasigna (ClaveAsignaTutor,NoControl) values ('$Claveasigna','$NoControl')";
#$resultadoins=$conexion->query($query);

//$query="Insert into subtablaasigna (ClaveAsignaTutor,NoControl) values ('$Claveasigna','$NoControl')";
//$resultadoins=$conexion->query($query);

$query1="select * from Alumnos where NoControl in (select NoControl from subtablaasigna  where ClaveAsignaTutor='$Claveasigna')";
$resultadoinss=$conexion->query($query1);


/*$html2='<div class="row table-responsive">
                  <table class="display" id="TablaTutorias">
                                                <thead>
                                                        <tr>
                                                                <th>ID</th>
                                                                <th>Nombre</th>
                                                                <th>Carrera</th>
                                                                <th>Semestre</th>
                                                        </tr>
                                                </thead><tbody>';
                                
                                while($ro=$resultadoinss->fetch_assoc())
                                {
                                    $html2.='<tr><td>'.$ro['NoControl'].'</td>
                                                 <td>'.$ro['Nombre'].'</td>
                                                 <td>'.$ro['ClaveCarrera'].'</td>
                                                 <td>'.$ro['Semestre'].'</td>
                                            </tr>';
                                                
                                }
                                      $html2.= '</tbody></table></div>';
*/


$html2='<thead>
                                                        <tr>
                                                                <th>ID</th>
                                                                <th>Nombre</th>
                                                                <th>Carrera</th>
                                                                <th>Semestre</th>
                                                        </tr>
                                                </thead><tbody>';
                                
                                while($ro=$resultadoinss->fetch_assoc())
                                {
                                    $html2.='<tr><td>'.$ro['NoControl'].'</td>
                                                 <td>'.$ro['Nombre'].'</td>
                                                 <td>'.$ro['ClaveCarrera'].'</td>
                                                 <td>'.$ro['Semestre'].'</td>
                                            </tr>';
                                                
                                }
                                      $html2.= '</tbody>';
echo $html2;

//<td><p><a  class="btn btn-primary" onclick="eliminar('.$ro['NoControl'].');">Eliminar</a></p></td>
                                                                //<td></td>
?>