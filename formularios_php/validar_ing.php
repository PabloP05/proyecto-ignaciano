<?php
    //conexion con la base  de datos 
    include 'configdb.php'; //include del archivo con los datos de conexión
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); //Conecta con la base de datos
    $conexion->set_charset("utf8"); //Usa juego caracteres UTF8
	//Desactiva errores
	$controlador = new mysqli_driver();
    $controlador->report_mode = MYSQLI_REPORT_OFF;

    $jesuita=$_POST["nombreJesuita"];
    $codigo=$_POST["codigo"];

//consulta select

    $sql="SELECT idJesuita FROM jesuita
        where nombre='".$jesuita."' AND codigo='". $codigo."';";
    //echo $sql;
   

   

    $resultado=$conexion->query($sql);
     //no se exactamente si esto se puede hacer así e improvisado con lo que vimos en jeves a primera hora 
    if($conexion->affected_rows==0)     
    {
        header("Location:formulario_jesuitas_ing.php");
    }
   ?>



<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Visits</title>
    <style>
        body{
            margin: 0 auto;
            width:1200px;
            background-color:#8ef3ff;
            font-family: "Brush Script MT", cursive;
        }
        form{
            width:200px;
            height:200px;
            margin: auto;
            padding-left:20px;
            border:1px solid gray;
            border-radius:10px;
            background:linear-gradient(180deg,#48ffd3,#48ff9e);
            font-size:large;
            font-style:italic;
        }
        #boton{
            margin-top:10px;
        }
        input{
            margin-top:10px;
        }
        h1{
            text-align: center;
        }
        #bloqueo {
            display:none;
        }
    </style>
</head>
<body>
    <?php
        echo '<h1> hello, '.$jesuita.', Where do you want to travel?</h10>';
    ?>
    <form action="visita.php" method="post">
    <input type="submit" value="login"><br>
        <select name="lugarVisita">
            <?php
                $sql="SELECT ip,lugar FROM lugar;";
                $resultado=$conexion->query($sql);
                while($fila=$resultado->fetch_array())
                    echo '<option name="id" value="'.$fila['ip'].'">'.$fila['lugar'].'</option>';
            ?>
        </select><br>
        
        <?php

        $sql="SELECT idJesuita FROM jesuita
        where nombre='".$jesuita."' AND codigo='". $codigo."';";
        
        $resultado=$conexion->query($sql);
        $fila=$resultado->fetch_array();
        echo '<input type="text" id="bloqueo" name="id" value="'.$fila["idJesuita"].'"/>';
        ?>
        
    </form>
</body>
</html>



<?php
    $conexion->close();
?>