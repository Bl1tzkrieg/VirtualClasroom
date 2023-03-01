<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Servicio</title>
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
  
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-7" style="background-image: url('images/course_3.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0"> Valorar Servicio</h2>
              <p>Su Opinion es Importante Para Nosotros</p>
            </div>
          </div>
        </div>
      </div> 

      <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Califica Nuestro Servicio</span>
      </div>
    </div>


    
      <div class="site-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-5">
                    <h3>Valorar Servicio</h3> 
                    <div class="row">
                          <a><img src="images/estrella.png" alt="Image" class="img-fluid"></a>
                          <a><img src="images/estrella.png" alt="Image" class="img-fluid"></a>
                          <a><img src="images/estrella.png" alt="Image" class="img-fluid"></a>
                          <a><img src="images/estrella.png" alt="Image" class="img-fluid"></a>
                          <a><img src="images/estrella.png" alt="Image" class="img-fluid"></a>                       
                    </div>


            <form id="sugerencias" action="escribirRegistro.php" method="POST">
              <label class="calificacion" for="califica"> Califica el Servicio </label>
                <select name="califica">
                  <option value="excelente">Excelente</option>
                  <option value="muy buena">Muy Buena</option>
                  <option value="buena">Buena</option>
                  <option value="Regular">Regular</option>
                  <option value="Pesimo">Pesimo</option>  

                  </select>
                  <input name="servicio" type="submit" value="Enviar" class="btn btn-primary btn-lg px-5">
                </form>
                </div>
            </div>



        </div>
    </div>
    

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
