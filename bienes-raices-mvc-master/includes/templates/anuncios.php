<?php
    use Model\Propiedad;

    if ($_SERVER['SCRIPT_NAME'] === '/anuncios.php') {
        $propiedades = Propiedad::getAll();
    } else if ($_SERVER['SCRIPT_NAME'] === '/index.php') {
        $propiedades = Propiedad::get($limite);
    }
?>

<div class="contenedor-anuncios">
    <?php foreach ($propiedades as $propiedad) : ?>
        <div class="anuncio">
            <img loading="lazy" src=/imagenes/<?php echo $propiedad->getImagen(); ?> alt="Imagen anuncio">

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->getTitulo(); ?></h3>
                <p><?php echo $propiedad->getDescripcion(); ?></p>
                <p class="precio">$<?php echo $propiedad->getPrecio(); ?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img loading="lazy" src="/build/img/icono_wc.svg" alt="Icono wc" class="icono">
                        <p><?php echo $propiedad->getWc(); ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="/build/img/icono_estacionamiento.svg" alt="Icono estacionamiento" class="icono">
                        <p><?php echo $propiedad->getEstacionamiento(); ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="/build/img/icono_dormitorio.svg" alt="Icono habitaciones" class="icono">
                        <p><?php echo $propiedad->getHabitaciones(); ?></p>
                    </li>
                </ul>

                <a href="anuncio.php?id=<?php echo $propiedad->getId(); ?>" class="boton-amarillo-block">Ver Propiedad</a>
            </div> <!--.contenido-anuncio-->
        </div> <!--.anuncio-->
    <?php endforeach; ?>
</div> <!--.contenedor-anuncios-->