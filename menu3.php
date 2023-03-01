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
                  <a onClick="location.href='userInstructor.php'" href="userInstructor.php" class="nav-link text-left">Home</a>
                </li>
                <li class="has-children">
                  <a class="nav-link text-left">Academia</a>
                  <ul class="dropdown">

                    <li><a onClick="location.href='administrar cursos.php'" href="administrar cursos.php">Administrar Cursos</a></li>
                    <li><a onClick="location.href='asignar tarea.php'" href="asignar tarea.php">Asignar Tarea</a></li>
                    <li><a onClick="location.href='portal.php'" href="portal.php">Asignaciones por Calificar</a></li>
                    <li><a onClick="location.href='portal2.php'" href="portal2.php">Notas Definitivas</a></li>
                    <li><a onClick="location.href='terminal.php'" href="terminal.php">Terminal de Usuario</a></li>
                  </ul>
                </li>

                <li class="has-children">
                  <a class="nav-link text-left">Consulta</a>
                  <ul class="dropdown">
                    <li><a onClick="location.href='portal3.php'" href="portal3.php">Calificaciones</a></li>
                    <li><a onClick="location.href='mis cursos.php'" href="mis cursos.php">Mis Cursos</a></li>
                    <li><a onClick="location.href='registro id.php'" href="registro id.php">Número de Registro</a></li>
                    <li><a onClick="location.href='escoger curso.php'" href="escoger curso.php">Lista de actividades</a></li>
                    <li><a onClick="location.href='port.php'" href="port.php">Lista de Alumnos</a></li>
                  </ul>
                </li>

                <li>
                  <a onClick="location.href='chat.php'" href="chat.php" class="nav-link text-left">Sala de Chat</a>  
                </li>
                
                <li class="has-children">
                  <a class="nav-link text-left">Config</a>
                    <ul class="dropdown">
                    <li><a onClick="location.href='configName.php'" href="configName.php">Datos Personales</a></li>
                    <li><a onClick="location.href='configPass.php'" href="configPass.php">Actualizar Contraseña</a></li>
                    <li><a onClick="location.href='subir perfil.php'" href="subir perfil.php">Imagen de Perfil</a></li>
                   </ul>
                </li>

                <li>
                  <a onClick="location.href='cerrar conexion.php'" href="cerrar conexion.php" class="nav-link text-left">Cerrar Sesion</a>
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
