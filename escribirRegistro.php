<?php require_once('conexion.php');
	require_once('Contadores.php');

	if(isset($_POST["estudiante"]))
	{
		$ci= $_POST['ci'];
		$nombre =$_POST['nombre'];
		$apellido =$_POST['apellido'];
		$edad =$_POST['edad'];
		$genero =$_POST['genero'];
		$usuario =$_POST['usuario'];
		$email =$_POST['email'];
		$contrasena=$_POST['pass'];
		$contrasena2=$_POST['pass2'];
		$predeterminado = 0;
		$estudiante="estudiante";

		if ($contrasena == $contrasena2) {
		
		$consulta = "SELECT ci,user FROM usuario WHERE ci='$ci' or user='$usuario' " or die("Error en la consulta" . mysqli_error($link));

		$resultado = $conection ->query ($consulta);
 	    
 		$rows = $resultado ->num_rows;

	 		if($rows>0){
	 			header ("Location: registro estudiante.php?/=1");
	 		}
 			else{
 				$nombre_camp = false;
 				$apellido_camp = false;
 				for($i = 0 ; $i < strlen($nombre); $i++){
 					if( (ord($nombre[$i])>= 65 && ord($nombre[$i])<= 90 ) || (ord($nombre[$i])>= 97 && ord($nombre[$i])<= 122 )  ){
 						echo $nombre[$i];

 					}else{
 						$nombre_camp = true;
 					}
 				}
 				
 				for($i = 0 ; $i < strlen($apellido); $i++){
 					if( (ord($apellido[$i])>= 65 && ord($apellido[$i])<= 90 ) || (ord($apellido[$i])>= 97 && ord($apellido[$i])<= 122 )  ){
 						echo $apellido[$i];

 					}else{
 						$apellido_camp = true;
 					}

 				}

 				if($nombre_camp == true){
 					header ("Location: registro estudiante.php?/=4");
 				}

 				else if($apellido_camp == true){
 					header ("Location: registro estudiante.php?/=5");
 				
 				}else{

		 			$sql= "INSERT INTO usuario(ci,user,contrasena,rango,correo,persona_id) VALUES ('$ci','$usuario','$contrasena','$estudiante' ,'$email','$ci')";
					mysqli_query($conection,$sql);

					$sql= "INSERT INTO persona(ci,nombre,apellido,edad,genero) VALUES ('$ci','$nombre','$apellido','$edad','$genero')";
					mysqli_query($conection,$sql);

					$sql= "INSERT INTO alumno(ci,rango) VALUES ('$ci','$estudiante')";

					mysqli_query($conection,$sql);
					
					header ("Location: registro estudiante.php?/=2");
				}
		
 			}
		
		}

		else{
			header ("Location: registro estudiante.php?/=3");
		}
	}

	if(isset($_POST["profesor"]))
	{
		$ci= $_POST['ci'];
		$nombre =$_POST['nombre'];
		$apellido =$_POST['apellido'];
		$edad =$_POST['edad'];
		$genero =$_POST['genero'];
		$usuario =$_POST['usuario'];
		$email =$_POST['email'];
		$contrasena=$_POST['pass'];
		$contrasena2=$_POST['pass2'];
		$predeterminado = 0;	
		$profesor="profesor";

		if ($contrasena == $contrasena2) {

			$consulta2 = "SELECT ci,user FROM usuario WHERE ci='$ci' or user='$usuario'" or die("Error en la consulta" . mysqli_error($link));

			$resultado2 = $conection ->query ($consulta2);
	 	
	 		$rows2 = $resultado2 ->num_rows;

	 		if($rows2>0){
	 			header ("Location: registro instructor.php?/=1");
	 		}
	 		else{

	 			$nombre_camp = false;
 				$apellido_camp = false;
 				for($i = 0 ; $i < strlen($nombre); $i++){
 					if( (ord($nombre[$i])>= 65 && ord($nombre[$i])<= 90 ) || (ord($nombre[$i])>= 97 && ord($nombre[$i])<= 122 )  ){
 						echo $nombre[$i];

 					}else{
 						$nombre_camp = true;
 					}
 				}
 				
 				for($i = 0 ; $i < strlen($apellido); $i++){
 					if( (ord($apellido[$i])>= 65 && ord($apellido[$i])<= 90 ) || (ord($apellido[$i])>= 97 && ord($apellido[$i])<= 122 )  ){
 						echo $apellido[$i];

 					}else{
 						$apellido_camp = true;
 					}

 				}



 				if($nombre_camp == true){
 					header ("Location: registro instructor.php?/=4");
 				}

 				else if($apellido_camp == true){
 					header ("Location: registro instructor.php?/=5");
 				
 				}else{

					$sql= "INSERT INTO solicitud(ci,nombre,apellido,edad,genero,usuario,email,contrasena,rango) VALUES ('$ci','$nombre','$apellido','$edad' ,'$genero','$usuario','$email','$contrasena','$profesor')";
					$queryreturn = mysqli_query($conection,$sql);

				
					include("cerrar conexion.php");

				

					//$secundo =5;
					//sleep($secundo);
					header ("Location: registro instructor.php?/=2");
				}
		 	}
	 	}

	 else{
	 	header ("Location: registro instructor.php?/=3");
	 }
	}



	if(isset($_POST["crearCurso"]))
	{

		$id= Obtener_Contador("./Contadores/Clases.txt");
		$asignatura =$_POST['asignatura'];
		$ciCreador = $_SESSION['sessionCI'];
			
		$consulta = "SELECT idClase FROM clases WHERE idClase='$id' " or die("Error en la consulta" . mysqli_error($link));

		$resultado = $conection ->query ($consulta);
 	    
 		$rows = $resultado ->num_rows;

 		if($rows>0){
 			header ("Location: crear curso.php?/=1");
 		}
 		else{

 			$archivo =fopen("log/".$id.'.html', "w");
 			fclose($archivo);
 			$sql1= "INSERT INTO clases(idClase,ciCreador,asignatura) VALUES ('$id','$ciCreador','$asignatura')";
				mysqli_query($conection,$sql1);


			$sql= "INSERT INTO profesor_has_clases(ci,idClase) VALUES ('$ciCreador','$id')";
				mysqli_query($conection,$sql);


		//sleep($secundo);
	header ("Location: crear curso.php?/=2");
		
 		}

	}

	if(isset($_POST["anadir"]))
	{
		$id= $_POST['idCurso'];
		$ci =$_POST['ci'];
		$ciCreador = $_SESSION['sessionCI'];
			
		$consulta = "SELECT idClase FROM clases WHERE idClase='$id' AND ciCreador='$ciCreador' " or die("Error en la consulta" . mysqli_error($link));

		$resultado = $conection ->query ($consulta);
 	    
 		$rows = $resultado ->num_rows;

 		if($rows>0){
 		$rango="estudiante";
		
		$consulta = "SELECT rango FROM usuario WHERE ci='$ci' AND rango='$rango' " or die("Error en la consulta" . mysqli_error($link));

		$resultado = $conection ->query ($consulta);
 	    
 		$rows = $resultado ->num_rows; 			


 		if($rows>0){

 			$consulta = "SELECT * FROM alumno_has_clases WHERE ci='$ci' AND idClase='$id'  " or die("Error en la consulta" . mysqli_error($link));

			$resultado = $conection ->query ($consulta);
 	    
 			$rows = $resultado ->num_rows; 


 			if($rows>0){
 				header ("Location: anadir.php?/=1");
 				
 			}

 		else{
 		$sql= "INSERT INTO alumno_has_clases(ci,idClase) VALUES ('$ci','$id')";
			   mysqli_query($conection,$sql);

		
		header ("Location: anadir.php?/=2");
		}
 		}

 		else{
 			header ("Location: anadir.php?/=3");
 			
 		}	
 		}
 		else{
 			header ("Location: anadir.php?/=4");
 		}
 	}

 	if(isset($_POST["borrar"]))
	{
		$id= $_POST['idCurso'];
		$ciCreador = $_SESSION['sessionCI'];
			
		$consulta = "SELECT idClase FROM clases WHERE idClase='$id' AND ciCreador='$ciCreador' " or die("Error en la consulta" . mysqli_error($link));

		$resultado = $conection ->query ($consulta);
 	    
 		$rows = $resultado ->num_rows;

 		if($rows>0){
		 			

 		$sql= "DELETE FROM clases WHERE idClase='$id' AND ciCreador='$ciCreador' " or die("Error en la consulta" . mysqli_error($link));
		mysqli_query($conection,$sql);

		$sql= "DELETE FROM alumno_has_clases WHERE idClase='$id' " or die("Error en la consulta" . mysqli_error($link));
		mysqli_query($conection,$sql);

		$archivoTxt =fopen("log/".$id.'.html', "w");
		fclose($archivoTxt);

		$sql= "DELETE FROM clases_has_tarea WHERE idClase='$id' " or die("Error en la consulta" . mysqli_error($link));
		mysqli_query($conection,$sql);

		$sql= "DELETE FROM nota WHERE idClase='$id' " or die("Error en la consulta" . mysqli_error($link));
		mysqli_query($conection,$sql);

		$sql= "DELETE FROM profesor_has_clases WHERE idClase='$id' " or die("Error en la consulta" . mysqli_error($link));
		mysqli_query($conection,$sql);

		$sql= "DELETE FROM tarea WHERE idClase='$id' " or die("Error en la consulta" . mysqli_error($link));
		mysqli_query($conection,$sql);


		$sql= "DELETE FROM nota WHERE idClase='$id' " or die("Error en la consulta" . mysqli_error($link));
		mysqli_query($conection,$sql);



		header ("Location: borrar curso.php?/=1");
 		
	
 		}

 		else{
 		header ("Location: borrar curso.php?/=2");
 		}
 	}


 	if(isset($_POST["asignar"]))
	{
	
		$id= $_POST['idCurso'];
		$ciCreador = $_SESSION['sessionCI'];
		$numeroAsignacion = Obtener_Contador("./Contadores/Asignaciones.txt");
		$titulo = $_POST ['titulo'];
		$descripcion = $_POST ['descripcion'];
		$nombre_archivo = $_FILES["archivo"]["name"];
			
		$consulta = "SELECT idClase FROM clases WHERE idClase='$id' AND ciCreador='$ciCreador' " or die("Error en la consulta" . mysqli_error($link));

		$resultado = $conection ->query ($consulta);
 	    
 		$rows = $resultado ->num_rows;

 		if($rows>0){

 			$consulta = "SELECT idClase FROM clases_has_tarea WHERE idClase='$id' AND idEvaluacion='$numeroAsignacion' " or die("Error en la consulta" . mysqli_error($link));

		$resultado = $conection ->query ($consulta);
 	    
 		$rows = $resultado ->num_rows;



 		if($rows>0){
 			header ("Location: asignar tarea.php?/=1");
 		}


		else{ 
		 $sql= "INSERT INTO clases_has_tarea(idClase,idEvaluacion) VALUES ('$id','$numeroAsignacion')";
			mysqli_query($conection,$sql);

		$sql= "INSERT INTO profesor_has_nota(ci,idEvaluacion) VALUES ('$ciCreador','$numeroAsignacion')";
			mysqli_query($conection,$sql);	

		
		if($nombre_archivo!=null){
			if(move_uploaded_file($_FILES["archivo"]["tmp_name"], "asignaciones/{$nombre_archivo}"))
 			{	
 				$ruta = "asignaciones/{$nombre_archivo}";

			$sql= "INSERT INTO tarea(idClase,idEvaluacion,titulo,descripcion,ruta) VALUES ('$id','$numeroAsignacion','$titulo','$descripcion','$ruta')";
				mysqli_query($conection,$sql);	
			}
		}

		else{
			$sql= "INSERT INTO tarea(idClase,idEvaluacion,titulo,descripcion) VALUES ('$id','$numeroAsignacion','$titulo','$descripcion')";
				mysqli_query($conection,$sql);
		}

	    $consulta = "SELECT ci FROM alumno_has_clases WHERE idClase= '$id'";

	    $resultado = mysqli_query($conection,$consulta) or die ("Hay algo mal en la tabla");

	    while ($columna = mysqli_fetch_array($resultado)){
	    	$cedula= $columna['ci'];

	    	$sql= "INSERT INTO alumno_has_nota(ci,idEvaluacion) VALUES ('$cedula','$numeroAsignacion')";
				mysqli_query($conection,$sql);	

			$sql= "INSERT INTO nota(idClase,idEvaluacion,ci) VALUES ('$id','$numeroAsignacion','$cedula')";
				mysqli_query($conection,$sql);		
	    }

		header ("Location: asignar tarea.php?/=2");
		}
 		}
 		else{
 			header ("Location: asignar tarea.php?/=3");
 		}
 	
 	}


 	if(isset($_POST["entrega"]))
	{
		$archivo_nombre = $_FILES["archivo"]["name"];
		$respuesta= $_POST['respuesta'];

		$idClas= $_SESSION['sessionClase'];
        $idEval= $_SESSION['sessionEvaluacion'];
        $cedula = $_SESSION['sessionCI'];

        if($archivo_nombre==NULL && $respuesta==NULL ){

        	header("Location: entregar.php");
        }

        $consulta = "SELECT * FROM nota WHERE idClase='$idClas' AND idEvaluacion='$idEval' ANd ci ='$cedula'" or die("Error en la consulta" . mysqli_error($link));

		$resultado = $conection ->query ($consulta);
		
		$row = $resultado ->num_rows;

		if($row==0){
			$consultica= "INSERT INTO alumno_has_nota(ci,idEvaluacion) VALUES ($cedula,$idEval)"or die ("Error en la base de datos" . mysqli_error($link));
			mysqli_query($conection,$consultica);

			$consultica = "INSERT INTO nota(idClase,idEvaluacion,ci) VALUES ($idClas,$idEval,$cedula)" or die ("Error en la base de datos" . mysqli_error($link));
			mysqli_query($conection,$consultica);
		}


		$consulta = "SELECT * FROM nota WHERE idClase='$idClas' AND idEvaluacion='$idEval' ANd ci ='$cedula'" or die("Error en la consulta" . mysqli_error($link));

		$resultado = $conection ->query ($consulta);
		
		$row = $resultado ->num_rows;



		if($row>0){
		$datos = $resultado ->fetch_assoc();
		

		if($datos['ruta']!=NULL || $datos['respuesta']!=NULL){
			header ("Location: tarea pendiente.php?/=1");
		}

		else{
			
	   if($_FILES["archivo"]!=NULL){		
        if(move_uploaded_file($_FILES["archivo"]["tmp_name"], "asignaciones/{$archivo_nombre}")){
        	$ruta = "asignaciones/{$archivo_nombre}";

        	$consulta = "UPDATE nota SET ruta = '$ruta' WHERE idClase='$idClas' AND idEvaluacion='$idEval' AND ci='$cedula'"; 

        	mysqli_query($conection,$consulta);
        }

       }

       if($respuesta!=NULL){
       	$consulta = "UPDATE nota SET respuesta = '$respuesta' WHERE idClase='$idClas' AND idEvaluacion='$idEval' AND ci='$cedula'";
       	mysqli_query($conection,$consulta);
       }

        header ("Location: tarea pendiente.php?/=2");
       }


		$_SESSION['sessionClase'] = NULL;
        $_SESSION['sessionEvaluacion']= NULL;

          unset($_SESSION['sessionClase']);
		  unset($_SESSION['sessionEvaluacion']);



    }

		  		
	}



	if(isset($_POST["calificar"]))
	{
		$nota= $_POST['nota'];
		$idClas= $_SESSION['sessionClase'];
        $idEval= $_SESSION['sessionEvaluacion'];
        $cedula = $_SESSION['sessionAlumnoId'];

        $consulta = "SELECT * FROM nota WHERE idClase='$idClas' AND idEvaluacion='$idEval' ANd ci ='$cedula'" or die("Error en la consulta" . mysqli_error($link));

		$resultado = $conection ->query ($consulta);
		$datos = $resultado ->fetch_assoc();

		if($datos['valor']!=0){
			echo "Ya se le asigno anteriormente una calificacion a esta Tarea";
		}

		else{
		    
        	$consulta = "UPDATE nota SET valor = '$nota' WHERE idClase='$idClas' AND idEvaluacion='$idEval' AND ci='$cedula'"; 

        	mysqli_query($conection,$consulta);
        	header ("Location: calificar tarea.php?/=$idClas");

        
    }

		$_SESSION['sessionClase'] = NULL;
        $_SESSION['sessionEvaluacion']= NULL;
        $_SESSION['sessionAlumnoId']= NULL;

          unset($_SESSION['sessionAlumnoId']);
          unset($_SESSION['sessionClase']);
		  unset($_SESSION['sessionEvaluacion']);
		  		
	}


	if(isset($_POST["definitiva"]))
	{
		$nota= $_POST['notaDef'];
		$cedula = $_SESSION['sessionAlumnoId'];
		$idcla =$_SESSION['sessionClase'];


        $consulta = "SELECT * FROM alumno_has_clases WHERE ci='$cedula' AND idClase= '$idcla'" or die("Error en la consulta" . mysqli_error($link));

		$resultado = $conection ->query ($consulta);
		$datos = $resultado ->fetch_assoc();

		if($datos['notaDef']!=NULL){
			echo "Ya se le asigno anteriormente una calificacion a este alumno";
		}

		else{
        
        	$consulta = "UPDATE alumno_has_clases SET notaDef = '$nota' WHERE ci='$cedula' AND idClase= '$idcla'"; 

        	mysqli_query($conection,$consulta);
        	header ("Location: definitiva.php?/=$idcla");

        
    }

		
        $_SESSION['sessionAlumnoId']= NULL;

          unset($_SESSION['sessionAlumnoId']);
        
		  		
	}

	if(isset($_POST["actuName"]))
	{
		$nombre= $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$edad =$_POST['edad'];
		$email =$_POST['email'];
		$pass =$_POST['pass'];
		$ci=  $_SESSION['sessionCI'];

        $consulta = "SELECT * FROM usuario WHERE ci='$ci' AND contrasena= '$pass'" or die("Error en la consulta" . mysqli_error($link));

		$resultado = $conection ->query ($consulta);
		$datos = $resultado ->fetch_assoc();

		if(isset($datos)){

        	$consulta = "UPDATE usuario SET correo = '$email' WHERE ci='$ci' AND contrasena= '$pass'" or die("Error en la consulta" . mysqli_error($link));; 

        	$consulta2 = "UPDATE persona SET nombre = '$nombre' , apellido = '$apellido' , edad = '$edad' WHERE ci='$ci'" or die("Error en la consulta" . mysqli_error($link)); 

        	mysqli_query($conection,$consulta);
        	mysqli_query($conection,$consulta2);



        	$consultaz= "SELECT nombre,apellido FROM persona WHERE ci='$ci' " or die("Error en la consulta" . mysqli_error($link));

 			$resultadoz = $conection ->query ($consultaz);
 			$datosz = $resultadoz ->fetch_assoc();
 	
			$_SESSION['sessionName'] = $datosz['nombre'];
			$_SESSION['sessionApellido'] = $datosz['apellido'];
	

        	header ("Location: configName.php?/=e");
        }

        else{
         header ("Location: configName.php?/=x");	
        }
        
      	  		
	}


	if(isset($_POST["actuPass"]))
	{
		$new= $_POST['new'];
		$pass =$_POST['pass'];
		$ci=  $_SESSION['sessionCI'];

        $consulta = "SELECT * FROM usuario WHERE ci='$ci' AND contrasena= '$pass'" or die("Error en la consulta" . mysqli_error($link));

		$resultado = $conection ->query ($consulta);
		$datos = $resultado ->fetch_assoc();

		if(isset($datos)){

        	$consulta = "UPDATE usuario SET contrasena = '$new' WHERE ci='$ci'" or die("Error en la consulta" . mysqli_error($link));

        	mysqli_query($conection,$consulta);
        	header ("Location: configPass.php?/=e");
        }

        else{
         header ("Location: configPass.php?/=x");	
        }	  		
	}


	if(isset($_POST["perfil"]))
	{
		$archivo_nombre = $_FILES["foto"]["name"];
		$ci=  $_SESSION['sessionCI'];

		if(move_uploaded_file($_FILES["foto"]["tmp_name"], "perfil/{$archivo_nombre}")){
        	$ruta = "perfil/{$archivo_nombre}";

        	$consulta = "UPDATE usuario SET imagen = '$ruta' WHERE ci='$ci'" or die ("Error en la base de datos" . mysqli_error($link)); 

        	mysqli_query($conection,$consulta);
        	
        	$_SESSION['sessionPerfil']=$ruta;
        	header ("Location: subir perfil.php?/=s");



        }

        else{
        	
         header ("Location: subir perfil.php?/=x");
        }

      	  		
	}


	if(isset($_POST["mensaje"]))
	{


		$idClase = $_SESSION['sessionIdClaseChat'];
		$mensaje = $_POST['mensaje'];
		$nombre=$_SESSION['sessionName'];


		$archivoTxt =fopen("log/".$idClase.'.html', "a");
		fwrite($archivoTxt, $nombre. PHP_EOL);
		fwrite($archivoTxt, $mensaje. "<br>". PHP_EOL);

		fclose($archivoTxt);

		header ("Location: chat2.php");

	}

	if(isset($_POST["eliminar"])){

		$cedula = $_POST['ci'];
		$claseId= $_POST['idCurso'];

		$consulta = "SELECT * FROM alumno_has_clases WHERE ci='$cedula' AND idClase = '$claseId'" or die("Error de conexion" . mysqli_error($link));

		$sql = $conection ->query($consulta);

		$row = $sql ->num_rows;

		if($row>0){

			$datos = $sql ->fetch_assoc();

			$elimina = "DELETE  FROM alumno_has_clases WHERE ci ='$cedula' AND idClase = '$claseId'" or die ("Error en la Base de Datos" . mysqli_error($link));
			mysqli_query($conection,$elimina);

			$elimina = "DELETE  FROM nota WHERE ci = '$cedula' AND idClase = '$claseId'" or die ("Error en la base de Datos" . mysqli_error($link));
			mysqli_query($conection,$elimina);

			header("Location: eliminar.php?/=2");


		}
		else{
			header("Location: eliminar.php?/=1");
		}

	}

	if(isset($_POST["portal"])){

		$idClase = $_POST['idCurso'];
		$ubicacion = $_POST['ubica'];

		if($ubicacion == "calificar tarea.php"){
			header("Location: calificar tarea.php?/=$idClase");
		}

		if($ubicacion == "definitiva.php"){
			header("Location: definitiva.php?/=$idClase");
		}

		if($ubicacion == "tareas calificadas.php"){
			$c = $_POST['ci'];			
			header("Location: tareas calificadas.php?/=$idClase&k=$c");
		}


		if($ubicacion == "notas del curso.php"){
			header("Location: notas del curso.php?/=$idClase");
		}
		
		if($ubicacion == "lista alumnos.php"){
			header("Location: lista alumnos.php?/=$idClase");
		}

		if($ubicacion == "notas.php"){
			header("Location: lista alumnos.php?/=$idClase");
		}

		if($ubicacion == "tareas asignadas.php"){
			header("Location: tareas asignadas.php?/=$idClase");
		}

	}

//----------------------------------------------------------------------------------------------------------

	if(isset($_POST["servicio"])){
		header("Location: servicio.php?/=1");
	}


	if(isset($_POST["soporte"])){
		$nombre= $_POST['nombre'];
		$email= $_POST['email'];
		$texto= $_POST['texto'];
		$v="no";

		if($email!=NULL && $texto!=NULL){

		$sql="SELECT * FROM soporte" or die("Error al consultar ". mysqli_error($link));
		$resultado = $conection ->query($sql);

		$numero=NULL;

		while ( $columna = mysqli_fetch_array($resultado)) {
				$numero=$columna['id'];
		}

		if($numero==NULL){
			$numero=0;
		}
		else{
			$numero=$numero+1;
		}	




		$sql= "INSERT INTO soporte(nombre,email,inconveniente,view,id) VALUES ('$nombre','$email','$texto','$v','$numero')" or die("Error en la escritura " . mysqli_error($link));

		mysqli_query($conection,$sql);

		}
		header("Location: soporte.php?/=1");

	}

	if(isset($_POST["preguntas"])){
		$email = $_POST['email'];
		$texto = $_POST['texto'];
		$v="no";

		if($email!=NULL && $texto!=NULL){


		$sql="SELECT * FROM preguntas" or die("Error al consultar ". mysqli_error($link));
		$resultado = $conection ->query($sql);

		$numero=NULL;

		while ( $columna = mysqli_fetch_array($resultado)) {
				$numero=$columna['id'];
		}

		if($numero==NULL){
			$numero=0;
		}
		else{
			$numero=$numero+1;
		}




		$sql="INSERT INTO preguntas(email,pregunta,view,id) VALUES ('$email','$texto','$v','$numero')" or die ("Error en la escritura" . mysqli_error($link));

		mysqli_query($conection,$sql);
	}

		header("Location: preguntas.php?/=1");

	}



	if(isset($_POST["contacto"])){
		$nombre= $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$email = $_POST['email'];
		$telf= $_POST['tlf'];
		$msj= $_POST['msj'];
		$v="no";

		if($email!=NULL && $msj!=NULL){


		$sql="SELECT * FROM contacto" or die("Error al consultar ". mysqli_error($link));
		$resultado = $conection ->query($sql);

		$numero=NULL;

		while ( $columna = mysqli_fetch_array($resultado)) {
				$numero=$columna['id'];
		}

		if($numero==NULL){
			$numero=0;
		}
		else{
			$numero=$numero+1;
		}


		$sql="INSERT INTO contacto(nombre,apellido,email,telefono,mensaje,view,id) VALUES ('$nombre','$apellido','$email','$telf','$msj','$v',$numero)" or die ("errpr en la escritura" . mysqli_error($link));

		mysqli_query($conection,$sql);
		}

		header("Location: contacto.php?/=1");
	}


	if(isset($_POST["sugerencia"])){
		$sugerencia= $_POST['texto'];
		$v="no";

		if($sugerencia!=NULL){



		$sql="SELECT * FROM sugerencia" or die("Error al consultar ". mysqli_error($link));
		$resultado = $conection ->query($sql);

		$numero=NULL;

		while ( $columna = mysqli_fetch_array($resultado)) {
				$numero=$columna['id'];
		}

		if($numero==NULL){
			$numero=0;
		}
		else{
			$numero=$numero+1;
		}


			$sql="INSERT INTO sugerencia(sugerencia,view,id) VALUES('$sugerencia','$v','$numero')";

			mysqli_query($conection,$sql);


		}
		header("Location: sugerencia.php?/=1");

	}

	//-----------------------------------------------------------------------------------------------------------

	if(isset($_GET["soportes"])){
		
		$nombre= $_GET['nombre'];
		$email= $_GET['email'];
		$texto = $_GET['soportes'];


		$sql="DELETE FROM soporte WHERE nombre='$nombre' AND email='$email' AND id=$texto";

		mysqli_query($conection,$sql);


		header("Location: bandeja.php");

	}


	if(isset($_GET["pregunta"])){
		
		$email= $_GET['email'];
		$texto = $_GET['soportes'];
		$numero=$_GET['pregunta'];


		$sql="DELETE FROM preguntas WHERE email='$email' AND id='$numero'";

		mysqli_query($conection,$sql);

		header("Location: bandeja2.php");

	}


	if(isset($_GET["contactos"])){
	 $VA1 =$_GET['contactos'];
     $VA2 =$_GET['nombre'];
     $VA5 =$_GET['apellido'];
     $VA3 =$_GET['email'];
     $VA6 =$_GET['telefono'];


		$sql="DELETE FROM contacto WHERE id='$VA1'";

		mysqli_query($conection,$sql);


		header("Location: bandeja3.php");

	}


	if(isset($_GET["sugerencias"])){
	 $VA1 =$_GET['sugerencias'];


		$sql="DELETE FROM sugerencia WHERE id='$VA1'";

		mysqli_query($conection,$sql);


		header("Location: bandeja4.php");

	}
	//-------------------------------------------------------------------------------------------------------------------------------


	if(isset($_POST["cambiarPass"])){
	 $ci =$_POST['ci'];
	 $pass =$_POST['pass'];

	 $r;
	 $consulta="SELECT * FROM usuario WHERE ci='$ci'";

	 $data= $conection ->query($consulta);

	 $r= $data->num_rows;

	 if($r>0){

		$sql="UPDATE usuario SET contrasena='$pass' WHERE ci='$ci'";

		mysqli_query($conection,$sql);


		header("Location: cambioPassAdmin.php?/=1");
	}

	else{
		header("Location: cambioPassAdmin.php?/=2");	
	}

	}


	if(isset($_GET["acepProf"])){

		$ci= $_GET['acepProf'];
	

		$consulta = "SELECT * FROM solicitud WHERE ci='$ci'" or die ("Error en la consulta" . mysqli_error($link));
		$resultado= $conection->query($consulta);


		$r=$resultado ->num_rows;
		
		if($r>0){

		$datos= $resultado ->fetch_assoc();

		$usuario=$datos['usuario'];
		$contrasena=$datos['contrasena'];
		$profesor=$datos['rango'];
		$email=$datos['email'];
		$nombre=$datos['nombre'];
		$apellido=$datos['apellido'];
		$edad=$datos['edad'];
		$genero=$datos['genero'];


		$sql= "INSERT INTO usuario(ci,user,contrasena,rango,correo,persona_id) VALUES ('$ci','$usuario','$contrasena','$profesor' ,'$email','$ci')";
		mysqli_query($conection,$sql);

		$sql= "INSERT INTO persona(ci,nombre,apellido,edad,genero) VALUES ('$ci','$nombre','$apellido','$edad','$genero')";
		mysqli_query($conection,$sql);

		$sql= "INSERT INTO profesor(ci,rango) VALUES ('$ci','$profesor')";

		mysqli_query($conection,$sql);


		$sql = "DELETE FROM solicitud WHERE ci='$ci'" or die ("Error en la consulta" . mysqli_error($link));
		mysqli_query($conection,$sql);
//		$sql= "INSERT INTO profesor_has_clases(ci,clases_id_clases) VALUES ('$ci','$predeterminado')";
		
//		mysqli_query($conection,$sql);
			//echo '<script language="javascript">alert("Se ha creado el usuariosatisfactoriamente");</script>';

		//echo "Se ha creado el usuario satisfactoriamente";

		
		//include("cerrar conexion.php");

		//$secundo =5;
		//sleep($secundo);
		header ("Location: solicitud.php?/=2");
		}
		else{
			
			header ("Location: solicitud.php?/=1");
		}
	 }


	 if(isset($_GET["NacepProf"])){

		$ci= $_GET['NacepProf'];

		$sql = "DELETE FROM solicitud WHERE ci='$ci'" or die ("Error en la consulta" . mysqli_error($link));
		mysqli_query($conection,$sql);

		header ("Location: solicitud.php?/=3");
		
	 }

	 if(isset($_POST["cambiarDef"])){
	 $ci =$_POST['ci'];
	 $idClase= $_POST['idCurso'];
	 $nota =$_POST['nota'];

	 $r;
	 $consulta="SELECT * FROM alumno_has_clases WHERE ci='$ci' AND idClase='$idClase'";

	 $data= $conection ->query($consulta);

	 $r= $data->num_rows;

	 if($r>0){

		$sql="UPDATE alumno_has_clases SET notaDef='$nota' WHERE ci='$ci' AND idClase='$idClase'";

		mysqli_query($conection,$sql);


		header("Location: cambioDefAdmin.php?/=1");
	}

	else{
		header("Location: cambioDefAdmin.php?/=2");	
	}

	}



	if(isset($_POST["elimina_user"])){
	 $ci =$_POST['ci'];

	 $r;
	 $consulta="SELECT * FROM usuario WHERE ci='$ci'";

	 $data= $conection ->query($consulta);

	 $r= $data->num_rows;

	 if($r>0){

	 	$datos=$data->fetch_assoc();
	 	$rango=$datos["rango"];


	 	if($rango=="estudiante"){
	 		$sql="DELETE FROM alumno WHERE ci='$ci'";
	 		mysqli_query($conection,$sql);
	 		$sql="DELETE FROM alumno_has_clases WHERE ci='$ci'";
	 		mysqli_query($conection,$sql);
	 		$sql="DELETE FROM alumno_has_nota WHERE ci='$ci'";
	 		mysqli_query($conection,$sql);
			$sql="DELETE FROM nota WHERE ci='$ci'";
	 		mysqli_query($conection,$sql);

	 	}

	 	else if($rango=="profesor"){

	 		$consulta="SELECT * FROM profesor_has_clases WHERE ci='$ci'";

	    	$conectar = mysqli_query($conection,$consulta) or die ("Hay algo mal en la tabla");	

	 		while ($columna = mysqli_fetch_array($conectar)) {
	 			
	 			$id=$columna['idClase'];


				$archivoTxt =fopen("log/".$id.'.html', "w");
				fclose($archivoTxt);

				$sql= "DELETE FROM nota WHERE idClase='$id' " or die("Error en la consulta" . mysqli_error($link));
				mysqli_query($conection,$sql);

				$sql= "DELETE FROM alumno_has_clases WHERE idClase='$id' " or die("Error en la consulta" . mysqli_error($link));
				mysqli_query($conection,$sql);

				$sql= "DELETE FROM tarea WHERE idClase='$id' " or die("Error en la consulta" . mysqli_error($link));
				mysqli_query($conection,$sql);

	 		}



	 		$sql="DELETE FROM profesor WHERE ci='$ci'";
	 		mysqli_query($conection,$sql);
	 		$sql="DELETE FROM profesor_has_clases WHERE ci='$ci'";
	 		mysqli_query($conection,$sql);	
	 		$sql="DELETE FROM profesor_has_nota WHERE ci='$ci'";
	 		mysqli_query($conection,$sql);
	 		$sql="DELETE FROM clases WHERE ciCreador='$ci'";
	 		mysqli_query($conection,$sql);
	 	}


	 	$sql="DELETE FROM persona WHERE ci='$ci'";
	 	mysqli_query($conection,$sql);
	 	$sql="DELETE FROM usuario WHERE ci='$ci'";
	 	mysqli_query($conection,$sql);


		header("Location: eliminar usuario.php?/=1");
	}

	else{
		header("Location: eliminar usuario.php?/=2");	
	}

	}


	if(isset($_POST["eliminarC"])){
		$id= $_POST['idCurso'];

 			
 		$sql= "DELETE FROM clases WHERE idClase='$id'" or die("Error en la consulta" . mysqli_error($link));
		mysqli_query($conection,$sql);

		$sql= "DELETE FROM alumno_has_clases WHERE idClase='$id'" or die("Error en la consulta" . mysqli_error($link));
		mysqli_query($conection,$sql);

		$archivoTxt =fopen("log/".$id.'.html', "w");
		fclose($archivoTxt);

		$sql= "DELETE FROM clases_has_tarea WHERE idClase='$id' " or die("Error en la consulta" . mysqli_error($link));
		mysqli_query($conection,$sql);

		$sql= "DELETE FROM nota WHERE idClase='$id' " or die("Error en la consulta" . mysqli_error($link));
		mysqli_query($conection,$sql);

		$sql= "DELETE FROM profesor_has_clases WHERE idClase='$id' " or die("Error en la consulta" . mysqli_error($link));
		mysqli_query($conection,$sql);

		$sql= "DELETE FROM tarea WHERE idClase='$id' " or die("Error en la consulta" . mysqli_error($link));
		mysqli_query($conection,$sql);


		$sql= "DELETE FROM nota WHERE idClase='$id' " or die("Error en la consulta" . mysqli_error($link));
		mysqli_query($conection,$sql);

		header ("Location: eliminar curso.php?/=1");
	

	}

?>

