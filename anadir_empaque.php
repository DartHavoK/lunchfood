<?php

    require('conexion.php');
    require('header.php');
    $id = $_POST['ultimo_id'];
    $nombre=$_POST['nombreempque'];
    //$codigo=$_POST['codigo'];
    $capacidad=$_POST['capacidad'];
    $unidad=$_POST['unidad'];
    $cantidad=$_POST['cantidad'];
    $presentacion=$_POST['ppresentacion'];
    $preciounitario=$_POST['punitario'];
    $proveedor=$_POST['proveedor'];
    
    
    if (strlen($_POST['notas'])>='1'){
        $nota=$_POST['notas'];
    }else{
        $nota='N/A';
    }
    
    $codigo = "EMP"."-00".$id;

    echo "Estoy sosteniendo ".$nombre." , ".$codigo." , ".$capacidad." , ".$unidad." , ".$cantidad." , ".$preciounitario;
    
    $sql="INSERT INTO `enpaque` (`id_empaque`, `codigo`, `nombre`, `capacidad`, `id_unidad`, `precio_presentacion`, `cantidad_presentacion`, `precio_unitario`, `id_proveedor`, `descripcion`) VALUES (NULL, '$codigo', '$nombre', '$capacidad', '$unidad', '$presentacion', '$cantidad', '$preciounitario', '$proveedor', '$nota');";
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
        echo "<br/>Se produjo el error: " . mysqli_error($link)."Volveremos a la pantalla de platillos";
        ?>
        <script type="text/javascript">
            setTimeout(function() {
                window.location.href = "empaques.php";
                }, 100);
        </script><?php
    }
    

?>