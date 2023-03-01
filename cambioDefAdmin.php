<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Cambiar Definitiva</title>
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
     window.location.replace("cambioDefAdmin.php?l="+$i);
    }
  </script>

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <?php 
 if($_SESSION['sessionRango']=="administrador"){
      include 'menu4.php';
    }
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
              <h2 class="mb-0"> Definitiva</h2>
              <p>Asignar o actualizar nota defenitiva</p>
            </div>
          </div>
        </div>
      </div> 
     
      <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <div class="container">
        <a href="userAdmin.php">Home</a>
       <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Definitiva</span>
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
              <span>Cambiar o Actualizar Definitiva</span>
            </h2>
          </div>
        

            <div class="row justify-content-center">

                <div class="col-md-5">
                    <div class="row">
                      <div class="col-md-12 form-group">
                          
                            <div class="col-md-12 form-group">
                            <label for="username">CI del Estudiante</label>
                            <select name="ci" id="selectBox" onchange="changeFunc(value)"; class="form-control form-control-lg">

                            <?php      
                          $ci= $_SESSION['sessionCI'];
                        $consulta = "SELECT * FROM alumno_has_clases" or die("Error en la consulta" . mysqli_error($link));

                        $resultado = mysqli_query($conection,$consulta) or die ("Hay algo mal en la tabla");

                        $VA3=NULL;

                        if($VA2==NULL){
                          echo "<option value=''>Seleccione un Alumno</option>";
                        }

                        else if($VA2!=NULL){
                          $consultica="SELECT * FROM persona WHERE ci='$VA2'"or die("Error" . mysqli_error($link));
                          $conectando= $conection ->query ($consultica);
                          $data=$conectando-> fetch_assoc();

                          $a=$data['apellido'];
                          $b=$data['nombre'];
                          echo "<option value='$VA2'>$a $b (CI $VA2)</option>";
                        }
                          

                        while ($columna = mysqli_fetch_array($resultado)){
                          $ciAlumno=$columna['ci'];

                           $consulta2= "SELECT * FROM persona WHERE ci='$ciAlumno'"or die("Error" . mysqli_error($link));

                          $resultado2 = $conection ->query ($consulta2);
                          $datos2 = $resultado2 ->fetch_assoc();
                          ?>
                         <ol class="ul-check primary list-unstyled">
                         <li >
                          <?php
                          $apellid =  $datos2['apellido'];
                          $nombr = $datos2['nombre'];

                          if($VA2!=$ciAlumno){
                           echo "<option value='$ciAlumno'>$apellid $nombr (CI $ciAlumno)</option>"; 
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
                           <label for="username"> Curso  </label>
                           <select name="idCurso" id="genero" class="form-control form-control-lg" required>
                           

                            <?php      
                        $consulta = "SELECT * FROM alumno_has_clases WHERE ci='$VA2'" or die("Error en la consulta" . mysqli_error($link));

                        $resultado = mysqli_query($conection,$consulta) or die ("Hay algo mal en la tabla");

                        while ($columna = mysqli_fetch_array($resultado)){
                          $idclase=$columna['idClase'];
                           $c1="SELECT * FROM clases WHERE idClase='$idclase'"or die("Error" . mysqli_error($link));
                          $c2= $conection ->query ($c1);
                          $d=$c2-> fetch_assoc();

                          ?>
                         <ol class="ul-check primary list-unstyled">
                         <li>
                          <?php
                          //$valores =  $columna['asignatura'];
                          $identificador = $columna['idClase'];

                          $a=$d['asignatura'];

                         echo "<option value='$identificador'>$a (ID $identificador)</option>"
                              
                          ?>
                         </li>
                         <?php

                        }

            ?>
                           </select>
                          </div>


                            <div class="col-md-12 form-group">
                            <label for="username">Nota Definitiva</label>
                            <input name="nota" type="text" id="apellido" class="form-control form-control-lg" required>
                          </div> 


                          <div class="row mb-5 justify-content-center text-center">
                    <div class="row">
                        <div class="col-12">
                            <input name="cambiarDef" type="submit" value="Cambiar" class="btn btn-primary btn-lg px-5">
                        </div>
                    </div>
                    </div>





                    </div>

                  

                     <?php
                          }
                          ?>
                </div>
                 </div>
            </div>
        </div>

    </form>

    </div>

          <?php
        if(isset($VA1)){
           if($VA1==1){
                echo "<p class='row justify-content-center'>Se asigno la nota correctamente</p>";
          }

           else if($VA1==2){
                echo "<p class='row justify-content-center'>El Usuario no se encuentra en la clase</p>";
          }
          
        }
        ?>

    </div>





      <?php
include 'cabeceraInfe.php'; 
?>

</body>

</html>
