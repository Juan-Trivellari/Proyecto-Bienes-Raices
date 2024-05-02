document.addEventListener("DOMContentLoaded", () => {
  eventListeners();
  darkMode();
});

function darkMode() {
  const botonDarkMode = document.querySelector(".dark-mode-boton");
  const prefiereDarkMode = window.matchMedia("(prefers-color-scheme: dark)");

  // Comprobar si el modo oscuro ya está activado
  if (localStorage.getItem("darkMode") === "true") {
    document.body.classList.add("dark-mode");
  } else if (
    localStorage.getItem("darkMode") === null &&
    prefiereDarkMode.matches
  ) {
    document.body.classList.add("dark-mode");
    localStorage.setItem("darkMode", "true");
  }

  prefiereDarkMode.addEventListener("change", function () {
    if (prefiereDarkMode.matches) {
      document.body.classList.add("dark-mode");
      localStorage.setItem("darkMode", "true");
    } else {
      document.body.classList.remove("dark-mode");
      localStorage.setItem("darkMode", "false");
    }
  });

  botonDarkMode.addEventListener("click", function () {
    document.body.classList.toggle("dark-mode");

    if (document.body.classList.contains("dark-mode")) {
      localStorage.setItem("darkMode", "true");
    } else {
      localStorage.setItem("darkMode", "false");
    }
  });
}

function eventListeners() {
  const mobileMenu = document.querySelector(".mobile-menu");
  mobileMenu.addEventListener("click", navegacionResponsive);

  // Muesta campos condicionales
  const metodoContacto = document.querySelectorAll(
    'input[name="contacto[contacto]"]'
  );

  metodoContacto.forEach((input) => {
    input.addEventListener("click", mostrarMetodosContacto);
  });
}

function navegacionResponsive() {
  const navegacion = document.querySelector(".navegacion");
  navegacion.classList.toggle("mostrar");
}

function mostrarMetodosContacto(e) {
  const contactoDiv = document.querySelector("#contacto");
  if (e.target.value === "telefono") {
    contactoDiv.innerHTML = `
      <p>Coloque el número de teléfono</p>

      <label for="telefono">Teléfono</label>
      <input type="tel" id="telefono" name="contacto[telefono]" placeholder="Tu Teléfono">

      <p>Elija la fecha y la hora para la llamada</p>

      <label for="fecha">Fecha:</label>
      <input type="date" name="contacto[fecha]" id="fecha">

      <label for="hora">Hora:</label>
      <input type="time" name="contacto[hora]" id="hora" min="09:00" max="18:00">
    `;
  } else {
    contactoDiv.innerHTML = `
      <p>Coloque el E-Mail</p>

      <label for="email">E-mail</label>
      <input type="email" id="email" name="contacto[email]" placeholder="Tu Email">
    `;
  }
}
