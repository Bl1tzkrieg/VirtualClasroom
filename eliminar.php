<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Borrar Intregantes</title>
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


  <script type="text/javascript">
    function changeFunc($i){
     window.location.replace("eliminar.php?l="+$i);
    }
  </script>

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
              <h2 class="mb-0"> Borrar Intregantes</h2>
              <p>Opcion para borrar integrantes a su clase virtual</p>
            </div>
          </div>
        </div>
      </div> 
     
      <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <div class="container">
        <a href="administrar cursos.php">Administrar Cursos</a>
       <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Borrar integrantes</span>
      </div>
    </div>
  </div>



<?php
      $VA1=NULL;
      $VA2=NULL;
       if(isset($_GET['/'])){
        $VA1 =$_GET['/'];
        }

        if(isset($_GET['l'])){
        $VA2 =$_GET['l'];
        }

       ?>
<form action="escribirRegistro.php" method="POST">
    <div class="site-section">
        <div class="container">



         <div class="row mb-5 justify-content-center text-center">
            <h2 class="section-title-underline mb-5">
              <span>Borrar Integrante</span>
            </h2>
          </div>
        

            <div class="row justify-content-center">

                <div class="col-md-5">
                    <div class="row">
                      <div class="col-md-12 form-group">
                           <label for="username"> Curso  </label>
                           <select name="idCurso" id="selectBox" onchange="changeFunc(value)"; class="form-control form-control-lg" required>
                           

                            <?php      
                      $ci= $_SESSION['sessionCI'];
                        $consulta = "SELECT * FROM profesor_has_clases WHERE ci='$ci'" or die("Error en la consulta" . mysqli_error($link));

                        $resultado = mysqli_query($conection,$consulta) or die ("Hay algo mal en la tabla");

                        $VA3=NULL;

                        if($VA2==NULL){
                          echo "<option value=''>Seleccione un Curso</option>";
                        }

                        else if($VA2!=NULL){
                          $consultica="SELECT * FROM clases WHERE idClase='$VA2'"or die("Error" . mysqli_error($link));
                          $conectando= $conection ->query ($consultica);
                          $data=$conectando-> fetch_assoc();

                          $a=$data['asignatura'];
                          echo "<option value='$VA2'>$a (ID $VA2)</option>";
                        }
                          

                        while ($columna = mysqli_fetch_array($resultado)){
                          $idclase=$columna['idClase'];

                           $consulta2= "SELECT asignatura FROM clases WHERE idClase='$idclase'" or die("Error en la consulta" . mysqli_error($link));

                          $resultado2 = $conection ->query ($consulta2);
                          $datos2 = $resultado2 ->fetch_assoc();
                          ?>
                         <ol class="ul-check primary list-unstyled">
                         <li >
                          <?php
                          $valores =  $datos2['asignatura'];
                          $identificador = $columna['idClase'];

                          if($VA2!=$identificador){
                           echo "<option value='$identificador'>$valores (ID $idclase)</option>"; 
                          }
                              
                          ?>
                         </li>
                         <?php
                        }

            ?>
                           </select>
                        </div>

                        <?php

                          if($VA2!=NULL){
                            ?>
                            <div class="col-md-12 form-group">
                            <label for="username">CI del estudiante</label>
                            <select name="ci" class="form-control form-control-lg" required>
                           
                          <?php


                            $consulta3="SELECT * FROM alumno_has_clases WHERE idClase='$VA2'";
                            $consulta4=$conection-> query($consulta3);

                            while ($columna2 = mysqli_fetch_array($consulta4)) {
                              $ciEstudiante=$columna2['ci'];

                              $consulta5="SELECT * FROM persona WHERE ci='$ciEstudiante'";
                              $consulta6= $conection -> query($consulta5);
                              $consulta7= $consulta6 -> fetch_assoc();



                          ?>
                              <ol class="ul-check primary list-unstyled">
                              <li >
                          <?php
                              $v =  $consulta7['nombre'];
                              $v2 = $consulta7['apellido'];

                              echo "<option value='$ciEstudiante'>$v2, $v (CI $ciEstudiante)</option>"; 
                              
                          ?>
                         </li>
                          <?php    
                            }
                            ?>
                           </select>   
                    </div>

                  </div>
                  <div class="row mb-5 justify-content-center text-center">
                    <div class="row">
                        <div class="col-12">
                            <input name="eliminar" type="submit" value="Eliminar" class="btn btn-primary btn-lg px-5">
                            <?php
                          }
                          ?>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>

          <?php
        if(isset($VA1)){
           if($VA1==1){
                echo "<p class='row justify-content-center'>El usuario no se encuentra asignado a este curso</p>";
          }

           else if($VA1==2){
                echo "<p class='row justify-content-center'>El Intregante se ha eliminado de la clase</p>";
          }
          else if($VA1==3){
                echo "<p class='row justify-content-center'>La CI suministrada no pertenece a un estudiante</p>";
          }
          else if($VA1==4){
                echo "<p class='row justify-content-center'>Revise el ID del Salon y el instructor de la clase, Recuerde solo los instructores pueden asignar a sus clases</p>";
          }
        }
        ?>

    </div>

    </form>




      <?php
include 'cabeceraInfe.php'; 
?>

</body>

</html>
