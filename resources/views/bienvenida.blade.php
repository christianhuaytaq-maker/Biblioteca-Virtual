<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a la Biblioteca Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
            position: relative;
            overflow: hidden;

            /* IMAGEN DE FONDO - CUBRE TODA LA PANTALLA */
            background-image: url('http://127.0.0.1:8000/imagenes/colegio_fondo.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        /* Capa con degradado azul-violeta encima de la imagen */
        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg,
                rgba(88, 101, 200, 0.72) 0%,
                rgba(130, 80, 180, 0.72) 50%,
                rgba(80, 100, 210, 0.72) 100%);
            z-index: 1;
        }

        /* Burbujas flotantes decorativas */
        .burbuja {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: flotar 20s infinite ease-in-out;
            z-index: 2;
            backdrop-filter: blur(4px);
        }
        .burbuja:nth-child(1) { width: 130px; height: 130px; top: 12%; left: 8%; animation-delay: 0s; }
        .burbuja:nth-child(2) { width: 190px; height: 190px; bottom: 12%; right: 8%; animation-delay: 3s; }
        .burbuja:nth-child(3) { width: 90px; height: 90px; top: 65%; left: 12%; animation-delay: 6s; }
        .burbuja:nth-child(4) { width: 150px; height: 150px; top: 18%; right: 15%; animation-delay: 9s; }
        .burbuja:nth-child(5) { width: 70px; height: 70px; bottom: 25%; left: 25%; animation-delay: 12s; }

        @keyframes flotar {
            0%, 100% { transform: translateY(0) scale(1); opacity: 0.08; }
            50% { transform: translateY(-50px) scale(1.2); opacity: 0.22; }
        }

        /* Tarjeta de cristal - MÁS TRANSPARENTE */
        .card-bienvenida {
            position: relative;
            z-index: 10;
            background: rgba(255, 255, 255, 0.08);   /* ← Transparencia aumentada */
            backdrop-filter: blur(25px) saturate(180%);
            -webkit-backdrop-filter: blur(25px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 28px;
            padding: 55px 65px;
            max-width: 720px;
            width: 90%;
            text-align: center;
            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.35),
                0 0 80px rgba(255, 255, 255, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.4),
                inset 0 -1px 0 rgba(255, 255, 255, 0.1);
            animation: aparecer 1.2s cubic-bezier(0.22, 1, 0.36, 1);
        }

        /* Brillo que se mueve por encima de la tarjeta */
        .card-bienvenida::before {
            content: "";
            position: absolute;
            top: 0; left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg,
                transparent,
                rgba(255, 255, 255, 0.15),
                transparent);
            animation: brillo 4s infinite;
            border-radius: 28px;
            pointer-events: none;
        }

        @keyframes brillo {
            0% { left: -100%; }
            50%, 100% { left: 100%; }
        }

        @keyframes aparecer {
            from { opacity: 0; transform: translateY(40px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        /* Logo del colegio en círculo */
        .img-colegio {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(255, 255, 255, 0.85);
            box-shadow:
                0 10px 35px rgba(0, 0, 0, 0.5),
                0 0 40px rgba(255, 255, 255, 0.3);
            margin-bottom: 25px;
            background: white;
            animation: flotarLogo 4s ease-in-out infinite;
        }

        @keyframes flotarLogo {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-10px) scale(1.03); }
        }

        /* Título con efecto de brillo */
        h1 {
            color: #ffffff;
            font-weight: 800;
            font-size: 3rem;
            letter-spacing: 2px;
            text-shadow:
                0 0 20px rgba(255, 255, 255, 0.5),
                0 0 40px rgba(255, 255, 255, 0.3),
                2px 2px 15px rgba(0, 0, 0, 0.6);
            margin-bottom: 15px;
            animation: brilloTitulo 3s ease-in-out infinite;
        }

        @keyframes brilloTitulo {
            0%, 100% { text-shadow:
                0 0 20px rgba(255, 255, 255, 0.5),
                0 0 40px rgba(255, 255, 255, 0.3),
                2px 2px 15px rgba(0, 0, 0, 0.6); }
            50% { text-shadow:
                0 0 30px rgba(255, 255, 255, 0.8),
                0 0 60px rgba(255, 255, 255, 0.5),
                2px 2px 15px rgba(0, 0, 0, 0.6); }
        }

        /* Línea decorativa con brillo */
        .linea-decorativa {
            width: 120px;
            height: 3px;
            background: linear-gradient(90deg,
                transparent,
                #ffffff,
                transparent);
            margin: 25px auto;
            border-radius: 2px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.9);
            animation: brilloLinea 2s ease-in-out infinite;
        }

        @keyframes brilloLinea {
            0%, 100% { width: 100px; opacity: 0.7; }
            50% { width: 140px; opacity: 1; }
        }

        /* Subtítulo */
        .subtitulo {
            color: #ffffff;
            font-size: 1.15rem;
            line-height: 1.8;
            margin-bottom: 40px;
            text-shadow: 1px 1px 10px rgba(0, 0, 0, 0.7);
            font-weight: 400;
        }

        /* Botón entrar con efecto neón */
        .btn-entrar {
            background: rgba(255, 255, 255, 0.95);
            color: #5b3fa0;
            border: 2px solid rgba(255, 255, 255, 0.9);
            padding: 16px 50px;
            border-radius: 50px;
            font-size: 1.15rem;
            font-weight: bold;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            transition: all 0.4s ease;
            box-shadow:
                0 8px 30px rgba(0, 0, 0, 0.3),
                0 0 30px rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-entrar::before {
            content: "";
            position: absolute;
            top: 0; left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg,
                transparent,
                rgba(118, 75, 162, 0.3),
                transparent);
            transition: left 0.5s;
        }

        .btn-entrar:hover::before {
            left: 100%;
        }

        .btn-entrar:hover {
            transform: translateY(-4px) scale(1.06);
            box-shadow:
                0 15px 45px rgba(0, 0, 0, 0.4),
                0 0 50px rgba(255, 255, 255, 0.6);
            color: #4a2d85;
            background: #ffffff;
        }

        /* Nombre del colegio */
        .nombre-colegio {
            color: rgba(255, 255, 255, 0.95);
            font-size: 0.9rem;
            margin-top: 35px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 600;
            text-shadow: 1px 1px 8px rgba(0, 0, 0, 0.6);
            opacity: 0.95;
        }

        /* Responsive para móviles */
        @media (max-width: 768px) {
            .card-bienvenida { padding: 40px 30px; }
            h1 { font-size: 2rem; }
            .subtitulo { font-size: 1rem; }
            .img-colegio { width: 90px; height: 90px; }
        }
    </style>
</head>
<body>

    <!-- Burbujas decorativas de fondo -->
    <div class="burbuja"></div>
    <div class="burbuja"></div>
    <div class="burbuja"></div>
    <div class="burbuja"></div>
    <div class="burbuja"></div>

    <!-- Tarjeta de bienvenida con efecto cristal -->
    <div class="card-bienvenida">

        <!-- Logo del colegio -->
        <img src="http://127.0.0.1:8000/imagenes/colegio.jpg"
             alt="Colegio"
             class="img-colegio">

        <!-- Título principal -->
        <h1>Biblioteca Virtual</h1>

        <!-- Línea decorativa -->
        <div class="linea-decorativa"></div>

        <!-- Subtítulo -->
        <p class="subtitulo">
            Bienvenido al sistema de gestión de tu biblioteca personal.<br>
            Explora, administra y organiza todos tus libros, autores, editoriales y préstamos de forma sencilla y moderna.
        </p>

        <!-- Botón entrar -->
        <a href="{{ route('panel') }}" class="btn-entrar">
            <i class="bi bi-box-arrow-in-right"></i> Entrar al Sistema
        </a>

        <!-- Nombre del colegio -->
        <p class="nombre-colegio">
            <i class="bi bi-mortarboard-fill"></i> Institución Educativa César Augusto Guardia Mayorga
        </p>
    </div>

</body>
</html>
