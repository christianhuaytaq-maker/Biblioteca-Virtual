<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Configuración | Biblioteca Virtual</title>
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
    </style>
</head>
<body>

    <div class="sidebar">
        <h4><i class="bi bi-book-half"></i> Biblioteca</h4>
        <a href="{{ route('panel') }}"><i class="bi bi-speedometer2"></i> Panel de Administración</a>
        <a href="{{ route('panel') }}"><i class="bi bi-journal-bookmark"></i> Libros</a>
        <a href="{{ route('usuarios.index') }}"><i class="bi bi-people"></i> Usuarios</a>
        <a href="{{ route('autores.index') }}"><i class="bi bi-pencil-square"></i> Autores</a>
        <a href="{{ route('editoriales.index') }}"><i class="bi bi-building"></i> Editoriales</a>
        <a href="{{ route('traductores.index') }}"><i class="bi bi-translate"></i> Traductores</a>
        <a href="{{ route('prestamos.index') }}"><i class="bi bi-arrow-left-right"></i> Préstamos</a>
        <a href="{{ route('configuracion') }}" class="active"><i class="bi bi-gear"></i> Configuración</a>
        <hr class="text-secondary">
        <a href="{{ url('/') }}"><i class="bi bi-box-arrow-left"></i> Salir al Inicio</a>
    </div>

    <div class="main-content">
        <div class="topbar">
            <h4 class="mb-0 text-secondary">⚙️ Configuración del Sistema</h4>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="mb-4">Información de la Biblioteca</h5>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-book me-2"></i> Nombre de la Biblioteca</span>
                        <strong>Biblioteca Virtual</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-calendar me-2"></i> Año</span>
                        <strong>{{ date('Y') }}</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-info-circle me-2"></i> Versión del Sistema</span>
                        <strong>1.0.0</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-person-badge me-2"></i> Administrador</span>
                        <strong>Biblioteca Virtual</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
