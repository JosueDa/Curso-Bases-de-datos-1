<?php
 session_start();
 if(!isset($_SESSION['rol']) || $_SESSION['rol'] == 2){
    header("location: login.php");
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

  <div >
    <div class="register">
    
    <div class="padd">
    <h2 class=" float-left">Listado de productos favoritos</h2>
      <a class="btn btn-secondary float-right" href="updateF.php"> Seleccionar favorito</a>

    </div>

      <div class="adapt-table padd">
      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th >Id </th>
              <th >Nombre</th>
              <th >Precio</th>
              <th >Tiempo de preparación</th>
              <th> Acciones</th>
              
              
            </tr>
          </thead>
          <tbody>
            
              <th scope="row">
              </th>
              <?php
                  include "php/conexion.php";
                  $stmt = $pdo->prepare('SELECT * FROM restaurante.favoritos INNER JOIN restaurante.producto on favoritos.id_platillo=producto.id_producto where tipo ="favorito"');
                  $stmt->execute();
                  $resultado=$stmt->fetchAll();
                  foreach($resultado as $fila):?>
              <tr>
              <td><?php echo $fila['id_producto'];?></td>
              <td><?php echo $fila['nombre'];?></td>
              <td><?php echo $fila['precio'];?></td>
              <td><?php echo $fila['tiempo_preparacion'];?></td>
              <td>
                <a href="delete.php?idF=<?php echo $fila['id_favorito']; ?>" class="btn btn-block btn-sm btn-outline-danger">Delete</a>
              </td>
              
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
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