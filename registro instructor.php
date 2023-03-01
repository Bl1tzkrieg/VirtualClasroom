<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registro</title>
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
  if($_SESSION['sessionRango']=="estudiante"){
      include 'menu2.php';
    }

    if($_SESSION['sessionRango']=="profesor"){
      include 'menu3.php';
    }
   }
    else  {
     include 'menu1.php'; 
    }
  ?>


    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/registro.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Registro Instructor</h2>
              <p>La vocacion más linda de todas la tiene el instructor</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Registro</span>
      </div>
    </div>

                        <?php
                            if(isset($_GET['/'])){
                            $VA1 =$_GET['/'];
                          }

                        ?>
    <?php
        if(isset($VA1)){
           if($VA1==1){
                echo "<p class='row justify-content-center'>El usuario con esa CI ya existe o el usuario ya existe</p>";
          }
           if($VA1==2){
                echo "<p class='row justify-content-center'>Sus Datos ya fueron enviados al Administrador para admisión</p>";
          }

          if($VA1==3){
                echo "<p class='row justify-content-center'>La Contraseña No Coincide</p>";
          }
          if($VA1==4){
                echo "<p class='row justify-content-center'>El campo nombre no puede tener caracteres numericos o especiales</p>";
          }
          if($VA1==5){
                echo "<p class='row justify-content-center'>El campo apellido no puede tener caracteres numericos o especiales</p>";
          }
        }
        ?>

    <form action="escribirRegistro.php" method="POST">
    <div class="site-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12 form-group">
                        	<label for="username">Nombre</label>
                            <input name="nombre" type="text" id="nombre" class="form-control form-control-lg" required>
                            </div>

                            <div class="col-md-12 form-group">
                            <label for="username">Apellido</label>
                            <input name="apellido" type="text" id="apellido" class="form-control form-control-lg" required>
                        	</div>

                          <div class="col-md-12 form-group">
                            <label for="username">CI </label>
                            <input name="ci" name="ci" type="number" id="ci" class="form-control form-control-lg" required>
                          </div>

                        	<div class="col-md-12 form-group">
                            <label for="username"> Edad </label>
   			 			            	<input name="edad" id="edad" class="form-control form-control-lg" type="number" min="15" max="99" required>
   			 				           </div>

   			 				<div class="col-md-12 form-group">
   			 				 <label for="username"> Género  </label>
   			  				 <select name="genero" id="genero" class="form-control form-control-lg"><option value="masculino">M</option><option value="femenino">F</option>  </select>
   			  				</div>

   			  				 <div class="col-md-12 form-group">
							 <label for="username">Usuario</label>
                            <input name="usuario" type="text" id="username" class="form-control form-control-lg" required>
                        	</div>
                        	
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" id="email" class="form-control form-control-lg" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword">Contraseña</label>
                            <input name="pass" type="password" id="pword" class="form-control form-control-lg" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword2">Repite la Contraseña</label>
                            <input name="pass2" type="password" id="pword2" class="form-control form-control-lg" required>
                        </div>
                    </div>
                    <div class="row mb-5 justify-content-center text-center">
                    <div class="row">
                        <div class="col-12">
                            <input name="profesor" type="submit" value="Registrar" class="btn btn-primary btn-lg px-5">
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
