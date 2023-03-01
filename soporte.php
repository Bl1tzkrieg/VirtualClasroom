<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Soporte Tecnico</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=900px"/>
 <!-- <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet"> -->

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

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


 else if($_SESSION['sessionRango']=="administrador"){
      include 'menu4.php';
    }

      else if($_SESSION['sessionRango']=="profesor"){
        include 'menu3.php';
      }
  }
    else  {
     include 'menu1.php'; 
    }
  ?>
    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Soporte Tecnico</h2>
              <p>Tienes algun problema? No importa le ayudamos!!</p>
            </div>
          </div>
        </div>
      </div> 
    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Soporte Tecnico</span>
      </div>
    </div>
   
   <form id="soporte" action="escribirRegistro.php" method="POST">
     <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="fname">Nombre</label>
                    <input type="text" name="nombre" id="fname" class="form-control form-control-lg">
                </div>
                <div class="col-md-6 form-group">
                    <label for="lname">E-Mail</label>
                    <input name="email" type="text" id="email"  class="form-control form-control-lg">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="message">Cual es su Inconveniente?</label>
                    <textarea name="texto" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <input name="soporte" type="submit" value="enviar" class="btn btn-primary btn-lg px-5">
                </div>
            </div>
        </div>
    </div>
    </form>

    <?php
        if(isset($_GET['/'])){
           if($_GET['/']==1){
                echo "<p class='row justify-content-center'>Su Mensaje ha sido enviado con exito!</p>";
          }
        }
        ?>



      <?php
include 'cabeceraInfe.php'; 
?>

</body>

</html>
