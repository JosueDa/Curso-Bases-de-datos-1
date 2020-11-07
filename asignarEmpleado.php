<?php
 session_start();
 if($_SESSION['rol']!=0){
  header("location: login.php");
};
?>

    <?php
    
    if(isset($_POST["enviar"])){
    include "php/conexion.php";
      $stmt2 = $pdo->prepare('SELECT * from restaurante.usuario order by id_usuario desc limit 1');
      $stmt2->execute();
      $resultado=$stmt2->fetch();
      $x = $resultado['id_usuario']+1;
      $def="N/A";
      $numDef=0;

        $nombre=$_POST["nombre"];
        $pass=$_POST["password"];
        $correo=$_POST["correo"];
        $telefono=$_POST["telefono"];
        $roles= $_POST["rol"];
        if($roles=="Administrador"){
            $rol=0;
        }else{
            $rol=1;
        };

        $stmt = $pdo->prepare('INSERT INTO restaurante.usuario (id_usuario, nombre, contraseña, correo, telefono, direccion, tarjeta, exp_tarjeta, CVC, tipo_usuario, activa, ultima_conexion ) VALUES ( :i,:nombre,:pass,:correo,:telefono, :direccion, :numero, NULL, :cvc, :rol, 1,now());');
				$stmt->execute(array(
          ':i' =>$x,
          ':nombre' =>$nombre,
		  ':pass' =>$pass,
          ':correo' =>$correo,
          ':telefono' =>$telefono,
          ':direccion' =>$def,
          ':numero' =>$numDef,
          ':cvc' =>$numDef,
          ':rol' =>$rol
                )); header("location: home.php");
        
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
        <h2>Agregar empleado</h2>
        <hr>
          <div class="formulario">
              <form  method="post"  action="asignarEmpleado.php">
              
              <div class="form-group">
                <label >Nombre completo</label>
                <input name="nombre" type="text" class="form-control"  placeholder="Nombre completo">    
              </div>
              <div  class="form-group ">
                <label >Contraseña</label>
                <input name="password" type="password" class="form-control">    
              </div>
              <div  class="form-group">
                <label>Correo</label>
                <input name="correo" type="text" class="form-control"  placeholder="Correo electrónico">  
              </div>
              <div class="form-group">
                <label>Teléfono</label>
                <input name="telefono" type="number" class="form-control"  placeholder="Número de teléfono">  
              </div>
              <div class="form-group">
                <label>Rol</label>
                <input list="rol" name="rol" class="form-control"> 
                <datalist id="rol">
                    <option value="Empleado">
                    <option value="Administrador">
                </datalist>      
              </div>
    
              <div  class="form-group botones padd">
              <input type="submit" class="btn btn-outline-info btn-lg col-4" name="enviar" value="Enviar">
              <a class="btn btn-secondary back" href="login.php">Back</a>
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