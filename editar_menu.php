<!DOCTYPE html>
<script src="js/jquery-3.3.1.js"></script>
<?php

    require('conexion.php');
    require('header.php');

    $id=$_GET['id'];

    $sql="SELECT id_menu,nota,`id_entrada`,`id_plato_fuerte`,`id_guarnicion_1`,`id_guarnicion_2`,`id_empaque1`,`id_empaque2`,`nombre_menu`, `inst_empaque`,entrada.nombre_platillo as entrada,fuerte.nombre_platillo as fuerte,guar1.nombre_platillo as guar1,guar2.nombre_platillo as guar2, empa1.nombre AS empaq1, empa2.nombre AS empaq2 FROM `menus` INNER JOIN platillo AS entrada ON entrada.id_platillo = id_entrada INNER JOIN platillo AS fuerte ON fuerte.id_platillo = menus.id_plato_fuerte INNER JOIN platillo AS guar1 ON guar1.id_platillo=menus.id_guarnicion_1 INNER JOIN platillo AS guar2 ON guar2.id_platillo=menus.id_guarnicion_2 INNER JOIN enpaque AS empa1 ON empa1.id_empaque=menus.id_empaque1 INNER JOIN enpaque AS empa2 ON empa2.id_empaque=menus.id_empaque2 WHERE id_menu= '$id' ";
    $get_dato_menu = mysqli_query($link,$sql);
    $menu = mysqli_fetch_assoc($get_dato_menu);


    $sql_entradas='SELECT `id_platillo`,`categoria_platillo`,`nombre_platillo` FROM `platillo` WHERE categoria_platillo=1  ';
    $obtener_entradas = mysqli_query($link,$sql_entradas); 

    $sql_fuerte='SELECT `id_platillo`,`categoria_platillo`,`nombre_platillo` FROM `platillo` WHERE categoria_platillo=2  ';
    $obtener_fuerte = mysqli_query($link,$sql_fuerte); 

    $sql_guarnicion1='SELECT `id_platillo`,`categoria_platillo`,`nombre_platillo` FROM `platillo` WHERE categoria_platillo=3 ';
    $obtener_guarnicion1 = mysqli_query($link,$sql_guarnicion1); 

    $sql_guarnicion2='SELECT `id_platillo`,`categoria_platillo`,`nombre_platillo` FROM `platillo` WHERE categoria_platillo=3 ';
    $obtener_guarnicion2 = mysqli_query($link,$sql_guarnicion2); 

    $sql_empaques="SELECT `id_empaque`,`nombre` FROM `enpaque` ";
    $obtener_empaques0= mysqli_query($link,$sql_empaques);
    $obtener_empaques1= mysqli_query($link,$sql_empaques);

?>
<div class="container">
    <div class="row">
        <div class="col s12">
            <h3>Selecciona los platillos para el menu</h3>
        </div>
    </div>
    <!--<form id="fmenu" action="update_menu.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">-->
    <form id="fmenu" action="update_menu.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="input-field col m6 s12 center-align">
              <input id="nombreingrediente" name="nombreingrediente" value="<?php echo $menu['nombre_menu']; ?>" type="text" class="validate" required>
              <label class="active" for="first_name2">Nombre del menú</label>
            </div>
        </div>
            <br/>
        <div class="row">
            <div class="col m6 s12">
                <label>Selecciona una entrada</label>
                    <select class="browser-default" id="entrada" name="entrada" required>
                        <option value="<?php echo $menu['id_entrada']; ?>" selected><?php echo $menu['entrada']; ?></option>
                        <option value="">Elije una entrada</option>
                        <?php
                          while($row = mysqli_fetch_array($obtener_entradas)):
                        ?>
                        <option value="<?php echo $row['id_platillo']; ?>"><?php echo $row['nombre_platillo']; ?></option>
                        <?php
                          endwhile;
                        ?>
                    </select>
                <div class="col m12 s12"><!--inicio subir imagenes-->   
                    <div class="col m12 s12">
                        <h7>Subir imágen de entrada: </h7>
                        <br/>
                      <label for="img_entrada" class="col-sm-2 control-label">Archivo para presentación: </label>
                      
                      <div class="col-sm-10">
                        <input type="file" class="form-control" id="img_entrada" name="img_entrada">
                        
                        <?php
                        $id_menu = $id; 

                          $path1 = "foto_menus/presentacion/entrada/".$id_menu."/"; 
                          if(file_exists($path1)){
                            $directorio = opendir($path1);
                            while ($archivo1 = readdir($directorio))
                            {
                              if (!is_dir($archivo1)){

                                echo "<div data='".$path1.$archivo1."'><a href='".$path1.$archivo1."' title='Ver Archivo Adjunto'><span class='glyphicon glyphicon-picture'></span></a>";
                                
                                echo "<img src='".$path1.$archivo1."'width='150' />";
                                
                                echo "<a href='#' class='delete' title='Eliminar archivo' ><i class='material-icons'>delete</i></a></div>";
                                
                              }
                            }
                          }
                          
                        ?>
                      </div>
                    </div>

                    <div class="col m12 s12">
                        <label for="img_emp_entrada" class="col-sm-2 control-label">Archivo de empaque: </label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="img_emp_entrada" name="img_emp_entrada">
                            
                            <?php

                            $path2 = "foto_menus/empaquetado/entrada/".$id_menu."/";
                              if(file_exists($path2)){
                                $directorio = opendir($path2);
                                while ($archivo2 = readdir($directorio))
                                {
                                  if (!is_dir($archivo2)){
                                    echo "<div data='".$path2.$archivo2."'><a href='".$path2.$archivo2."' title='Ver Archivo Adjunto'><span class='glyphicon glyphicon-picture'></span></a>";

                                    echo "<img src='".$path2.$archivo2."'width='150' />";
                                    
                                    echo "<a href='#' class='delete' title='Eliminar archivo' ><i class='material-icons'>delete</i></a></div>";
                              }
                            }
                          }
                            ?>
                            
                        </div>
                    </div>
                    <div class="col m12 s12">
                      <label for="img_emp_ent" class="col-sm-2 control-label">Archivo para empaquetado final: </label>
                      <div class="col-sm-10">
                          <input type="file" class="form-control" id="img_emp_ent" name="img_emp_ent">
                          
                          <?php

                          $path3 = "foto_menus/empaque_final/entrada/".$id_menu."/";
                            if(file_exists($path3)){
                              $directorio = opendir($path3);
                              while ($archivo3= readdir($directorio))
                              {
                                if (!is_dir($archivo3)){
                                  echo "<div data='".$path3.$archivo3."'><a href='".$path3.$archivo3."' title='Ver Archivo Adjunto'><span class='glyphicon glyphicon-picture'></span></a>";

                                  echo "<img src='".$path3.$archivo3."'width='150' />";
                                  
                                  echo "<a href='#' class='delete' title='Eliminar archivo' ><i class='material-icons'>delete</i></a></div>";
                            }
                          }
                        }
                          ?>
                          
                      </div>
                    </div>
                </div><!--fin subir imagenes-->
            </div>
            <div class="col m6 s4">
                <label>Selecciona platillo fuerte</label>
                    <select class="browser-default" id="fuerte" name="fuerte" required>
                        <option value="<?php echo $menu['id_plato_fuerte']; ?>" selected><?php echo $menu['fuerte']; ?></option>
                        <option value="" >Elije un platillo</option>
                        <?php
                          while($row2 = mysqli_fetch_array($obtener_fuerte)):
                        ?>
                        <option value="<?php echo $row2['id_platillo']; ?>" ><?php echo $row2['nombre_platillo']; ?></option>
                        <?php
                          endwhile;
                        ?>
                    </select>
        <div class="row">    
            <div class="col m6 s12">
                <label>Selecciona guarnición 1</label>
                    <select class="browser-default" id="guarnicion1" name="guarnicion1" required>
                        <option value="<?php echo $menu['id_guarnicion_1']; ?>" selected><?php echo $menu['guar1']; ?></option>
                        <option value="" >Elije una guarnición</option>
                        <?php
                          while($row3 = mysqli_fetch_array($obtener_guarnicion1)):
                        ?>
                        <option value="<?php echo $row3['id_platillo']; ?>"><?php echo $row3['nombre_platillo']; ?></option>
                        <?php
                          endwhile;
                        ?>
                    </select>  
            </div>
            <div class="col m6 s12">
                <label>Selecciona guarnición 2</label>
                    <select class="browser-default" id="guarnicion2" name="guarnicion2" required>
                        <option value="<?php echo $menu['id_guarnicion_2']; ?>" selected><?php echo $menu['guar2']; ?></option>
                    <option value="">Elije una guarnición</option>
                        <?php
                          while($row4 = mysqli_fetch_array($obtener_guarnicion2)):
                        ?>
                        <option value="<?php echo $row4['id_platillo']; ?>" ><?php echo $row4['nombre_platillo']; ?></option>
                        <?php
                          endwhile;
                        ?>
                        <!--<option value="0">Ninguno</option>-->
                    </select>
            </div>
        </div>
                
                <div class="col m12 s12"><!--inicio subir imagenes-->   
                    <div class="col m12 s12">
                        <h7>Subir imágen de paltillo fuerte: </h7>
                        <br/>
                      <label for="img_fuerte" class="col-sm-2 control-label">Archivo para presentación: </label>
                      
                      <div class="col-sm-10">
                        <input type="file" class="form-control" id="img_fuerte" name="img_fuerte">
                        
                        <?php

                          $path4 = "foto_menus/presentacion/fuerte/".$id_menu."/"; 
                          if(file_exists($path4)){
                            $directorio = opendir($path4);
                            while ($archivo4 = readdir($directorio))
                            {
                              if (!is_dir($archivo4)){

                                echo "<div data='".$path4.$archivo4."'><a href='".$path4.$archivo4."' title='Ver Archivo Adjunto'><span class='glyphicon glyphicon-picture'></span></a>";
                                
                                echo "<img src='".$path4.$archivo4."'width='150' />";
                                
                                echo "<a href='#' class='delete' title='Eliminar archivo' ><i class='material-icons'>delete</i></a></div>";
                                
                              }
                            }
                          }
                          
                        ?>
                      </div>
                    </div>

                    <div class="col m12 s12">
                        <label for="img_emp_fuerte" class="col-sm-2 control-label">Archivo de empaque: </label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="img_emp_fuerte" name="img_emp_fuerte">
                            
                            <?php

                            $path5 = "foto_menus/empaquetado/fuerte/".$id_menu."/";
                              if(file_exists($path5)){
                                $directorio = opendir($path5);
                                while ($archivo5 = readdir($directorio))
                                {
                                  if (!is_dir($archivo5)){
                                    echo "<div data='".$path5.$archivo5."'><a href='".$path5.$archivo5."' title='Ver Archivo Adjunto'><span class='glyphicon glyphicon-picture'></span></a>";

                                    echo "<img src='".$path5.$archivo5."'width='150' />";
                                    
                                    echo "<a href='#' class='delete' title='Eliminar archivo' ><i class='material-icons'>delete</i></a></div>";
                              }
                            }
                          }
                            ?>
                            
                        </div>
                    </div>
                    <div class="col m12 s12">
                      <label for="img_empaquef" class="col-sm-2 control-label">Archivo de empaquetado final: </label>
                      <div class="col-sm-10">
                          <input type="file" class="form-control" id="img_empaquef" name="img_empaquef">
                          
                          <?php

                          $path6 = "foto_menus/empaque_final/fuerte/".$id_menu."/";
                            if(file_exists($path6)){
                              $directorio = opendir($path6);
                              while ($archivo6 = readdir($directorio))
                              {
                                if (!is_dir($archivo6)){
                                  echo "<div data='".$path6.$archivo6."'><a href='".$path6.$archivo6."' title='Ver Archivo Adjunto'><span class='glyphicon glyphicon-picture'></span></a>";

                                  echo "<img src='".$path6.$archivo6."'width='150' />";
                                  
                                  echo "<a href='#' class='delete' title='Eliminar archivo' ><i class='material-icons'>delete</i></a></div>";
                            }
                          }
                        }
                          ?>
                          
                      </div>
                    </div>
                </div><!--fin subir imagenes-->
            </div>
        </div>    
        <div class="row">
            <div class="col m6 s12">
                <label>Selecciona empaque 1</label>
                    <select class="browser-default" id="empaque1" name="empaque1" required>
                        <option value="<?php echo $menu['id_empaque1']; ?>" selected><?php echo $menu['empaq1']; ?></option>
                        <option value="" disabled>Elije el empaque 1</option>
                        <?php
                      while($row5 = mysqli_fetch_array($obtener_empaques0)):
                        ?>
                        <option value="<?php echo $row5['id_empaque']; ?>"><?php echo $row5['nombre']; ?></option>
                        <?php
                          endwhile;
                        ?>
                    </select>
            </div>

           <div class="col m6 s12">
                <label>Selecciona empaque 2</label>
                    <select class="browser-default" id="empaque2" name="empaque2" required>
                        <option value="<?php echo $menu['id_empaque2']; ?>" selected><?php echo $menu['empaq2']; ?></option>
                        <option value="" disabled >Elije el empaque 2</option>
                        <?php
                      while($row6 = mysqli_fetch_array($obtener_empaques1)):
                        ?>
                        <option value="<?php echo $row6['id_empaque']; ?>"><?php echo $row6['nombre']; ?></option>
                        <?php
                          endwhile;
                        ?>
                    </select>
            </div>
        </div>
        <div class="row">    
            <div class="input-field col s12">
                  <textarea id="notas" name="notas" class="materialize-textarea" data-length="250"><?php echo $menu['nota']; ?></textarea>
                  <label class="active" for="textarea1">Notas</label>
            </div>
        </div>    
        <div class="row">    
                <div class="input-field col s12">
                  <textarea id="instructivo_empaquetado" name="instructivo_empaquetado" class="materialize-textarea" ><?php echo $menu['inst_empaque']; ?></textarea>
                  <label class="active" for="textarea1">Instrucciones para empaquetado</label>
                </div>
        </div>
        <hr/>
        <div class="row">
          <div class="col m4 s12">
            <select multiple class="browser-default" id="extras" name="extras" >
              <option value="" selected>Extras</option>
              <option value="Servilletas">Servilletas</option>
              <option value="Aderezo">Aderezo</option>
              <option value="Condimentos">Condimentos</option>
              <option value="Cubiertos">Cubiertos</option>
              <option value="Salsa">Salsa</option>
              <option value="Soya">Soya</option>
            </select>
          </div>
        </div>
        <div class="row" style="visibility: hidden;">
                <div class="col m4 s12" >
                    <input type="number" value="<?php echo $id_menu ?>" id="id" name="id" readonly>
                </div>
        </div>

    </form>
    <br/>
    <br/>
    <br/>
    <div class="container center-align">
        <div class="row">
            <div class="col s6">
        
            <button class="btn-large waves-effect waves-light" type="submit" name="action" form="fmenu" value="choose">Actualizar
                <i class="material-icons right">send</i>
            </button>    
            </div>
            <div class="col s6">
                <a href="menus.php" class="waves-effect waves-light btn-large red accent-4"><i class="material-icons right">close</i>Cancelar</a>
            </div>
        </div>
    </div>

</div>


</body>
</html>      