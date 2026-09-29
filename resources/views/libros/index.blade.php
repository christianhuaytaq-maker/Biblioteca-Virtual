<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración | Biblioteca Virtual</title>
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
        .stat-card { border: none; color: white; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: transform 0.2s; }
        .stat-card:hover { transform: translateY(-3px); }
        .stat-card .icon { font-size: 2.5rem; opacity: 0.7; }
        .bg-verde { background-color: #1abc9c; }
        .bg-azul { background-color: #3498db; }
        .bg-amarillo { background-color: #f1c40f; }
        .bg-rojo { background-color: #e74c3c; }
        .card-libro { border: none; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); transition: 0.2s; }
        .card-libro:hover { box-shadow: 0 6px 15px rgba(0,0,0,0.15); transform: translateY(-5px); }
        .card-img-top { height: 220px; object-fit: contain; padding: 15px; background: #fafafa; }
    </style>
</head>
<body>

    <div class="sidebar">
        <h4><i class="bi bi-book-half"></i> Biblioteca</h4>
        <a href="{{ route('panel') }}" class="active"><i class="bi bi-speedometer2"></i> Panel de Administración</a>
        <a href="{{ route('libros.index') }}"><i class="bi bi-journal-bookmark"></i> Libros</a>
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
            <h4 class="mb-0 text-secondary">📊 Panel de Administración</h4>
            <div>
                <i class="bi bi-bell fs-5 text-secondary me-3"></i>
                <i class="bi bi-person-circle fs-4 text-secondary"></i>
            </div>
        </div>

        <!-- MENSAJE DE ÉXITO -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- TARJETAS DE ESTADÍSTICAS -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card stat-card bg-verde p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase mb-1">Libros</h6>
                            <h2 class="fw-bold mb-0">{{ $libros->count() }}</h2>
                        </div>
                        <i class="bi bi-book icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card bg-azul p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase mb-1">Autores</h6>
                            <h2 class="fw-bold mb-0">{{ $totalAutores }}</h2>
                        </div>
                        <i class="bi bi-person-badge icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card bg-amarillo p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase mb-1">Editoriales</h6>
                            <h2 class="fw-bold mb-0">{{ $totalEditores }}</h2>
                        </div>
                        <i class="bi bi-building icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card bg-rojo p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase mb-1">Traductores</h6>
                            <h2 class="fw-bold mb-0">{{ $totalTraductores }}</h2>
                        </div>
                        <i class="bi bi-translate icon"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- BARRA DE BÚSQUEDA Y FILTROS -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <form action="{{ route('panel') }}" method="GET" class="row g-3 align-items-end">
                    <div class="col-md-5">
                        <label class="form-label fw-bold"><i class="bi bi-search"></i> Buscar por título</label>
                        <input type="text" name="buscar" class="form-control" placeholder="Escribe el título del libro..." value="{{ request('buscar') }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold"><i class="bi bi-funnel"></i> Filtrar por categoría</label>
                        <select name="genero" class="form-select">
                            <option value="">Todas las categorías</option>
                            @foreach($generos as $gen)
                                <option value="{{ $gen }}" {{ request('genero') == $gen ? 'selected' : '' }}>
                                    {{ $gen }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 d-flex gap-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-search"></i> Buscar
                        </button>
                        <a href="{{ route('panel') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-x-circle"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- BOTÓN AGREGAR LIBRO -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="text-secondary fw-bold mb-0">📖 Libros Disponibles ({{ $libros->count() }})</h5>
            <a href="{{ route('libros.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Agregar Nuevo Libro
            </a>
        </div>

        <!-- LISTA DE LIBROS -->
        @if($libros->count() > 0)
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-3">
                @foreach($libros as $libro)
                    <div class="col">
                        <div class="card h-100 card-libro">
                            <img src="http://127.0.0.1:8000/imagenes/{{ $libro->imagen }}"
                                 class="card-img-top"
                                 alt="Portada de {{ $libro->Titulo }}"
                                 onerror="this.src='https://via.placeholder.com/200x260/f0f0f0/999999?text=Sin+Portada'">
                            <div class="card-body">
                                <h6 class="card-title fw-bold text-dark mb-2">{{ $libro->Titulo }}</h6>
                                <p class="card-text mb-1">
                                    <span class="badge bg-light text-dark border">
                                        <i class="bi bi-tag"></i> {{ $libro->genero }}
                                    </span>
                                </p>
                                <p class="card-text text-muted small mb-0"><strong>Tipo:</strong> {{ $libro->Tipo }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning text-center">
                <i class="bi bi-search"></i> No se encontraron libros con esos filtros.
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
