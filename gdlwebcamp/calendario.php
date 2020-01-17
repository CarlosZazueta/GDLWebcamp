<?php include_once('includes/templates/header.php'); ?>

<section class="seccion contenedor">
  <h2>Calendario de eventos</h2>

  <?php
  try {
    require_once('includes/functions/bd_conexion.php');

    $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
    $sql .= "FROM gdlwebcamp.eventos ";
    $sql .= "INNER JOIN gdlwebcamp.categoria_evento ON gdlwebcamp.eventos.id_cat_evento = gdlwebcamp.categoria_evento.id_categoria ";
    $sql .= "INNER JOIN gdlwebcamp.invitados ON gdlwebcamp.eventos.id_inv = gdlwebcamp.invitados.invitado_id ORDER BY  gdlwebcamp.eventos.evento_id";

    $resultado = $conn->query($sql);
  } catch (\Exception $e) {
    echo $e->getMessage();
  }
  ?>

  <div class="calendario">
    <?php
    $calendario = array();
    while ($eventos = $resultado->fetch_assoc()) {
      $fecha = $eventos["fecha_evento"];

      $evento = array(
        "titulo" => $eventos["nombre_evento"],
        "fecha" => $eventos["fecha_evento"],
        "hora" => $eventos["hora_evento"],
        "categoria" => $eventos["cat_evento"],
        "icono" => "fa" . " " . $eventos["icono"],
        "invitado" => $eventos["nombre_invitado"] . " " . $eventos["apellido_invitado"]
      );

      $calendario[$fecha][] = $evento;
    } //While de fetch_assoc();
    ?>
    <?php //Imprimir todos los eventos
      foreach ($calendario as $fecha => $lista_eventos) { ?>
        <h3 >
          <i class="fa fa-calendar titulo-hora"></i>
          <?php
            //Windows
            setlocale(LC_TIME, "spanish");
            echo strftime("%d de %B del %Y", strtotime($fecha));
          ?>
        </h3>
        <?php foreach ($lista_eventos as $evento) { ?>
          <div class="dia">
            <p class="titulo"> <?php echo $evento["titulo"]; ?></p>
            <p class="hora">
              <i class="fa fa-clock" aria-hidden="true"></i> <?php echo $evento["fecha"] . " " . $evento["hora"]; ?>
            </p>
            <p class="categoria">
              <i class="<?php echo $evento['icono']; ?>" aria-hidden="true"></i>
              <?php echo $evento["categoria"]; ?>
            </p>
            <p class="invitado">
              <i class="fa fa-user" aria-hidden="true"></i> <?php echo $evento["invitado"]; ?>
            </p>
          </div>
        <?php } //Fin foreach $eventos?>
    <?php } //Fin foreach $fecha => $lista_eventos?>
    <?php $conn->close(); ?>
  </div>

</section>
<!--.seccion-->

<?php include_once('includes/templates/footer.php'); ?>
