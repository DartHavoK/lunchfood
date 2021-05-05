<?php
    require 'header.php';
    require 'conexion.php';

    $id_evase=$_GET['id'];
   
    $sql="SELECT `nombre` FROM `enpaque` WHERE `id_empaque`='$id_evase'; ";
    $get_platillo = mysqli_query($link,$sql);
    $empaque = mysqli_fetch_assoc($get_platillo);

?>

<br/>
<br/>
<div class="container center-align">
    <h2> Esta seguro de querer eliminar el empaque </h2> <h2 class="red-text"><b><?php echo $empaque['nombre'];  ?></b> </h2>

   <p>Antes de eliminar este empaque asegurate que no se este usando en ningun men&uacute; de lo contrario no se borrara</p>
    
    <div class="container center-align">
<div class="row">
    <div class="col s6">
        <a href="delete_empaque.php?id=<?php echo $id_evase; ?>" class="waves-effect waves-light btn-large red accent-4" ><i class="material-icons right">delete</i>Elimnar</a>
    </div>
    <div class="col s6">
        <a href="empaques.php" class="waves-effect waves-light btn-large"><i class="material-icons right">close</i>Cancelar</a>
    </div>
</div>
    </div>
<br/>
