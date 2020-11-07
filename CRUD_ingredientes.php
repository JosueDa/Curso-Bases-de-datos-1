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
    <div class="">
    <h2 class="padd2">Listado de ingredientes</h2>
   
          <form class="padd2" action="CRUD_ingredientes.php" method="post">
            <input class="form-control col-2" type="text" name="1" placeholder="campo asc o desc">
            <input class="form-control col-2" type="text" name="2" placeholder="campo asc o desc">
            <input class="form-control col-2" type="text" name="3" placeholder="campo asc o desc">
            <input type="submit" class="btn btn-secondary" name="Buscar" value="Ordenar">
            <a class="btn btn-secondary input" href="agregarI.php"> Agregar ingrediente</a>
            <a class="btn btn-secondary input" href="inventario.php"> Manejo de inventario</a>
          </form>
      </div>
      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th >Id</th>
              <th >Ingrediente</th>
              <th >Refrigerado</th>
              <th COLSPAN="2"> Acciones</th>
              
            </tr>
          </thead>
          <tbody>
            
              <th scope="row">
              </th>
              <?php
                  include "php/conexion.php";
                  $uno;
                  $dos;
                  $tres;
                  if(isset($_POST['1'])){
                    $uno=$_POST['1'];
                    $dos=$_POST['2'];
                    $tres=$_POST['3'];
                    
                   if(empty($_POST['1'])){ 
                    $uno=null;
                   }
                   if(empty($_POST['2'])){ 
                    $dos=null;
                  }
                  if(empty($_POST['3'])){ 
                    $tres=null;
                  }
                  $stmt = $pdo->prepare('call restaurante.dinamico(:uno,:dos,:tres);');
                  $stmt->execute(array(
                    ':uno'=>$uno,
                    ':dos'=>$dos,
                    ':tres'=>$tres
                  ));
                  
                  }else{
                  $stmt = $pdo->prepare('SELECT * FROM restaurante.ingredientes');
                  $stmt->execute();

                };
                $resultado=$stmt->fetchAll();
                  foreach($resultado as $fila):?>
              <tr>
              <td><?php echo $fila['id_ingredientes'];?></td>
              <td><?php echo $fila['nombre'];?></td>
              <td><?php echo $fila['refrigerado'];?></td>
              <td><a href="updateI.php?id=<?php echo $fila['id_ingredientes']; ?>"  class="btn btn-block btn-sm btn-outline-info" >Update</a></td>
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

<?php
          include "footer.php"
            ?>

</body>

</html>