<?php
    require 'header.php';
    require 'conexion.php';

    $id_platillo=$_GET['id'];
    $categoria=$_GET['cat'];
    $sql_eliminar="DELETE FROM `platillo` WHERE `platillo`.`id_platillo` = '$id_platillo' ;";

    if(mysqli_query($link,$sql_eliminar)){
        echo "Eliminado";
        ?>

        <script type="text/javascript">
            window.location="index.php";
        </script>

        <?php
    }else{
        //echo "No eliminado";
        //echo $id_platillo;
        echo "<div class='center-align'><h4> Este ingrediente no se puede eliminar porque pertenece a los menus: <br/></h4>";
        
            $sql_ingredientes="SELECT `nombre_menu` FROM `menus` WHERE id_entrada='$id_platillo' OR id_plato_fuerte ='$id_platillo' OR id_guarnicion_1='$id_platillo' OR id_guarnicion_2='$id_platillo'  ";
            $relacion = mysqli_query($link,$sql_ingredientes);
            
            
			while($row2 = mysqli_fetch_array($relacion)):
			echo "<h4><b>".$row2['nombre_menu']."</b></h4><br/>";
            endwhile;
        echo "Volveremos a la panta de platillos en 15 segundos"
        //echo "<br/>Se produjo el error: " . mysqli_error($link)."Volveremos a la pantalla de platillos en 10 segundos";
        ?>
        <script type="text/javascript">
            setTimeout(function() {
                window.location.href = "index.php";
                }, 15000);
        </script>
<?php
    }
?>
    
