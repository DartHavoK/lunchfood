<?php
    require 'header.php';
    require 'conexion.php';

    $id_menu=$_GET['id'];
    $sql="SELECT `nombre_menu` FROM `menus` WHERE `id_menu`='$id_menu' ";
    $get_menu = mysqli_query($link,$sql);
    $menu = mysqli_fetch_assoc($get_menu);

?>

<br/>
<br/>
<div class="container center-align">
    <h2> Esta seguro de querer eliminar el menu</h2> <h2 class="red-text"><b><?php echo $menu['nombre_menu'];  ?></b></h2>
<h3>Al eliminar el menu no volvera a verse ni a ser usado</h3>
    
    <div class="row container center-align">
        <div class="col s6">
                <div class="col s6">
                <a href="delete_menu.php?id=<?php echo $id_menu ?>" class="waves-effect waves-light btn-large red accent-4"><i class="material-icons right">delete</i>Eliminar</a>
            </div>
            </div>
            <div class="col s6">
                <a href="menus.php" class="waves-effect waves-light btn-large "><i class="material-icons right">close</i>Cancelar</a>
            </div>   
    </div>
</div>
<br/>
