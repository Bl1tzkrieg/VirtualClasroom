<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Record de Notas</title>
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
              <h2 class="mb-0"> Record de Notas</h2>
              <p>Mira tu progreso cuando quieras!</p>
            </div>
          </div>
        </div>
      </div> 
     
      <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <div class="container">
        <a href="userEstudiante.php">Home</a>
       <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Record de Notas</span>
      </div>
    </div>
  </div>

    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                
                    <div class="row">
                        <div class="col-12">
                          
                               <div class="row mb-5 justify-content-center text-center">
                            <h2 class="section-title-underline mb-5">
                              <span>Mi Record</span>
                            </h2>
                           </div>

                            <?php      
                             $ci= $_SESSION['sessionCI'];

                             $consulta = "SELECT * FROM alumno_has_clases WHERE ci='$ci'" or die("Error en la consulta" . mysqli_error($link));

                              $resultado = mysqli_query($conection,$consulta) or die ("Hay algo mal en la tabla");

                              echo "<table border='1' bordercolor='green'  align='center'>";
                              echo "<tr align='center'>";
                              echo "<th > Nro de ID </th>";
                              echo "<th > Asignatura </th>";
                              echo "<th > Definitiva </th>"; 
                              echo "</tr>";

                               while ($columna = mysqli_fetch_array($resultado)){

                                echo "<tr>";
                                $clase= $columna['idClase'];


                                $consultaLink = "SELECT * FROM clases WHERE idClase='$clase'" or die("Error en la consulta" . mysqli_error($link));

                               $vinculos = $conection ->query ($consultaLink);
                                  $mirar = $vinculos ->fetch_assoc();

                                if($columna['notaDef']==NULL){
                                   echo "<td align='center'>" . $columna['idClase'] . "</td>";
                                   echo "<td align='center'>" . $mirar['asignatura'] . "</td>";
                                    echo "<td align='center'>" . "-" . "</td>";
                                }
                                else{
                                  echo "<td align='center'>" . $columna['idClase'] . "</td>";
                                   echo "<td align='center'>" . $mirar['asignatura'] . "</td>";
                                    echo "<td align='center'>" . $columna['notaDef'] . "</td>";

                                }
                                echo "</tr>";
                               }  
                              echo "</table>";

                            ?>
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
