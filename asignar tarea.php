<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Asignar Tarea</title>
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
              <h2 class="mb-0"> Asignar Tareas</h2>
              <p>Ahora ya puedes asignar evaluaciones de forma rapida y sencilla</p>
            </div>
          </div>
        </div>
      </div> 

      <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="userInstructor.php">Home</a>
       <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Asignar Tarea</span>
      </div>
    </div>


    <?php
       if(isset($_GET['/'])){
        $VA1 =$_GET['/'];
        }

       ?>

     <form action="escribirRegistro.php" enctype="multipart/form-data" method="POST">
    <div class="site-section">
        <div class="container">


            
      <?php
        if(isset($VA1)){
           if($VA1==1){
                echo "<p class='row justify-content-center'>Ya la asignatura tiene un id de Evalucion igual a la introducida</p>";
          }
          if($VA1==2){
                echo "<p class='row justify-content-center'>Se ha Asignado la Actividad correctamente</p>";
          }

          if($VA1==3){
                echo "<p class='row justify-content-center'>Solo el instructor del curso puede crear asignaciones en su cursos</p>";
          }
        }
        ?>

         <div class="row mb-5 justify-content-center text-center">



            <h2 class="section-title-underline mb-5">
              <span>Asignar Tarea</span>
            </h2>
          </div>
        

            <div class="row justify-content-center">

                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12 form-group">
                           <label for="username"> Curso  </label>
                           <select name="idCurso" id="genero" class="form-control form-control-lg" required>
                           

                            <?php      
                      $ci= $_SESSION['sessionCI'];
                        $consulta = "SELECT * FROM profesor_has_clases WHERE ci='$ci'" or die("Error en la consulta" . mysqli_error($link));

                        $resultado = mysqli_query($conection,$consulta) or die ("Hay algo mal en la tabla");

                        while ($columna = mysqli_fetch_array($resultado)){
                          $idclase=$columna['idClase'];

                           $consulta2= "SELECT asignatura FROM clases WHERE idClase='$idclase' " or die("Error en la consulta" . mysqli_error($link));

                          $resultado2 = $conection ->query ($consulta2);
                          $datos2 = $resultado2 ->fetch_assoc();
                          ?>
                         <ol class="ul-check primary list-unstyled">
                         <li>
                          <?php
                          $valores =  $datos2['asignatura'];
                          $identificador = $columna['idClase'];

                         echo "<option value='$identificador'>$valores (ID $idclase)</option>"
                              
                          ?>
                         </li>
                         <?php

                        }

            ?>

                           </select>
                          </div>

                            <div class="col-md-12 form-group">
                            <label for="username"> </label>
                         
                          </div>

                          <div class="col-md-12 form-group">
                            <label for="username">Titulo de Evaluacion</label>
                            <input name="titulo" type="text" id="apellido" class="form-control form-control-lg" required>
                          </div> 
                      </div>
    
                      <div class="row">
                          <div class="col-md-12 form-group">
                             <label for="message">Descripcion</label>
                            <textarea spellcheck="false" name="descripcion" id="message" cols="30" rows="10" class="form-control" required></textarea>
                        </div>
                        </div>

                        <p>Cargar Archivo</p>
                            <input name="archivo" type="file" />
                            <br> <br> <br>

                    <div class="row mb-5 justify-content-center text-center">
                    <div class="row">
                        <div class="col-12">
                            <input name="asignar" type="submit" value="Asignar" class="btn btn-primary btn-lg px-5">
                        </div>
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
