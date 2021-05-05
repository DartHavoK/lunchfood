<?php
    require 'header.php';
    require 'conexion.php';

    $id=$_GET['id'];
    $sql_eliminar="DELETE FROM `proveedor` WHERE `proveedor`.`id_proveedor` = '$id'";

    if(mysqli_query($link,$sql_eliminar)){
        echo "Eliminado";
        ?>

        <script type="text/javascript">
            window.location="empaques.php";
        </script>

        <?php
    }else{
        echo "No eliminado<br/>";
        
        echo "<div class='center-align'><h4> Este proveedor no se puede eliminar porque pertenece a los empaques : <br/></h4>";
            $sql_ingredientes="SELECT `nombre` FROM `enpaque` WHERE `id_proveedor`='$id' ";
            $relacion = mysqli_query($link,$sql_ingredientes);
            
            
			while($row2 = mysqli_fetch_array($relacion)):
			echo "<h4><b>".$row2['nombre']."</b></h4><br/>";
            endwhile;
        echo "<br/>Se produjo el error: " . mysqli_error($link)."Volveremos a la pantalla de empaques en 15 segundos";
        //echo "<br/> Volveremos a menu de ingredientes en 15 segundos</div>";
        ?>

        <script type="text/javascript">
            setTimeout(function() {
                window.location.href = "empaques.php";
                }, 15000);
        </script>
        <div style="display: flex;justify-content: center;align-items: center;">
                <img src="https://media.giphy.com/media/69u846XVoZBl6D4nR7/giphy.gif">
    </div>
        <?php
    }
?>
    
