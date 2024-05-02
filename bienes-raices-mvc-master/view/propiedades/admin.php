<main class="contenedor seccion">
    <h1>Administrador de Bienes Raíces</h1>
    <?php
    if ($resultado) {
        $mensaje = mostrarNotificacion(intval($resultado));
        if ($mensaje) { ?>
            <p class="alerta exito">
                <?php echo s($mensaje) ?>
            </p>
    <?php 
        }
    } 
    ?>

    <h2>Propiedades</h2>
    <a href="/propiedades/crear" class="boton boton-verde">Nueva propiedad</a>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody> <!--Mostrar los resultados -->
            <?php foreach ($propiedades as $row) : ?>
                <tr>
                    <td><?php echo $row->getId(); ?></td>
                    <td><?php echo $row->getTitulo(); ?></td>
                    <td><img src="/imagenes/<?php echo $row->getImagen(); ?>" alt="Imagen propiedad" class="imagen-tabla"></td>
                    <td>$<?php echo $row->getPrecio(); ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/propiedades/eliminar">
                            <input type="hidden" name="id" value="<?php echo $row->getId(); ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar" />
                        </form>

                        <a href="/propiedades/actualizar?id=<?php echo $row->getId(); ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table> <!-- Tabla propiedades -->

    <h2>Vendedores</h2>
    <a href="/vendedores/crear" class="boton boton-verde">Nuevo vendedor</a>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody> <!--Mostrar los resultados -->
            <?php foreach ($vendedores as $row) : ?>
                <tr>
                    <td><?php echo $row->getId(); ?></td>
                    <td><?php echo $row->getNombre() . ' ' . $row->getApellido(); ?></td>
                    <td><?php echo $row->getTelefono(); ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/vendedores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $row->getId(); ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar" />
                        </form>

                        <a href="/vendedores/actualizar?id=<?php echo $row->getId(); ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table> <!-- Tabla vendedores -->
</main>