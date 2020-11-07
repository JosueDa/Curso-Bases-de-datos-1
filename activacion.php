<?php
    include "php/conexion.php";
    if (isset($_GET['id'])){
        $id=$_GET['id'];
        $stmt = $pdo->prepare('UPDATE restaurante.usuario set activa = 1 where id_usuario=:id');
        $stmt->execute(array(
        ':id'=>$id));
        }header('location: http://localhost/proyectoFinal/home.php?A=1');
?>