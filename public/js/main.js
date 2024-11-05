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
