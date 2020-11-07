<?php
    session_start();
    include "php/conexion.php";
    if(isset($_POST['comentario'])){
        $comentario=$_POST['comentario']; 

        $longitud= count($_SESSION['pedidos']);
        $hay=true;
        for($i=0; $i<$longitud; $i++)
        {
            $cantidad= $_SESSION['cantidad'][$i];
            
            $stmt4 = $pdo->prepare('SELECT producto.id_producto, nombre, productoxingredientes.id_ingrediente, cantidad_ingrediente, cantidad FROM restaurante.producto INNER JOIN restaurante.productoxingredientes on producto.id_producto = productoxingredientes.id_producto INNER JOIN restaurante.inventario on productoxingredientes.id_ingrediente = inventario.id_ingrediente WHERE producto.id_producto=:idP');
            $stmt4->execute(array(
            ':idP' =>$_SESSION['pedidos'][$i]
            ));
            $resultado=$stmt4->fetchAll();
            foreach($resultado as $fila):
                if(($fila['cantidad_ingrediente']*$cantidad)>$fila['cantidad']){
                  $hay=false;
                  header("location: pedido.php?id=".$_SESSION['pedidos'][$i]."");
                }
            endforeach;
            
        }   

        if ($hay==true) {
            $stmt = $pdo->prepare('SELECT id_pedido from restaurante.pedido ORDER BY id_pedido DESC limit 1');
            $stmt->execute();
            $resultado=$stmt->fetch();
            $x = $resultado['id_pedido'] +1;
            $estado= "Aceptado";
            $stmt2 = $pdo->prepare('INSERT into restaurante.pedido (id_pedido, id_usuario, comentario, fecha, estado) values (:x, :id_usuario, :comentario, NOW(), :estado)');
            $stmt2->execute(array(
            ':id_usuario' =>$_SESSION['id'],
            ':comentario' =>$comentario,
            ':x' =>$x,
            ':estado' =>$estado 
            )); 
            for($i=0; $i<$longitud; $i++)
        {

            $cantidad= $_SESSION['cantidad'][$i];

            for ($j=0; $j < $cantidad; $j++) 
            { 
                $stmt3 = $pdo->prepare('INSERT into restaurante.pedidoXproducto  (id_pedidoXproducto, id_producto, id_pedido) values (null, :id_producto, :id_pedido)');
                $stmt3->execute(array(
                ':id_producto' =>$_SESSION['pedidos'][$i],
                ':id_pedido' =>$x
                ));

            }
        }
        array_splice($_SESSION['pedidos'],0,$longitud);
        array_splice($_SESSION['cantidad'],0,$longitud);
        header("location: home.php?E=1");
        }
    };
?>     