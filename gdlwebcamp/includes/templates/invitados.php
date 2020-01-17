<section class="seccion contenedor">
  <h2>Nuestros Invitados</h2>

  <?php
  try {
    require_once('includes/functions/bd_conexion.php');

    $sql = "SELECT * FROM gdlwebcamp.invitados";

    $resultado = $conn->query($sql);
  } catch (\Exception $e) {
    echo $e->getMessage();
  }
  ?>

  <section class="invitados contenedor seccion">

    <ul class="lista-invitados clearfix">
        <?php while ($invitados = $resultado->fetch_assoc()) {
          $invitado = array(
            "id" => $invitados['invitado_id'],
            "nombre" => $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado'],
            "descripcion" => $invitados["descripcion"],
            "imagen" => $invitados["url_imagen"]
          );
        ?>
        <li>
          <div class="invitado">
            <a class="invitado-info" href="#invitado<?php echo $invitado['id']; ?>">
              <img src="img/<?php echo $invitado['imagen'] ?>" alt="invitado">
              <p><?php echo $invitado['nombre'] ?></p>
            </a>
          </div>
        </li>

        <div style="display:none;">
          <div class="invitado-info" id="invitado<?php echo $invitado['id']; ?>">
            <h2><?php echo $invitado['nombre'] ?></h2>
            <img src="img/<?php echo $invitado['imagen'] ?>" alt="invitado">
            <p><?php echo $invitado['descripcion']; ?></p>
          </div>
        </div>
      <?php } //While de fetch_assoc();
      ?>

    </ul>
    <!--.lista-invitados-->
  </section>
  <?php $conn->close(); ?>

</section>
<!--.seccion-->
