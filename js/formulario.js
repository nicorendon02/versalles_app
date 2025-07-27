let seccionActual = 1;
let totalSecciones;

function mostrarSeccion(n) {
  document.querySelectorAll(".seccion").forEach((sec, i) => {
    sec.style.display = (i + 1 === n) ? "block" : "none";
  });
  document.getElementById("btn-volver").disabled = (n === 1);
  document.getElementById("btn-continuar").style.display = (n === totalSecciones) ? "none" : "inline-block";
  document.getElementById("btn-enviar").style.display = (n === totalSecciones) ? "inline-block" : "none";
  
  // Validar campos required de la sección actual
  validarSeccionActual();
}

// Función para validar que todos los campos required de la sección actual estén completos
function validarSeccionActual() {
  const seccionActiva = document.querySelector(`#seccion-${seccionActual}`);
  const camposRequired = seccionActiva.querySelectorAll('input[required], select[required], textarea[required]');
  const btnContinuar = document.getElementById("btn-continuar");
  const btnEnviar = document.getElementById("btn-enviar");
  
  let todosCompletos = true;
  
  camposRequired.forEach(campo => {
    if (!campo.value.trim()) {
      todosCompletos = false;
    }
  });
  
  // Deshabilitar botón si no todos los campos están completos
  if (seccionActual < totalSecciones) {
    btnContinuar.disabled = !todosCompletos;
  } else {
    btnEnviar.disabled = !todosCompletos;
  }
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

// Función para validar que solo se ingresen números en campos de teléfono
function validarSoloNumeros(event) {
  const char = String.fromCharCode(event.which);
  if (!/[0-9]/.test(char)) {
    event.preventDefault();
  }
}

// Función para validar que solo se ingresen letras y espacios en campos de nombres
function validarSoloLetras(event) {
  const char = String.fromCharCode(event.which);
  if (!/[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/.test(char)) {
    event.preventDefault();
  }
}

// Aplicar validaciones a los campos cuando el DOM esté cargado
document.addEventListener("DOMContentLoaded", function() {
  // Inicializar variable después de que el DOM esté cargado
  totalSecciones = document.querySelectorAll(".seccion").length;
  
  // Validar campos numéricos (teléfono, celular, cédula - solo números)
  const camposNumericos = document.querySelectorAll('input[name="celular"], input[name="cedula"], input[name*="_telefono"]');
  camposNumericos.forEach(campo => {
    campo.addEventListener('keypress', validarSoloNumeros);
    campo.addEventListener('input', function() {
      // Eliminar cualquier carácter que no sea número
      this.value = this.value.replace(/[^0-9]/g, '');
      validarSeccionActual();
    });
  });
  
  // Validar campo de edad (solo números entre 0 y 100)
  const campoEdad = document.querySelector('input[name="edad"]');
  if (campoEdad) {
    campoEdad.addEventListener('keypress', validarSoloNumeros);
    campoEdad.addEventListener('input', function() {
      // Eliminar cualquier carácter que no sea número
      this.value = this.value.replace(/[^0-9]/g, '');
      
      // Validar rango de edad (0-100)
      let edad = parseInt(this.value);
      if (edad > 100) {
        this.value = '100';
      } else if (this.value.length > 3) {
        this.value = this.value.substring(0, 3);
      }
      
      validarSeccionActual();
    });
    
    // Validación adicional cuando pierde el foco
    campoEdad.addEventListener('blur', function() {
      let edad = parseInt(this.value);
      if (this.value === '' || edad < 0) {
        this.value = '';
      } else if (edad > 100) {
        this.value = '100';
      }
      validarSeccionActual();
    });
  }

  // Validar campos de nombres, ciudad e institución (solo letras y espacios)
  const camposLetras = document.querySelectorAll('input[name="nombres"], input[name="apellidos"], input[name="ciudad"], input[name*="_institucion"]');
  camposLetras.forEach(campo => {
    campo.addEventListener('keypress', validarSoloLetras);
    campo.addEventListener('input', function() {
      // Eliminar cualquier carácter que no sea letra o espacio
      this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
      validarSeccionActual();
    });
  });
  
  // Agregar event listeners a todos los campos required para validar en tiempo real
  const todosLosCamposRequired = document.querySelectorAll('input[required], select[required], textarea[required]');
  todosLosCamposRequired.forEach(campo => {
    campo.addEventListener('input', validarSeccionActual);
    campo.addEventListener('change', validarSeccionActual);
  });
  
  // Inicializar la primera sección y validación inicial
  mostrarSeccion(seccionActual);
});

document.getElementById("formulario").addEventListener("submit", function (e) {
  e.preventDefault();
  
  const btnEnviar = document.getElementById("btn-enviar");
  
  // Verificar si el formulario ya está siendo enviado
  if (btnEnviar.disabled) {
    return;
  }
  
  // Deshabilitar el botón y cambiar su texto
  btnEnviar.disabled = true;
  btnEnviar.textContent = "Enviando...";
  
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
        // Rehabilitar el botón en caso de error
        btnEnviar.disabled = false;
        btnEnviar.textContent = "Enviar";
      }
    })
    .catch(error => {
      Swal.fire("Error", "Hubo un problema al enviar el formulario.", "error");
      // Rehabilitar el botón en caso de error
      btnEnviar.disabled = false;
      btnEnviar.textContent = "Enviar";
    });
});

// Validación antes del envío final
document.getElementById("formulario").addEventListener("submit", function (e) {
  document.querySelectorAll('.seccion').forEach(seccion => {
    if (seccion.style.display === "none") {
      seccion.querySelectorAll('input, select, textarea').forEach(input => {
        input.removeAttribute("required");
      });
    }
  });
});
