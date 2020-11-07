<?php
 session_start();
 if(!isset($_SESSION['rol']) || $_SESSION['rol'] == 2){
    header("location: login.php");
 };
?>

<?php
    include "php/conexion.php";
    if(isset($_GET['id'])){

        $buscar=$pdo->prepare('SELECT * FROM restaurante.menu WHERE id_menu=:_id');
		$buscar->execute(array(
			':_id'=>(int) $_GET['id']
		));
    $resultado=$buscar->fetch();
    $nmb=$resultado['nombre'];
    $dsp=$resultado['descripcion'];
    };
    if(isset($_POST['update'])){
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
     
try {
  
        $stmt=$pdo->prepare(' UPDATE restaurante.menu SET  
					nombre=:nombre,
					descripcion=:descripcion
					WHERE id_menu=:_id;'
				);
				$stmt->execute(array(
					':nombre' =>$nombre,
					':descripcion' =>$descripcion,
					':_id' =>(int) $_GET['id']
				));header('Location: CRUD_menu.php');

} catch (\Throwable $th) {
  echo '<script language="javascript">alert("Algo salio mal");</script>';
}
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
    <h2>Modificar ingrediente</h2>
    <hr>
      <div class="formulario">
          <form  method="post">
          <div class="form-group">
            <label >Nombre menú</label>
            <input name="nombre" type="text" class="form-control"  value="<?php echo $nmb; ?>">    
          </div>
          <div  class="form-group ">
            <label >Descripción</label>
            <input name="descripcion" type="text" class="form-control" value="<?php echo $dsp; ?>">    
          </div>
          <div  class="form-group botones">
          <input type="submit" class="btn btn-outline-info btn-lg col-4" name="update" value="Update">
          <a class="btn btn-secondary back" href="CRUD_menu.php">Back</a>
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