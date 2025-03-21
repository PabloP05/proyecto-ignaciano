<?php
    //conexion con la base  de datos 
    include 'configdb.php'; //include del archivo con los datos de conexión
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); //Conecta con la base de datos
    $conexion->set_charset("utf8"); //Usa juego caracteres UTF8
	//Desactiva errores
	$controlador = new mysqli_driver();
    $controlador->report_mode = MYSQLI_REPORT_OFF;


    $sql = "INSERT INTO jesuita (codigo,nombre,nombreAlumno,firma,firmaIngles) VALUES ('".$_POST["codigo"]."','".$_POST["nombreJesuita"]."','".$_POST["nAlu"]."','".$_POST["jtaESP"]."','".$_POST["jtaING"]."');";

    //echo $sql;
    $conexion ->query($sql);

    if($conexion->affected_rows>0)
    {
        echo "<h2 align='center'>Jesuita agregado con exito</h2>";
        echo "<a href='login.html'><h3 align='center'>volver</h3></a>";
    }
    else
    {
        echo "<h2 align='center'>fallo</h2>";
        echo "<a href='login.html'><h3 align='center'>volver</h3></a>";
    }

     // cierre de conexion con la base de datos 
   $conexion->close();
?>