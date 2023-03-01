<?php require_once
('conexion.php');
?><?php




		if(isset($_SESSION['sessionCI'])){
			$ci=$_SESSION['sessionCI'];
		$estado="desconectado";

		$consulta = "UPDATE usuario SET status = '$estado' WHERE ci='$ci'";
		
   		mysqli_query($conection,$consulta);
		
		  mysqli_close($conection);
		} 

		//limpiamos todas las variables de sesion iniciadas
		$_SESSION['sessionName'] = NULL;
		$_SESSION['sessionApellido'] = NULL;
		$_SESSION['sessionRango'] = NULL;
		$_SESSION['sessionCI'] =  NULL;
		$_SESSION['sessionClase'] = NULL;
        $_SESSION['sessionEvaluacion']= NULL;
		  $_SESSION['sessionPerfil'] = NULL;
		  $_SESSION['sessionIdClaseChat']=NULL;
		  $_SESSION['sessionMensaje']=NULL;

		  unset($_SESSION['sessionMensaje']);
          unset($_SESSION['sessionClase']);
		  unset($_SESSION['sessionEvaluacion']);
		  unset($_SESSION['sessionPerfil']);
		  unset($_SESSION['sessionIdClaseChat']);


		  unset($_SESSION['sessionName']);
		  unset($_SESSION['sessionApellido']);	
		  unset($_SESSION['sessionRango']);	
		  unset($_SESSION['sessionCI']);	
		  	header ("Location: index.php");
?>