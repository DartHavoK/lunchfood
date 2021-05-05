<?php
    require('header.php');
    require('conexion.php');
    

    $nombreplatillo = $_POST['nombreingrediente'];
    $porciones= $_POST['porciones'];
    $tamaño = $_POST['t_porcion'];
    $uentrada = $_POST['unidad'];
    $tiempo = $_POST['tiempopreparacion'];
    $instrucciones = $_POST['instructivo'];
    $instrucciones_empaquetado = $_POST['instructivo_empaquetado'];

    //echo "Estoy sosteniendo ".$nombreplatillo."</br> , ",$porciones."</br> , ".$tiempo."</br> , ".$instrucciones;

    $sql_insertar="INSERT INTO `platillo` (`id_platillo`, `id_unidad`, `categoria_platillo`, `nombre_platillo`, `porciones`, `t_porciones`, `tiempo_preparacion`, `costo_neto`, `costo_bruto`, `paxpla_pesos`, `paxpla_porciento`, `instr`, `instructivo_empaquetado`) VALUES (NULL, '$uentrada','3', '$nombreplatillo', '$porciones', '$tamaño', '$tiempo', '', '', '', '', '$instrucciones', '$instrucciones_empaquetado');";
    if(mysqli_query($link,$sql_insertar)){
        echo "Guarnición agregada . . .";
        
        $sql_get_last_id="SELECT MAX(id_platillo) FROM platillo";
        $id_last_platillo = mysqli_query($link,$sql_get_last_id);
        $el_id =mysqli_fetch_assoc($id_last_platillo);
        $id_libre=$el_id['MAX(id_platillo)'];
        //header("Location: anadir_ingredientes.php?id=$id_libre");

        //Para subir imagenes 
    $id_insert = $id_libre;

    if($_FILES["archivo"] ["error"]>0){
        echo "Error al cargar imágen";
    } else {
        $permitidos = array("image/jpg","image/jpeg","image/png","image/gif");
        $limite_kb = 200;

        if (in_array($_FILES["archivo"] ["type"],$permitidos) && $_FILES["archivo"] ["size"] <= $limite_kb * 1024 ) {
            
            $ruta = 'foto_platillos/'.$id_insert.'/';
            $archivo = $ruta.$_FILES["archivo"] ["name"];

            if (!file_exists($ruta)) {
                mkdir($ruta);
            }

            if (!file_exists($archivo)) {
                
                $resultado = @move_uploaded_file($_FILES["archivo"] ["tmp_name"], $archivo);
                if ($resultado) {
                    echo "Archivo guardado";
                }else{
                    echo "Error al guardar";
                }

            }else{
                echo "El archivo ya existe";
            }

        }else{
            echo "Archivo no permitido o excede el tamaño";
        }
    }//fin subir imagenes
?>
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