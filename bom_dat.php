<?php
    require'header.php';
    require'conexion.php';

    $id=$_GET['id'];

    //echo $id;



if (!empty($num_lotes=$_POST['numerolotes'])) {
          $num_lotes=$_POST['numerolotes'];
    }
        else{

          $num_lotes= 1;
        
    }





    $sql="SELECT id_menu,`id_entrada`,`id_plato_fuerte`,`id_guarnicion_1`,`id_guarnicion_2`,`id_empaque1`,`id_empaque2`,`nombre_menu`,entrada.nombre_platillo as entrada,fuerte.nombre_platillo as fuerte,guar1.nombre_platillo as guar1,guar2.nombre_platillo as guar2, empa1.nombre AS empaq1, empa2.nombre AS empaq2 FROM `menus` INNER JOIN platillo AS entrada ON entrada.id_platillo = id_entrada INNER JOIN platillo AS fuerte ON fuerte.id_platillo = menus.id_plato_fuerte INNER JOIN platillo AS guar1 ON guar1.id_platillo=menus.id_guarnicion_1 INNER JOIN platillo AS guar2 ON guar2.id_platillo=menus.id_guarnicion_2 INNER JOIN enpaque AS empa1 ON empa1.id_empaque=menus.id_empaque1 INNER JOIN enpaque AS empa2 ON empa2.id_empaque=menus.id_empaque2 WHERE id_menu='$id' ";
    $get_dato_menu = mysqli_query($link,$sql);
    $menu = mysqli_fetch_assoc($get_dato_menu);


    $entrada=$menu['id_entrada'];
    $fuerte = $menu['id_plato_fuerte'];
    $guar1 = $menu['id_guarnicion_1'];
    $guar2 = $menu['id_guarnicion_2'];
    $empa1 = $menu['id_empaque1'];
    $empa2 = $menu['id_empaque2'];


$sql_entrada="SELECT `id_ingrediente`,platillo.id_platillo,`peso_bruto`,`peso_neto`,coste_ingrediente,`merma`,ingredientes.codigo,ingredientes.nombre_ingrediente,unidad.des_unidad,platillo.costo_neto,`id_relacion`,merma.des_merma AS melma FROM `platillo_ingrediente` INNER JOIN ingredientes ON platillo_ingrediente.id_ingrediente = ingredientes.id_ingredientes INNER JOIN platillo ON platillo_ingrediente.id_platillo = platillo.id_platillo INNER JOIN unidad ON unidad.id_unidad = ingredientes.id_unidad INNER JOIN merma on platillo_ingrediente.id_tipo_merma=merma.id_merma WHERE platillo_ingrediente.id_platillo  = '$entrada' ";
    $get_dato_entrada = mysqli_query($link,$sql_entrada);
 
$sql_fuerte="SELECT `id_ingrediente`,platillo.id_platillo,`peso_bruto`,`peso_neto`,coste_ingrediente,`merma`,ingredientes.codigo,ingredientes.nombre_ingrediente,unidad.des_unidad,platillo.costo_neto,`id_relacion`,merma.des_merma AS melma FROM `platillo_ingrediente` INNER JOIN ingredientes ON platillo_ingrediente.id_ingrediente = ingredientes.id_ingredientes INNER JOIN platillo ON platillo_ingrediente.id_platillo = platillo.id_platillo INNER JOIN unidad ON unidad.id_unidad = ingredientes.id_unidad INNER JOIN merma on platillo_ingrediente.id_tipo_merma=merma.id_merma WHERE platillo_ingrediente.id_platillo  = '$fuerte' ";
    $get_dato_fuerte = mysqli_query($link,$sql_fuerte);

$sql_guarnicion1="SELECT `id_ingrediente`,platillo.id_platillo,`peso_bruto`,`peso_neto`,coste_ingrediente,`merma`,ingredientes.codigo,ingredientes.nombre_ingrediente,unidad.des_unidad,platillo.costo_neto,`id_relacion`,merma.des_merma AS melma FROM `platillo_ingrediente` INNER JOIN ingredientes ON platillo_ingrediente.id_ingrediente = ingredientes.id_ingredientes INNER JOIN platillo ON platillo_ingrediente.id_platillo = platillo.id_platillo INNER JOIN unidad ON unidad.id_unidad = ingredientes.id_unidad INNER JOIN merma on platillo_ingrediente.id_tipo_merma=merma.id_merma WHERE platillo_ingrediente.id_platillo  = '$guar1' ";
    $get_dato_guarnicion1 = mysqli_query($link,$sql_guarnicion1);

$sql_guarnicion2="SELECT `id_ingrediente`,platillo.id_platillo,`peso_bruto`,`peso_neto`,coste_ingrediente,`merma`,ingredientes.codigo,ingredientes.nombre_ingrediente,unidad.des_unidad,platillo.costo_neto,`id_relacion`,merma.des_merma AS melma FROM `platillo_ingrediente` INNER JOIN ingredientes ON platillo_ingrediente.id_ingrediente = ingredientes.id_ingredientes INNER JOIN platillo ON platillo_ingrediente.id_platillo = platillo.id_platillo INNER JOIN unidad ON unidad.id_unidad = ingredientes.id_unidad INNER JOIN merma on platillo_ingrediente.id_tipo_merma=merma.id_merma WHERE platillo_ingrediente.id_platillo  = '$guar2' ";
    $get_dato_guarnicion2 = mysqli_query($link,$sql_guarnicion2);


    $sql_empaque1="SELECT `precio_unitario` FROM `enpaque` WHERE `id_empaque` = '$empa1' ;";
    $get_costo_empaque1 = mysqli_query($link,$sql_empaque1);
    $costo_empaque1 = mysqli_fetch_assoc($get_costo_empaque1);

    $sql_empaque2="SELECT `precio_unitario` FROM `enpaque` WHERE `id_empaque` = '$empa2' ;";
    $get_costo_empaque2 = mysqli_query($link,$sql_empaque2);
    $costo_empaque2 = mysqli_fetch_assoc($get_costo_empaque2);

    $sql_procionesentrada = "SELECT unidad.des_unidad,platillo.t_porciones,`porciones` FROM `platillo` INNER JOIN unidad ON unidad.id_unidad = platillo.id_unidad WHERE `id_platillo` = '$entrada'; ";
    $get_porciones_entrada = mysqli_query($link,$sql_procionesentrada);
    $porciones_entrada = mysqli_fetch_assoc($get_porciones_entrada);
    
    $sql_procionesfuerte = "SELECT unidad.des_unidad,platillo.t_porciones,`porciones` FROM `platillo` INNER JOIN unidad ON unidad.id_unidad = platillo.id_unidad WHERE `id_platillo` = '$fuerte'; ";
    $get_porciones_fuerte = mysqli_query($link,$sql_procionesfuerte);
    $porciones_fuerte = mysqli_fetch_assoc($get_porciones_fuerte);
    
    $sql_procionesguarnicion1 = "SELECT unidad.des_unidad,platillo.t_porciones,`porciones` FROM `platillo` INNER JOIN unidad ON unidad.id_unidad = platillo.id_unidad WHERE `id_platillo` = '$guar1'; ";
    $get_porciones_guarnicion1 = mysqli_query($link,$sql_procionesguarnicion1);
    $porciones_guarnicion1 = mysqli_fetch_assoc($get_porciones_guarnicion1);
    
    $sql_procionesguarnicion2 = "SELECT unidad.des_unidad,platillo.t_porciones,`porciones` FROM `platillo` INNER JOIN unidad ON unidad.id_unidad = platillo.id_unidad WHERE `id_platillo` = '$guar2'; ";
    $get_porciones_guarnicion2 = mysqli_query($link,$sql_procionesguarnicion2);
    $porciones_guarnicion2 = mysqli_fetch_assoc($get_porciones_guarnicion2);
    

    
?>
<div class="container">
    
    <div class="row">
        <div class="col m12 s12">
            <h2><b>Menu:</b> <?php echo $menu['nombre_menu']; ?></h2>
        </div>
    </div>    
        <hr/>
    <div class="row">
        <!--<h3><b>Número de lotes a cocinar: <?php// echo $menu['num_lotes']; ?></h3>-->
        <div class="col m12 s12">
            <form id="fmenu" method="post">
                <div class="input-field col m6 s12 center-align">
                  <input id="numerolotes" name="numerolotes" type="number" class="validate" required>
                  <label class="active" for="first_name2">Número de lotes</label>
                </div>
                <div class="col s6">    
                    <button class="btn-large waves-effect waves-light" type="submit" name="action" form="fmenu" value="choose">Solicitar
                        <i class="material-icons right">send</i>
                    </button>    
                </div>                                                                                          
            </form>
            
        </div>
    </div>
    <!--<hr/>
    <div class="row">
        <div class="col s6">
            <h4><b>Costo neto total: <?php //echo round( (FLOAT) $costo_entrada['sumaneto']+$costo_fuerte['sumaneto']+$costo_guarnicion1['sumaneto']+$costo_guarnicion2['sumaneto']+$costo_empaque1['precio_unitario']+$costo_empaque2['precio_unitario'],3,PHP_ROUND_HALF_UP);?></b></h4>    
        </div>
        <div class="col s6">
            <h4><b>Costo pax total: <?php// echo round( (FLOAT) $costo_entrada['sumapax']+$costo_fuerte['sumapax']+$costo_guarnicion1['sumapax']+$costo_guarnicion2['sumapax'],3,PHP_ROUND_HALF_UP); ?></b></h4>    
        </div>
    </div>-->
    <hr/>
    <div class="row">
        <div class="col m6 s6"><!--Genera escandallo entradas-->
            <hr/>
            <h5><b>Entrada:</b> <?php echo $menu['entrada']; ?> </h5>

            <h6><b>Porciones mutiplicadas por # de lote: </b> <?php echo $porciones_entrada['porciones'] * $num_lotes; ?> </h6>
            <h6><b>Tamaño de porción individual a servir: </b><?php echo $porciones_entrada['t_porciones'];
                  echo " "; 
                  echo $porciones_entrada['des_unidad']; ?></h6> <!-- Atraccion segun el id de la tabla platillo -->
            <table class="responsive-table">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Ingrediente</th>
                        <th>Unidad</th>
                        <th>Cantidad bruta</th>                                                                   
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row2 = mysqli_fetch_array($get_dato_entrada)):
                    ?>
                  <tr>
                    <td><?php echo $row2['codigo']; ?></td>
                    <td><?php echo $row2['nombre_ingrediente']; ?></td>
                    <td><?php echo $row2['des_unidad']; ?></td>
                    <td><?php echo $row2['peso_bruto'] * $num_lotes; ?></td>                   
                    <?php
                        endwhile;
                    ?>
                  </tr>
                </tbody>
            </table>                                        
            
        </div>
        
        <div class="col m6 s6"><!--Genera escandallo platillos fuertes-->
            <hr/>
            <h5><b>Platillo fuerte:</b> <?php echo $menu['fuerte']; ?> </h5>
            <h6><b>Porciones mutiplicadas por # de lote: </b> <?php echo $porciones_fuerte['porciones'] * $num_lotes; ?> </h6>
            <h6><b>Tamaño de porción individual a servir: </b><?php echo $porciones_fuerte['t_porciones'];
                  echo " "; 
                  echo $porciones_fuerte['des_unidad']; ?></h6> <!-- Atraccion segun el id de la tabla platillo -->
            <table class="responsive-table">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Ingrediente</th>
                        <th>Unidad</th>
                        <th>Cantidad bruta</th>                                          
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row2 = mysqli_fetch_array($get_dato_fuerte)):
                    ?>
                  <tr>
                    <td><?php echo $row2['codigo']; ?></td>
                    <td><?php echo $row2['nombre_ingrediente']; ?></td>
                    <td><?php echo $row2['des_unidad']; ?></td>
                    <td><?php echo $row2['peso_bruto'] * $num_lotes; ?></td>                    
                    <?php
                        endwhile;
                    ?>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>    
    <div class="row">    
        <div class="col m6 s6"><!--Genera escandallo guarnición 1-->
            <hr/>
            <h5><b>Guarnición 1:</b> <?php echo $menu['guar1']; ?> </h5>
            <h6><b>Porciones mutiplicadas por # de lote: </b> <?php echo $porciones_guarnicion1['porciones'] * $num_lotes; ?> </h6>
            <h6><b>Tamaño de porción individual a servir: </b><?php echo $porciones_guarnicion1['t_porciones'];
                  echo " "; 
                  echo $porciones_guarnicion1['des_unidad']; ?></h6> <!-- Atraccion segun el id de la tabla platillo -->
            <table class="responsive-table">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Ingrediente</th>
                        <th>Unidad</th>
                        <th>Cantidad bruta</th>                                          
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row2 = mysqli_fetch_array($get_dato_guarnicion1)):
                    ?>
                  <tr>
                    <td><?php echo $row2['codigo']; ?></td>
                    <td><?php echo $row2['nombre_ingrediente']; ?></td>
                    <td><?php echo $row2['des_unidad']; ?></td>
                    <td><?php echo $row2['peso_bruto'] * $num_lotes; ?></td>                    
                    <?php
                        endwhile;
                    ?>
                  </tr>
                </tbody>
            </table>
        </div>
        
        <div class="col m6 s6"><!--Genera escandallo guarnición 1-->
            <hr/>
            <h5><b>Guarnición 2:</b> <?php echo $menu['guar2']; ?> </h5>
            <h6><b>Porciones mutiplicadas por # de lote: </b> <?php echo $porciones_guarnicion2['porciones'] * $num_lotes; ?> </h6>
            <h6><b>Tamaño de porción individual a servir: </b><?php echo $porciones_guarnicion2['t_porciones'];
                  echo " "; 
                  echo $porciones_guarnicion2['des_unidad']; ?></h6> <!-- Atraccion segun el id de la tabla platillo -->
            <table class="responsive-table">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Ingrediente</th>
                        <th>Unidad</th>
                        <th>Cantidad bruta</th>                                            
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row2 = mysqli_fetch_array($get_dato_guarnicion2)):
                    ?>
                  <tr>
                    <td><?php echo $row2['codigo']; ?></td>
                    <td><?php echo $row2['nombre_ingrediente']; ?></td>
                    <td><?php echo $row2['des_unidad']; ?></td>
                    <td><?php echo $row2['peso_bruto'] * $num_lotes; ?></td>                   
                    <?php
                        endwhile;
                    ?>
                  </tr>
                </tbody>
            </table>
        </div>
        
    </div>
    <div class="row">
        <div class="col m6 s12">
            <hr/>
            <h6><b>Empaque 1 :</b> <?php echo $menu['empaq1']; ?> </h6><br/>
            <h6><b>Total de empaques a usar de acuerdo a # de lote: </b> <?php echo $porciones_entrada['porciones'] * $num_lotes; ?> </h6>
            <h6><b>Costo unitario :</b> <?php echo round($costo_empaque1['precio_unitario'],3,PHP_ROUND_HALF_UP); ?> </h6><br/> 
        </div>
        <div class="col m6 s12">
            <hr/>
            <h6><b>Empaque 2 :</b> <?php echo $menu['empaq2']; ?> </h6><br/>
            <h6><b>Total de empaques a usar de acuerdo a # de lote: </b> <?php echo $porciones_entrada['porciones'] * $num_lotes; ?> </h6>
            <h6><b>Costo unitario :</b> <?php echo round($costo_empaque2['precio_unitario'],3,PHP_ROUND_HALF_UP); ?> </h6><br/> 
        </div>
    </div>
    <div class="container center-align">
<div class="row">
    <div class="col s12">
        <a class="waves-effect waves-light btn-large blue lighten-2" onClick="imprimir();"><i class="material-icons right">local_printshop</i>Imprimir</a>
        
        <a href="menus.php" class="waves-effect waves-light btn-large black center-align"><i class="material-icons right">keyboard_return</i>Volver a resumen</a>   
    </div>
    <!--<div class="col s6">
        <a href="ingredientes.php" class="waves-effect waves-light btn-large red accent-4"><i class="material-icons right">close</i>Editar</a>
    </div>-->
    
    </div>
</div>
    
</div>