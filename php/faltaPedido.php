<?php
                if(!empty($_GET["id"])){

                    $stmt5 = $pdo->prepare('SELECT * from restaurante.producto WHERE producto.id_producto=:id');
                    $stmt5->execute(array(
                    ':id' =>$_GET['id']
                    ));
                    $resultado=$stmt5->fetch();

                    echo '<div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    <h4 class="alert-heading">:(</h4>
                    Por el momento no le ofrecemos '.$resultado['nombre'].'.
                  </div>';
                };
                    
?>