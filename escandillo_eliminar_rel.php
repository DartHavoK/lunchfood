<?php
    require 'header.php';
    require 'conexion.php';

    $id_platillo=$_GET['id_platillo'];
    $id_ingre=$_GET['id_ingre'];
    $id_relacion=$_GET['id_rel'];
    $sql="SELECT platillo.nombre_platillo,ingredientes.nombre_ingrediente FROM `platillo_ingrediente` INNER JOIN ingredientes ON platillo_ingrediente.id_ingrediente = ingredientes.id_ingredientes INNER JOIN platillo ON platillo_ingrediente.id_platillo =platillo.id_platillo WHERE `id_relacion`='$id_relacion' ";
    $get_platillo = mysqli_query($link,$sql);
    $platillo = mysqli_fetch_assoc($get_platillo);

?>

<br/>
<br/>
<div class="container center-align">
    <h2> Esta seguro de querer eliminar el ingrediente</h2> <h2 class="red-text"><b><?php echo $platillo['nombre_ingrediente'];  ?></b> de la receta <b><?php echo $platillo['nombre_platillo'];  ?></b></h2>
<h3>Al eliminar esta relacion no se mostrara en escandillo </h3>
   <p>No estas eliminando ni el platillo ni el ingrediente</p>
    
    <div class="container center-align">
<div class="row">
    <div class="col s6">
        <a href="escandallo_delete_rel.php?id=<?php echo $id_relacion; ?>&id_escan=<?php echo $id_platillo ?>" class="waves-effect waves-light btn-large red accent-4" ><i class="material-icons right">delete</i>Elimnar</a>
    </div>
    <div class="col s6">
        <a href="escandallo.php?id=<?php echo $id_platillo; ?>" class="waves-effect waves-light btn-large"><i class="material-icons right">close</i>Cancelar</a>
    </div>
</div>
    </div>
<br/>
