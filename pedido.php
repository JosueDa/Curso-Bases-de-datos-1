<?php
session_start();
    include "php/conexion.php";
      if(isset($_POST["id"]) || isset($_POST["cantidad"])){
        $id= $_POST["id"];
        $cantidad=$_POST["cantidad"];
        $existe=array_search($id,$_SESSION['pedidos']);
        if(is_numeric($existe)){
          $_SESSION['cantidad'][$existe]+=$cantidad;
          header("location: home.php?R=1");
        }else{
          array_push($_SESSION['pedidos'], $id); 
          array_push($_SESSION['cantidad'], $cantidad);
          header("location: home.php?R=1");
        };
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
    <h2 class="col-lg-10 float-left padd2">Carrito de compra</h2>
      <div class="padd2">
      <a class="btn btn-secondary input" href="agregarI.php"> Agregar</a>

      </div>
           
      <?php
               include 'php/faltaPedido.php';
          ?>
      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th >Nombre</th>
              <th >Cantidad</th>
              <th >Precio</th>
              <th> Eliminar</th>
              
            </tr>
          </thead>
          <tbody>
            
              <th scope="row">
              </th>
              <?php
 
                    $longitud= count($_SESSION['pedidos']);

                    $precioT=0;
                    for($i=0; $i<$longitud; $i++)
                        {
                    $stmt = $pdo->prepare('SELECT * from restaurante.producto where id_producto = :id;');
                    $stmt->execute(array(
                      ':id' =>$_SESSION['pedidos'][$i],
                        ));  
                    $resultado=$stmt->fetch();
                    $precio= $resultado['precio']*$_SESSION['cantidad'][$i];
                    $precioT+= $precio
                      ?>
              <tr>
              <td><?php echo $resultado['nombre'];?></td>
              <td><?php echo $_SESSION['cantidad'][$i];?></td>
              <td><?php echo  $precio;?></td>
              <td><a href="delete.php?idPedido=<?php echo $i; ?>" class="col-3 btn btn-block btn-sm btn-outline-danger">X </a></td>
                        
            </tr>
            <?php } ?>
            <?php if($longitud>0){?>
            <tr>
              <td class="font-weight-bold">Precio total de la orden</td>
              <td></td>
              <td class="font-weight-bold"><?php echo  $precioT;?></td>
              <td>
              </td>    
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php if($longitud>0){?>
        <form method="post" action="finalizarP.php" class="col-lg-8 col-md-8 col-sm-12">
        <hr>
        <label>Comentarios</label>
        <input class="" name="comentario"  type="text" class="form-control" placeholder="Agrega algún comentario a tu orden">    
        <input type="submit" value="Finalizar orden" class="col-4 btn btn-block btn-md btn-outline-success">
        </form>
        <?php } ?>
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