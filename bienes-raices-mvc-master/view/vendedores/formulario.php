<fieldset>
    <legend>Información Vendedor</legend>

    <label for="titulo">Nombre:</label>
    <input type="text" name="vendedor[nombre]" id="nombre" placeholder="Nombre" value="<?php echo s($vendedor->getNombre()); ?>">

    <label for="precio">Apellido:</label>
    <input type="text" name="vendedor[apellido]" id="apellido" placeholder="Apellido" value="<?php echo s($vendedor->getApellido()); ?>">
</fieldset>

<fieldset>
    <legend>Información Extra</legend>

    <label for="imagen">Telefono:</label>
    <input type="number" name="vendedor[telefono]" id="telefono" placeholder="9999999999" pattern="\d{10}" value="<?php echo s($vendedor->getTelefono()); ?>">
</fieldset>