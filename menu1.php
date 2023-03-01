<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <div class="py-2 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 d-none d-lg-block">
            <a href="preguntas.php" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> ¿Preguntas?</a> 
            <a href="contacto.php" class="small mr-3"><span class="icon-envelope-o mr-2"></span> Contáctenos aqui</a> 
          </div>
          <div class="col-lg-3 text-right">
            <a href="login estudiante.php" class="small mr-3"><span class="icon-unlock-alt"></span> Iniciar Sesión</a>
            <a href="registro estudiante.php" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span> Registrarse</a>
          </div>
        </div>
      </div>
    </div>

    <header class="site-navbar py-2 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="index.php" class="d-block">
              <img src="images/logo1.png" alt="Image" class="img-fluid">
            </a>
          </div>
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active">
                  <a onClick="location.href='index.php'" href="index.php" class="nav-link text-left">Home</a>
                </li>
                <li class="has-children">
                  <a class="nav-link text-left">Ingresar al Sistema</a>
                  <ul class="dropdown">
                  	<li><a onClick="location.href='modo invitado.html'" href="modo invitado.html">Invitado</a></li>
                    <li><a onClick="location.href='login estudiante.php'" href="login estudiante.php">Estudiante</a></li>
                    <li><a onClick="location.href='login instructor.php'" href="login instructor.php">Instructor</a></li>
                    <li><a onClick="location.href='login Administrador.php'" href="login Administrador.php">Administrador</a></li>
                  </ul>
                </li>
                <li class="has-children">
                  <a class="nav-link text-left">Registrarse</a>
                    <ul class="dropdown">
                  	<li><a onClick="location.href='registro estudiante.php'" href="registro estudiante.php">Estudiante</a></li>
                    <li><a onClick="location.href='registro instructor.php'" href="registro instructor.php">Instructor</a></li>
                  	</ul>
                </li>
                <li class="has-children">
                  <a class="nav-link text-left">Servicios</a>
                  <ul class="dropdown">
                  	<li><a onClick="location.href='soporte.php'" href="soporte.php">Soporte Técnico</a></li>
                 <!--   <li><a onClick="location.href='servicio.php'" href="servicio.php">Califica Nuestro Servicio</a></li> -->
                  	</ul>
                </li>

                <li>
                  <a onClick="location.href='quienes somos.php'" href="quienes somos.php" class="nav-link text-left">Quienes Somos</a>
                </li>
              </ul>                                                                      </ul>
            </nav>

          </div>



          <div class="ml-auto">
            <div class="social-wrap">
              <a href="http://www.facebook.com"><span class="icon-facebook"></span></a>
              <a href="http://www.twitter.com"><span class="icon-twitter"></span></a>
              <a href="http://www.linkedin.com"><span class="icon-linkedin"></span></a>

              <a class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
            </div>
          </div>
         
        </div>
      </div>

    </header>
