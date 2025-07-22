<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario Aplicaciones Versalles</title>
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: url('assets/background.svg') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 2rem;
      min-height: 100vh;
    }

    form {
      background: #fff;
      border-radius: 16px;
      padding: 2rem;
      max-width: 900px;
      width: 100%;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      position: relative;
    }

    .logo-versalles {
      position: absolute;
      top: 1rem;
      left: 1rem;
      width: 120px;
    }

    .seccion {
      display: none;
    }

    .seccion.active {
      display: block;
    }

    .seccion h2, .seccion h3 {
      margin-top: 1rem;
      color: #2d4491;
      text-align: center;
    }

    input, textarea, select, label {
      display: block;
      width: 100%;
      padding: 0.6rem;
      margin: 0.5rem 0 1rem;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    input[type="checkbox"] {
      display: inline;
      width: auto;
    }

    textarea {
      resize: vertical;
    }

    #navegacion {
      display: flex;
      justify-content: space-between;
      margin-top: 2rem;
    }

    button {
      background-color: #2d4491;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 10px;
      padding: 0.75rem 1.5rem;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #1e2f70;
    }

    footer {
      text-align: center;
      margin-top: 2rem;
      font-size: 0.9rem;
      color: #666;
    }

    @media (max-width: 600px) {
      body {
        padding: 1rem;
      }

      form {
        padding: 1rem;
      }

      #navegacion {
        flex-direction: column;
        gap: 1rem;
      }
    }

    .form-row {
  display: flex;
  align-items: center;
  gap: 1rem;
  margin-bottom: 1rem;
}

.form-row label {
  width: 220px; /* mismo ancho para todos los labels */
  min-width: 220px;
  font-weight: 600;
  font-size: 1rem;
  color: #333;
}

.form-row input,
.form-row select,
.form-row textarea {
  flex: 1;
  padding: 0.6rem 0.75rem;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 8px;
  height: 42px; /* igual altura para todos */
  box-sizing: border-box;
}

.form-row textarea {
  height: auto; /* permite crecer verticalmente */
  min-height: 80px;
  resize: vertical;
}


.logo-versalles {
  position: absolute;
  top: 1rem;
  left: 1rem;
  width: 120px;
}


  </style>
</head>
<body>
  <form id="formulario" enctype="multipart/form-data">
    <img src="assets/logo.svg" alt="Logo Versalles" class="logo-versalles">
    <!-- Seccion 1: Datos personales -->
    <div class="seccion" id="seccion-1">
      <h2>Datos personales</h2>

      <div class="form-row">
        <label for="nombres">Nombres</label>
        <input type="text" id="nombres" name="nombres" required>
      </div>

      <div class="form-row">
        <label for="apellidos">Apellidos</label>
        <input type="text" id="apellidos" name="apellidos" required>
      </div>

      <div class="form-row">
        <label for="edad">Edad</label>
        <input type="number" id="edad" name="edad" required>
      </div>

      <div class="form-row">
        <label for="profesion">Profesión</label>
        <input type="text" id="profesion" name="profesion" required>
      </div>

      <div class="form-row">
        <label for="cedula">Cédula</label>
        <input type="text" id="cedula" name="cedula" required>
      </div>

      <div class="form-row">
        <label for="direccion">Dirección</label>
        <input type="text" id="direccion" name="direccion" required>
      </div>

      <div class="form-row">
        <label for="celular">Celular</label>
        <input type="text" id="celular" name="celular" required>
      </div>

      <div class="form-row">
        <label for="correo">Correo electrónico</label>
        <input type="email" id="correo" name="correo" required>
      </div>

      <div class="form-row">
        <label for="ciudad">Ciudad</label>
        <input type="text" id="ciudad" name="ciudad" required>
      </div>

      <div class="form-row">
        <label for="perfil">Perfil profesional</label>
        <textarea id="perfil" name="perfil" maxlength="800" required></textarea>
      </div>

      <div class="form-row">
        <label for="foto">Foto reciente (PNG/JPG, máx 5MB)</label>
        <input type="file" id="foto" name="foto" accept=".png, .jpg, .jpeg" required>
      </div>

      <div class="form-row">
        <label for="tarjeta">Tarjeta profesional (PDF, máx 5MB)</label>
        <input type="file" id="tarjeta" name="tarjeta" accept=".pdf" required>
      </div>
    </div>


    <!-- Seccion 2: Formación académica -->
    <div class="seccion" id="seccion-2" style="display:none;">
      <h2>Formación académica (hasta 3)</h2>
      <!-- Formación 1 (obligatoria) -->
      <h3>Formación 1</h3>
      <input type="text" name="fa1_titulo" placeholder="Título obtenido" required>
      <input type="text" name="fa1_institucion" placeholder="Institución" required>
      <input type="date" name="fa1_inicio" required>
      <input type="date" name="fa1_fin" required>
      <input type="file" name="fa1_certificado" accept=".pdf" required>

      <!-- Formación 2 -->
      <h3>Formación 2 (opcional)</h3>
      <input type="text" name="fa2_titulo" placeholder="Título obtenido">
      <input type="text" name="fa2_institucion" placeholder="Institución">
      <input type="date" name="fa2_inicio">
      <input type="date" name="fa2_fin">
      <input type="file" name="fa2_certificado" accept=".pdf">

      <!-- Formación 3 -->
      <h3>Formación 3 (opcional)</h3>
      <input type="text" name="fa3_titulo" placeholder="Título obtenido">
      <input type="text" name="fa3_institucion" placeholder="Institución">
      <input type="date" name="fa3_inicio">
      <input type="date" name="fa3_fin">
      <input type="file" name="fa3_certificado" accept=".pdf">
    </div>

    <!-- Seccion 3: Formación profesional -->
    <div class="seccion" id="seccion-3" style="display:none;">
      <h2>Formación profesional (hasta 3)</h2>
      <h3>Profesional 1</h3>
      <input type="text" name="fp1_titulo" placeholder="Título obtenido" required>
      <input type="text" name="fp1_institucion" placeholder="Institución" required>
      <input type="date" name="fp1_inicio" required>
      <input type="date" name="fp1_fin" required>
      <input type="file" name="fp1_certificado" accept=".pdf" required>
      <h3>Profesional 2 (opcional)</h3>
      <input type="text" name="fp2_titulo" placeholder="Título obtenido">
      <input type="text" name="fp2_institucion" placeholder="Institución">
      <input type="date" name="fp2_inicio">
      <input type="date" name="fp2_fin">
      <input type="file" name="fp2_certificado" accept=".pdf">
      <h3>Profesional 3 (opcional)</h3>
      <input type="text" name="fp3_titulo" placeholder="Título obtenido">
      <input type="text" name="fp3_institucion" placeholder="Institución">
      <input type="date" name="fp3_inicio">
      <input type="date" name="fp3_fin">
      <input type="file" name="fp3_certificado" accept=".pdf">
    </div>

    <!-- Seccion 4: Experiencia académica -->
    <div class="seccion" id="seccion-4" style="display:none;">
      <h2>Experiencia académica (hasta 3)</h2>
      <h3>Experiencia 1</h3>
      <input type="text" name="ea1_nombre" placeholder="Nombre de la experiencia" required>
      <input type="text" name="ea1_institucion" placeholder="Institución" required>
      <input type="date" name="ea1_inicio" required>
      <input type="date" name="ea1_fin" required>
      <input type="file" name="ea1_certificado" accept=".pdf" required>
      <h3>Experiencia 2 (opcional)</h3>
      <input type="text" name="ea2_nombre" placeholder="Nombre de la experiencia">
      <input type="text" name="ea2_institucion" placeholder="Institución">
      <input type="date" name="ea2_inicio">
      <input type="date" name="ea2_fin">
      <input type="file" name="ea2_certificado" accept=".pdf">
      <h3>Experiencia 3 (opcional)</h3>
      <input type="text" name="ea3_nombre" placeholder="Nombre de la experiencia">
      <input type="text" name="ea3_institucion" placeholder="Institución">
      <input type="date" name="ea3_inicio">
      <input type="date" name="ea3_fin">
      <input type="file" name="ea3_certificado" accept=".pdf">
    </div>

    <!-- Seccion 5: Eventos -->
    <div class="seccion" id="seccion-5" style="display:none;">
      <h2>Asistencia a eventos (hasta 3)</h2>
      <input type="text" name="ev1_nombre" placeholder="Nombre del evento">
      <input type="text" name="ev1_organizacion" placeholder="Organización">
      <input type="date" name="ev1_fecha">
      <br>
      <input type="text" name="ev2_nombre" placeholder="Nombre del evento">
      <input type="text" name="ev2_organizacion" placeholder="Organización">
      <input type="date" name="ev2_fecha">
      <br>
      <input type="text" name="ev3_nombre" placeholder="Nombre del evento">
      <input type="text" name="ev3_organizacion" placeholder="Organización">
      <input type="date" name="ev3_fecha">
    </div>

    <!-- Seccion 6: Experiencia laboral -->
    <div class="seccion" id="seccion-6" style="display:none;">
      <h2>Experiencia laboral (hasta 5)</h2>
      <!-- Repite este bloque 5 veces -->
      <div class="experiencia">
        <input type="text" name="el1_empresa" placeholder="Empresa" required>
        <input type="text" name="el1_cargo" placeholder="Cargo" required>
        <input type="text" name="el1_jefe" placeholder="Jefe inmediato" required>
        <input type="text" name="el1_telefono" placeholder="Teléfono" required>
        <input type="text" name="el1_ciudad" placeholder="Ciudad" required>
        <input type="date" name="el1_inicio" required>
        <input type="date" name="el1_fin" required>
      </div>
      <br>
      <div class="experiencia">
        <input type="text" name="el2_empresa" placeholder="Empresa" >
        <input type="text" name="el2_cargo" placeholder="Cargo" >
        <input type="text" name="el2_jefe" placeholder="Jefe inmediato" >
        <input type="text" name="el2_telefono" placeholder="Teléfono" >
        <input type="text" name="el2_ciudad" placeholder="Ciudad" >
        <input type="date" name="el2_inicio" >
        <input type="date" name="el2_fin" >
      </div>
      <br>
      <div class="experiencia">
        <input type="text" name="el3_empresa" placeholder="Empresa" >
        <input type="text" name="el3_cargo" placeholder="Cargo" >
        <input type="text" name="el3_jefe" placeholder="Jefe inmediato" >
        <input type="text" name="el3_telefono" placeholder="Teléfono" >
        <input type="text" name="el3_ciudad" placeholder="Ciudad" >
        <input type="date" name="el3_inicio" >
        <input type="date" name="el3_fin" >
      </div>
      <br>
      <div class="experiencia">
        <input type="text" name="el4_empresa" placeholder="Empresa" >
        <input type="text" name="el4_cargo" placeholder="Cargo" >
        <input type="text" name="el4_jefe" placeholder="Jefe inmediato" >
        <input type="text" name="el4_telefono" placeholder="Teléfono" >
        <input type="text" name="el4_ciudad" placeholder="Ciudad" >
        <input type="date" name="el4_inicio" >
        <input type="date" name="el4_fin" >
      </div>
      <br>
      <div class="experiencia">
        <input type="text" name="el5_empresa" placeholder="Empresa" >
        <input type="text" name="el5_cargo" placeholder="Cargo" >
        <input type="text" name="el5_jefe" placeholder="Jefe inmediato" >
        <input type="text" name="el5_telefono" placeholder="Teléfono" >
        <input type="text" name="el5_ciudad" placeholder="Ciudad" >
        <input type="date" name="el5_inicio" >
        <input type="date" name="el5_fin" >
      </div>
      <!-- Repetir el bloque para el2_*, el3_*, etc. -->
    </div>

    <!-- Seccion 7: ICBF -->
    <div class="seccion" id="seccion-7" style="display:none;">
      <h2>Trabajo con programas de ICBF</h2>
      <label><input type="checkbox" name="trabaja_icbf"> ¿Ha trabajado con programas del ICBF?</label>
    </div>

    <!-- Seccion 8: Referencias -->
    <div class="seccion" id="seccion-8" style="display:none;">
      <h2>Referencias (hasta 3)</h2>
      <input type="text" name="ref1_nombre" placeholder="Nombre" required>
      <input type="text" name="ref1_cargo" placeholder="Cargo" required>
      <input type="text" name="ref1_telefono" placeholder="Teléfono" required>
      <br>
      <input type="text" name="ref2_nombre" placeholder="Nombre">
      <input type="text" name="ref2_cargo" placeholder="Cargo">
      <input type="text" name="ref2_telefono" placeholder="Teléfono">
      <br>
      <input type="text" name="ref3_nombre" placeholder="Nombre">
      <input type="text" name="ref3_cargo" placeholder="Cargo">
      <input type="text" name="ref3_telefono" placeholder="Teléfono">
    </div>

    <!-- Seccion 9: Firma -->
    <div class="seccion" id="seccion-9" style="display:none;">
      <h2>Firma digital</h2>
      <input type="file" name="firma_digital" accept=".pdf" required>
      <p>Para efectos legales, certifico que los datos proporcionados son verídicos y completos.</p>
    </div>

    <!-- Navegación -->
    <div id="navegacion">
      <button type="button" id="btn-volver" onclick="anterior()" disabled>Volver</button>
      <button type="button" id="btn-continuar" onclick="siguiente()">Continuar</button>
      <button type="submit" id="btn-enviar" style="display:none;">Enviar</button>
    </div>
  </form>

  <script src="js/formulario.js"></script>
</body>
</html>