<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia de Combate - LoL</title>
    <style>
        /* Estilos con temática de League of Legends */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #0a0a12;
            color: #e0e0e0;
            background-image: url('https://images.contentstack.io/v3/assets/blt187521ff0727be24/blt3a8eecf655d9347f/60ee0f3f5f6b363c951e5a6f/league-of-legends.jpg');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }

        .overlay {
            background-color: rgba(10, 10, 18, 0.85);
            min-height: 100vh;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background-color: rgba(20, 20, 40, 0.9);
            border-bottom: 2px solid #c8aa6e;
        }

        .logo {
            font-family: 'Beaufort for LOL', serif;
            font-size: 2.5rem;
            font-weight: bold;
            color: #c8aa6e;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 30px;
        }

        nav ul li a {
            color: #e0e0e0;
            text-decoration: none;
            font-weight: 500;
            font-size: 1.1rem;
            transition: color 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        nav ul li a:hover {
            color: #c8aa6e;
        }

        .hero {
            padding: 100px 50px;
            text-align: center;
        }

        .hero h1 {
            font-family: 'Beaufort for LOL', serif;
            font-size: 4rem;
            color: #c8aa6e;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 5px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero h2 {
            font-size: 2.5rem;
            color: #fff;
            margin-bottom: 30px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .hero p {
            max-width: 800px;
            margin: 0 auto;
            font-size: 1.2rem;
            line-height: 1.6;
        }

        .signup-btn {
            display: inline-block;
            margin-top: 40px;
            padding: 15px 40px;
            background-color: #c8aa6e;
            color: #1e2328;
            text-decoration: none;
            font-weight: bold;
            border-radius: 4px;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .signup-btn:hover {
            background-color: #e6d7a8;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(200, 170, 110, 0.4);
        }
    </style>
</head>
<body>
    <div class="overlay">
        <header>
            <div class="logo">Academia de Combate</div>
            <nav>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Acerca</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li><a href="#" class="signup-btn">Regístrate</a></li>
                </ul>
            </nav>
        </header>

        <section class="hero">
            <h1>Bienvenido</h1>
            <h2>Domina el Campo de la Justicia</h2>
            <p>Únete a nuestra academia de combate y perfecciona tus habilidades en League of Legends. Nuestros instructores, veteranos de alto elo, te guiarán a través de estrategias avanzadas, mecánicas de campeones y toma de decisiones para que alcances tu máximo potencial en la Grieta del Invocador.</p>
            <a href="/academia/home" class="signup-btn">Empieza tu Entrenamiento</a>
        </section>
    </div>
</body>
</html>