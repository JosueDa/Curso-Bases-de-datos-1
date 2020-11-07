<?php 
     include "php/conexion.php";
     session_start();
  
      if(isset($_POST['email']) || isset($_POST['password'])){
        $email=$_POST['email'];
        $pass=$_POST['password'];
        $stmt=$pdo->prepare('SELECT * FROM restaurante.usuario WHERE correo=:email AND contraseña=:pass');
        $stmt->execute(array(
            ':email'=>$email,
            ':pass'=>$pass
        ));
        $row = $stmt->fetch(PDO::FETCH_NUM);
        
        if($row==true ){
          $stmt2=$pdo->prepare('SELECT * FROM restaurante.usuario WHERE correo=:email AND contraseña=:pass');
          $stmt2->execute(array(
              ':email'=>$email,
              ':pass'=>$pass
          ));
          $r= $stmt2->fetch();
          if(is_numeric($r['activa'])==true){
            $id=$row[0];
            $_SESSION['id']=$id; 
            $rol=$row[9];
            $_SESSION['rol']=$rol;
            $pedido =[];
            $_SESSION['pedidos']=$pedido;
            $cantidad =[];
            $_SESSION['cantidad']=$cantidad;
            $aux =[];
            $_SESSION['aux']=$aux;

            $stmt=$pdo->prepare('UPDATE restaurante.usuario set ultima_conexion = now() where usuario.id_usuario=:id');
            $stmt->execute(array(
                ':id' => $id,
                ));
  
            if(isset($_SESSION['rol'])){
              switch($_SESSION['rol']){
                case 0:
                  header('location: home.php');
                break;
                case 1:
                  header('location: home.php');
                break;
                case 2:
                  header('location: home.php');
                break;
              }
          }

           }else{
          
            echo '<script language="javascript">alert("Tu cuenta no está activada");</script>';
          };
        }  
        else{
          
          echo '<script language="javascript">alert("Correo o contraseña incorrecta");</script>';
        }
        
		
  }
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
          include "header.php";
?>
      
    <div class="container">  
      <form class="login" action="login.php" method="post">  
        <form >
        <?php          
          if(isset($_GET["V"])){
            echo '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            Correo enviado para activar la cuenta
          </div>';
        }; ?>
            <div class="form-group">
                <div class="centrar">
                    <img src="img/user.png" class="avatar" alt="">
                </div>
                <label class="text-light" >Correo electrónico</label>
                <input type="text" name="email"  class="form-control">
            </div>
            
            <div class="form-group">
               <label class="text-light" >Contraseña</label>
                <input name="password" type="password" class="form-control" >
                <a class="link" id="register" href="register.php">Sign up here</a>
            </div>
            
            <input type="submit" value="Log in" class="btn btn-light btn-block" >
        </form>
       </div>
      </form>

      <?php
          include "footer.php"
            ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="js/main.js"></script> 
</body>
</html>