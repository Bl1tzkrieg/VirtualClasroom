<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Quienes Somos</title>
  <meta charset="utf-8">
	<meta name="viewport" content="width=900px"/>

<!--  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet"> -->
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

    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-7" style="background-image: url('images/course_1.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0"> Quienes Somos</h2>
              <p>Conoce un poco el equipo que esta detras del proyecto</p>
            </div>
          </div>
        </div>
      </div> 

      <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Quienes somos</span>
      </div>
    </div>


    
      <div class="site-section">
        <div class="container">

             <div class="row mb-5">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <img src="images/blog_1.jpg" alt="Image" class="img-fluid"> 
                </div>
                <div class="col-lg-5 ml-auto align-self-center">
                    <h2 class="section-title-underline mb-5">
                        <span>Classroom Endógeno</span>
                    </h2>
                    <p>Un proyecto dirigido por un grupo de jovenes desarrolladores, donde buscan brindar una WebApp confiable, sencilla, segura e innovadora.</p>
                    <p>El principal objetivo de Classroom Endógeno es que los usuarios experimente una academina virtual.</p>
                    <p>Desarrolladores: </p>
                    <ol class="ul-check primary list-unstyled">
                        <li>Luis Delgado </li>
                        <li>Douglas Worm </li>
                        <li>Emilio Perez</li>
                    </ol>

                </div>
            </div>



        </div>
    </div>
   




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
