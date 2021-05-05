<?php
    require('header.php');
    require('conexion.php');
    

    $nombreplatillo = $_POST['nombreingrediente'];
    $porciones= $_POST['porciones'];
    $tiempo = $_POST['tiempopreparacion'];
    $instrucciones = $_POST['instructivo'];

    //echo "Estoy sosteniendo ".$nombreplatillo."</br> , ",$porciones."</br> , ".$tiempo."</br> , ".$instrucciones;

    $sql_insertar="INSERT INTO `platillo` (`id_platillo`, `nombre_platillo`, `porciones`, `tiempo_preparacion`, `costo_neto`, `costo_bruto`, `paxpla_pesos`, `paxpla_porciento`, `instr`) VALUES (NULL, '$nombreplatillo', '$porciones', '$tiempo', '', '', '', '', '$instrucciones');";
    if(mysqli_query($link,$sql_insertar)){
        echo "Introducido";
        
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