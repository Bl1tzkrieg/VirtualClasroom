<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Envio de Documentos</title>
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
  if($_SESSION['sessionRango']=="estudiante"){
      include 'menu2.php';
    }

    if($_SESSION['sessionRango']=="profesor"){
      include 'menu3.php';
    }
    if ($_SESSION['sessionRango']==NULL) {
     header ("Location: index.php"); 
    }
  ?>

    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-7" style="background-image: url('images/registro.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0"> Upload File</h2>
              <p>Envie un Documeto a cualquier usuario Registrado, facil! y seguro!</p>
            </div>
          </div>
        </div>
      </div> 

      <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="userEstudiante.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <a >Upload File</a>
      </div>
    </div>
                          <?php
                          if(isset($_GET['clase'])){
                            $VA1 =$_GET['clase'];
                            $VA2 =$_GET['evaluacion'];

                            $_SESSION['sessionClase'] = $VA1;
                            $_SESSION['sessionEvaluacion'] = $VA2;
                            }

                          ?>


    <form id="enviarDoc" enctype="multipart/form-data" action="escribirRegistro.php" method="POST">
      <input type="hidden" name="limite" value="500000">
      <div class="site-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-5">
                    
                    <div class="row">


                        <div class="col-12">
                          
                          
                            <p>Cargar Archivo</p>
                            <input name="archivo" type="file" accept=".pdf ,.docx , .doc , .txt" required/>
                            

                            <br>
                            <br>
                            <input name="entrega" type="submit" value="Entregar" class="btn btn-primary btn-lg px-5">
                        </div>
                    </div>
                </div>
            </div>



        </div>

        

    </div>
    </form>








<?php
include 'cabeceraInfe.php'; 
?>

</body>

</html>
