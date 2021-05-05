<?php
    require 'header.php';
    require 'conexion.php';

    $id=$_GET['id'];
    $sql="SELECT `des_proveedor` FROM `proveedor` WHERE `id_proveedor`='$id';";
    $get_ingre = mysqli_query($link,$sql);
    $proveedor = mysqli_fetch_assoc($get_ingre);

?>

<br/>
<br/>
<div class="container center-align">
    <h2> Esta seguro de querer eliminar el proveedor</h2> <h2 class="red-text"><b><?php echo $proveedor['des_proveedor'];  ?></b></h2>
<h3>Al eliminar el proveedor no volvera a verse ni a ser usado</h3>
    <p>Este proveedor no sera eliminado si pertenece a alguno empaque</p>
    
    <div class="row container center-align">
        <div class="col s6">
                <div class="col s6">
                <a href="delete_proveedor.php?id=<?php echo $id; ?>" class="waves-effect waves-light btn-large red accent-4"><i class="material-icons right">delete</i>Eliminar</a>
            </div>
            </div>
            <div class="col s6">
                 <a href="javascript:history.back(-1);" title="Ir la página anterior" class="waves-effect waves-light btn-large red accent-4"><i class="material-icons right">close</i>Cancelar</a>
            </div>   
    </div>
</div>
<br/>
