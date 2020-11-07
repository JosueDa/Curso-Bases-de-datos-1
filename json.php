<?php
    include "php/conexion.php";
    $id=1;
    $arreglo = array();


    $stmt = $pdo->prepare('SELECT * FROM restaurante.menu INNER JOIN restaurante.menuxproducto ON restaurante.menu.id_menu = restaurante.menuxproducto.id_menu WHERE restaurante.menu.id_menu=1');
    $stmt->execute();
    $stmt2 = $pdo->prepare('SELECT * FROM restaurante.menu INNER JOIN restaurante.menuxproducto ON restaurante.menu.id_menu = restaurante.menuxproducto.id_menu WHERE restaurante.menu.id_menu=1');
    $stmt2->execute();
    $datos=$stmt2->fetch();
    $resultado=$stmt->fetchAll();
    array_push($arreglo, array("idMenu"=>$id)); 
    array_push($arreglo, array("nombreMenu"=>$datos['nombre'])); 
    array_push($arreglo, array("descripcionMenu"=>$datos['descripcion'])); 
    array_push($arreglo, array("platillos")); 
    foreach($resultado as $fila):
    array_push($arreglo[3], array("id"=>$fila['id_producto'])); 
    endforeach; 
   
    echo json_encode($arreglo);
?>