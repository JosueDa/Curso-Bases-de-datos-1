
<?php
    include "php/conexion.php";
    if(isset($_POST["agregar"])){
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $refrigerado=$_POST["refrigerado"];
        $fecha=$_POST["fecha"];
        $stmt = $pdo->prepare('INSERT INTO restaurante.ingredientes (id_ingredientes, nombre, refrigerado, fecha_caducidad) VALUES (:id,:nombre,:refrigerado,:fecha);');
				$stmt->execute(array(
					':id' =>$id,
					':nombre' =>$nombre,
					':refrigerado' =>$refrigerado,
					':fecha' =>$fecha
                )); header('location: CRUD_ingredientes.php');
                
      
        
    };
    ?>
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
    <a class="navbar-brand" href="#">Navbar</a>
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
            <a class="dropdown-item" href="CRUD_platillos.php">Ingredientes</a>
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

  <div class="container">
    <div class="register">
    <h2>Agregar ingrediente</h2>
    <hr>
      <div class="formulario">
          <form  method="post">
          <div class="form-group">
            <label >Codigo ingrediente</label>
            <input name="id" type="number" class="form-control"  placeholder="Codigo ingrediente">    
          </div>
          <div  class="form-group ">
            <label >Nombre ingrediente</label>
            <input name="nombre" type="text" class="form-control" placeholder="Nombre ingrediente">    
          </div>
          <div  class="form-group">
            <label>Refrigerado</label>
            <input name="refrigerado" type="number" class="form-control"  placeholder="0=No  1=Sí ">  
          </div>
          <div class="form-group">
            <label>Fecha de caducidad</label>
            <input name="fecha" type="date" class="form-control"  placeholder="0=No  1=Sí ">  
          </div>
          <div  class="form-group botones">
          <input type="submit" class="btn btn-outline-primary btn-lg col-4" name="agregar" value="Agregar">
          <a class="btn btn-secondary back" href="CRUD_ingredientes.php">Back</a>
        </div>
          </form>
      </div>
        
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