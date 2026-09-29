<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios | Biblioteca Virtual</title>
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
        <a href="{{ route('usuarios.index') }}" class="active"><i class="bi bi-people"></i> Usuarios</a>
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
            <h4 class="mb-0 text-secondary">👥 Lista de Usuarios</h4>
            <span class="badge bg-primary">{{ $usuarios->count() }} Usuarios</span>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Rol</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->ID_usuario }}</td>
                                <td>{{ $usuario->Nombre }}</td>
                                <td>{{ $usuario->Apellidos }}</td>
                                <td>{{ $usuario->correo }}</td>
                                <td>{{ $usuario->telefono }}</td>
                                <td><span class="badge bg-info text-dark">{{ $usuario->rol }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
