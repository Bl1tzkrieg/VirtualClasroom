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
            <a  class="small mr-3"><span ></span></a> 
            <a href="#" class="small mr-3"><span></span> </a> 
          </div>
          <div class="col-lg-3 text-right">
            
            <a href="cerrar conexion.php" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-power-off"></span> Cerrar Sesion</a>
          </div>
        </div>
      </div>
    </div>

    <header class="site-navbar py-1 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
              <div class="person">
                <?php 
                if(isset($_SESSION['sessionPerfil'])){
                  $foto = $_SESSION['sessionPerfil'];
                  
                   echo "<img src='$foto' alt='Image' class='img-fluid'>";
                    
                }

                else{
                  ?>
                  <img src="images/user.jpg" alt="Image" class="img-fluid">

                 <?php 
                }
                ?>
                <p>
                <?php echo $_SESSION['sessionName']; ?> 
                <?php echo $_SESSION['sessionApellido']; ?>
                </p>
            </div>


          <div class="mr-auto">
            <nav class="site-navigation position-relative text-left" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active">
                  <a onClick="location.href='userAdmin.php'" href="userAdmin.php" class="nav-link text-left">Home</a>
                </li>
                <li class="has-children">
                  <a class="nav-link text-left">Modificar</a>
                  <ul class="dropdown">

                    <li><a onClick="location.href='cambioPassAdmin.php'" href="cambioPassAdmin.php">Modificar Contraseña de Usuarios</a></li>
                    <li><a onClick="location.href='cambioDefAdmin.php'" href="cambioDefAdmin.php">Actualizar Definitiva</a></li>
                    <li><a onClick="location.href='eliminar usuario.php'" href="eliminar usuario.php">Eliminar Usuario</a></li>
                    <li><a onClick="location.href='eliminar curso.php'" href="eliminar curso.php">Eliminar Curso</a></li>
                    
                  </ul>
                </li>


                <li class="has-children">
                  <a class="nav-link text-left">Consulta</a>
                  <ul class="dropdown">
                    <li><a onClick="location.href='lista profesores.php'" href="lista profesores.php">Lista de Profesores</a></li>
                    <li><a onClick="location.href='lista de alumnos 2.php'" href="lista de alumnos 2.php">Lista de los Alumnos</a></li>
                    <li><a onClick="location.href='barra busqueda.php'" href="barra busqueda.php">Lista de Alumnos en los Salones</a></li>
                    <li><a onClick="location.href='lista de cursos 2.php'" href="lista de cursos 2.php">Lista de Cursos</a></li>
                    <li><a onClick="location.href='registro id.php'" href="registro id.php">Número de Registro</a></li>
                  </ul>
                </li>

                <li class="has-children">
                  <a class="nav-link text-left">Solicitud de Ingreso</a>
                  <ul class="dropdown">
                    <li><a onClick="location.href='solicitud.php'" href="solicitud.php">Instructores</a></li>
                  </ul>
                </li>

                <li class="has-children">
                  <a class="nav-link text-left">Bandeja de Entrada</a>
                  <ul class="dropdown">
                    <li><a onClick="location.href='bandeja.php'" href="bandeja.php">Soporte Técnico</a></li>
                    <li><a onClick="location.href='bandeja2.php'" href="bandeja2.php">Preguntas</a></li>
                    <li><a onClick="location.href='bandeja3.php'" href="bandeja3.php">Contacto</a></li>
                    <li><a onClick="location.href='bandeja4.php'" href="bandeja4.php">Sugerencia</a></li>
                  </ul>
                </li>
                
                <li class="has-children">
                  <a class="nav-link text-left">Config</a>
                    <ul class="dropdown">
                    <li><a onClick="location.href='configName.php'" href="configName.php">Datos Personales</a></li>
                    <li><a onClick="location.href='configPass.php'" href="configPass.php">Actualizar Contraseña</a></li>
                    <li><a onClick="location.href='subir perfil.php'" href="subir perfil.php">Imagen de Perfil</a></li>
                   </ul>
                </li>
                
              </ul>
              </ul>
            </nav>
          </div>


          <div class="ml-auto">
            <div class="social-wrap">
              
              <a class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
            </div>
          </div>
            
        </div>
      </div>

    </header>
