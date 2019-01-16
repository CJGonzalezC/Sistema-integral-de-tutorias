<?php
 require ('conexion.php');

 $Estado=$_POST['Estado'];
 
 $querym="select IdMunicipio,Municipio from Municipios where IdEstado='$Estado'";
 $resultadom=$conexion->query($querym);
 
 $html= '<option value="0">Seleccionaa</option>';
 while($rowm=$resultadom->fetch_assoc())
 {
 $html.= "<option value='".$rowm['IdMunicipio']."'>".$rowm['Municipio']."</option>";
 }
 echo $html;
 ?>