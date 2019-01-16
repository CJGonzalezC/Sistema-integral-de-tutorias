<?php
require ('conexion.php');
$pestado="select IdEstado,Estado from estados";
$resultadopersonal=$conexion->query($pestado);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" src="jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="getmunicipio.js"></script>
</head>

<body>
    <form action="" name="combo" id="combo" method="post">
        <div>Selecciona
            <select id="Estado" name="Estado">
                <option value="0">Selecciona</option>
                <?php while($row=$resultadopersonal->fetch_assoc()){ ?>
                <option value="<?php echo $row['IdEstado']; ?>"><?php echo $row['IdEstado']; ?></option>                                
                <?php } ?>
            </select>
        </div>
        
        <div>Selecciona
            <select id="Municipio" name="Municipio">
                
            </select>
        </div>
        
    </form>
    
    
</body>

</html>