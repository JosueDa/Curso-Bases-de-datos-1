
<?php
    include "php/conexion.php";
    session_start();
    if(!isset($_SESSION['rol']) ){
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



  <div class="container">
    <div class="register">
    <h2>Datos del usuario</h2>
    <hr>

    <table class="table">
          <thead class="thead-dark">
            <tr>
              <th >Dato</th>
              <th >Valor</th>
            </tr>
    </thead>
          <tbody>
              <th scope="row">
              </th>
              <?php
                  if(isset($_SESSION['id'])){
                    $id_usuario= $_SESSION['id'];
            
                    $buscar=$pdo->prepare('SELECT * FROM restaurante.usuario WHERE id_usuario=:_id');
                    $buscar->execute(array(
                        ':_id'=> $id_usuario
                    ));
                    $resultado=$buscar->fetch();
                };
                ?>
              <tr>
              <td>Nombre</td>
              <td><?php echo $resultado['nombre'];?></td>
             </tr>
             <tr>
              <td>Correo</td>
              <td><?php echo $resultado['correo'];?></td>
             </tr>
             <tr>
              <td>Teléfono</td>
              <td><?php echo $resultado['telefono'];?></td>
             </tr>
             <tr>
              <td>Dirección</td>
              <td><?php echo $resultado['direccion'];?></td>
             </tr>
             <tr>
              <td>Número de tarjeta</td>
              <td><?php echo $resultado['tarjeta'];?></td>
             </tr>
             <tr>
              <td>Fecha de expiración de tarjeta</td>
              <td><?php echo $resultado['exp_tarjeta'];?></td>
             </tr>
             <tr>
              <td>CVC</td>
              <td><?php echo $resultado['CVC'];?></td>
             </tr>
            
    
          </tbody>
        </table>
        <div class="padd ">
        <a class="btn btn-secondary input" href="updateD.php"> Modificar datos</a>
        <a class="btn btn-secondary input" href="updateC.php"> Cambiar contraseña</a>
        <a class="btn btn-secondary back" href="home.php">Back</a>
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