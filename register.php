<?php
 session_start();
 if(isset($_SESSION['rol'])){
  header("location: home.php");
};
?>

    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
   
    require 'mailer/Exception.php';
    require 'mailer/PHPMailer.php';
    require 'mailer/SMTP.php';
    include "php/conexion.php";

    if(isset($_POST["enviar"])){
      $stmt2 = $pdo->prepare('SELECT * from restaurante.usuario order by id_usuario desc limit 1');
      $stmt2->execute();
      $resultado=$stmt2->fetch();
      $x = $resultado['id_usuario']+1;

        $nombre=$_POST["nombre"];
        $pass=$_POST["password"];
        $correo=$_POST["correo"];
        $telefono=$_POST["telefono"];
        $direccion=$_POST["direccion"];
        $numero=$_POST["numero"];
        $fecha=$_POST["fecha"];
        $cvc=$_POST["cvc"];
        $stmt = $pdo->prepare('INSERT INTO restaurante.usuario (id_usuario, nombre, contraseña, correo, telefono, direccion, tarjeta, exp_tarjeta, CVC, tipo_usuario, ultima_conexion ) VALUES ( :i,:nombre,:pass,:correo,:telefono, :direccion, :numero,:fecha, :cvc, 2, now());');
				$stmt->execute(array(
          ':i' =>$x,
          ':nombre' =>$nombre,
					':pass' =>$pass,
          ':correo' =>$correo,
          ':telefono' =>$telefono,
          ':direccion' =>$direccion,
          ':numero' =>$numero,
          ':fecha' =>$fecha,
          ':cvc' =>$cvc
                )); header('location: login.php?V=1');
        
                $mail = new PHPMailer(true);

                try {
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
                    $mail->isSMTP(); 
                    $mail->Host       = 'smtp.gmail.com';  
                    $mail->SMTPAuth   = true;                                  
                    $mail->Username   = 'prbjosue@gmail.com';                 
                    $mail->Password   = 'prueba123';                               
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
                    $mail->Port       = 587;                                  
                  
                    $mail->setFrom('prbjosue@gmail.com', 'Admin');
                    $mail->addAddress($correo, 'User');  

                    $mail->isHTML(true);                                
                    $mail->Subject = 'Activa tu cuenta: Winner Chicken';
                    $mail->Body    = 'Dirigíte al siguiente link para activar tu cuenta <br>
                    <a href="http://localhost/proyectoFinal/activacion.php?id='.$x.'">Click aquí</a>
                    ';

                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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

      </header>
    <div class="container">
      <div class="register">
        <h2>Registrate</h2>
        <hr>
          <div class="formulario">
              <form  method="post"  action="register.php">
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
                <label>Dirección</label>
                <input name="direccion" type="text" class="form-control"  placeholder="Dirección completa">  
              </div>
              <div class="form-group">
                <label>Número de tarjeta</label>
                <input name="numero" type="number" class="form-control" placeholder="Número de tarjeta">  
              </div>
              <div class="form-group">
                <label>Fecha de expiración</label>
                <input name="fecha" type="date" class="form-control" >  
              </div>
              <div class="form-group">
                <label>CVC</label>
                <input name="cvc"  type="number" class="form-control" placeholder="Número CVC de tarjeta">  
              </div>
    
              <div  class="form-group botones">
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