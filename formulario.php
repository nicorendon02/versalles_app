<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario Aplicaciones Versalles</title>
  <link rel="stylesheet" href="css/estilos.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <form id="formulario" enctype="multipart/form-data">
    <!-- Seccion 1: Datos personales -->
    <div class="seccion" id="seccion-1">
      <h2>Datos personales</h2>
      <input type="text" name="nombres" placeholder="Nombres" required>
      <input type="text" name="apellidos" placeholder="Apellidos" required>
      <input type="number" name="edad" placeholder="Edad" required>
      <input type="text" name="profesion" placeholder="Profesión" required>
      <input type="text" name="cedula" placeholder="Cédula" required>
      <input type="text" name="direccion" placeholder="Dirección" required>
      <input type="text" name="celular" placeholder="Celular" required>
      <input type="email" name="correo" placeholder="Correo electrónico" required>
      <input type="text" name="ciudad" placeholder="Ciudad" required>
      <textarea name="perfil" placeholder="Perfil profesional (máx 100 palabras)" maxlength="800" required></textarea>
      <label>Foto reciente (PNG/JPG, máx 5MB)</label>
      <input type="file" name="foto" accept=".png, .jpg, .jpeg" required>
      <label>Tarjeta profesional (PDF, máx 5MB)</label>
      <input type="file" name="tarjeta" accept=".pdf" required>
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
      <input type="text" name="ev2_nombre" placeholder="Nombre del evento">
      <input type="text" name="ev2_organizacion" placeholder="Organización">
      <input type="date" name="ev2_fecha">
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
      <!-- Repetir el bloque para el2_*, el3_*, etc. -->
    </div>

    <!-- Seccion 7: ICBF -->
    <div class="seccion" id="seccion-7" style="display:none;">
      <h2>Trabajo con programas de ICBF</h2>
      <label><input type="checkbox" name="trabaja_icbf"> He trabajado con programas del ICBF</label>
    </div>

    <!-- Seccion 8: Referencias -->
    <div class="seccion" id="seccion-8" style="display:none;">
      <h2>Referencias (hasta 3)</h2>
      <input type="text" name="ref1_nombre" placeholder="Nombre">
      <input type="text" name="ref1_cargo" placeholder="Cargo">
      <input type="text" name="ref1_telefono" placeholder="Teléfono">
      <!-- repetir para ref2 y ref3 -->
    </div>

    <!-- Seccion 9: Firma -->
    <div class="seccion" id="seccion-9" style="display:none;">
      <h2>Firma digital</h2>
      <input type="file" name="firma_digital" accept=".pdf" required>
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