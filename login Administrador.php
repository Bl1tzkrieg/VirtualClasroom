<?php require_once('conexion.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login Admin</title>
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
  if(isset($_SESSION['sessionRango'])){

    if($_SESSION['sessionRango']=="administrador"){
      header ("Location: userAdmin.php");
    }

  if($_SESSION['sessionRango']=="estudiante"){
      header ("Location: userEstudiante.php");
    }

    if($_SESSION['sessionRango']=="profesor"){
      header ("Location: userInstructor.php");
    }
   }
    else  {
     include 'menu1.php'; 
    }
  ?>


    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Login Administrador</h2>
              <p>Portal del Administrador</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Login</span>
      </div>
    </div>


    <?php
       if(isset($_GET['/'])){
        $VA1 =$_GET['/'];
        }

       ?>




     <form action="validar usuario3.php" method="POST">
    <div class="site-section">
        <div class="container">


            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="username">Usuario</label>
                            <input name="username" type="text" id="username" class="form-control form-control-lg" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword">Contrasena</label>
                            <input name="pass" type="password" id="pword" class="form-control form-control-lg" required>
                        </div>
                    </div>
                    <div class="row mb-5 justify-content-center text-center">
                    <div class="row">
                        <div class="col-12">
                            <input name="submit" type="submit" value="Log In" class="btn btn-primary btn-lg px-5">
                        </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>

          <?php
        if(isset($VA1)){
           if($VA1==1){
                echo "<p class='row justify-content-center'>Los Datos Suministrados son Incorrectos</p>";
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
