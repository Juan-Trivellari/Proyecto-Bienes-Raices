<main class="contenedor seccion">
    <h1>Contacto</h1>

    <?php
    if ($mensaje) : ?>
        <p class="alerta exito"><?php echo $mensaje; ?></p>
    <?php endif; ?>
    

    <picture>
        <source srcset="/build/img/destacada3.webp" type="image/webp">
        <source srcset="/build/img/destacada3.jpg" type="image/jpeg">
        <img src="/build/img/destacada3.jpg" alt="Imagen contacto">
    </picture>

    <h2>Llene el formulario de contacto</h2>

    <form class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Información personal</legend>

            <label for="nombre">Nombre: </label>
            <input type="text" placeholder="Nombre completo" name="contacto[nombre]" id="nombre" required>

            <label for="mensaje">Mensaje: </label>
            <textarea name="contacto[mensaje]" id="mensaje" cols="30" rows="5" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="">Vende o compra: </label>
            <select name="contacto[tipo]" id="opciones" required>
                <option value="" disabled selected>-- Selecione --</option>
                <option value="compra">Compra</option>
                <option value="vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o presupuesto: </label>
            <input type="number" placeholder="$000 000 000" name="contacto[precio]" id="presupuesto" required>
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>¿Cómo desea ser contactado?</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" name="contacto[contacto]" id="contactar-telefono" value="telefono" required>

                <label for="contactar-email">E-mail</label>
                <input type="radio" name="contacto[contacto]" id="contactar-email" value="email" required>
            </div>

            <div id="contacto">

            </div>
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>