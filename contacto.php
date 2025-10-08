<php>
  <?php
  include("db/conexion.php");
  
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $nombre   = $_POST['nombre'];
      $correo   = $_POST['email'];
      $telefono = $_POST['telefono'];
      $asunto   = $_POST['asunto'];
      $mensaje   = $_POST['mensaje'];

      $stmt = $conn->prepare("INSERT INTO formulario (nombre, correo, telefono, asunto, mensaje) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("sssss", $nombre, $correo, $telefono, $asunto, $mensaje);

      if ($stmt->execute()) {
        $msg = "Tu mensaje se envió correctamente.";
      echo "<script>document.addEventListener('DOMContentLoaded', function(){ var m = " . json_encode($msg) . ";
      var d = document.createElement('div');
      d.textContent = m;
      Object.assign(d.style, {position:'fixed', left:'50%', top:'20px', transform:'translateX(-50%)', background:'#1f2937', color:'#fff', padding:'12px 18px', borderRadius:'6px', zIndex:9999, fontSize:'16px', boxShadow:'0 2px 10px rgba(0,0,0,0.2)'});
      document.body.appendChild(d);
      setTimeout(function(){
        try { window.close(); } catch(e) {}
        setTimeout(function(){
        if (!window.closed) { window.location = 'Contacto.php'; }
        }, 200);
      }, 3000);
      });</script>";
    } else {
      $err = "Error: " . $stmt->error;
      echo "<script>document.addEventListener('DOMContentLoaded', function(){ var m = " . json_encode($err) . ";
      var d = document.createElement('div');
      d.textContent = m;
      Object.assign(d.style, {position:'fixed', left:'50%', top:'20px', transform:'translateX(-50%)', background:'#7f1d1d', color:'#fff', padding:'12px 18px', borderRadius:'6px', zIndex:9999, fontSize:'16px', boxShadow:'0 2px 10px rgba(0,0,0,0.2)'});
      document.body.appendChild(d);
      setTimeout(function(){
        try { window.close(); } catch(e) {}
        setTimeout(function(){
        if (!window.closed) { window.location = 'Contacto.php'; }
        }, 200);
      }, 3000);
      });</script>";
    }

      $stmt->close();
      $conn->close();

  }
  ?>        
</php>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mi pagina juan gomez </title>
   <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* ====== Header ====== */
    header {
      background: #162fbbff;
      color: white;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header h1 {
      font-size: 22px;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
    }

    nav a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
    }

    nav a:hover {
      color: #2400f3ff;
    }

    /* ====== Contenido principal ====== */
    main {
      flex: 1;
      padding: 40px;
      background: #ffffffff;
    }

    main h2 {
      margin-bottom: 15px;
    }

    /* ====== Footer ====== */
    footer {
      background: #f30000ff;
      color: white;
      text-align: center;
      padding: 15px 0;
    }
  </style>
</head>

<body>
	<header>
		<h1>Aqui van contactos Frontend</h1>
		<nav>
			<ul>
				<li><a href="Mascoexoticos.php">Inicio</a></li>
				<li><a href="Acerca.php">Acerca</a></li>
				<li><a href="Contacto.php">Contacto</a></li>
			</ul>
		</nav>
	</header>

	<main>
    <div class="contact-container">
      <h2>Contacto</h2>

      <form action="Contacto.php" method="post" novalidate>
        <div class="form-grid">
          <div class="form-group">
            <label for="nombre">Nombre completo</label>
            <input id="nombre" name="nombre" type="text" placeholder="Tu nombre" required>
          </div>

          <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input id="email" name="email" type="email" placeholder="tucorreo@ejemplo.com" required>
          </div>

          <div class="form-group">
            <label for="telefono">Telefono (opcional)</label>
            <input id="telefono" name="telefono" type="text" placeholder="+34 600 000 000">
          </div>

          <div class="form-group">
            <label for="asunto">Asunto</label>
            <input id="asunto" name="asunto" type="text" placeholder="Breve resumen" required>
          </div>

          <div class="form-group" style="grid-column: 1 / -1;">
            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje" name="mensaje" placeholder="Escribe tu mensaje..." required></textarea>
            <div class="hint">Maximo 2000 caracteres.</div>
          </div>

          <div class="actions">
            <button type="reset" class="btn btn-secondary">Limpiar</button>
            <button type="submit" class="btn btn-primary">Enviar mensaje</button>
          </div>
        </div>      
      </form>
    </div>
	</main>

	<footer>
		<p>@ Mi Proyecto Web - Todos los derechos reservados</p>
	</footer>

  <script>
      (function(){
        var mensaje = document.getElementById('mensaje');
        var counter = document.getElementById('counter');
        var form = document.querySelector('.contact-form');
        var submit = document.getElementById('submitBtn');

        function updateCount(){
          var len = mensaje.value.length;
          counter.textContent = len + ' / ' + (mensaje.maxLength || 2000);
          if(len > (mensaje.maxLength - 20)){
            counter.style.color = '#b45309';
          } else {
            counter.style.color = '';
          }
        }
        mensaje.addEventListener('input', updateCount);
        updateCount();

        // simple client-side validation feedback
        form.addEventListener('submit', function(e){
          if(!form.checkValidity()){
            e.preventDefault();
            // focus first invalid
            var firstInvalid = form.querySelector(':invalid');
            if(firstInvalid) firstInvalid.focus();
            // visual hint
            submit.textContent = 'Corrige los campos';
            setTimeout(function(){ submit.textContent = 'Enviar mensaje'; }, 1800);
          } else {
            // prevent double submit UX: disable button briefly while submitting
            submit.disabled = true;
            submit.style.opacity = '.7';
            setTimeout(function(){ submit.disabled = false; submit.style.opacity = ''; }, 3000);
          }
        });

        // reset handler
        document.getElementById('resetBtn').addEventListener('click', function(){
          setTimeout(updateCount, 10);
        });
      })();
    </script>

</body>
</html>