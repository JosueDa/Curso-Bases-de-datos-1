  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
  
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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Administrar
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="CRUD_ingredientes.php">Ingredientes</a>
              <a class="dropdown-item" href="CRUD_platillos.php">Platillos</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Menú
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="login.html">Log in</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

  <div >
    <div class="register">
    <h2>Listado de ingredientes</h2>
      <div class="ingredientes">
          <form action="" >
            <input class="form-control col-6" type="text" placeholder="Buscar ingrediente">
            <input type="submit" class="btn btn-secondary " name="Buscar" value="Buscar">
            <a class="btn btn-secondary input" href="agregar.php"> Agregar</a>
          </form>
      </div>
      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th >Id</th>
              <th >Ingrediente</th>
              <th >Refrigerado</th>
              <th >Fecha de caducidad</th>
              <th COLSPAN="2"> Acciones</th>
              
            </tr>
          </thead>
          <tbody>
            
              <th scope="row">
              </th>
              <?php
                  include "php/conexion.php";
                  $stmt = $pdo->prepare('SELECT * FROM restaurante.ingredientes');
                  $stmt->execute();
                  $resultado=$stmt->fetchAll();
                  foreach($resultado as $fila):?>
              <tr>
              <td><?php echo $fila['id_ingredientes'];?></td>
              <td><?php echo $fila['nombre'];?></td>
              <td><?php echo $fila['refrigerado'];?></td>
              <td><?php echo $fila['fecha_caducidad'];?></td>
              <td><a href="update.php?id=<?php echo $fila['id_ingredientes']; ?>"  class="btn btn-block btn-sm btn-outline-info" >Update</a></td>
					    <td><a href="delete.php?id=<?php echo $fila['id_ingredientes']; ?>" class="btn btn-block btn-sm btn-outline-danger">Delete</a></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
    </div>
  </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="js/main.js"></script>

<footer class="container-fluid text-center bg-background footer">
      <div class="row text-center">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
          <p>Copyright</p>
        </div>
        <div class="col-md-4">
          <div>
            <a href="#" id="share-fb" class="sharer button"><i class="fa fa-2x fa-facebook-square"></i></a>
            <a href="#" id="share-tw" class="sharer button"><i class="fa fa-2x fa-twitter-square"></i></a>
            <a href="#" id="share-li" class="sharer button"><i class="fa fa-2x fa-linkedin-square"></i></a>
            <a href="#" id="share-em" class="sharer button"><i class="fa fa-2x fa-envelope-square"></i></a>
            
          </div>
        </div>
      </div>
    </footer>

</body>

</html>