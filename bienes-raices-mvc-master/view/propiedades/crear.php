<main class="contenedor seccion">
    <h1>Crear Propiedad</h1>

    <a href="/admin" class="boton-verde">Volver</a>

    <?php
    if ($errores) {
        foreach ($errores as $error) {
            echo '<div class="alerta error">';
            echo $error;
            echo '</div>';
        }
    }
    ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php' ?>

        <div class="alinear-derecha">
            <input type="submit" value="Crear Propiedad" class="boton-verde">
        </div>
    </form>
</main>