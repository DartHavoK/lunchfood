<?php 
    
    require('header.php');

?>
<div class="container">
<table class="centered">
        <thead>
          <tr>
              <th>Nombre Platillo</th> <!--Con php meter el nombre de la receta segun el id-->
          </tr>
        </thead>
</table>
<table>
        <thead>
          <tr>
              <th>Raciones:  </th>
              <th>000</th> <!-- Atraccion segun el id de la tabla platillo -->
              <th>Tiempo de preparacion</th>
              <th>000</th> <!-- Atraccion segun el id de la tabla platillo -->
              <th>No. Revicion</th>
              <th>000</th>
          </tr>
        </thead>
</table>
    <hr/>

    <div class="row">
        <div class="col m8">
        <table>       
        <thead>
          <tr>
              <th>Clave</th>
              <th>Cantidad</th>
              <th>Unidad</th>
              <th>Ingrediente</th>
          </tr>
        </thead>
        <tbody>
          <tr><!-- dentro de un while para traer todo -->
            <td>000test</td><!--Toda esta ifnromacion es atraida segun el id de platillo en relacion con el ingrediente -->
            <td>30</td>
            <td>Kg</td>
            <td>Nombre</td>
          </tr>
        </tbody>
      </table>
       
        </div>
        <div class="col m4">
            
       <img src="https://picsum.photos/200">
        </div>
        
    </div>
    <hr/>
    <table>       
        <thead>
          <tr>
              <th class="centered">Metodo de preparacion </th>
          </tr>
        </thead>
        <tbody>
          <tr><!-- dentro de un while para traer todo -->
            <td>Metodo de preparacion </td><!--Toda esta ifnromacion es atraida segun el id de platillo en relacion con el ingrediente -->

          </tr>
        </tbody>
      </table>
    
    
</div>