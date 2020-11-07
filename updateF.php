<?php
 session_start();
 if(!isset($_SESSION['rol']) || $_SESSION['rol'] == 2){
    header("location: login.php");
 };
?>

<?php
    include "php/conexion.php";

    if(isset($_POST["agregar"])){
        $stmt3 = $pdo->prepare('SELECT COUNT(*) from restaurante.favoritos WHERE tipo="favorito"');
        $stmt3->execute();
        $contador=$stmt3->fetch();
        $y=$contador['COUNT(*)'];
        echo $contador;
        if($y<=3){
        $nombre=$_POST["nombre"];
        $stmt2 = $pdo->prepare('SELECT * from restaurante.producto where nombre=:nombre;');
        $stmt2->execute(array(
          ':nombre' =>$nombre
      ));
        $resultado2 = $stmt2 -> fetch();
        $stmt = $pdo->prepare('INSERT INTO restaurante.favoritos (id_favorito, id_platillo , tipo) VALUES (null,:idP,:tipo);');
				$stmt->execute(array(
                    ':idP' =>$resultado2['id_producto'],
                    ':tipo' => "favorito"
                )); header('location: platillosfav.php');
    }else{header("location: updateF.php?E=1");}
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
    <?php
                if(isset($_GET["E"])){
                    echo '<div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    Solo puedes tener un máximo de 4 platillos preferidos en la página principal
                  </div>';
                }; ?>
    <h2>Agregar nueva opción</h2>
    <hr>
      <div class="formulario">
          <form  method="post">
          <div class="form-group">
            <label >Seleccione el producto a agregar</label>
            <input list="productos" name="nombre" class="form-control">
                <datalist id="productos">
                <?php
                 
                 $stmt2 = $pdo->prepare('SELECT * FROM restaurante.producto');
                 $stmt2->execute();
                 $resultado2=$stmt2->fetchAll();
                 foreach($resultado2 as $fila2):?>
                    <option value="<?php echo $fila2['nombre'];?>">
                    <?php endforeach ?>
                </datalist>      
          </div>

          
          <div  class="form-group botones">
          <input type="submit" class="btn btn-outline-primary btn-lg col-4" name="agregar" value="Agregar">
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