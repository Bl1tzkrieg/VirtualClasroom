<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Terminal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=900px"/>

<!--  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet"> -->
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/css_terminar.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">



</head>

      
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

   <?php 

  if(isset($_SESSION['sessionRango'])){
    if($_SESSION['sessionRango']=="estudiante"){
      include 'menu2.php';
    }

      else if($_SESSION['sessionRango']=="profesor"){
        include 'menu3.php';
      }
  }
    else  {
     include 'menu1.php'; 
    }
  ?>
   
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-7" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Terminal Para El Usuario</h2>
              <p>Herramienta Que Soporta Distintos Lenguajes de Programacion</p>
            </div>
          </div>
        </div>
      </div> 

      <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Terminal</span>
      </div>
    </div>


    <form id="terminal"  action="procesar.php" method="POST" enctype="multipart/form-data">
 		<div class="site-section">


		   	<div class="container">
		       	<div class="col-md-6>
               		<label class="herramienta" for="lenguaje"> Seleccione Su Herramienta  </label>
                     	<select id="lenguaje" name="lenguaje">
		                   <option value="ruby">Ruby</option>
		                   <option value="python">Python</option>   
		                   <option value="javascript">JavaScript</option> 
		                   <option value="c">C</option>
		                   <option value="cpp">C++</option>  
		                   <option value="fortran90">FORTRAN90</option> 
                       	</select>
                            <label for="code" > </label>
                            <textarea id="code" spellcheck="false" name="user_code" rows="12" style="height:100%;"> </textarea>                  			
                 			<textarea readonly spellcheck="false" id="out" name="user_out" rows="4" style="height:100%;"> </textarea>
              
            	</div>

		        <div class="row justify-content-center">
		            <div class="col-md-5">            
		               	<div class="row">
		                    <div class="col-12">                        
		                        <p>También (Puedes cargar un archivo con codigo)</p>
		                        <input name="archivo" type="file"/>                           
		                        <br> <br>
		                        <input type="reset" value="Resetear" class="btn btn-primary btn-lg px-5">
								<input type="hidden" name="procesar" value="Ejecutar" />
		                        <input type="submit" value="Ejecutar" id="submit" name="submit" class="btn btn-primary btn-lg px-5">
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
    </form>

	<form id="output" enctype="multipart/form-data">
        
            
    
    </form>



<script src='js/jquery-3.3.1.min.js'></script>
<!-- <script src='js/jquery.form.js'></script> -->
<script type="text/javascript">
$(document).ready(function(e){

 $('#terminal').on('submit',(function(e)
    {
	$('#out').val("Procesando");
	e.preventDefault();
	$.ajax({
	    url: "procesar.php",
	    type: "POST",
	    data: new FormData(this),
	    contentType: false,
	    cache: false,
	    processData: false,
	    success: function(data)
	    {
		$('#out').val(data);
	    }
	});
    }));
});


</script>



<?php
include 'cabeceraInfe.php'; 
?>

</body>

</html>
