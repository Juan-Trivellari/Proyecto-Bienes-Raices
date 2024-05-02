<main class="contenedor seccion contenido-centrado">
    <h1>Casa en Venta Frente al Bosque</h1>

    <img loading="lazy" src="/imagenes/<?php echo $propiedad->getImagen() ?>" alt="Imagen de la propiedad">

    <div class="resumen-propiedad">
        <p class="precio">$<?php echo $propiedad->getPrecio() ?></p>

        <ul class="iconos-caracteristicas">
            <li>
                <img loading="lazy" src="/build/img/icono_wc.svg" alt="Icono wc" class="icono">
                <p><?php echo $propiedad->getWc() ?></p>
            </li>
            <li>
                <img loading="lazy" src="/build/img/icono_estacionamiento.svg" alt="Icono estacionamiento" class="icono">
                <p><?php echo $propiedad->getEstacionamiento() ?></p>
            </li>
            <li>
                <img loading="lazy" src="/build/img/icono_dormitorio.svg" alt="Icono habitaciones" class="icono">
                <p><?php echo $propiedad->getHabitaciones() ?></p>
            </li>
        </ul>

        <p><?php echo $propiedad->getDescripcion() ?></p>
    </div>
</main>