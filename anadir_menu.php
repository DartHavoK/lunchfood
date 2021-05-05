<?php

    require('conexion.php');
    require('header.php');

    $sql_entradas='SELECT `id_platillo`,`categoria_platillo`,`nombre_platillo` FROM `platillo` WHERE categoria_platillo=1  ';
    $obtener_entradas = mysqli_query($link,$sql_entradas); 

    $sql_fuerte='SELECT `id_platillo`,`categoria_platillo`,`nombre_platillo` FROM `platillo` WHERE categoria_platillo=2  ';
    $obtener_fuerte = mysqli_query($link,$sql_fuerte); 

    $sql_guarnicion1='SELECT `id_platillo`,`categoria_platillo`,`nombre_platillo` FROM `platillo` WHERE categoria_platillo=3  ';
    $obtener_guarnicion1 = mysqli_query($link,$sql_guarnicion1); 

    $sql_guarnicion2='SELECT `id_platillo`,`categoria_platillo`,`nombre_platillo` FROM `platillo` WHERE categoria_platillo=3  ';
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
<form id="fmenu" action="add_menu.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="input-field col m6 s12 center-align">
          <input id="nombreingrediente" name="nombreingrediente" type="text" class="validate" required>
          <label class="active" for="first_name2">Nombre del menú</label>
        </div>

    </div>
    <br/>
    <div class="row">
        <div class="col m6 s12">
            <div>
            <label>Selecciona una entrada</label>
                <select class="browser-default" id="entrada" name="entrada" required>
                    <option value="" disabled selected>Elije una entrada</option>
                    <?php
    		          while($row = mysqli_fetch_array($obtener_entradas)):
                    ?>
                    <option value="<?php echo $row['id_platillo']; ?>"><?php echo $row['nombre_platillo']; ?></option>
                    <?php
                      endwhile;
                    ?>
                </select>
            </div>
            <div class="row">
                <div class="col m12 s12">
                      <h7>Subir imágen de presentación de entrada: </h7>
                      <br/>
                     <input name="img_entrada"  id="img_entrada" name="img_entrada" type="file" accept="image/*" />             
                </div>
                <br/>
                <br/>
                <br/>
                <div class="col m12 s12">
                      <h7>Subir imágen de empaquetado de entrada: </h7>
                      <br/>
                     <input name="img_emp_entrada"  id="img_emp_entrada" name="img_emp_entrada" type="file" accept="image/*" />             
                </div>
                <br/>
                <br/>
                <br/>
                <div class="col m12 s12">
                      <h7>Subir imágen de empaquetado de entrada: </h7>
                      <br/>
                     <input name="img_emp_ent"  id="img_emp_ent" name="img_emp_ent" type="file" accept="image/*" />             
                </div>
            </div>
        </div>
        <div class="col m6 s12">
            <label>Selecciona platillo fuerte</label>
                <select class="browser-default" id="fuerte" name="fuerte" required>
                    <option value="" disabled selected>Elije un platillo</option>
                    <?php
    		          while($row2 = mysqli_fetch_array($obtener_fuerte)):
                    ?>
                    <option value="<?php echo $row2['id_platillo']; ?>"><?php echo $row2['nombre_platillo']; ?></option>
                    <?php
                      endwhile;
                    ?>
                </select>
        <br/>
            <div class="col m6 s12">
                <label>Selecciona guarnición 1</label>
                    <select class="browser-default" id="guarnicion1" name="guarnicion1" required>
                        <option value="" disabled selected>Elije una guarnición</option>
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
                        <option value="" disabled selected>Elije una guarnición</option>
                        <?php
                          while($row4 = mysqli_fetch_array($obtener_guarnicion2)):
                        ?>
                        <option value="<?php echo $row4['id_platillo']; ?>"><?php echo $row4['nombre_platillo']; ?></option>
                        <?php
                          endwhile;
                        ?>
                        <!--<option value="0">Ninguno</option>-->
                    </select>
            </div>     
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
            <div class="row">
                <div class="col m12 12">
                <h7>Subir imágen de presentación de plato fuerte: </h7>
                <br/>
                    <input name="img_fuerte" id="img_fuerte" name="img_fuerte" type="file" accept="image/*"/>            
                </div>
                <br/>
                <br/>
                <br/>
                <div class="col m12 s12">
                 <h7>Subir imágen de empaquetado de plato fuerte: </h7>
                <br/>
            <input name="img_emp_fuerte" id="img_emp_fuerte" name="img_emp_fuerte" type="file" accept="image/*"/>        
                </div>
                <br/>
                <br/>
                <br/>
                <div class="col m12 s12">
                 <h7>Subir imágen de empaquetado de plato fuerte: </h7>
                <br/>
            <input name="img_empaquef" id="img_empaquef" name="img_empaquef" type="file" accept="image/*"/>        
                </div>
            </div>   
        </div>
    </div>
        </br>

    <!--<div class="row">    
        <div class="col m6 s12">
            <label>Selecciona guarnición 1</label>
                <select class="browser-default" id="guarnicion1" name="guarnicion1" required>
                    <option value="" disabled selected>Elije una guarnición</option>
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
                    <option value="" disabled selected>Elije una guarnición</option>
                    <?php
    		          while($row4 = mysqli_fetch_array($obtener_guarnicion2)):
                    ?>
                    <option value="<?php echo $row4['id_platillo']; ?>"><?php echo $row4['nombre_platillo']; ?></option>
                    <?php
                      endwhile;
                    ?>
                    <--<option value="0">Ninguno</option>--
                </select>
        </div>
    </div>-->  
    <br/>        
    <div class="row">    
        <div class="col m6 s12">
            <label>Selecciona empaque 1</label>
                <select class="browser-default" id="empaque1" name="empaque1" required>
                    <option value="" disabled selected>Elije el empaque 1</option>
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
                    <option value="" disabled selected>Elije el empaque 2</option>
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
<!--<div class="row">     
    <div class="col m6 s12">
        <h7>Subir imágen de empaque final: </h7>
        <br/>
        <input name="img_emp_menu"  id="img_emp_menu" name="img_emp_menu" type="file" accept="image/*" />             
    </div>
   <div class="col m6 s12">
        <h7>Subir imágen de empaquetado final: </h7>
        <br/>
        <input name="img_emp_menu"  id="img_emp_menu" name="img_emp_menu" type="file" accept="image/*" />             
    </div>
</div>    
        <br/>
        <br/>
        <br/>
        <br/>-->
        <div class="row">
            <div class="input-field col s12">
                <label>Notas</label>
              <textarea id="notas" name="notas" class="materialize-textarea" data-length="250" placeholder="Notas"></textarea>
        </div>
            <div class="input-field col s12">
                <label>Instrucciones de empaquetado</label>
              <textarea id="ins_empaquetado" name="ins_empaquetado" class="materialize-textarea"data-length="250" placeholder="Instrucciones para el empaquetado"></textarea>          
            </div>
        </div>
        <div class="row">
            <div class="col m4 s12">
                <select multiple class="browser-default" id="extras" name="extras" required>
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
</form>
    
    <br/>

    <div class="container center-align">
    <div class="row">
    <div class="col s6">
    
        <button class="btn-large waves-effect waves-light" type="submit" name="action" form="fmenu" value="choose">Subir men&uacute;
            <i class="material-icons right">send</i>
        </button>    
    </div>
    <div class="col s6">
        <a href="menus.php" class="waves-effect waves-light btn-large red accent-4"><i class="material-icons right">close</i>Cancelar</a>
    </div>
        </div>
    </div>
</div>