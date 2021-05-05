<?php
    require 'header.php';
    require 'conexion.php';

    $id_menu=$_GET['id'];
    $sql_eliminar="DELETE FROM `menus` WHERE `menus`.`id_menu` = '$id_menu'";

    if(mysqli_query($link,$sql_eliminar)){
        echo "Eliminado";
        ?>

        <script type="text/javascript">
            window.location="menus.php";
        </script>

        <?php
    }else{
        echo "No eliminado<br/>";
        /*echo $id_ingrediente;
        echo "<div class='center-align'><h4> Este ingrediente no se puede eliminar porque pertenece a las recetas: <br/></h4>";
            $sql_ingredientes="SELECT platillo.nombre_platillo FROM `platillo_ingrediente` INNER JOIN platillo ON platillo_ingrediente.id_platillo =platillo.id_platillo WHERE `id_ingrediente`='$id_ingrediente' ";
            $relacion = mysqli_query($link,$sql_ingredientes);
            
            
			while($row2 = mysqli_fetch_array($relacion)):
			echo "<h4><b>".$row2['nombre_platillo']."</b></h4><br/>";
            endwhile;*/
        //echo "<br/>Se produjo el error: " . mysqli_error($link)."Volveremos a la pantalla de ingredientes en 10 segundos";
        echo "<br/> Volveremos a menu de ingredientes en 15 segundos</div>";
        ?>

        <script type="text/javascript">
            setTimeout(function() {
                window.location.href = "menus.php";
                }, 15000);
        </script>
        <div style="display: flex;justify-content: center;align-items: center;">
                <img src="https://media.giphy.com/media/69u846XVoZBl6D4nR7/giphy.gif">
    </div>
        <?php
    }
?>
    
