const sidebar = document.getElementById("sidebar");

// Al hacer clic en el botón, alternar la clase mini y cerrar el menú si es necesario
document.getElementById("toggleSidebar").addEventListener("click", function () {
  sidebar.classList.toggle("mini");
});

document
  .getElementById("toggleSidebar1")
  .addEventListener("click", function () {
    sidebar.classList.toggle("show");
  });

document.addEventListener("DOMContentLoaded", function () {
  const sidebarLinks = document.querySelectorAll(".sidebar a");

  // Remover la clase active de todos los enlaces para evitar duplicados
  sidebarLinks.forEach((link) => link.classList.remove("active"));

  // Añadir la clase active al primer enlace
  if (sidebarLinks.length > 0) {
    sidebarLinks[0].classList.add("active");
  }

  // Funcionalidad para agregar la clase active al hacer clic
  sidebarLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      // Evitar que la página se recargue
      e.preventDefault();

      // Remover la clase active de todos los enlaces
      sidebarLinks.forEach((link) => link.classList.remove("active"));

      // Añadir la clase active al enlace que fue clicado
      this.classList.add("active");
    });
  });

  function checkWindowSize() {
    if (window.innerWidth <= 991) {
      sidebar.classList.remove("mini");
    }
  }

  // Comprobar el tamaño de la ventana al cargar la página
  checkWindowSize();

  // Añadir un event listener al redimensionar la ventana
  window.addEventListener("resize", checkWindowSize);
});
