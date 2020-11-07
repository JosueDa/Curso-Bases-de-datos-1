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



   <div class="container padding-home padd">

     <?php
          include "php/conexion.php";
          if(isset($_GET['idP'])){
          $stmt = $pdo->prepare('SELECT * from restaurante.producto where restaurante.producto.id_producto= :id');
          $stmt->execute(array(
            ':id' =>(int) $_GET['idP']
            ));
          $resultado=$stmt->fetch();
          ?>     
       <h2 class="display-4 font-weight-bold naranja"> <?php echo $resultado['nombre'];?></h2>
       
        <div class="row">
          
          
          <div class="col-lg-6 col-sm-12 padd">
            <img class="adapt-img"  src='data:image/<?php echo $resultado['tipo_imagen'];?>; base64,<?php echo base64_encode($resultado['imagen']) ?> ' alt="">

          </div>
          <div class="col-lg-6 col-sm-12 ">
              <div class="text-light ">

                <hr>
                <?php echo $resultado['descripcion'];?>
                <div class="padd"> 
                    <div>
                    <span class="precio">Precio:  Q<?php echo $resultado['precio'];?> </span>
                    
                    </div>
                    <div class="padd">
                    <h4>Tiempo de preparación</h4>
                     Minutos: <?php echo $resultado['tiempo_preparacion'];?> 
                    </div>
                    
                </div>    
       
              </div>
          </div>
        </div>
        <?php }; ?> 
        
            
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