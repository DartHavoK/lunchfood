<?php
    require('header.php');
    require('conexion.php');
    

    $nombreplatillo = $_POST['nombreingrediente'];
    $porciones= $_POST['porciones'];
    $tamaño_porciones= $_POST['tamaño_porciones'];
    $uentrada = $_POST['unidad'];
    $tiempo = $_POST['tiempopreparacion'];
    $instrucciones = $_POST['instructivo'];
    $instrucciones_empaquetado = $_POST['instructivo_empaquetado'];

    //echo "Estoy sosteniendo ".$nombreplatillo."</br> , ",$porciones."</br> , ".$tiempo."</br> , ".$instrucciones;

    $sql_insertar="INSERT INTO `platillo` (`id_platillo`, `id_unidad`, `categoria_platillo`, `nombre_platillo`, `porciones`, `tamaño_porciones`, `tiempo_preparacion`, `costo_neto`, `costo_bruto`, `paxpla_pesos`, `paxpla_porciento`, `instr`, `instructivo_empaquetado`) VALUES (NULL, '$uentrada', '1', '$nombreplatillo', '$porciones', '$tamaño_porciones', '$tiempo', '', '', '', '', '$instrucciones', '$instrucciones_empaquetado');";

    if(mysqli_query($link,$sql_insertar)){
        echo "Entrada agregada de forma exitosa";
        
        $sql_get_last_id="SELECT MAX(id_platillo) FROM platillo";
        $id_last_platillo = mysqli_query($link,$sql_get_last_id);
        $el_id =mysqli_fetch_assoc($id_last_platillo);
        $id_libre=$el_id['MAX(id_platillo)'];
        //header("Location: anadir_ingredientes.php?id=$id_libre");?>
        <script type="text/javascript">
            window.location="anadir_ingredientes.php?id=<?php echo $id_libre?>";
        </script>
<?php
    }else{
        echo "Algo salio mal";
        $paso="0";
    }

    /*if($paso == "1"){
        $sql_get_last_id="SELECT MAX(id_platillo) FROM platillo";
        $id_last_platillo = mysqli_query($link,$sql_get_last_id);
        $el_id =mysqli_fetch_assoc($id_last_platillo);
        $id_libre=$el_id['MAX(id_platillo)'];
        
        
    }


echo "</br>". $id_libre;
echo "<h3>Estas trbajando con el platillo ". $nombredelplatillo['nombre_platillo']."</h3>" ;*/

?>