 <?php
 //conexion con la base  de datos 
    include 'configdb.php'; //include del archivo con los datos de conexión
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); //Conecta con la base de datos
    $conexion->set_charset("utf8"); //Usa juego caracteres UTF8
	//Desactiva errores
	$controlador = new mysqli_driver();
    $controlador->report_mode = MYSQLI_REPORT_OFF;

	session_start();
	$_SESSION["nombreJesuita"] = $_POST["nombreJesuita"];
	$_SESSION["codigo"]=$_POST["codigo"];
//consulta select

    $sql="SELECT idJesuita FROM jesuita
        where nombre='".$_SESSION["nombreJesuita"]."' AND codigo='".$_SESSION["codigo"]."';";
    //echo $sql;
   

     $resultado=$conexion->query($sql);
     //no se exactamente si esto se puede hacer así e improvisado con lo que vimos en jeves a primera hora 
    if($conexion->affected_rows==0)     
    {
      echo '<a href="formulario_jesuitas_ing.html"><h1 align="center">user or password not found</h1></a>';
    }
	else
	{
		$fila = $resultado->fetch_array();
		$_SESSION["id"]=$fila["idJesuita"];
		echo '<a href="lugaresIng.php"><h1 align="center">go to visit</h1></a>';
	}

    $conexion->close();
?>
