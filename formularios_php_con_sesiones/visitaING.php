<?php
    //conexion con la base  de datos 
    include 'configdb.php'; //include del archivo con los datos de conexión
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); //Conecta con la base de datos
    $conexion->set_charset("utf8"); //Usa juego caracteres UTF8
	//Desactiva errores
	$controlador = new mysqli_driver();
    $controlador->report_mode = MYSQLI_REPORT_OFF;
	session_start();
    $ip=$_POST["lugarVisita"];

    $sql ="INSERT INTO visita(idJesuita,ip) VALUES ('". $_SESSION["id"]."','".$ip."');";
	echo $sql;
    $conexion->query($sql);
    if($conexion->affected_rows>0)
      echo '<a href="lugares.php"><h1 align="center">New visit</h1></a>';


 $conexion->close();

?>