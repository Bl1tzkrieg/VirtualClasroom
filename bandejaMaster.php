<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bandeja</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=900px"/>

<!--<link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet"> -->
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


  <?php
    if(isset($_GET['soporte'])){
     $VA1 =$_GET['soporte'];
     $VA2 =$_GET['nombre'];
     $VA3 =$_GET['email'];
    
     $consulta="UPDATE soporte SET view='si' WHERE nombre='$VA2' AND email='$VA3' AND id ='$VA1'";
     mysqli_query($conection,$consulta);

     $sqli= "SELECT * FROM soporte WHERE id='$VA1'";
     $resultado= $conection->query($sqli);
     $datos= $resultado->fetch_assoc();

     $VA10=nl2br($datos['inconveniente']);

     $VA4= "bandeja.php";

     }

     if(isset($_GET['pregunta'])){
     $VA1 =$_GET['pregunta'];
     $VA3 =$_GET['email'];
    
     $consulta="UPDATE preguntas SET view='si' WHERE id='$VA1'";
     mysqli_query($conection,$consulta);


     $sqli= "SELECT * FROM preguntas WHERE id='$VA1'";
     $resultado= $conection->query($sqli);
     $datos= $resultado->fetch_assoc();

     $VA10=nl2br($datos['pregunta']);

     $VA4= "bandeja2.php";

     }

     if(isset($_GET['contacto'])){
     $VA1 =$_GET['contacto'];
     $VA2 =$_GET['nombre'];
     $VA5 =$_GET['apellido'];
     $VA3 =$_GET['email'];
     $VA6 =$_GET['telefono'];
    
     $consulta="UPDATE contacto SET view='si' WHERE email='$VA3' AND nombre='$VA2' AND apellido='$VA5' AND telefono='$VA6' AND id='$VA1'";
     mysqli_query($conection,$consulta);


     $sqli= "SELECT * FROM contacto WHERE id='$VA1'";
     $resultado= $conection->query($sqli);
     $datos= $resultado->fetch_assoc();

     $VA10=nl2br($datos['mensaje']);

     $VA4= "bandeja3.php";

     }


     if(isset($_GET['sugerencias'])){
     $VA1 =$_GET['sugerencias'];
     
     $consulta = "UPDATE sugerencia SET view='si' WHERE id='$VA1'";
     mysqli_query($conection,$consulta);



     $sqli= "SELECT * FROM sugerencia WHERE id='$VA1'";
     $resultado= $conection->query($sqli);
     $datos= $resultado->fetch_assoc();

     $VA10=nl2br($datos['sugerencia']);

     $VA4= "bandeja4.php";

     }

     ?>

  <div class="site-section ftco-subscribe-1 site-blocks-cover pb-7" style="background-image: url('images/registro.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Bandeja</h2>
              <p>Aqui Puedes observar los detalles del Mensaje</p>
            </div>
          </div>
        </div>
      </div> 
     
      <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <div class="container">
        <a href="userAdmin.php">Home</a>
       <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Detalles del Mensaje</span>
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
                              <?php
                              echo "<span>Detalles</span>";
                              ?>
                            </h2>
                           </div>

                             </div>

                        </div>
                    </div>
                </div>



        <div class="container">
            <div class="row">
                <div class="col-md-6 form-group">

                  <?php
                    if(isset($_GET['soporte'])){
                            ?>
                            <h2 class="section-title-underline mb-5">
                              <?php
                               echo "<span>De:$VA2</span>";
                               ?>
                              </h2>


                              <div id="venntanaChat" style="width: 400px; height: 300px; overflow: auto;">
                              <?php
                               echo "<p>Email: $VA3 </p>";
                          }


                          if(isset($_GET['pregunta'])){
                            ?>
                            <h2 class="section-title-underline mb-5">
                              <?php
                               echo "<span>De:$VA3</span>";
                               ?>
                              </h2>


                              <div id="venntanaChat" style="width: 400px; height: 300px; overflow: auto;">
                              <?php
                          }


                          if(isset($_GET['contacto'])){
                            ?>
                            <h2 class="section-title-underline mb-5">
                              <?php
                               echo "<span>De:$VA2</span>";
                               ?>
                              </h2>


                              <div id="venntanaChat" style="width: 400px; height: 300px; overflow: auto;">
                              <?php
                              echo "<p>De: $VA2 $VA5 </p>";
                              echo "<p>Email: $VA3 </p>";
                              echo "<p>telefono: $VA6 </p>";
                          }


                          if(isset($_GET['sugerencias'])){
                            ?>
                            <h2 class="section-title-underline mb-5">
                              <?php
                               echo "<span>Sugerencia N°: $VA1  </span>";
                               ?>
                              </h2>


                              <div id="venntanaChat" style="width: 400px; height: 300px; overflow: auto;">
                              <?php
                          }

               ?>





              </div>
 

                </div>
                <div class="col-md-6 form-group">
                    
                    <h2 class="section-title-underline mb-5">
                       &nbsp; &nbsp; &nbsp; &nbsp;
                               <span>Detalles del mensaje</span>
                              </h2>

                       <div id="venntanaChat" style="width: 400px; height: 300px; overflow: auto;">       
                    
                        <?php
                          echo $VA10;
                        ?>
                        </div>
                                                  
                </div>
            </div>
          
        </div>
        </div>
    </div>
    </div>




    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">          
                <div class="row">
                  <div class="col-12">  
                  <?php                      
                             echo "<td align='center'>" . "<a href='$VA4' class='small btn btn-primary px-2 py-2 rounded-0' ><span class='icon-reply'></span> regresar</a>" . "</td>";
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
