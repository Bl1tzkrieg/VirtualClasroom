<?php 

if (!isset($_SESSION)) {
  session_start();
}
?>
<?php
// *** cambia las direcciones si quieres a la base de dato tuya

	$servidor= "localhost";
	$usuario= "root";
	$baseDatos= "id13115693_proyecto";
//	$contrasena = ".Ep123456789";
//	$contrasena = "Mandalorean.1999";
	$contrasena = "Mandalorean.1999";


// *** se conecta con la base de datos 
$conection = mysqli_connect($servidor,$usuario,$contrasena,$baseDatos) or die("Error la base de datos no existe, verifique e intente de nuevo" . mysqli_error($conection)); 
// *** se selecciona la base de datos ya estando seleccionada
$db = mysqli_select_db ($conection, $baseDatos) or die ("Error! no se puede ejecutar una conexion con la base de datos");
//probando base de datos
// *** probando si hubo conexion
// ***$consulta = "SELECT * FROM login";
// ***$resultado = mysqli_query($conection,$consulta) or die ("Hay algo mal en la tabla");

// ***while ($columna = mysqli_fetch_array($resultado)){
// ***	echo "<tr>";
// ***	echo "<td>" . $columna['usuario'] . $columna['pass'];
// ***	echo "</tr>";

// ***}
?>
