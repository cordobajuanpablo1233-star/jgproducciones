<php>
</php>


<!DOCTYPE html>
<html Lang="es">
<head>
 <Meta chartset="UTF-8">
 <Meta name="viewport" Content="width=device-width, Initial-scale=1.0">
 <title>Pagina juan gomez</title>
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
      background: #ED0909;
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
      color: #FF0000;
    }

    /* ====== Contenido principal ====== */
    main {
      flex: 1;
      padding: 40px;
      background: #FFFFFF;
    }

    main h2 {
      margin-bottom: 15px;
    }

    /* ====== Footer ====== */
    footer {
      background: #0911ED;
      color: white;
      text-align: center;
      padding: 15px 0;
    }
  </style>
</head>
<body>

	<header>
		<h1>Mi web Frontend</h1>
		<nav>
			<ul>
				<li><a href="jgproducciones.php">Inicio</a></li>
				<li><a href="acerca.php">Acerca</a></li>
				<li><a href="contacto.php">Contacto</a></li>
			</ul>
		</nav>
	</header>

	<main>
	<h1>Bienvenido a mi sitio web</h1>
	<p>Equipos de alta calidad </p>
	</main>

	<footer>
	<p>Realizado por Juan gomez </p>
	</footer>
</body>
</html>