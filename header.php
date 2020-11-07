<nav class="navbar navbar-expand-lg navbar-light bg-background">
      <div class="logo">
      <a href="#"> <img class="img-logo" src="img/logo_small.png" alt=""></a>
    </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <?php
              
              if(isset($_SESSION['rol'])){
              if($_SESSION['rol']!=2)
              {
             
            ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Administrar
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="CRUD_ingredientes.php">Ingredientes</a>
              <a class="dropdown-item" href="CRUD_platillos.php">Platillos</a>
              <a class="dropdown-item" href="CRUD_menu.php">Menús</a>
              <a class="dropdown-item" href="adminPedidos.php">Pedidos</a>
              <a class="dropdown-item" href="personal.php">Personal</a>
              <?php if($_SESSION['rol']==0) {?>
                <a class="dropdown-item" href="asignarEmpleado.php">Empleados</a>
                <?php }; ?>
              
            </div>
            <?php
                
                };
              };
              
            ?>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Menú
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                    include "php/conexion.php";            
                    $stmt = $pdo->prepare('SELECT * FROM restaurante.menu');
                    $stmt->execute();       
                    $resultado=$stmt->fetchAll();
                    foreach($resultado as $fila):?>
                  <a class="dropdown-item" href="almuerzo.php?nombre=<?php echo $fila['nombre'];?>"><?php echo $fila['nombre'];?></a>
                <?php              
                     endforeach   
                ?>
            </div>
          </li>
          <?php              
              if(!isset($_SESSION['rol'])){         
            ?>
          <li class="nav-item">
            <a class="nav-link " href="login.php">Log in</a>
          </li>
          <?php
            };
          ?>
          <?php              
              if(isset($_SESSION['rol'])){         
            ?>
          <li class="nav-item">
            <a class="nav-link " href="pedido.php">Pedidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="perfil.php">Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="cerrar_sesion.php">Cerrar sesión</a>
          </li>

          <?php
            };
          ?>
          
        </ul>
        <form method="post" action="busqueda.php" class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Busca tu platillo" name="buscar" >
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="update">Buscar</button>
        </form>
      </div>
    </nav>
    