<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bandeja de Entrada</title>
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
    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/course_2.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Bandeja de Entrega</h2>
              <p>Aqui puedes visualizar tus correos recientes </p>
            </div>
          </div>
        </div>
      </div> 
    

    <div></div>
    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="userAdmin.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Bandeja de Entrada</span>
      </div>
    </div>


    <div class="site-section">
        <div class="container">

            <div class="row justify-content-center">
                
                    <div class="row">
                        <div class="col-12">
                          
                               <div class="row mb-5 justify-content-center text-center">
                            <h2 class="section-title-underline mb-5">
                              <span>Tabla de Mensajes</span>
                            </h2>
                           </div>
                      <?php      
                      $ci= $_SESSION['sessionCI'];
                      //se busca las clases de la ci en sesion
                        $consulta = "SELECT * FROM preguntas" or die("Error en la consulta" . mysqli_error($link));

                        $resultado = mysqli_query($conection,$consulta) or die ("Hay algo mal en la tabla");

                        //se crea una tabla para los valores
                        echo "<table border='1' bordercolor='green'  align='center'>";
                        echo "<tr align='center'>";
                        echo "<th > Email </th>";
                        echo "<th > Detalles </th>";
                        echo "</tr>";

                        while ($columna = mysqli_fetch_array($resultado)){
                          
                            ?>
                            
                             <?php
                            
                             echo "<td align='center'>" . $columna['email'] . "</td>";

                             $id=$columna['id'];
                             $texto=$columna['pregunta'];
                             $email=$columna['email'];

                            if($columna['view']=="si"){
                              echo "<td align='center'>" . "<a href='bandejaMaster.php?pregunta=$id&email=$email' class='small btn btn-primary px-2 py-2 rounded-0' ><span class='icon-envelope-open'></span> Visto </a>" . "</td>";
                             }
                             else{
                              echo "<td align='center'>" . "<a href='bandejaMaster.php?pregunta=$id&email=$email' class='small btn btn-primary px-2 py-2 rounded-0' ><span class='icon-envelope'></span>Nuevo</a>" . "</td>";
                             }


                             echo "<td align='center'>" . "<a href='escribirRegistro.php?pregunta=$id&email=$email' class='small btn btn-primary px-2 py-2 rounded-0' ><span class='icon-trash'></span>Borrar </a>" . "</td>";

                            echo "</tr>";
                          }
                        
                      
                        echo "</table>";
                  ?>
 
                        </div>
                    </div>
                </div>
            
        </div>
    </div>


    

    <div class="section-bg style-1" style="background-image: url('images/about_1.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h2 class="section-title-underline style-2">
              <span>Classroom Endogeno</span>
            </h2>
          </div>
          <div class="col-lg-8">
            <p class="lead">Es una webApp desarrollada por un grupo de jóvenes que desean llevar a los estudiantes y profesores a experimentar una nueva herramienta.</p>
            <p>Classroom Endogeno es la nueva herramienta que promete revolucionar el concepto de salon de clase virtual</p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section ftco-subscribe-1" style="background-image: url('images/bg_1.jpg')">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7">
            <h2>Buscar</h2>
            <p>Búsqueda en la web</p>
          </div>
          <div class="col-lg-5">
            <form method=GET action="http://google.com/search" class="d-flex">
              <input type=text name=q size=31 maxlength=255 value="" class="rounded form-control mr-2 py-3" placeholder="Introduce un texto">
              <input name=btnG VALUE="busqueda Google" class="btn btn-primary rounded py-3 px-4" type="submit"></input>
            </form>

          </div>
        </div>
      </div>
    </div> 


  <?php
include 'cabeceraInfe.php'; 
?>

</body>

</html>
