<?php

    require('conexion.php');
    require('header.php');

    $nombre=$_POST['nombreingrediente'];
    $entrada=$_POST['entrada'];
    $fuerte=$_POST['fuerte'];
    $guar1=$_POST['guarnicion1'];
    
    
    if (strlen($_POST['notas'])>='1'){
        $nota=$_POST['notas'];
    }else{
        $nota='N/A';
    }
    /*if($_POST['guarnicion2']=='0'){
        $guar2=NULL;
    }else{*/
        $guar2=$_POST['guarnicion2'];
        $empaque1=$_POST['empaque1'];
        $empaque2=$_POST['empaque2'];
        $instrucciones=$_POST['ins_empaquetado'];
    

    echo "Estoy sosteniendo ".$nombre.", ".$entrada." , ".$fuerte." , ".$guar1." , ".$guar2." , ".$empaque1." , ".$empaque2." , ".$nota;
    
    $sql="INSERT INTO `menus` (`id_menu`, `nombre_menu`, `id_entrada`, `id_plato_fuerte`, `id_guarnicion_1`, `id_guarnicion_2`,`id_empaque1`,`id_empaque2`, `nota`, `inst_empaque`) VALUES (NULL, '$nombre', '$entrada', '$fuerte', '$guar1', '$guar2', '$empaque1', '$empaque2', '$nota', '$instrucciones');";
    if(mysqli_query($link,$sql)){
        echo "Menú agregado . . .";
        //header("Location: anadir_ingredientes.php?id=$id_platillo");

        //Para conseguir id y subir subir imagenes 1
        $sql_get_last_id="SELECT `id_menu` FROM menus ORDER BY id_menu DESC LIMIT 1 ";
        $id_last_platillo = mysqli_query($link,$sql_get_last_id);
        $id_insert =mysqli_fetch_assoc($id_last_platillo);
        $id_insert = $id_insert['id_menu'];
 

    require('subir_imagenes_menu.php');
        
        ?>
    <script type="text/javascript">
            window.location="menus.php";
        </script>
    <?php
        
    }else{
        echo "Algo salio mal<br/>";
        echo "<br/>Se produjo el error: " . mysqli_error($link)."Volveremos a la pantalla de menús en 10 segundos";
        ?>
        <script type="text/javascript">
            setTimeout(function() {
                window.location.href = "menus.php";
                }, 10000);
        </script><?php
    }
    

?>