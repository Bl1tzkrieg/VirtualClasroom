<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contacto</title>
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

      else if($_SESSION['sessionRango']=="profesor"){
        include 'menu3.php';
      }
  }
    else  {
     include 'menu1.php'; 
    }
  ?>

    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-6" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Contacto</h2>
              <p>Comunicate directamente con los desarrolladores</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Contacto</span>
      </div>
    </div>

    <form id="contacto" action="escribirRegistro.php" method="POST">
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="fname">Primer Nombre</label>
                    <input name="nombre" type="text" id="fname" class="form-control form-control-lg">
                </div>
                <div class="col-md-6 form-group">
                    <label for="lname">Primer Apellido</label>
                    <input name="apellido" type="text" id="lname" class="form-control form-control-lg">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="eaddress">Email</label>
                    <input name="email" type="text" id="eaddress" class="form-control form-control-lg">
                </div>
                <div class="col-md-6 form-group">
                    <label for="tel">N Telf</label>
                    <input name="tlf" type="text" id="tel" class="form-control form-control-lg">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="message">Mensaje</label>
                    <textarea name="msj" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <input name="contacto" type="submit" value="Enviar Mensaje" class="btn btn-primary btn-lg px-5">
                </div>
            </div>
        </div>
    </div>
  </form>


    <?php
        if(isset($_GET['/'])){
           if($_GET['/']==1){
                echo "<p class='row justify-content-center'>Gracias! Su Opinion es Importante para Nosotros</p>";
          }
        }
        ?>



    <div class="section-bg style-1" style="background-image: url('images/hero_1.jpg');">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
              <span class="icon flaticon-mortarboard"></span>
              <h3>Aprende</h3>
              <p>Esta webApp cuenta con varias herramientas, donde el usuario tendra una experiencia inimaginable de aprendizaje</p>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
              <span class="icon flaticon-school-material"></span>
              <h3>Proyectos</h3>
              <p>Cada instructor de la clase virtual puede hacer asignaciones al mismo tiempo calificar a sus estudiantes</p>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
              <span class="icon flaticon-library"></span>
              <h3>Academia</h3>
              <p>Es una institucion pero virtual, donde el usuario puede realizar sus asignaciones y entregarlas desde su casa </p>
            </div>
          </div>
        </div>
      </div>
      




      <?php
include 'cabeceraInfe.php'; 
?>

</body>

</html>
