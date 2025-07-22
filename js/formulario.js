let seccionActual = 1;
const totalSecciones = document.querySelectorAll(".seccion").length;

function mostrarSeccion(n) {
  document.querySelectorAll(".seccion").forEach((sec, i) => {
    sec.style.display = (i + 1 === n) ? "block" : "none";
  });
  document.getElementById("btn-volver").disabled = (n === 1);
  document.getElementById("btn-continuar").style.display = (n === totalSecciones) ? "none" : "inline-block";
  document.getElementById("btn-enviar").style.display = (n === totalSecciones) ? "inline-block" : "none";
}

function siguiente() {
  if (seccionActual < totalSecciones) {
    seccionActual++;
    mostrarSeccion(seccionActual);
  }
}

function anterior() {
  if (seccionActual > 1) {
    seccionActual--;
    mostrarSeccion(seccionActual);
  }
}

document.getElementById("formulario").addEventListener("submit", function (e) {
  e.preventDefault();
  const formData = new FormData(this);

  fetch("guardar.php", {
    method: "POST",
    body: formData
  }).then(res => res.json())
    .then(data => {
      if (data.success) {
        Swal.fire("¡Enviado!", "Tu hoja de vida fue registrada exitosamente.", "success")
          .then(() => window.location.href = "index.php");
      } else {
        Swal.fire("Error", "Hubo un problema al enviar el formulario.", "error");
      }
    });
});

mostrarSeccion(seccionActual);
