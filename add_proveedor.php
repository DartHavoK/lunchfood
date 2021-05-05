<?php

    require('conexion.php');
    require('header.php');

    $nombre=$_POST['nombreproveedor'];
    
    /*if (strlen($_POST['notas'])>='1'){
        $nota=$_POST['notas'];
    }else{
        $nota='N/A';
    }*/
    

    echo "Estoy sosteniendo ".$nombre;
    
    $sql="INSERT INTO `proveedor` (`id_proveedor`, `des_proveedor`) VALUES (NULL, '$nombre');";
    if(mysqli_query($link,$sql)){
        echo "Introducido";
        //header("Location: anadir_ingredientes.php?id=$id_platillo");
        
        ?>
    <script type="text/javascript">
            window.location="empaques.php";
        </script>
    <?php
        
    }else{
        echo "Algo salio mal<br/>";
        echo "<br/>Se produjo el error: " . mysqli_error($link)."Volveremos a la pantalla de platillos en 10 segundos";
        ?>
        <script type="text/javascript">
            setTimeout(function() {
                window.location.href = "menus.php";
                }, 10000);
        </script><?php
    }
    

?>