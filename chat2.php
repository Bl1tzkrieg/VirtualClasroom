<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sala De Chat</title>
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

    <script type="text/javascript" src="ajax.js"></script>

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


      <div class="site-section">
         <SPAN style="position: absolute; top: 36px; left: 20px; width: 336px; height: 412px">
          <?php echo " <a href='chat.php' class='small btn btn-primary px-1 py-1 rounded-0' ><span class='icon-arrow-left'></span> Regresar</a>"; ?>
         </SPAN>



      <div class="container">
          
      <?php


          if(isset($_POST["sala"]))
            {
              $_SESSION['sessionIdClaseChat']= $_POST['idCurso'];;
            }

            if(isset($_GET['pag'])){
              include 'burbuja.php';
              }
              else{

             ?>
             <div id="contenido">
             </div>
            <?php
               }
            ?>

             <div class="col-lg-5 ml-auto align-self-center" >
                 <div id="venntanaChat" style="width: 400px;">
                  <form action="escribirRegistro.php" class="d-flex" method="POST">
                         <input name="mensaje" type="text" class="rounded form-control mr-2 py-3" placeholder="Introduzca su mensaje">
                            <button class="btn btn-primary rounded py-1 px-1" type="submit">Enviar</button>
                             </form>

                  </div>
                  </div>

            <div class="row justify-content-center">
                <div class="col-md-5">
                    
                    <div class="row">


                        <div class="col-12">
                          
                          
                            
                        </div>
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
