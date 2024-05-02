<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Título:</label>
    <input type="text" name="propiedad[titulo]" id="titulo" placeholder="Título propiedad" value="<?php echo s($propiedad->getTitulo()); ?>">

    <label for="precio">Precio:</label>
    <input type="number" name="propiedad[precio]" id="precio" placeholder="$000 000 000" value="<?php echo s($propiedad->getPrecio()); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" name="propiedad[imagen]" id="imagen" accept="image/jpeg, imagen/png">

    <?php if ($propiedad->getImagen()) : ?>
        <img src="/imagenes/<?php echo $propiedad->getImagen() ?>" alt="Imagen propiedad" class="imagen-small">
    <?php endif; ?>

    <label for="descripcion">Descripción:</label>
    <textarea name="propiedad[descripcion]" id="descripcion" cols="30" rows="10"><?php echo s($propiedad->getDescripcion()); ?></textarea>
</fieldset>

<fieldset>
    <legend>Información de la Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input type="number" name="propiedad[habitaciones]" id="habitaciones" placeholder="Ej. 3" min="1" max="9" value="<?php echo s($propiedad->getHabitaciones()); ?>">

    <label for="wc">Baños:</label>
    <input type="number" name="propiedad[wc]" id="wc" placeholder="Ej. 3" min="1" max="9" value="<?php echo s($propiedad->getWc()) ?>">

    <label for="estacionamiento">Estacionamiento:</label>
    <input type="number" name="propiedad[estacionamiento]" id="estacionamiento" placeholder="Ej. 3" min="1" max="9" value="<?php echo s($propiedad->getEstacionamiento()); ?>">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <select name="propiedad[vendedorId]">
        <option value="" disabled <?php echo !$propiedad->getVendedorId() ? 'selected' : ''; ?>>-- Seleccione --</option>
        <?php foreach ($vendedores as $row) : ?>
            <option <?php echo $propiedad->getVendedorId() === $row->getId() ? 'selected' : ''; ?> value="<?php echo s($row->getId()); ?>">
                <?php echo $row->getNombre() . " " . $row->getApellido(); ?>
            </option>
        <?php endforeach; ?>
    </select>
</fieldset>