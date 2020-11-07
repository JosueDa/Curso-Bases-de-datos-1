<?php
 session_start();
 if(!isset($_SESSION['rol']) || $_SESSION['rol'] == 2){
    header("location: login.php");
 };
?>

<?php
    include "php/conexion.php";
    if(isset($_POST["agregar"])){
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $descripcion=$_POST["descripcion"];
        $precio=$_POST["precio"];
        $tiempo=$_POST["tiempo"];
        $nom = $_FILES['imagen']['name'];
        $tmp=$_FILES['imagen']['tmp_name'];
        $imagen= file_get_contents($tmp);
        $tipo=$_POST["tipo"];
        $stmt = $pdo->prepare('INSERT INTO restaurante.producto (id_producto, nombre, descripcion, precio, tiempo_preparacion, imagen, tipo_imagen) VALUES (:id,:nombre,:descripcion,:precio,:tiempo, :imagen, :tipo);');
				$stmt->execute(array(
					':id' =>$id,
					':nombre' =>$nombre,
					':descripcion' =>$descripcion,
          ':precio' =>$precio,
          ':tiempo' =>$tiempo,
          ':imagen' =>$imagen,
          ':tipo' =>$tipo
                )); header('location: CRUD_platillos.php');
                
              
          
        
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
  
<?php
          include "header.php"
            ?>


  <div class="container">
    <div class="register">
    <h2>Agregar ingrediente</h2>
    <hr>
      <div class="formulario">
          <form  method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label >Codigo producto</label>
            <input name="id" type="number" class="form-control"  placeholder="Codigo producto">    
          </div>
          <div  class="form-group ">
            <label >Nombre producto</label>
            <input name="nombre" type="text" class="form-control" placeholder="Nombre producto">    
          </div>
          <div  class="form-group">
            <label>Descripción</label>
            <input name="descripcion" type="text" class="form-control"  placeholder="Descripción">  
          </div>
          <div class="form-group">
            <label>Precio</label>
            <input name="precio" type="number" class="form-control"  placeholder="Precio">  
          </div>
          <div class="form-group">
            <label>Tiempo de preparación</label>
            <input name="tiempo" type="number" class="form-control"  placeholder="Tiempo de preparación">  
          </div>
          <div class="form-group">
            <label>Imagen</label>
            <input name="imagen" type="file" class="form-control"  >  
          </div>
          <div class="form-group">
            <label>Tipo de imagen</label>
            <input name="tipo" type="text" class="form-control"  placeholder="Formato de imagen">  
          </div>
          <div  class="form-group botones">
          <input type="submit" class="btn btn-outline-primary btn-lg col-4" name="agregar" value="Agregar">
          <a class="btn btn-secondary back" href="CRUD_platillos.php">Back</a>
        </div>
          </form>
      </div>
        
    </div>
  </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="js/main.js"></script>

<?php
          include "footer.php"
            ?>

</body>

</html>