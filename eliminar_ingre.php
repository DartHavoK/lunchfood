<?php
    require 'header.php';
    require 'conexion.php';

    $id_ingre=$_GET['id_ingre'];
    $sql="SELECT `nombre_ingrediente` FROM `ingredientes` WHERE `id_ingredientes`='$id_ingre' ; ";
    $get_ingre = mysqli_query($link,$sql);
    $platillo = mysqli_fetch_assoc($get_ingre);

?>

<br/>
<br/>
<div class="container center-align">
    <h2> Esta seguro de querer eliminar el ingrediente</h2> <h2 class="red-text"><b><?php echo $platillo['nombre_ingrediente'];  ?></b></h2>
<h3>Al eliminar el platillo no volvera a verse ni a ser usado</h3>
    
    <div class="row container center-align">
        <div class="col s6">
                <div class="col s6">
                <a href="delete_ingrediente.php?id=<?php echo $id_ingre ?>" class="waves-effect waves-light btn-large red accent-4"><i class="material-icons right">delete</i>Eliminar</a>
            </div>
            </div>
            <div class="col s6">
                <a href="ingredientes.php" class="waves-effect waves-light btn-large "><i class="material-icons right">close</i>Cancelar</a>
            </div>   
    </div>
</div>
<br/>
