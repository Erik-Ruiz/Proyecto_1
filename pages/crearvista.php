<?php
require_once "./cabecera.html";
?>

<div style="margin-top: 10%;" class="form-group align-items-center">
  <form action="../controller/mostrar_contadores.php" method="POST">
  <label for="fname">Han comido estas personas: </label>
  <input type="number" name="personas"><br><br>
  <label for="lname">Se han reparado estas mesas: </label>
  <input type="number" name="reparaciones">
  </form>
</div>