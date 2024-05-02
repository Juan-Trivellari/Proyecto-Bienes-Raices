<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php
    foreach ($errores as $error) {
        echo '<div class="alerta error">';
        echo $error;
        echo '</div>';
    }
    ?>

    <form method="POST" class="formulario" action="/login">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-mail:</label>
            <input type="email" placeholder=example@example.com name="email" id="email" required>

            <label for="password">Password:</label>
            <input type="password" placeholder="*******" name="password" id="email" required>
        </fieldset>

        <input type="submit" value="Iniciar sesión" class="boton-verde">
    </form>
</main>