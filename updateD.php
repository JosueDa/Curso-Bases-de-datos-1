<?php
 session_start();
 if(!isset($_SESSION['rol'])){
    header("location: login.php");
 };
?>

<?php
    include "php/conexion.php";
    if(isset($_SESSION['id'])){
        $id_usuario= $_SESSION['id'];

        $buscar=$pdo->prepare('SELECT * FROM restaurante.usuario WHERE id_usuario=:_id');
        $buscar->execute(array(
            ':_id'=> $id_usuario
        ));
        $datos=$buscar->fetch();
    };
    if(isset($_POST['update'])){
        $nombre=$_POST['nombre'];
		$pass=$_POST['pass'];
		$correo=$_POST['correo'];
        $telefono=$_POST['telefono'];
        $direccion=$_POST['direccion'];
		$tarjeta=$_POST['tarjeta'];
        $fecha=$_POST['fecha'];
        $cvc=$_POST['cvc'];
     
        try {
        $stmt=$pdo->prepare(' UPDATE restaurante.usuario SET  
					nombre=:nombre,
					contraseña=:pass,
					correo=:correo,
					telefono=:telefono,
                    direccion=:direccion,
					tarjeta=:tarjeta,
					exp_tarjeta=:fecha,
					CVC=:cvc
					WHERE id_usuario=:_id;'
				);
				$stmt->execute(array(
					':nombre' =>$nombre,
					':pass' =>$pass,
					':correo' =>$correo,
                    ':telefono' =>$telefono,
                    ':direccion' =>$direccion,
					':tarjeta' =>$tarjeta,
					':fecha' =>$fecha,
					':cvc' =>$cvc,
					':_id' =>$_SESSION['id']
				));header('Location: perfil.php');
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
    <h2>Modificar datos del usuario</h2>
    <hr>
      <div class="formulario">
          <form  method="post">
          <div class="form-group">
            <label >Nombre Completo</label>
            <input name="nombre" type="text" class="form-control"  value="<?php if($resultado) echo $datos['nombre']; ?>">    
          </div>
          <div  class="form-group ">
            <label >Contraseña</label>
            <input name="pass" type="text" class="form-control" value="<?php  echo $datos['contraseña']; ?>">    
          </div>
          <div  class="form-group">
            <label>Correo electrónico</label>
            <input name="correo" type="text" class="form-control"  value="<?php echo $datos['correo']; ?>">  
          </div>
          <div class="form-group">
            <label>Teléfono</label>
            <input name="telefono" type="number" class="form-control"   value="<?php echo $datos['telefono']; ?>">  
          </div>
          <div class="form-group">
            <label>Dirección</label>
            <input name="direccion" type="text" class="form-control" value="<?php  echo $datos['direccion']; ?>"  >  
          </div>
          <div class="form-group">
            <label>Número de tarjeta</label>
            <input name="tarjeta" type="number" class="form-control" value="<?php echo $datos['tarjeta']; ?>" >  
          </div>
          <div class="form-group">
            <label>Fecha de expiración de tarjeta</label>
            <input name="fecha" type="date" class="form-control" ?>
          </div>
          <div class="form-group">
            <label>CVC</label>
            <input name="cvc" type="number" class="form-control"   value="<?php  echo $datos['CVC']; ?>">  
          </div>
          
          <div  class="form-group botones">
          <input type="submit" class="btn btn-outline-info btn-lg col-4" name="update" value="Update">
          <a class="btn btn-secondary back" href="perfil.php">Back</a>
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