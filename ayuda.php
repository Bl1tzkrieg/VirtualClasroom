<?php require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Ayuda</title>
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


 else if($_SESSION['sessionRango']=="administrador"){
      include 'menu4.php';
    }

      else if($_SESSION['sessionRango']=="profesor"){
        include 'menu3.php';
      }
  }
    else  {
     include 'menu1.php'; 
    }
  ?>
 
    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Pregunta</h2>
              <p>Tienes alguna pregunta? No importa, se la respondemos!!</p>
            </div>
          </div>
        </div>
      </div> 

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Preguntas</span>
      </div>
    </div>
   
   

   <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-1-item">
                        <figure class="thumnail">
                        <a href="preguntas.php"><img src="images/ayuda1.jpg" alt="Image" class="img-fluid"></a>
                        <div class="category"><h3>Modo Invitado</h3></div>  
                        </figure>
                        <div class="course-1-content pb-4">
                        <h2>Este modo es para hacer llamadas al API, sin necesidad de estar registrado </h2>
                        <div class="rating text-center mb-3">
                            
                        </div>
                        <p class="desc mb-4">El personal Invitado tiene una gran variedad de lenguajes por escoger, dichos lenguajes, entre mas se destaca: Ruby, C++, Python ....</p>
                        <p><a href="preguntas.php" class="btn btn-primary rounded-0 px-4">¿Quieres Saber Más?</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-1-item">
                        <figure class="thumnail">
                                <a href="preguntas.php"><img src="images/course_2.jpg" alt="Image" class="img-fluid"></a>
                        <div class="category"><h3>Organiza tu espacio de trabajo </h3></div>  
                        </figure>
                        <div class="course-1-content pb-4">
                        <h2>La web cuenta con un gran variedad de elementos para facilitar su espacio de trabajo</h2>
                        
                        <p class="desc mb-4">Una de las Herramientas destacadas, es facilidad de organizar los cursos de manera rapida y sencilla...</p>
                        <p><a href="preguntas.php" class="btn btn-primary rounded-0 px-4">¿Quieres Saber Más?</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-1-item">
                        <figure class="thumnail">
                                <a href="preguntas.php"><img src="images/ayuda2.jpg" alt="Image" class="img-fluid"></a>
                        <div class="category"><h3>Modo Login</h3></div>  
                        </figure>
                        <div class="course-1-content pb-4">
                        <h2>La aplicacion cuenta con 2 tipo de Login</h2>
                        
                        <p class="desc mb-4">El login para estudiante,para visualizar e entregar activiades pendientes.
                         El login para los instructores de las clases, cada instructor puede realizar sus actividades y calificar dichas actividades</p>
                        <p><a href="preguntas.php" class="btn btn-primary rounded-0 px-4">¿Quieres Saber Más?</a></p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-1-item">
                        <figure class="thumnail">
                                <a href="preguntas.php"><img src="images/ayuda3.png" alt="Image" class="img-fluid"></a>
                        <div class="category"><h3>Soporte Tecnico</h3></div>  
                        </figure>
                        <div class="course-1-content pb-4">
                        <h2>Para atender problemas que presenta el aplicacion</h2>
                        <div class="rating text-center mb-3">
                        </div>
                        <p class="desc mb-4">Esta opcion es para que el usuario deescriba el mal funcionando de la aplicacion a los desarrolladores, asi con el fin de solventar la calidad de servicio y a su vez garantizando una experiencia inigualable del usuario</p>
                        <p><a href="preguntas.php" class="btn btn-primary rounded-0 px-4">¿Quieres Saber Más?</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-1-item">
                        <figure class="thumnail">
                                <a href="preguntas.php"><img src="images/ayuda5.jpg" alt="Image" class="img-fluid"></a>
                        <div class="category"><h3>Sala de Chat</h3></div>  
                        </figure>
                        <div class="course-1-content pb-4">
                        <h2>Servicio que brinda al usuario registrado una sala de chat</h2>
                        
                        <p class="desc mb-4">Sala chat donde cada usuario puede tener contacto con sus companeros de clases, atravez de una mensajeria instantanea. Este servicio es unicamente para usuario registrados</p>
                        <p><a href="preguntas.php" class="btn btn-primary rounded-0 px-4">¿Quieres Saber Más?</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-1-item">
                        <figure class="thumnail">
                                <a href="preguntas.php"><img src="images/course_6.jpg" alt="Image" class="img-fluid"></a>
                        <div class="category"><h3>Dudas?</h3></div>  
                        </figure>
                        <div class="course-1-content pb-4">
                        <h2>Si tiene alguna otra duda no dudes en escribirnos ...</h2>
                        
                        <p class="desc mb-4">El personal le estara contestando lo mas rapido posible, con el fin de aclarar sus interrogantes</p>
                        <p><a href="preguntas.php" class="btn btn-primary rounded-0 px-4">Pregunte aqui</a></p>
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
