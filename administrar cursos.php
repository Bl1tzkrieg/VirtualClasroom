<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Administrar Cursos</title>
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
              <h2 class="mb-0"> Administra Cursos</h2>
              <p>Ahora ya puedes administrar tus cursos de forma rapida y sencilla</p>
            </div>
          </div>
        </div>
      </div> 

      <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="userInstructor.php">Home</a>
       <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Administrar Cursos</span>
      </div>
    </div>


      <div class="site-section">
      <div class="container">
        <div class="row mb-5 justify-content-center text-center">
          <div class="col-lg-4 mb-5">
            <h2 class="section-title-underline mb-5">
              <span>Administrar Cursos</span>
            </h2>
          </div>
        </div>
      </div>

        <div class="container">

            <div class="row justify-content-center">
                
                    <div class="row">
                        <div class="col-12">
                          
                            <a href="crear curso.php" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-file-o"></span> Crear Curso</a>
                            <a href="borrar curso.php" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-trash-o"></span> Borrar Curso</a>
                            <a href="anadir.php" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-edit"></span> Añadir Intregrante</a>

                            <a href="eliminar.php" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-trash-o"></span> Expulsar Integrante</a>

                        </div>
                    </div>
                </div>
            
        </div>

    </div>


<?php
include 'cabeceraInfe.php'; 
?>



      
</body>

</html>
