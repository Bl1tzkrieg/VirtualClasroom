<?php require_once('conexion.php');

 $usuario = $_POST['username'];
 $contrasena = $_POST['pass'];
 $rango = "profesor";
 $pass= sha1($contrasena); // si la clave viene del sql incriptada
 

if(isset($_POST["submit"]))
{

 $consulta = "SELECT contrasena, user ,ci, rango, imagen FROM usuario WHERE contrasena='$contrasena' AND user='$usuario' AND rango='$rango' " or die("Error en la consulta" . mysqli_error($link));

 $resultado = $conection ->query ($consulta);
 	
 $rows = $resultado ->num_rows;

if($rows>0){

 $datos = $resultado ->fetch_assoc();
 $ci=$datos['ci'];

 $consulta2= "SELECT nombre,apellido FROM persona WHERE ci='$ci' " or die("Error en la consulta" . mysqli_error($link));

 $resultado2 = $conection ->query ($consulta2);
 $datos2 = $resultado2 ->fetch_assoc();
 	
	$_SESSION['sessionName'] = $datos2['nombre'];
	$_SESSION['sessionApellido'] = $datos2['apellido'];
	$_SESSION['sessionRango'] = $datos['rango'];
	$_SESSION['sessionCI'] =  $datos['ci'];
	$_SESSION['sessionPerfil'] = $datos['imagen'];

	header("location: userInstructor.php");

	
	$estado="conectado";

	$consulta = "UPDATE usuario SET status = '$estado' WHERE ci='$ci'"; 

    mysqli_query($conection,$consulta);


	
}

else{

	header("location: login instructor.php?/=1");

}


}
?>