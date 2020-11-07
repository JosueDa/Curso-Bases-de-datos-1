<?php
 session_start();
 if(!isset($_SESSION['rol'])){
    header("location: login.php");
 };
?>

<?php
    include "php/conexion.php";

    if(isset($_POST['update'])){

        $vieja=$_POST['vieja'];
        $nueva=$_POST['nueva'];

        $stmt=$pdo->prepare('SELECT * FROM restaurante.usuario WHERE id_usuario=:id AND contraseña=:pass');
        $stmt->execute(array(
            ':id'=>$_SESSION['id'],
            ':pass'=>$vieja
        ));

        $row = $stmt->fetch(PDO::FETCH_NUM);


      if($row == true){
        $stmt=$pdo->prepare(' UPDATE restaurante.usuario SET  
					contraseña=:nueva
					WHERE id_usuario=:id and contraseña= :vieja'
				);
				$stmt->execute(array(
					':nueva' =>$nueva,
					':vieja' =>$vieja,
					':id' =>$_SESSION['id']
                ));

        echo '<script language="javascript">alert("Contraseña actualizada con éxito");</script>';
        header('location: home.php?C=1');
      }else{
        echo '<script language="javascript">alert("Contraseña incorrecta");</script>';

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
    <h2>Cambiar la contraseña</h2>
    <hr>
      <div class="formulario">
          <form  method="post">
          <div class="form-group">
            <label>Ingrese contraseña anterior</label>
            <input name="vieja" type="password" class="form-control"  >  
          </div>
          <div class="form-group">
            <label>Ingrese nueva cotraseña</label>
            <input name="nueva" type="password" class="form-control">  
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