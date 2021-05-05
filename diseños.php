<?php 
    require('conexion.php');
    require('header.php');
?>
<div class="container">
    
<div class="row">
    <div class=" col m6 s12">
    <label>Selecciona el ingrediente</label>
  <select class="browser-default">
    <option value="" disabled selected>Elije un ingrediente</option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
  </select>
        
    </div>
    </div>
<div class="row">
    <div class="input-field col m3 s6">
        <input id="bruto" name="bruto" type="number" class="validate" step="any">
        <label class="active" for="first_name2">Peso bruto</label>
    </div>
    <div class="col m1 s6">
        <p>Kg</p>
    </div>
    <div class="input-field col m4 s12">
        <input id="merma" type="number" class="validate" step="any">
        <label class="active" for="first_name2">Merma</label>
    </div>
    <div class="input-field col m3 s12">
        <input id="neto" type="number" class="validate" step="any">
        <label class="active" for="first_name2">Peso neto</label>
    </div>
    <div class="col m1 s6">
        <p>Kg</p>
    </div>
</div>
<div class="row">
    <div class="input-field col m3 s6">
        <input id="totalbruto" type="number" class="validate" step="any">
        <label class="active" for="first_name2">Coste unitario bruto</label>
    </div>
    <div class="input-field col m3 s6">
        <input id="totalneto" type="number" class="validate" step="any">
        <label class="active" for="first_name2">Coste total neto</label>
    </div>
    <div class="input-field col m3 s6">
        <input id="paxpesos" type="number" class="validate" step="any">
        <label class="active" for="first_name2">Precio por pax pesos</label>
    </div>
    <div class="input-field col m3 s6">
        <input id="paxporcentaje" type="number" class="validate" step="any">
        <label class="active" for="first_name2">Peso por pax en porcentaje</label>
    </div>
</div>
</div>