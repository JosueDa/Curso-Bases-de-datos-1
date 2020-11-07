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
    <h2 class="padd2">Pedidos</h2>
      <div class="adapt-table">
      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>Numero de pedido</th>
              <th>Estado del pedido</th>
              <th >Comentarios</th>
              <th >Nombre del cliente</th>
              <th >Dirección</th>
              <th >Teléfono</th>
              <th >Fecha</th>
              <th >Cambiar estado</th>
            </tr>
          </thead>
          <tbody>
            
              <th scope="row">
              </th>
              <?php
                  include "php/conexion.php";
                  $stmt = $pdo->prepare('SELECT id_pedido,comentario, estado, nombre, direccion, telefono, fecha FROM restaurante.pedido INNER JOIN restaurante.usuario on pedido.id_usuario = usuario.id_usuario WHERE estado != "Entregado"');
                  $stmt->execute();
                  $resultado=$stmt->fetchAll();
                  foreach($resultado as $fila):?>
              <tr>
              <td><?php echo $fila['id_pedido'];?></td>
              <td><?php echo $fila['estado'];?></td>
              <td><?php echo $fila['comentario'];?></td>
              <td><?php echo $fila['nombre'];?></td>
              <td><?php echo $fila['direccion'];?></td>
              <td><?php echo $fila['telefono'];?></td>
              <td><?php echo $fila['fecha'];?></td>
              <td><a href="updateEstadoP.php?id=<?php echo $fila['id_pedido']; ?>" class="btn btn-block btn-sm btn-outline-info">Update</a></td>
			
   
                        
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