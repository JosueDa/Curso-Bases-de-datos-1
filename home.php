<?php
 session_start();
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
    
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100 min" src="img/pollo1.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 min" src="img/pollo3.png" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 min" src="img/pollo2.png" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>

   <div class="container padd">
              <?php
                if(isset($_GET["E"])){
                    echo '<div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    <h4 class="alert-heading">Pedido exitoso!</h4>
                    Su orden estará en la puerta de su casa pronto!
                  </div>';
                };
                    
                if(isset($_GET["R"])){
                    echo '<div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    Platillo añadido a Pedidos!
                  </div>';
                };
                if(isset($_GET["C"])){
                  echo '<div class="alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  <h4 class="alert-heading">Contraseña cambiada con éxito!</h4>
                </div>';
              };
              if(isset($_GET["A"])){
                echo '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                 Cuenta actividad!
              </div>';
            };
          ?>

     <h1 class="display-4 font-weight-bold text-light">EL MEJOR POLLO FRITO</h1>
     <hr>
   
       <h2 class="display-5 font-weight-bold naranja">Nuestros preferidos</h2>
        <div class="row">
          
          <?php
          include "php/conexion.php";
          $stmt = $pdo->prepare('SELECT * FROM restaurante.favoritos INNER JOIN restaurante.producto on favoritos.id_platillo=producto.id_producto where tipo ="favorito" limit 4');
          $stmt->execute();
          $resultado=$stmt->fetchAll();
          foreach($resultado as $fila):
          ?>      
          <div class="col-lg-6 col-sm-12 padd">
            <img class="adapt-img limite2"  src='data:image/<?php echo $fila['tipo_imagen'];?>; base64,<?php echo base64_encode($fila['imagen']) ?> ' alt="">
              <div class="text-light ">
                <h2> <?php echo $fila['nombre'];?>  </h2>
                <hr>
                <?php echo $fila['descripcion'];?>

              </div>
          </div>
          <?php endforeach ?> 
        </div>
        <h2 class="display-5 font-weight-bold naranja">Favorito de nuestros clientes</h2>
        <div class="row">
          <?php
            $stmt2 = $pdo->prepare('SELECT restaurante.masVendido() as id');
            $stmt2->execute();
            $resultado2=$stmt2->fetch();
            $y= $resultado2['id'];
            $stmt3 = $pdo->prepare('SELECT * from restaurante.producto WHERE id_producto=:id');
            $stmt3->execute(array(
              ':id' =>$y
              ));
            $resultado3=$stmt3->fetch();
            
            ?>   
          <div class="col-lg-8 col-sm-12 padd">
                <img class="adapt-img" src='data:image/<?php echo $resultado3['tipo_imagen'];?>; base64,<?php echo base64_encode($resultado3['imagen']) ?> ' alt="">
          </div>
          <div class="col-lg-4 col-sm-12 padd">
                    <div class="text-light">
                    <h2> <?php echo $resultado3['nombre'];?></h2>
                    <hr>
                    <?php echo $resultado3['descripcion'];?>
                </div>
          </div>
      </div>
        <h2 class="display-5 font-weight-bold naranja">Otros deliciosos platillos</h2>
        
        
        <div class="row ">
              
            <?php
              include "php/conexion.php";
              $stmt = $pdo->prepare('SELECT * FROM restaurante.favoritos INNER JOIN restaurante.producto on favoritos.id_platillo=producto.id_producto where tipo ="top" limit 12');
              $stmt->execute();
              $resultado=$stmt->fetchAll();
              foreach($resultado as $fila):
              ?>      
              <div class="col-lg-3 col-md-6 col-sm-12 padd">
                <img class="adapt-img limite"  src='data:image/<?php echo $fila['tipo_imagen'];?>; base64,<?php echo base64_encode($fila['imagen']) ?> ' alt="">
                  <div class="text-light ">
                    <h2> <?php echo $fila['nombre'];?>  </h2>
                    <hr>
                    <?php echo $fila['descripcion'];?>

                  </div>
              </div>
              <?php endforeach ?> 
        </div>
   </div>

   <?php
          include "footer.php"
            ?>

   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
   <script src="js/main.js"></script>

  </body> 

</html>