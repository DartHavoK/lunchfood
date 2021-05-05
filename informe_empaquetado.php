<?php
    require'header.php';
    require'conexion.php';

    $id=$_GET['id'];
    $extras = $_POST['extras'];

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




 
    $sql_inst_empaquetado = "SELECT inst_empaque FROM menus WHERE id_menu='$id' ";
    $get_inst_empaquetado = mysqli_query($link,$sql_inst_empaquetado);
    $empaquetado = mysqli_fetch_assoc($get_inst_empaquetado);

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


    
    
    
?><!--Fin sección php-->

<div class="container"><!--Inicia HTML-->
    
    <div class="row">
        <div class="col m12 s12">
            <h2><b>Menu:</b> <?php echo $menu['nombre_menu']; ?></h2>
        </div>
    </div>    
        <hr/>
    <!--<div class="row">        
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
        <h5><b>Número de lotes a empletar</b> <?php echo $num_lotes['numerolotes']; ?> </h5>
    </div>
    <hr/>-->
        <div class="row">
        <div class="col m6 s6">
            <h5><b>Instrucciones de empaquetado: </b> <?php echo $empaquetado['inst_empaque']; ?> </h5>
        </div>
        </div>

    <hr/>
    <div class="row">
        <div class="col m6 s6"><!--Genera escandallo entradas-->
            <div class="row">
                <div class="col m6 s12">
                    <hr/>
                    <h5><b>Entrada:</b> <?php echo $menu['entrada']; ?> </h5> 
                    <h6><b>Empaque 1 :</b> <?php echo $menu['empaq1']; ?> </h6><br/>
                </div>
            </div>
            <div class="row"> 
                <div class="col m6">
                    <?php
                        $id_imagen = $id; 
                          $path1 = "foto_menus/empaque_final/entrada/".$id_imagen."/";
                          if(file_exists($path1)){
                            $directorio = opendir($path1);
                            while ($archivo1 = readdir($directorio))
                            {
                              if (!is_dir($archivo1)){
                                echo "<img src='".$path1.$archivo1."' width='300' />";
                            }
                          }
                        }
                    ?>
                </div>
            </div>                                                    
        </div>
        
        <div class="col m6 s6"><!--Genera escandallo Platillos fuertes-->
            <div class="row">
                <div class="col m6 s12">
                    <hr/>
                    <h5><b>Platillos fuertes:</b> <?php echo $menu['fuerte']; ?> </h5>
                    <h6><b>Empaque 2 :</b> <?php echo $menu['empaq2']; ?> </h6><br/>                  
                </div>
            </div>
            <div class="row"> 
                <div class="col m6">
                    <?php
                        $id_imagen = $id; 
                          $path2 = "foto_menus/empaque_final/fuerte/".$id_imagen."/";
                          if(file_exists($path2)){
                            $directorio = opendir($path2);
                            while ($archivo2 = readdir($directorio))
                            {
                              if (!is_dir($archivo2)){
                                echo "<img src='".$path2.$archivo2."' width='300' />";
                            }
                          }
                        }
                    ?>
                </div>
            </div>                                                               
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

</body>
</html> 