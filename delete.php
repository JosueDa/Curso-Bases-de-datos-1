<?php 
	 include "php/conexion.php";
	 session_start();
    
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$stmt=$pdo->prepare('DELETE FROM restaurante.ingredientes WHERE id_ingredientes=:id');
		$stmt->execute(array(
			':id'=>$id
		));
		header('Location: CRUD_ingredientes.php');
	}

	if(isset($_GET['idP'])){
		$id=(int) $_GET['idP'];
		$stmt=$pdo->prepare('DELETE FROM restaurante.producto WHERE id_producto=:id');
		$stmt->execute(array(
			':id'=>$id
		));
		header('Location: CRUD_platillos.php');
	}

	if(isset($_GET['idIP'])){
		$id=(int) $_GET['idIP'];
		$stmt=$pdo->prepare('DELETE FROM restaurante.productoxingredientes WHERE id_productoXingredientes=:id');
		$stmt->execute(array(
			':id'=>$id
		));
		header('Location: ingreXpro.php?id='.$_GET['id2']);
	}
	if(isset($_GET['idM'])){
		$id=(int) $_GET['idM'];
		$stmt=$pdo->prepare('DELETE FROM restaurante.menu WHERE id_menu=:idM');
		$stmt->execute(array(
			':idM'=>$id
		));
		header('Location: CRUD_menu.php');
	}
	if(isset($_GET['idPM'])){
		$id=(int) $_GET['idPM'];
		$stmt=$pdo->prepare('DELETE FROM restaurante.menuxproducto WHERE id_menuXproducto=:iPM');
		$stmt->execute(array(
			':iPM'=>$id
		));
		header('Location: proXmenu.php?id='.$_GET['id2']);
	}
	if(isset($_GET['idPedido'])){
		$i=(int) $_GET['idPedido'];
		array_splice($_SESSION['pedidos'],$i,1);
		array_splice($_SESSION['cantidad'],$i,1);
		header("Location: pedido.php");
	}

	if(isset($_GET['idF'])){
		$id=(int) $_GET['idF'];
		$stmt=$pdo->prepare('DELETE FROM restaurante.favoritos WHERE id_favorito=:i');
		$stmt->execute(array(
			':i'=>$id
		));
		header('Location: platillosFav.php');
	 }
	 if(isset($_GET['idTop'])){
		$id=(int) $_GET['idTop'];
		$stmt=$pdo->prepare('DELETE FROM restaurante.favoritos WHERE id_favorito=:i');
		$stmt->execute(array(
			':i'=>$id
		));
		header('Location: top10.php');
	 }
 ?>