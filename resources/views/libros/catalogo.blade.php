<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Libros | Biblioteca Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', sans-serif; margin: 0; }
        .sidebar { min-height: 100vh; background-color: #2c3e50; color: white; width: 250px; position: fixed; top: 0; left: 0; padding-top: 20px; }
        .sidebar a { color: #bdc3c7; text-decoration: none; display: block; padding: 12px 20px; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background-color: #34495e; color: white; border-left: 4px solid #1abc9c; }
        .sidebar h4 { padding-left: 20px; margin-bottom: 20px; font-weight: bold; color: #1abc9c; }
        .main-content { margin-left: 250px; padding: 20px; }
        .topbar { background: white; padding: 15px 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-radius: 8px; }

        .card-catalogo {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
        }
        .card-catalogo:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        .card-catalogo .portada {
            height: 220px;
            object-fit: contain;
            padding: 10px;
            background: #fafafa;
            width: 100%;
        }
        .card-catalogo .card-body {
            padding: 12px 15px;
        }
        .card-catalogo h5 {
            font-weight: bold;
            color: #2c3e50;
            font-size: 1rem;
            margin-bottom: 8px;
        }
        .info-libro {
            font-size: 0.78rem;
            color: #555;
            margin-bottom: 3px;
            line-height: 1.3;
        }
        .info-libro strong {
            color: #2c3e50;
        }
        .badge-genero {
            background-color: #1abc9c;
            color: white;
            padding: 3px 10px;
            border-radius: 15px;
            font-size: 0.7rem;
            display: inline-block;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h4><i class="bi bi-book-half"></i> Biblioteca</h4>
        <a href="{{ route('panel') }}"><i class="bi bi-speedometer2"></i> Panel de Administración</a>
        <a href="{{ route('libros.index') }}" class="active"><i class="bi bi-journal-bookmark"></i> Libros</a>
        <a href="{{ route('usuarios.index') }}"><i class="bi bi-people"></i> Usuarios</a>
        <a href="{{ route('autores.index') }}"><i class="bi bi-pencil-square"></i> Autores</a>
        <a href="{{ route('editoriales.index') }}"><i class="bi bi-building"></i> Editoriales</a>
        <a href="{{ route('traductores.index') }}"><i class="bi bi-translate"></i> Traductores</a>
        <a href="{{ route('prestamos.index') }}"><i class="bi bi-arrow-left-right"></i> Préstamos</a>
        <a href="{{ route('configuracion') }}"><i class="bi bi-gear"></i> Configuración</a>
        <hr class="text-secondary">
        <a href="{{ url('/') }}"><i class="bi bi-box-arrow-left"></i> Salir al Inicio</a>
    </div>

    <div class="main-content">
        <div class="topbar">
            <h4 class="mb-0 text-secondary">📚 Catálogo de Libros</h4>
            <span class="badge bg-primary">{{ $libros->count() }} Libros disponibles</span>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
            @foreach($libros as $libro)
                <div class="col">
                    <div class="card card-catalogo">
                        <img src="http://127.0.0.1:8000/imagenes/{{ $libro->imagen }}"
                             class="portada"
                             alt="Portada de {{ $libro->Titulo }}"
                             onerror="this.src='https://via.placeholder.com/200x260/f0f0f0/999999?text=Sin+Portada'">
                        <div class="card-body">
                            <span class="badge-genero">{{ $libro->genero }}</span>
                            <h5>{{ $libro->Titulo }}</h5>
                            <p class="info-libro"><strong>Tipo:</strong> {{ $libro->Tipo }}</p>
                            <p class="info-libro"><strong>Autor:</strong> {{ $libro->autor->Nombre ?? 'N/A' }} {{ $libro->autor->Apellidos ?? '' }}</p>
                            <p class="info-libro"><strong>Editorial:</strong> {{ $libro->editor->Nombre ?? 'N/A' }}</p>
                            <p class="info-libro"><strong>Traductor:</strong> {{ $libro->traductor->Nombre ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
