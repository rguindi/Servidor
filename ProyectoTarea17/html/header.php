

<header class="p-3 mb-3 border-bottom  border-3 border-black">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/ProyectoTarea17/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none me-4  ">
        <h3 class="slogan text-center " >Mesa Para <br><span style="color: red; font-size: 2em;"> 2</span></h3>
        <img class="img-fluid " style="width: 100px;" src="./img/logo.png" alt="No se encuentra la imagen">
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/ProyectoTarea17/paginas/productos.php" class="nav-link px-2 link-body-emphasis">Productos</a></li>
        <li><a href="/ProyectoTarea17/paginas/info.php" class="nav-link px-2 link-body-emphasis">Información y contacto</a></li>
      </ul>

      <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
        <input type="search" class="form-control" placeholder="Buscar..." aria-label="Search">
      </form>


      <!-- -------------------------Login------------------------- -->
      <!-- -----Si no Login---- -->
      <?php
      require_once("/var/www/servidor/ProyectoTarea17/BBDD/funciones.php");
      session_start();
      if (!isset($_SESSION['usuario'])){
      echo '
    <div class="text-end">
      <a href="/ProyectoTarea17/paginas/login.php" class="d-block link-body-emphasis text-decoration-none">
        <i class="bi bi-person-fill"></i><span class="ms-2" >Login / Registro</span>
      </a>
    </div>
          ';
          //-- -----Si no Login----
        }else{
          // <!-- -----Si Login---- -->

          // <!-- -----Si es cliente---- -->
          if(isCliente($_SESSION['usuario']['user'])){         
          echo '
          <div class="dropdown text-end">
            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-emoji-smile-fill"></i>
              <span>Hola ';
              echo $_SESSION['usuario']['user'];
              echo '</span>
            </a>
    
            <ul class="dropdown-menu text-small">
              <li><a class="dropdown-item" href="/ProyectoTarea17/paginas/miPerfil.php">Mi perfil</a></li>
              <li><a class="dropdown-item" href="/ProyectoTarea17/paginas/pedidos.php">Pedidos</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/ProyectoTarea17/paginas/logout.php">Desconectar</a></li>
            </ul>
          </div>
          ';
          }
           // <!-- -----Si es cliente---- -->
           
           // <!-- -----Si es Administrador o Moderador---- -->
           else if(isAdmin($_SESSION['usuario']['user']) || isModerador($_SESSION['usuario']['user'])){
            echo '
            <div class="dropdown text-end">
              <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-emoji-smile-fill"></i>
                <span>Hola ';
                echo $_SESSION['usuario']['user'];
                echo '</span>
              </a>
      
              <ul class="dropdown-menu text-small">
                <li><a class="dropdown-item" href="/ProyectoTarea17/paginas/miPerfil.php">Mi perfil</a></li>
                <li><a class="dropdown-item" href="/ProyectoTarea17/paginas/administrarPedidos.php">Pedidos</a></li>
                <li><a class="dropdown-item" href="/ProyectoTarea17/paginas/administrarAlbaranes.php">Albaranes</a></li>';
                if (isAdmin($_SESSION['usuario']['user'])){
                  echo '<li><a class="dropdown-item" href="/ProyectoTarea17/paginas/administrarProductos.php">Productos</a></li>';
                }
                echo '<li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/ProyectoTarea17/paginas/logout.php">Desconectar</a></li>
              </ul>
            </div>
            ';
           }
           // <!-- -----Si es Administrador o Moderador---- -->

          // <!-- -------------------------Login-------------------------
          
        }
        
        ?>
      



    </div>
  </div>
</header>
