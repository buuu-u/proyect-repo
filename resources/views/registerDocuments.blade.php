<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Documento - Repositorio Académico Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        :root {
            --primary-blue: #2d5d86;
            --secondary-blue: #428bca;
            --hover-color: #1d4b6f;
            --accent-color: #ffd700;
            --success-color: #28a745;
            --error-color: #dc3545;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.1'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3Cpath d='M6 5V0H5v5H0v1h5v94h1V6h94V5H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .institutional-nav {
            background-color: var(--primary-blue);
            color: white;
            font-size: 0.875rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .institutional-nav .nav-link {
            color: white;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .institutional-nav .nav-link:hover,
        .institutional-nav .nav-link:focus {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .upload-container {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 3rem;
            margin-top: 2rem;
            transition: all 0.3s ease;
        }

        .upload-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .upload-title {
            color: var(--primary-blue);
            font-weight: bold;
            margin-bottom: 2rem;
            text-align: center;
            font-size: 2.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--secondary-blue);
            box-shadow: 0 0 0 0.2rem rgba(66, 139, 202, 0.25);
            background-color: white;
        }

        .form-label {
            font-weight: 600;
            color: var(--primary-blue);
            margin-bottom: 0.5rem;
        }

        .btn-primary {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg,
                    transparent,
                    rgba(255, 255, 255, 0.3),
                    transparent);
            transition: all 0.6s;
        }

        .btn-primary:hover:before {
            left: 100%;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: var(--hover-color);
            border-color: var(--hover-color);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-3px);
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px;
            margin-bottom: 2rem;
        }

        .logo-container img {
            max-height: 100%;
            transition: all 0.3s ease;
        }

        .logo-container img:hover {
            transform: scale(1.05);
        }

        .input-group-text {
            background-color: var(--primary-blue);
            color: white;
            border: none;
            border-radius: 10px 0 0 10px;
        }

        .input-group .form-control {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }

        footer {
            background-color: var(--primary-blue);
            color: white;
            padding: 2rem 0;
            margin-top: 4rem;
        }

        footer h5 {
            color: var(--accent-color);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        footer ul {
            padding-left: 0;
        }

        footer ul li {
            margin-bottom: 0.5rem;
        }

        footer a {
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        footer a:hover {
            color: var(--accent-color);
            text-decoration: underline;
        }

        .social-icons {
            display: flex;
            justify-content: start;
            gap: 1rem;
        }

        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            background-color: var(--accent-color);
            transform: translateY(-3px);
        }

        .social-icons i {
            font-size: 1.2rem;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        @media (max-width: 768px) {
            .upload-container {
                padding: 2rem;
            }
        }
    </style>
</head>

<body>
    <!-- Institutional Navigation -->
    <nav class="institutional-nav">
        <div class="container d-flex justify-content-end py-2">
            <ul class="nav">
                <li class="nav-item"><a href="/" class="nav-link">Inicio</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="logo-container">
            <img src="{{ asset('udo.jpg') }}" alt="Logo Universidad" height="50">
        </div>
    </div>

    <!-- Upload Document Section -->
    <section class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="upload-container fade-in">
                        <h2 class="upload-title">Subir Documento</h2>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form id="uploadForm" method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                            @csrf <!-- Token CSRF para seguridad -->
                            <div class="mb-4">
                                <label for="title" class="form-label">Título del Documento</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                    <input type="text" class="form-control" id="title" name="title" required value="{{ old('title') }}">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="author" class="form-label">Autor</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="form-label">Descripción</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                    <textarea class="form-control" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="document_type" class="form-label">Tipo de Documento</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                        <select class="form-select" id="document_type" name="document_type" required>
                                            <option value="">Seleccione el tipo de documento</option>
                                            <option value="area_grado" {{ old('document_type') == 'area_grado' ? 'selected' : '' }}>Área de Grado</option>
                                            <option value="tesis" {{ old('document_type') == 'tesis' ? 'selected' : '' }}>Tesis</option>
                                            <option value="pasantia" {{ old('document_type') == 'pasantia' ? 'selected' : '' }}>Pasantía</option>
                                            <option value="practicas_profesionales" {{ old('document_type') == 'practicas_profesionales' ? 'selected' : '' }}>Prácticas Profesionales</option>
                                            <option value="servicio_comunitario" {{ old('document_type') == 'servicio_comunitario' ? 'selected' : '' }}>Servicio Comunitario</option>
                                            <option value="lineas_investigacion" {{ old('document_type') == 'lineas_investigacion' ? 'selected' : '' }}>Líneas de Investigación</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="category" class="form-label">Categoría</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                        <select class="form-select" id="category" name="category">
                                            <option value="">Seleccione una categoría</option>
                                            <option value="Investigación" {{ old('category') == 'Investigación' ? 'selected' : '' }}>Investigación</option>
                                            <option value="Desarrollo" {{ old('category') == 'Desarrollo' ? 'selected' : '' }}>Desarrollo</option>
                                            <option value="Innovación" {{ old('category') == 'Innovación' ? 'selected' : '' }}>Innovación</option>
                                            <option value="Tecnología" {{ old('category') == 'Tecnología' ? 'selected' : '' }}>Tecnología</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="keywords" class="form-label">Palabras Clave</label>
                                <div id="keywordsContainer">
                                    <div class="input-group mb-2 keyword-input-group">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        <input type="text" class="form-control keyword-input" name="keywords[]" value="{{ old('keywords.0') }}">
                                        <button type="button" class="btn btn-success add-keyword"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="file" class="form-label">Archivo del Documento</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-file-upload"></i></span>
                                    <input type="file" class="form-control" id="file" name="file" required>
                                </div>
                                <small class="text-muted">Formatos aceptados: PDF, DOC, DOCX. Tamaño máximo: 10MB</small>
                            </div>

                            <!-- Sección de metadatos colapsable -->
                            <div class="mb-4">
                                <button class="btn btn-outline-secondary w-100 d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#metadataFields" aria-expanded="false" aria-controls="metadataFields">
                                    <span>Metadatos adicionales</span>
                                    <i class="fas fa-chevron-down"></i>
                                </button>

                                <div class="collapse mt-3" id="metadataFields">
                                    <div class="card card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="director" class="form-label">Director de Tesis</label>
                                                <input type="text" class="form-control" id="director" name="director" value="{{ old('director') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="co_director" class="form-label">Co-Director</label>
                                                <input type="text" class="form-control" id="co_director" name="co_director" value="{{ old('co_director') }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="academic_degree" class="form-label">Grado Académico</label>
                                                <input type="text" class="form-control" id="academic_degree" name="academic_degree" value="{{ old('academic_degree') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="institution" class="form-label">Institución</label>
                                                <input type="text" class="form-control" id="institution" name="institution" value="{{ old('institution') }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="department" class="form-label">Departamento</label>
                                                <input type="text" class="form-control" id="department" name="department" value="{{ old('department') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="language" class="form-label">Idioma</label>
                                                <input type="text" class="form-control" id="language" name="language" value="{{ old('language') ?? 'Español' }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="publication_date" class="form-label">Fecha de Publicación</label>
                                                <input type="date" class="form-control" id="publication_date" name="publication_date" value="{{ old('publication_date') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="defense_date" class="form-label">Fecha de Defensa</label>
                                                <input type="date" class="form-control" id="defense_date" name="defense_date" value="{{ old('defense_date') }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="page_count" class="form-label">Número de Páginas</label>
                                                <input type="number" class="form-control" id="page_count" name="page_count" value="{{ old('page_count') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="identifier" class="form-label">Identificador</label>
                                                <input type="text" class="form-control" id="identifier" name="identifier" value="{{ old('identifier') }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="rights" class="form-label">Derechos</label>
                                            <input type="text" class="form-control" id="rights" name="rights" value="{{ old('rights') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Campos específicos para tipos de documentos -->
                            <div id="tesis_fields" class="document-type-fields" style="display: none;">
                                <div class="mb-4">
                                    <label for="level" class="form-label">Nivel</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                        <select class="form-select" id="level" name="level">
                                            <option value="">Seleccione un nivel</option>
                                            <option value="Pregrado" {{ old('level') == 'Pregrado' ? 'selected' : '' }}>Pregrado</option>
                                            <option value="Maestría" {{ old('level') == 'Maestría' ? 'selected' : '' }}>Maestría</option>
                                            <option value="Doctorado" {{ old('level') == 'Doctorado' ? 'selected' : '' }}>Doctorado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div id="pasantia_fields" class="document-type-fields" style="display: none;">
                                <div class="mb-4">
                                    <label for="company" class="form-label">Empresa</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                        <input type="text" class="form-control" id="company" name="company" value="{{ old('company') }}">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="duration" class="form-label">Duración</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                        <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration') }}">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-cloud-upload-alt"></i> Subir Documento
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2025 Repositorio Académico Digital. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="me-3">Política de Privacidad</a>
                    <a href="#" class="me-3">Términos de Uso</a>
                    <a href="#">Contacto</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('#uploadForm');
            const documentTypeSelect = document.querySelector('#document_type');
            const documentTypeFields = document.querySelectorAll('.document-type-fields');

            // Función para mostrar/ocultar campos según el tipo de documento
            function toggleDocumentTypeFields() {
                const selectedType = documentTypeSelect.value;

                // Ocultar todos los campos específicos
                documentTypeFields.forEach(field => {
                    field.style.display = 'none';
                });

                // Mostrar campos específicos según el tipo seleccionado
                if (selectedType) {
                    const specificFields = document.getElementById(selectedType + '_fields');
                    if (specificFields) {
                        specificFields.style.display = 'block';
                    }
                }
            }

            // Ejecutar al cargar la página y cuando cambie el tipo de documento
            toggleDocumentTypeFields();
            documentTypeSelect.addEventListener('change', toggleDocumentTypeFields);

            // Animación para los campos de formulario
            const inputs = document.querySelectorAll('.form-control, .form-select');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-5px)';
                    this.parentElement.style.transition = 'all 0.3s ease';
                });
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });

            // Efecto hover para los botones de redes sociales
            const socialIcons = document.querySelectorAll('.social-icons a');
            socialIcons.forEach(icon => {
                icon.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-3px) rotate(5deg)';
                });
                icon.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) rotate(0)';
                });
            });

            // Funcionalidad para agregar/eliminar palabras clave
            const keywordsContainer = document.getElementById('keywordsContainer');

            // Agregar palabra clave
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('add-keyword') || e.target.parentElement.classList.contains('add-keyword')) {
                    const btn = e.target.classList.contains('add-keyword') ? e.target : e.target.parentElement;
                    const newKeywordGroup = document.createElement('div');
                    newKeywordGroup.className = 'input-group mb-2 keyword-input-group';
                    newKeywordGroup.innerHTML = `
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                        <input type="text" class="form-control keyword-input" name="keywords[]" value="">
                        <button type="button" class="btn btn-danger remove-keyword"><i class="fas fa-minus"></i></button>
                    `;
                    keywordsContainer.appendChild(newKeywordGroup);
                }
            });

            // Eliminar palabra clave
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-keyword') || e.target.parentElement.classList.contains('remove-keyword')) {
                    const btn = e.target.classList.contains('remove-keyword') ? e.target : e.target.parentElement;
                    const inputGroup = btn.closest('.keyword-input-group');
                    inputGroup.remove();
                }
            });
        });
    </script>
</body>

</html>