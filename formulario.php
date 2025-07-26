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
  max-width: 600px; /* establece un ancho máximo fijo para todos los inputs */
  padding: 0.6rem 0.75rem;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 8px;
  height: 42px;
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

.form-row label{
  border: none;
  text-align: right;
}

.checkbox-icbf {
  display: flex;
  align-items: center;
  padding: 1rem;
  border: 1px solid #ccc;
  border-radius: 8px;
  background-color: #f9f9f9;
  margin-bottom: 1rem;
}

.checkbox-icbf label {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-weight: 500;
  font-size: 1rem;
}

.checkbox-icbf input[type="checkbox"] {
  width: 18px;
  height: 18px;
  cursor: pointer;
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
        <!-- Dropdown para profesiones -->
        <select id="profesion" name="profesion" required>
          <option value="">Seleccione una profesión</option>
          <option value="Actuacion">Actuación, Dirección escénica y doblaje en Radio y Televisión</option>
          <option value="Administrador">Administración de Empresas</option>
          <option value="Administrador">Administración de empresas agropecuarias, Administración agrícola o Administración agropecuaria</option>
          <option value="Administrador">Administración Pública</option>
          <option value="Agronomo">Agronómicas y Forestales (Ingeniería Agronómica, Ingeniería Forestal, Ingeniería Agrícola, Agrología y Agronomía)</option>
          <option value="Arquitecto">Arquitectura, Ingeniería y Profesiones auxiliares</option>
          <option value="Bacteriologo">Bacteriología</option>
          <option value="Contador">Contaduría Pública</option>
          <option value="Abogado">Derecho</option>
          <option value="Diseñador">Diseño Industrial</option>
          <option value="Enfermero">Enfermería</option>
          <option value="Fisioterapeuta">Fisioterapia</option>
          <option value="Fonoaudiólogo">Fonoaudiología</option>
          <option value="Ingeniero">Ingeniería y de sus profesiones afines y de sus profesiones auxiliares (Ingeniería Forestal, Eléctrica, Agronómica y Agrícola)</option>
          <option value="Ingeniero">Ingeniería de Petróleos</option>
          <option value="Ingeniero">Ingeniería Pesquera</option>
          <option value="Medico">Medicina y Cirugía</option>
          <option value="Odontologo">Odontología</option>
          <option value="Optometrista">Optometría</option>
          <option value="Psicologo">Psicología</option>
          <option value="Fotografo">Actividad Técnica o profesión tecnológica especializada de la fotografía y la camarografía</option>
          <option value="Terapeuta">Terapia ocupacional</option>
          <option value="TrabajadorSocial">Trabajo Social</option>
          <option value="Otro">Otro</option>
        </select>
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
        <label for="perfil">Perfil profesional (máx 800 caracteres)</label>
        <textarea id="perfil" name="perfil" maxlength="800" required></textarea>
      </div>

      <div class="form-row">
        <label for="foto">Foto reciente (PNG/JPG, máx 5MB)</label>
        <input type="file" id="foto" name="foto" accept=".png, .jpg, .jpeg" required>
      </div>
      
      <div class="form-row" id="tarjeta-profesional">
        <label for="tarjeta">Tarjeta profesional (PDF, máx 5MB)</label>
        <input type="file" id="tarjeta" name="tarjeta" accept=".pdf">
      </div>
    </div>


    <!-- Seccion 2: Formación académica -->
    <div class="seccion" id="seccion-2" style="display:none;">
      <h2>Formación académica (hasta 5)</h2>
      <p style="text-align: center;">Por favor, adjunte los datos de sus títulos de bachiller, técnicos o tecnológicos con sus respectivos certificados en formato PDF.
        <br>No es necesario completar todas las formaciones.
      </p>
      <br>
      <!-- Formación 1 (obligatoria) -->
      <h3>Formación académica 1</h3>
      <input type="text" name="fa1_titulo" placeholder="Título obtenido" required>
      <input type="text" name="fa1_institucion" placeholder="Institución" required>
      <p>Fecha de inicio:</p>
      <input type="date" name="fa1_inicio" required>
      <p>Fecha de finalización:</p>
      <input type="date" name="fa1_fin" required>
      <p>Adjunte diploma y acta de grado en un mismo PDF:</p>
      <input type="file" name="fa1_certificado" accept=".pdf" required>
      <br>

      <!-- Formación 2 -->
      <h3>Formación académica 2 (opcional)</h3>
      <input type="text" name="fa2_titulo" placeholder="Título obtenido">
      <input type="text" name="fa2_institucion" placeholder="Institución">
      <p>Fecha de inicio:</p>
      <input type="date" name="fa2_inicio">
      <p>Fecha de finalización:</p>
      <input type="date" name="fa2_fin">
      <p>Adjunte diploma y acta de grado en un mismo PDF:</p>
      <input type="file" name="fa2_certificado" accept=".pdf">
      <br>

      <!-- Formación 3 -->
      <h3>Formación académica 3 (opcional)</h3>
      <input type="text" name="fa3_titulo" placeholder="Título obtenido">
      <input type="text" name="fa3_institucion" placeholder="Institución">
      <p>Fecha de inicio:</p>
      <input type="date" name="fa3_inicio">
      <p>Fecha de finalización:</p>
      <input type="date" name="fa3_fin">
      <p>Adjunte diploma y acta de grado en un mismo PDF:</p>
      <input type="file" name="fa3_certificado" accept=".pdf">
      <br>

      <!-- Formación 4 -->
      <h3>Formación académica 4 (opcional)</h3>
      <input type="text" name="fa4_titulo" placeholder="Título obtenido">
      <input type="text" name="fa4_institucion" placeholder="Institución">
      <p>Fecha de inicio:</p>
      <input type="date" name="fa4_inicio">
      <p>Fecha de finalización:</p>
      <input type="date" name="fa4_fin">
      <p>Adjunte diploma y acta de grado en un mismo PDF:</p>
      <input type="file" name="fa4_certificado" accept=".pdf">
      <br>

      <!-- Formación 5 -->
      <h3>Formación académica 5 (opcional)</h3>
      <input type="text" name="fa5_titulo" placeholder="Título obtenido">
      <input type="text" name="fa5_institucion" placeholder="Institución">
      <p>Fecha de inicio:</p>
      <input type="date" name="fa5_inicio">
      <p>Fecha de finalización:</p>
      <input type="date" name="fa5_fin">
      <p>Adjunte diploma y acta de grado en un mismo PDF:</p>
      <input type="file" name="fa5_certificado" accept=".pdf">
    </div>

    <!-- Seccion 3: Formación profesional -->
    <div class="seccion" id="seccion-3" style="display:none;">
      <h2>Formación profesional (hasta 5)</h2>
      <p style="text-align: center;">Por favor, adjunte los datos de sus títulos de pregrado, diplomados o posgrados con sus respectivos certificados en PDF.
        <br>No es necesario completar todas las formaciones.
      </p>
      <br>
      <h3>Formación Profesional 1 (título de pregrado)</h3>
      <input type="text" name="fp1_titulo" placeholder="Título obtenido" required>
      <input type="text" name="fp1_institucion" placeholder="Institución" required>
      <p>Fecha de inicio:</p>
      <input type="date" name="fp1_inicio" required>
      <p>Fecha de finalización:</p>
      <input type="date" name="fp1_fin" required>
      <p>Adjunte diploma y acta de grado en un mismo PDF:</p>
      <input type="file" name="fp1_certificado" accept=".pdf" required>
      <br>

      <h3>Formación Profesional 2 (opcional)</h3>
      <input type="text" name="fp2_titulo" placeholder="Título obtenido">
      <input type="text" name="fp2_institucion" placeholder="Institución">
      <p>Fecha de inicio:</p>
      <input type="date" name="fp2_inicio">
      <p>Fecha de finalización:</p>
      <input type="date" name="fp2_fin">
      <p>Adjunte diploma y acta de grado en un mismo PDF:</p>
      <input type="file" name="fp2_certificado" accept=".pdf">
      <br>

      <h3>Formación Profesional 3 (opcional)</h3>
      <input type="text" name="fp3_titulo" placeholder="Título obtenido">
      <input type="text" name="fp3_institucion" placeholder="Institución">
      <p>Fecha de inicio:</p>
      <input type="date" name="fp3_inicio">
      <p>Fecha de finalización:</p>
      <input type="date" name="fp3_fin">
      <p>Adjunte diploma y acta de grado en un mismo PDF:</p>
      <input type="file" name="fp3_certificado" accept=".pdf">
      <br>

      <h3>Formación Profesional 4 (opcional)</h3>
      <input type="text" name="fp4_titulo" placeholder="Título obtenido">
      <input type="text" name="fp4_institucion" placeholder="Institución">
      <p>Fecha de inicio:</p>
      <input type="date" name="fp4_inicio">
      <p>Fecha de finalización:</p>
      <input type="date" name="fp4_fin">
      <p>Adjunte diploma y acta de grado en un mismo PDF:</p>
      <input type="file" name="fp4_certificado" accept=".pdf">
      <br>

      <h3>Formación Profesional 5 (opcional)</h3>
      <input type="text" name="fp5_titulo" placeholder="Título obtenido">
      <input type="text" name="fp5_institucion" placeholder="Institución">
      <p>Fecha de inicio:</p>
      <input type="date" name="fp5_inicio">
      <p>Fecha de finalización:</p>
      <input type="date" name="fp5_fin">
      <p>Adjunte diploma y acta de grado en un mismo PDF:</p>
      <input type="file" name="fp5_certificado" accept=".pdf">
      <br>
    </div>

    <!-- Seccion 4: Experiencia académica -->
    <div class="seccion" id="seccion-4" style="display:none;">
      <h2>Experiencia académica (hasta 3)</h2>
      <p style="text-align: center;">Por favor, adjunte los datos de sus experiencias de pasantías o prácticas.
        <br>No es necesario completar todas las experiencias.
      </p>
      <br>
      <h3>Experiencia 1</h3>
      <input type="text" name="ea1_nombre" placeholder="Nombre de la experiencia" required>
      <input type="text" name="ea1_institucion" placeholder="Institución" required>
      <input type="date" name="ea1_inicio" required>
      <input type="date" name="ea1_fin" required>
      <input type="file" name="ea1_certificado" accept=".pdf" required>
      <br>
      <h3>Experiencia 2 (opcional)</h3>
      <input type="text" name="ea2_nombre" placeholder="Nombre de la experiencia">
      <input type="text" name="ea2_institucion" placeholder="Institución">
      <input type="date" name="ea2_inicio">
      <input type="date" name="ea2_fin">
      <input type="file" name="ea2_certificado" accept=".pdf">
      <br>
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
      <p style="text-align: center;">Por favor, describa los eventos relevantes a los que ha asistido.
        <br>No es necesario completar esta sección.
      </p>
      <br>
      <h3>Evento 1</h3>
      <input type="text" name="ev1_nombre" placeholder="Nombre del evento">
      <input type="text" name="ev1_organizacion" placeholder="Organización">
      <input type="date" name="ev1_fecha">
      <br>
      <h3>Evento 2</h3>
      <input type="text" name="ev2_nombre" placeholder="Nombre del evento">
      <input type="text" name="ev2_organizacion" placeholder="Organización">
      <input type="date" name="ev2_fecha">
      <br>
      <h3>Evento 3</h3>
      <input type="text" name="ev3_nombre" placeholder="Nombre del evento">
      <input type="text" name="ev3_organizacion" placeholder="Organización">
      <input type="date" name="ev3_fecha">
    </div>

    <!-- Seccion 6: Experiencia laboral -->
    <div class="seccion" id="seccion-6" style="display:none;">
      <h2>Experiencia laboral (hasta 5)</h2>
      <p style="text-align: center;">Por favor, describa sus experiencias laborales más relevantes con sus respectivos certificados en PDF.
        <br>No es necesario completar todas las experiencias.
      </p>
      <!-- Repite este bloque 5 veces -->
      <div class="experiencia">
        <h3>Experiencia laboral 1</h3>
        <input type="text" name="el1_empresa" placeholder="Empresa" required>
        <input type="text" name="el1_cargo" placeholder="Cargo" required>
        <input type="text" name="el1_jefe" placeholder="Jefe inmediato" required>
        <input type="text" name="el1_telefono" placeholder="Teléfono" required>
        <input type="text" name="el1_ciudad" placeholder="Ciudad" required>
        <p>Fecha de inicio:</p>
        <input type="date" name="el1_inicio" required>
        <p>Fecha de finalización:</p>
        <input type="date" name="el1_fin" required>
        <p>Adjunte certificado laboral (PDF):</p>
        <input type="file" name="el1_certificado" accept=".pdf">

      </div>
      <br>
      <div class="experiencia">
        <h3>Experiencia laboral 2</h3>
        <input type="text" name="el2_empresa" placeholder="Empresa" >
        <input type="text" name="el2_cargo" placeholder="Cargo" >
        <input type="text" name="el2_jefe" placeholder="Jefe inmediato" >
        <input type="text" name="el2_telefono" placeholder="Teléfono" >
        <input type="text" name="el2_ciudad" placeholder="Ciudad" >
        <p>Fecha de inicio:</p>
        <input type="date" name="el2_inicio" >
        <p>Fecha de finalización:</p>
        <input type="date" name="el2_fin" >
        <p>Adjunte certificado laboral (PDF):</p>
        <input type="file" name="el2_certificado" accept=".pdf">
      </div>
      <br>
      <div class="experiencia">
        <h3>Experiencia laboral 3</h3>
        <input type="text" name="el3_empresa" placeholder="Empresa" >
        <input type="text" name="el3_cargo" placeholder="Cargo" >
        <input type="text" name="el3_jefe" placeholder="Jefe inmediato" >
        <input type="text" name="el3_telefono" placeholder="Teléfono" >
        <input type="text" name="el3_ciudad" placeholder="Ciudad" >
        <p>Fecha de inicio:</p>
        <input type="date" name="el3_inicio" >
        <p>Fecha de finalización:</p>
        <input type="date" name="el3_fin" >
        <p>Adjunte certificado laboral (PDF):</p>
        <input type="file" name="el3_certificado" accept=".pdf">
      </div>
      <br>
      <div class="experiencia">
        <h3>Experiencia laboral 4</h3>
        <input type="text" name="el4_empresa" placeholder="Empresa" >
        <input type="text" name="el4_cargo" placeholder="Cargo" >
        <input type="text" name="el4_jefe" placeholder="Jefe inmediato" >
        <input type="text" name="el4_telefono" placeholder="Teléfono" >
        <input type="text" name="el4_ciudad" placeholder="Ciudad" >
        <p>Fecha de inicio:</p>
        <input type="date" name="el4_inicio" >
        <p>Fecha de finalización:</p>
        <input type="date" name="el4_fin" >
        <p>Adjunte certificado laboral (PDF):</p>
        <input type="file" name="el4_certificado" accept=".pdf">
      </div>
      <br>
      <div class="experiencia">
        <h3>Experiencia laboral 5</h3>
        <input type="text" name="el5_empresa" placeholder="Empresa" >
        <input type="text" name="el5_cargo" placeholder="Cargo" >
        <input type="text" name="el5_jefe" placeholder="Jefe inmediato" >
        <input type="text" name="el5_telefono" placeholder="Teléfono" >
        <input type="text" name="el5_ciudad" placeholder="Ciudad" >
        <p>Fecha de inicio:</p>
        <input type="date" name="el5_inicio" >
        <p>Fecha de finalización:</p>
        <input type="date" name="el5_fin" >
        <p>Adjunte certificado laboral (PDF):</p>
        <input type="file" name="el5_certificado" accept=".pdf">
      </div>
      <!-- Repetir el bloque para el2_*, el3_*, etc. -->
    </div>

    <!-- Seccion 7: ICBF -->
    <div class="seccion" id="seccion-7" style="display:none;">
      <h2>Trabajo con programas de ICBF</h2>
      <p style="text-align: center;">Si ha trabajado con programas del ICBF, por favor de clic en la casilla y complete los campos requeridos.
        <br>No es necesario completar todas las experiencias.
      </p>
      <br>
      <div class="form-row checkbox-icbf">
        <label for="trabaja_icbf">
          <input type="checkbox" id="trabaja_icbf" name="trabaja_icbf" value="1" onchange="toggleIcbeFields()">
          ¿Ha trabajado con programas del ICBF?
        </label>
      </div>

      <div id="icbfFields" style="display:none;">
        <!-- Formulario 1 -->
        <div class="icbf-entry">
          <h3>Experiencia con ICBF 1</h3>
          <input type="text" name="icbf_empresa_1" placeholder="Nombre de la empresa" >
          <input type="text" name="icbf_programa_1" placeholder="Nombre del programa" >
          <input type="text" name="icbf_funciones_1" placeholder="Funciones generales" >
          <input type="text" name="icbf_cargo_1" placeholder="Cargo" >
          <p>Fecha de inicio</p>
          <input type="date" name="icbf_inicio_1" >
          <p>Fecha de finalización</p>
          <input type="date" name="icbf_fin_1" >
          <p>Certificado (PDF)</p>
          <input type="file" name="icbf_certificado_1" accept=".pdf">
        </div>
        <br>
        <!-- Formulario 2 -->
        <div class="icbf-entry">
          <h3>Experiencia con ICBF 2</h3>
          <!-- mismos campos que arriba -->
          <input type="text" name="icbf_empresa_2" placeholder="Nombre de la empresa">
          <input type="text" name="icbf_programa_2" placeholder="Nombre del programa">
          <input type="text" name="icbf_funciones_2" placeholder="Funciones generales">
          <input type="text" name="icbf_cargo_2" placeholder="Cargo">
          <p>Fecha de inicio</p>
          <input type="date" name="icbf_inicio_2">
          <p>Fecha de finalización</p>
          <input type="date" name="icbf_fin_2">
          <p>Certificado (PDF)</p>
          <input type="file" name="icbf_certificado_2" accept=".pdf">
        </div>
        <br>
        <!-- Formulario 3 -->
        <div class="icbf-entry">
          <h3>Experiencia con ICBF 3</h3>
          <!-- mismos campos que arriba -->
          <input type="text" name="icbf_empresa_3" placeholder="Nombre de la empresa">
          <input type="text" name="icbf_programa_3" placeholder="Nombre del programa">
          <input type="text" name="icbf_funciones_3" placeholder="Funciones generales">
          <input type="text" name="icbf_cargo_3" placeholder="Cargo">
          <p>Fecha de inicio</p>
          <input type="date" name="icbf_inicio_3">
          <p>Fecha de finalización</p>
          <input type="date" name="icbf_fin_3">
          <p>Certificado (PDF)</p>
          <input type="file" name="icbf_certificado_3" accept=".pdf">
        </div>
      </div>


    </div>

    <!-- Seccion 8: Referencias -->
    <div class="seccion" id="seccion-8" style="display:none;">
      <h2>Referencias (hasta 6)</h2>
      <p style="text-align: center;">Por favor complete los campos con sus referencias personales, familiares y laborales.
        <br>No es necesario completar todas las referencias.
      </p>
      <br>
      <h3>Experiencias personales</h3>
      <input type="text" name="ref1_nombre" placeholder="Nombre" required>
      <input type="text" name="ref1_cargo" placeholder="Cargo" required>
      <input type="text" name="ref1_telefono" placeholder="Teléfono" required>
      <br>
      <input type="text" name="ref2_nombre" placeholder="Nombre">
      <input type="text" name="ref2_cargo" placeholder="Cargo">
      <input type="text" name="ref2_telefono" placeholder="Teléfono">
      <br>
      <h3>Referencias familiares</h3>
      <input type="text" name="ref3_nombre" placeholder="Nombre">
      <input type="text" name="ref3_cargo" placeholder="Cargo">
      <input type="text" name="ref3_telefono" placeholder="Teléfono">
      <br>
      <input type="text" name="ref4_nombre" placeholder="Nombre">
      <input type="text" name="ref4_cargo" placeholder="Cargo">
      <input type="text" name="ref4_telefono" placeholder="Teléfono">
      <br>
      <h3>Referencias laborales</h3>
      <input type="text" name="ref5_nombre" placeholder="Nombre">
      <input type="text" name="ref5_cargo" placeholder="Cargo">
      <input type="text" name="ref5_telefono" placeholder="Teléfono">
      <br>
      <input type="text" name="ref6_nombre" placeholder="Nombre">
      <input type="text" name="ref6_cargo" placeholder="Cargo">
      <input type="text" name="ref6_telefono" placeholder="Teléfono">
    </div>

    <!-- Seccion 9: Antecedentes -->
    <div class="seccion" id="seccion-9" style="display:none;">
      <h2>Antecedentes</h2>
      <p style="text-align: center;">Por favor adjuntar los certificados de antecedentes judiciales, fiscales y disciplinarios en formato PDF.</p>
      <br>
      <h3>Antecedentes Judiciales</h3>
      <input type="file" name="antecedentes_judiciales" accept=".pdf" required>
      <h3>Antecedentes Fiscales</h3>
      <input type="file" name="antecedentes_fiscales" accept=".pdf" required>
      <h3>Antecedentes Disciplinarios</h3>
      <input type="file" name="antecedentes_disciplinarios" accept=".pdf" required>
    </div>

    <!-- Seccion 10: Observaciones -->
    <div class="seccion" id="seccion-10" style="display:none;">
      <h2>Observaciones</h2>
      <p style="text-align: center;">Si tienes algún comentario u observación adicional, por favor escríbelo aquí.</p>
      <br>
      <textarea name="observacion" id="observacion" rows="4" class="form-control" placeholder="Escribe aquí tu comentario..."></textarea>
    </div>

    
    <!-- Seccion 11: Firma -->
    <div class="seccion" id="seccion-11" style="display:none;">
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
  <!-- Script ocultar tarjeta profesional -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const profesionSelect = document.getElementById("profesion");
      const tarjetaContainer = document.getElementById("tarjeta-profesional");

      function toggleTarjetaProfesional() {
        const profesion = profesionSelect.value;
        if (profesion === "Otro" || profesion === "") {
          tarjetaContainer.style.display = "none";
        } else {
          tarjetaContainer.style.display = "flex";
        }
      }

      profesionSelect.addEventListener("change", toggleTarjetaProfesional);
      toggleTarjetaProfesional(); // ejecutar al cargar la página
    });
  </script>
  <script>
    function toggleIcbeFields() {
      const checkbox = document.getElementById("trabaja_icbf");
      const icbfFields = document.getElementById("icbfFields");
      icbfFields.style.display = checkbox.checked ? "block" : "none";
    }
  </script>


</body>
</html>