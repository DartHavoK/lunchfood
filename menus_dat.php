<?php
    require'header.php';
    require'conexion.php';

    $id=$_GET['id'];

    //echo $id;

    $sql="SELECT id_menu,`id_entrada`,`id_plato_fuerte`,`id_guarnicion_1`,`id_guarnicion_2`,`id_empaque1`,`id_empaque2`,`nombre_menu`,entrada.nombre_platillo as entrada,fuerte.nombre_platillo as fuerte,guar1.nombre_platillo as guar1,guar2.nombre_platillo as guar2, empa1.nombre AS empaq1, empa2.nombre AS empaq2 FROM `menus` INNER JOIN platillo AS entrada ON entrada.id_platillo = id_entrada INNER JOIN platillo AS fuerte ON fuerte.id_platillo = menus.id_plato_fuerte INNER JOIN platillo AS guar1 ON guar1.id_platillo=menus.id_guarnicion_1 INNER JOIN platillo AS guar2 ON guar2.id_platillo=menus.id_guarnicion_2 INNER JOIN enpaque AS empa1 ON empa1.id_empaque=menus.id_empaque1 INNER JOIN enpaque AS empa2 ON empa2.id_empaque=menus.id_empaque2 WHERE id_menu='$id' ";
    $get_dato_menu = mysqli_query($link,$sql);
    $menu = mysqli_fetch_assoc($get_dato_menu);

    $entrada=$menu['id_entrada'];
    $fuerte = $menu['id_plato_fuerte'];
    $guar1 = $menu['id_guarnicion_1'];
    $guar2 = $menu['id_guarnicion_2'];
    $empa1 = $menu['id_empaque1'];
    $empa2 = $menu['id_empaque2'];

    $sql_entrada="SELECT SUM(`coste_ingrediente`) as sumaneto,SUM(`pax_pesos`)AS sumapax FROM platillo_ingrediente WHERE `id_platillo`='$entrada'; ";
    $get_costo_entrada = mysqli_query($link,$sql_entrada);
    $costo_entrada = mysqli_fetch_assoc($get_costo_entrada);

    $sql_fuerte="SELECT SUM(`coste_ingrediente`) as sumaneto,SUM(`pax_pesos`)AS sumapax FROM platillo_ingrediente WHERE `id_platillo`='$fuerte'; ";
    $get_costo_fuerte = mysqli_query($link,$sql_fuerte);
    $costo_fuerte = mysqli_fetch_assoc($get_costo_fuerte);

    $sql_guarnicion1="SELECT SUM(`coste_ingrediente`) as sumaneto,SUM(`pax_pesos`)AS sumapax FROM platillo_ingrediente WHERE `id_platillo`='$guar1'; ";
    $get_costo_guarnicion1 = mysqli_query($link,$sql_guarnicion1);
    $costo_guarnicion1 = mysqli_fetch_assoc($get_costo_guarnicion1);

    $sql_guarnicion2="SELECT SUM(`coste_ingrediente`) as sumaneto,SUM(`pax_pesos`)AS sumapax FROM platillo_ingrediente WHERE `id_platillo`='$guar2'; ";
    $get_costo_guarnicion2 = mysqli_query($link,$sql_guarnicion2);
    $costo_guarnicion2 = mysqli_fetch_assoc($get_costo_guarnicion2);

    $sql_empaque1="SELECT `precio_unitario` FROM `enpaque` WHERE `id_empaque` = '$empa1' ;";
    $get_costo_empaque1 = mysqli_query($link,$sql_empaque1);
    $costo_empaque1 = mysqli_fetch_assoc($get_costo_empaque1);

    $sql_empaque2="SELECT `precio_unitario` FROM `enpaque` WHERE `id_empaque` = '$empa2' ;";
    $get_costo_empaque2 = mysqli_query($link,$sql_empaque2);
    $costo_empaque2 = mysqli_fetch_assoc($get_costo_empaque2);

    $sql_procionesentrada = "SELECT `porciones` FROM `platillo` WHERE `id_platillo` = '$entrada'; ";
    $get_porciones_entrada = mysqli_query($link,$sql_procionesentrada);
    $porciones_entrada = mysqli_fetch_assoc($get_porciones_entrada);
    
    $sql_procionesfuerte = "SELECT `porciones` FROM `platillo` WHERE `id_platillo` = '$fuerte'; ";
    $get_porciones_fuerte = mysqli_query($link,$sql_procionesfuerte);
    $porciones_fuerte = mysqli_fetch_assoc($get_porciones_fuerte);
    
    $sql_procionesguarnicion1 = "SELECT `porciones` FROM `platillo` WHERE `id_platillo` = '$guar1'; ";
    $get_porciones_guarnicion1 = mysqli_query($link,$sql_procionesguarnicion1);
    $porciones_guarnicion1 = mysqli_fetch_assoc($get_porciones_guarnicion1);
    
    $sql_procionesguarnicion2 = "SELECT `porciones` FROM `platillo` WHERE `id_platillo` = '$guar2'; ";
    $get_porciones_guarnicion2 = mysqli_query($link,$sql_procionesguarnicion2);
    $porciones_guarnicion2 = mysqli_fetch_assoc($get_porciones_guarnicion2);
    

    
?>
<div class="container">
    
    <div class="row">
        <div class="col m6 s12">
            <h2><b>Menu:</b> <?php echo $menu['nombre_menu']; ?></h2>
        </div>
    </div>
    <hr/>
    <div class="row">
    <div class="col s6">
        <h4><b>Costo neto total: $<?php echo round( (FLOAT) $costo_entrada['sumaneto']+$costo_fuerte['sumaneto']+$costo_guarnicion1['sumaneto']+$costo_guarnicion2['sumaneto']+$costo_empaque1['precio_unitario']+$costo_empaque2['precio_unitario'],3,PHP_ROUND_HALF_UP);?></b></h4>    
    </div>
    <div class="col s6">
        <?php 
            $pax_alimentos =  $costo_entrada['sumapax']+$costo_fuerte['sumapax']+$costo_guarnicion1['sumapax']+$costo_guarnicion2['sumapax'];
            $pax_empaques =  $costo_empaque1['precio_unitario']+$costo_empaque2['precio_unitario'];

         ?>

        <h4><b>Costo pax alimentos: $<?php echo round( (FLOAT) $pax_alimentos,3,PHP_ROUND_HALF_UP); ?></b></h4> 

        <h4><b>Costo pax empaques: $<?php echo round( (FLOAT) $pax_empaques,3,PHP_ROUND_HALF_UP); ?></b></h4>  

        <h4><b>Costo pax total: $<?php echo round( (FLOAT) $pax_alimentos+$pax_empaques,3,PHP_ROUND_HALF_UP); ?></b></h4> 
    </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col m6 s12">
            <hr/>
            <h6><b>Entrada:</b> <?php echo $menu['entrada']; ?> </h6><br/>
            <h6><b>Costo neto:</b> <?php echo round($costo_entrada['sumaneto'],3,PHP_ROUND_HALF_UP); ?> </h6><br/>
            <h6><b>Costo pax:</b> <?php echo round($costo_entrada['sumapax'],3,PHP_ROUND_HALF_UP); ?> </h6>
            <h6><b>Porciones del calculo :</b> <?php echo $porciones_entrada['porciones']; ?> </h6>
            
        </div>
        
        <div class="col m6 s12">
            <hr/>
            <h6><b>Platillo fuerte:</b> <?php echo $menu['fuerte']; ?> </h6><br/>
            <h6><b>Costo neto:</b> <?php echo round($costo_fuerte['sumaneto'],3,PHP_ROUND_HALF_UP); ?> </h6><br/>
            <h6><b>Costo pax:</b> <?php echo round($costo_fuerte['sumapax'],3,PHP_ROUND_HALF_UP); ?> </h6>
            <h6><b>Porciones del calculo :</b> <?php echo $porciones_fuerte['porciones']; ?> </h6>
        </div>
        
        <div class="col m6 s12">
            <hr/>
            <h6><b>Guarnicion 1:</b> <?php echo $menu['guar1']; ?> </h6><br/>
            <h6><b>Costo neto:</b> <?php echo round($costo_guarnicion1['sumaneto'],3,PHP_ROUND_HALF_UP); ?> </h6><br/>
            <h6><b>Costo pax:</b> <?php echo round($costo_guarnicion1['sumapax'],3,PHP_ROUND_HALF_UP); ?> </h6>
            <h6><b>Porciones del calculo :</b> <?php echo $porciones_guarnicion1['porciones']; ?> </h6>
        </div>
        
        <div class="col m6 s12">
            <hr/>
            <h6><b>Guarnicion 2:</b> <?php echo $menu['guar2']; ?> </h6><br/>
            <h6><b>Costo neto:</b> <?php echo round($costo_guarnicion2['sumaneto'],3,PHP_ROUND_HALF_UP); ?> </h6><br/>
            <h6><b>Costo pax:</b> <?php echo round($costo_guarnicion2['sumapax'],3,PHP_ROUND_HALF_UP); ?> </h6>
            <h6><b>Porciones del calculo: </b> <?php echo $porciones_guarnicion2['porciones']; ?> </h6>
        </div>
        
    </div>
    <div class="row">
        <div class="col m6 s12">
            <hr/>
            <h6><b>Empaque 1 :</b> <?php echo $menu['empaq1']; ?> </h6><br/>
            <h6><b>Costo unitario :</b> <?php echo round($costo_empaque1['precio_unitario'],3,PHP_ROUND_HALF_UP); ?> </h6><br/> 
        </div>
        <div class="col m6 s12">
            <hr/>
            <h6><b>Empaque 2 :</b> <?php echo $menu['empaq2']; ?> </h6><br/>
            <h6><b>Costo unitario :</b> <?php echo round($costo_empaque2['precio_unitario'],3,PHP_ROUND_HALF_UP); ?> </h6><br/> 
        </div>
    </div>
    <div class="container center-align">
<div class="row">
    <div class="col s12">
    
        <a href="menus.php" class="waves-effect waves-light btn-large black center-align"><i class="material-icons right">keyboard_return</i>Volver a resumen</a>   
    </div>
    <!--<div class="col s6">
        <a href="ingredientes.php" class="waves-effect waves-light btn-large red accent-4"><i class="material-icons right">close</i>Editar</a>
    </div>-->
    
    </div>
</div>
    
</div>