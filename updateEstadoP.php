<?php
 session_start();

?>

    <?php
    include "php/conexion.php";
    if(isset($_POST["enviar"])){
        $estado=$_POST["estado"];
        $id=$_POST["id"];
        $stmt = $pdo->prepare('UPDATE restaurante.pedido SET estado = :estado WHERE pedido.id_pedido = :id');
		$stmt->execute(array(
		  ':estado' =>$estado,
		  ':id' =>$id
                )); header("location: adminPedidos.php");
        
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

      </header>
    <div class="container">
      <div class="register">
        <h2>Cambiar estado del pedido</h2>
        <hr>
          <div class="formulario">
              <form  method="post"  action="updateEstadoP.php">
              <div class="form-group">
                <label >Estado del pedido</label>
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" class="form-control">
                <input list="estado" name="estado" class="form-control">
                <datalist id="estado">
                    <option value="Preparacion">
                    <option value="En ruta">
                    <option value="Entregado">
                </datalist>    
              </div>
            
              <div  class="form-group botones">
              <input type="submit" class="btn btn-outline-info btn-lg col-4" name="enviar" value="Update">
            </div>
              </form>
          </div>
            
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