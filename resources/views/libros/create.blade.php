<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Libro | Biblioteca Virtual</title>
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
            <h4 class="mb-0 text-secondary">➕ Agregar Nuevo Libro</h4>
            <a href="{{ route('panel') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Volver al Panel
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <form action="{{ route('libros.store') }}" method="POST">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Título del Libro *</label>
                            <input type="text" name="Titulo" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tipo *</label>
                            <select name="Tipo" class="form-select" required>
                                <option value="">Selecciona...</option>
                                <option value="Novela">Novela</option>
                                <option value="Poesía">Poesía</option>
                                <option value="Teatro">Teatro</option>
                                <option value="Cuento">Cuento</option>
                                <option value="Ensayo">Ensayo</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold">Autor *</label>
                            <select name="ID_autor" class="form-select" required>
                                <option value="">Selecciona...</option>
                                @foreach($autores as $autor)
                                    <option value="{{ $autor->ID_autores }}">
                                        {{ $autor->Nombre }} {{ $autor->Apellidos }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold">Editorial *</label>
                            <select name="ID_editor" class="form-select" required>
                                <option value="">Selecciona...</option>
                                @foreach($editores as $editor)
                                    <option value="{{ $editor->ID_editores }}">
                                        {{ $editor->Nombre }} {{ $editor->Apellidos }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold">Traductor *</label>
                            <select name="ID_traductor" class="form-select" required>
                                <option value="">Selecciona...</option>
                                @foreach($traductores as $traductor)
                                    <option value="{{ $traductor->ID_traductores }}">
                                        {{ $traductor->Nombre }} {{ $traductor->Apellidos }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Género *</label>
                            <input type="text" name="genero" class="form-control" placeholder="Ej: Romance, Aventura..." required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nombre del archivo de imagen *</label>
                            <input type="text" name="imagen" class="form-control" placeholder="Ej: mi_libro.jpg" required>
                            <small class="text-muted">La imagen debe estar en la carpeta <code>public/imagenes/</code></small>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Guardar Libro
                        </button>
                        <a href="{{ route('panel') }}" class="btn btn-outline-secondary">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
