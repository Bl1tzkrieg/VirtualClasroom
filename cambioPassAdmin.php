<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Cambiar Password</title>
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
              <h2 class="mb-0"> Cambio de PassWord</h2>
              <p>Opcion destinada para la recuperacion de credenciales</p>
            </div>
          </div>
        </div>
      </div> 
     
      <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <div class="container">
        <a href="userAdmin.php">Home</a>
       <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Cambio de Password</span>
      </div>
    </div>
  </div>



<?php
       if(isset($_GET['/'])){
        $VA1 =$_GET['/'];
        }

       ?>

<form action="escribirRegistro.php" method="POST">
    <div class="site-section">
        <div class="container">



         <div class="row mb-5 justify-content-center text-center">
            <h2 class="section-title-underline mb-5">
              <span>Cambiar Contrasena</span>
            </h2>
          </div>
        

            <div class="row justify-content-center">

                <div class="col-md-5">
                    <div class="row">
                      <div class="col-md-12 form-group">
                          
                            <div class="col-md-12 form-group">
                            <label for="username">CI del Usuario</label>
                            <input name="ci" type="number" id="apellido" class="form-control form-control-lg" required>
                          </div> 


                            <div class="col-md-12 form-group">
                            <label for="username">PassWord a Cambiar</label>
                            <input name="pass" type="text" id="apellido" class="form-control form-control-lg" required>
                          </div>


                           <div class="row mb-5 justify-content-center text-center">
                    <div class="row">
                        <div class="col-12">
                            <input name="cambiarPass" type="submit" value="Cambiar" class="btn btn-primary btn-lg px-5">
                        </div>
                    </div>
                    </div>

                    </div>
                   
                </div>
            </div>
        </div>

    </form>

    </div>

          <?php
        if(isset($VA1)){
           if($VA1==1){
                echo "<p class='row justify-content-center'>La contraseņa se ha cambiado</p>";
          }

           else if($VA1==2){
                echo "<p class='row justify-content-center'>El Usuario no existe</p>";
          }
          
        }
        ?>

    </div>





      <?php
include 'cabeceraInfe.php'; 
?>

</body>

</html>
