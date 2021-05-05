<!--<html>
    <head>
      <--Import Google Icon Fon->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <--Import materialize.css--
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <--get jquery--
      <script src="js/jquery-3.3.1.js"></script>

      <--Let browser know website is optimized for mobile--
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title> Lunch menu creator </title>
    </head>-->
<?php 
 require'conexion.php';
    
    /*if(isset($_POST['nombre_ingrediente'])){
        $ningrediente = $_POST['nombre_ingrediente'];
        echo $ningrediente;
    }
    if(isset($_POST['codigo'])){
        $cingrediente = $_POST['codigo'];
        echo $ningrediente;
    }
    if(isset($_POST['cantidad'])){
        $caningrediente = $_POST['cantidad'];
        echo $ningrediente;
    }
    if(isset($_POST['unidad'])){
        $uingrediente = $_POST['unidad'];
        echo $ningrediente;
    }
    if(isset($_POST['ppresentacion'])){
        $pingrediente = $_POST['ppresentacion'];
        echo $ningrediente;
    }
    if(isset($_POST['punitario'])){
        $puingrediente = $_POST['punitario'];
        echo $ningrediente;
    }*/
    $id = $_POST['ultimo_id'];
    $ningrediente = $_POST['nombre_ingrediente'];
   // $cingrediente = $_POST['codigo'];
    $categoria_ing  = $_POST['cat_prod'];
    $caningrediente = $_POST['cantidad'];
    $uingrediente = $_POST['unidad'];
    $pingrediente = $_POST['ppresentacion'];
    $puingrediente = $_POST['punitario'];
    $cant_almacen = $_POST['cant_almacen'];
    $resurtido = $_POST['resurtido'];
    $cant_max = $_POST['cant_max'];
    
    /*echo "Sotengo ". $ningrediente." , ".$cingrediente." , ".$caningrediente." , ".$uingrediente." , ".$pingrediente." , ".$puingrediente;
    
    echo"</br>Unidad ".$uingrediente;


    $nom_ingre .= substr($ningrediente,0, 3);//recorta las primeras 3 letar del nombre de ingredientes
    $cat_prod .= substr($categoria_ing,0, 3);//recorta primeras 3 letras de categoria de ingrediente*/

    
    $cingrediente = $categoria_ing."-0".$id;
     

    $sql="INSERT INTO `ingredientes` (`id_ingredientes`, `codigo`, `cantidad`, `id_unidad`,`categoria_ing`, `nombre_ingrediente`, `costo_presentacion`, `costo_unitario`, `cantidad_almacen`, `cant_resurtir`, `cant_max_almacen` ) VALUES (NULL, '$cingrediente', '$caningrediente', '$uingrediente', '$categoria_ing', '$ningrediente', '$pingrediente', '$puingrediente', '$cant_almacen', '$resurtido', '$cant_max');";
    if(mysqli_query($link,$sql)){
        echo "Ingrediente introducido";
        //header('Location: index.php');
        ?>
        <script type="text/javascript">
            window.location="ingredientes.php";
        </script>
    <?php
    }else{
        echo "Algo salio mal";
    }
    
    
    
    

    
?>