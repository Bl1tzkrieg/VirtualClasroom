<?php 
$RETURN="ERROR";
if(isset($_POST["procesar"]))
{
  $lenguaje= $_POST['lenguaje'];
  $code =$_POST['user_code'];
  $code =str_replace("\r","",$code);
 


  $archivo_submit = $_FILES["archivo"]["tmp_name"];
  $archivo=NULL;
  
  if($archivo_submit == NULL)
  {if(empty($code) or ctype_space($code)){return;}}


  if($archivo_submit!=NULL)
    {
  
    if(move_uploaded_file($archivo_submit, $archivo_submit))
     {
        $archivo= $archivo_submit;
     }

  }
  else
  { 
    $archivo_submit = tempnam('', '');
    $archivoTxt =fopen($archivo_submit, "w");
    fwrite($archivoTxt, $code. PHP_EOL);
    fclose($archivoTxt);
    $archivo = $archivo_submit;
      
  }

     $options = array(
           'http' =>
                 array(
        'method'  => 'POST',
        'header'  => 'Content-type: text/plain',
        //'content' => $code
        'content' => $archivo
        )
        );
  $procesar=file_get_contents("http://192.168.2.199:8080/RESTful/getMessage/archivo/$lenguaje/",false,stream_context_create($options));
  
   #printf("%s", str_replace("\n","<br>",$procesar));
   
	$RETURN=$procesar;
//	echo $RETURN;
}
echo $RETURN;
?>
