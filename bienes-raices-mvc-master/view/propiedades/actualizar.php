<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>

    <a href="/admin" class="boton-verde">Volver</a>

    <?php
    foreach ($errores as $error) {
        echo '<div class="alerta error">';
        echo $error;
        echo '</div>';
    }
    ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include 'formulario.php' ?>

        <div class="alinear-derecha">
            <input type="submit" value="Actualizar Propiedad" class="boton-verde">
        </div>
    </form>
</main>