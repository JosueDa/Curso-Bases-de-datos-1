<?php 
     include "php/conexion.php";
    
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$stmt=$pdo->prepare('DELETE FROM restaurante.ingredientes WHERE id_ingredientes=:id');
		$stmt->execute(array(
			':id'=>$id
		));
		header('Location: CRUD_ingredientes.php');
	}
 ?>