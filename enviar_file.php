<?php
if(isset($_POST["submit"]))
{
 $destino = $_POST['destinatario'];
 $asunto = $_POST['asunto'];
 $nombre_archivo = $_FILES["archivo"]["name"];
 $tipo_archivo = $_FILES["archivo"]["type"];
 $tamano_archivo = $_FILES["archivo"]["size"];

 	if($nombre_archivo==null)
 	{
 		echo "holaaaaaaaa";
 	}

 $limite = $_POST["limite"];
 if($tamano_archivo<=$_POST['limite'])
 {
 if(move_uploaded_file($_FILES["archivo"]["tmp_name"], "asignaciones/{$nombre_archivo}"))
 {
 //echo "Destino: " . $destino;
 //echo "Asunto: " . $asunto;	
 //echo "El archivo " . $nombre_archivo . " se ha transferido correctamente. <br />";
 //echo "Su tamaño es de: " . $tamano_archivo . " bytes.";
 //url del archivo por si se quiere descargar
 	echo "<a href='asignaciones/$nombre_archivo' download='$nombre_archivo'> Descargar Tarea </a>";
 }
 else
 {
 echo "No se ha podido transferir el archivo, verifique el tamaño del archivo e intente nuevamente.";
 }
 }

}
?>
