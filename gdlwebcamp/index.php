<?php include_once('includes/templates/header.php'); ?>

<section class="seccion contenedor">
  <h2>La mejor conferencia de diseño web en español</h2>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta officiis quibusdam illum, ullam asperiores dolor
    labore perspiciatis doloremque neque nihil quae illo. Molestiae possimus omnis quos tempora, quidem maiores ut.
    Molestiae possimus omnis quos tempora, quidem maiores ut</p>
</section>
<!--.seccion-->

<section class="programa">
  <div class="contenedor-video">
    <video autoplay loop poster="img/bg-talleres.jpg">
      <source src="video/video.mp4" type="video/mp4">
      <source src="video/video.webm" type="video/webm">
      <source src="video/video.ogv" type="video/ogg">
    </video>
  </div>
  <!--.contenedor-video-->

  <div class="contenido-programa">
    <div class="contenedor">
      <div class="programa-evento">
        <h2>Programa del Evento</h2>
        <?php
        try {
          require_once("includes/functions/bd_conexion.php");
          $sql = "SELECT * FROM gdlwebcamp.categoria_evento";
          $resultado = $conn->query($sql);
        } catch (Exception $e) {
          $error = $e->getMessage();
        }
        ?>
        <nav class="menu-programa">
          <?php while ($categoria = $resultado->fetch_assoc()) { ?>
            <?php $categoria_evento = $categoria["cat_evento"]; ?>
            <a href="#<?php echo strtolower($categoria_evento); ?>"><i class="fas <?php echo ($categoria["icono"]); ?>" aria-hidden="true"></i> <?php echo ($categoria_evento); ?></a>
          <?php } ?>
        </nav>

        <?php
          try {
            require_once('includes/functions/bd_conexion.php');

            $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
            $sql .= "FROM gdlwebcamp.eventos ";
            $sql .= "INNER JOIN gdlwebcamp.categoria_evento ON gdlwebcamp.eventos.id_cat_evento = gdlwebcamp.categoria_evento.id_categoria ";
            $sql .= "INNER JOIN gdlwebcamp.invitados ON gdlwebcamp.eventos.id_inv = gdlwebcamp.invitados.invitado_id AND eventos.id_cat_evento = 1 ";
            $sql .= "ORDER BY  gdlwebcamp.eventos.evento_id LIMIT 2;";
            $sql .= "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
            $sql .= "FROM gdlwebcamp.eventos ";
            $sql .= "INNER JOIN gdlwebcamp.categoria_evento ON gdlwebcamp.eventos.id_cat_evento = gdlwebcamp.categoria_evento.id_categoria ";
            $sql .= "INNER JOIN gdlwebcamp.invitados ON gdlwebcamp.eventos.id_inv = gdlwebcamp.invitados.invitado_id AND eventos.id_cat_evento = 2 ";
            $sql .= "ORDER BY  gdlwebcamp.eventos.evento_id LIMIT 2;";
            $sql .= "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
            $sql .= "FROM gdlwebcamp.eventos ";
            $sql .= "INNER JOIN gdlwebcamp.categoria_evento ON gdlwebcamp.eventos.id_cat_evento = gdlwebcamp.categoria_evento.id_categoria ";
            $sql .= "INNER JOIN gdlwebcamp.invitados ON gdlwebcamp.eventos.id_inv = gdlwebcamp.invitados.invitado_id AND eventos.id_cat_evento = 3 ";
            $sql .= "ORDER BY  gdlwebcamp.eventos.evento_id LIMIT 2;";
          } catch (\Exception $e) {
            echo $e->getMessage();
          }

          $conn->multi_query($sql);

          do {
            $resultado = $conn->store_result();
            $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>

            <?php $i = 0; ?>
            <?php foreach($row as $evento):?>
              <?php if($i % 2 == 0) { ?>
                <div id="<?php echo(strtolower($evento['cat_evento']));?>" class="info-curso ocultar clearfix">
              <?php } ?>
                  <div class="detalle-evento">
                    <h3><?php echo($evento['nombre_evento']); ?></h3>
                    <p><i class="fas fa-clock"></i> <?php echo($evento['hora_evento']);?></p>
                    <p><i class="fas fa-calendar"></i> <?php echo($evento['fecha_evento']);?></p>
                    <p><i class="fas fa-user"></i> <?php echo($evento['nombre_invitado'] . " " . $evento['apellido_invitado']);?></p>
                  </div>
              <?php if($i % 2 == 1) { ?>
                <a href="calendario.php" class="button float-right">Ver Todos</a>
                </div>
              <?php }?>
              <?php $i++; ?>
            <?php endforeach;?>
            <?php $resultado->free(); ?>
          <?php } while ($conn->more_results() && $conn->next_result()); ?>
      </div>
        <!--.programa-evento-->
    </div>
      <!--.contenedor-->
  </div>
    <!--.contenido-programa-->
</section>
<!--.programa-->

<?php include_once('includes/templates/invitados.php'); ?>

<div class="contador parallax">
  <div class="contenedor">
    <ul class="resumen-evento clearfix">
      <li>
        <p class="numero">0</p> Invitados
      </li>
      <li>
        <p class="numero">0</p> Talleres
      </li>
      <li>
        <p class="numero">0</p> Días
      </li>
      <li>
        <p class="numero">0</p> Conferencias
      </li>
    </ul>
    <!--.resumen-evento-->
  </div>
  <!--.contenedor-->
</div>
<!--.contador-->

<section class="precios seccion">
  <h2>Precios</h2>

  <div class="contenedor">
    <ul class="lista-precios clearfix">
      <li>
        <div class="tabla-precio">
          <h3>Pase por Día</h3>

          <p class="numero">$30</p>

          <ul>
            <li><i class="fas fa-check check"></i>Bocadillos Gratis</li>
            <li><i class="fas fa-check check"></i>Todas las Conferencias</li>
            <li><i class="fas fa-check check"></i>Todos los Talleres</li>
          </ul>

          <a href="#" class="button hollow">Comprar</a>
        </div>
      </li>
      <li>
        <div class="tabla-precio">
          <h3>Todos los días</h3>
          <p class="numero">$50</p>
          <ul>
            <li><i class="fas fa-check check"></i>Bocadillos Gratis</li>
            <li><i class="fas fa-check check"></i>Todas las Conferencias</li>
            <li><i class="fas fa-check check"></i>Todos los Talleres</li>
          </ul>
          <a href="#" class="button">Comprar</a>
        </div>
      </li>
      <li>
        <div class="tabla-precio">
          <h3>Pase por dos días</h3>
          <p class="numero">$45</p>
          <ul>
            <li><i class="fas fa-check check"></i>Bocadillos Gratis</li>
            <li><i class="fas fa-check check"></i>Todas las Conferencias</li>
            <li><i class="fas fa-check check"></i>Todos los Talleres</li>
          </ul>
          <a href="#" class="button hollow">Comprar</a>
        </div>
      </li>
    </ul>
    <!--.lista-precios-->
  </div>
  <!--.contenedor-->
</section>
<!--.precios-->

<div id="mapa" class="mapa"></div>
<!--#mapa.mapa-->

<section class="seccion">
  <h2>Testimoniales</h2>

  <div class="testimoniales contenedor clearfix">
    <div class="testimonial">
      <blockquote>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, tenetur! Deleniti ipsum aperiam dolores
          dignissimos consequuntur, quo fuga hic dolorem at, quaerat placeat necessitatibus.</p>
        <footer class="info-testimonial clearfix">
          <img src="img/testimonial.jpg" alt="imagen testimonial">
          <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div>
    <!--.testimonial-->

    <div class="testimonial">
      <blockquote>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, tenetur! Deleniti ipsum aperiam dolores
          dignissimos consequuntur, quo fuga hic dolorem at, quaerat placeat necessitatibus.</p>
        <footer class="info-testimonial clearfix">
          <img src="img/testimonial.jpg" alt="imagen testimonial">
          <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div>
    <!--.testimonial-->

    <div class="testimonial">
      <blockquote>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, tenetur! Deleniti ipsum aperiam dolores
          dignissimos consequuntur, quo fuga hic dolorem at, quaerat placeat necessitatibus.</p>
        <footer class="info-testimonial clearfix">
          <img src="img/testimonial.jpg" alt="imagen testimonial">
          <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div>
    <!--.testimonial-->
</section>
<!--.seccion-->

<div class="newsletter parallax">
  <div class="contenido contenedor">
    <p>Regístrate al newsletter:</p>
    <h3>GdlWebCamp</h3>
    <a href="#mc_embed_signup" class="boton_newsletter button transparente">Registro</a>
  </div>
  <!--.contenido-->
</div>
<!--.newsletter-->
<?php include_once('includes/templates/footer.php'); ?>
