<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Documento - Repositorio Académico Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        :root {
            --primary-blue: #2d5d86;
            --secondary-blue: #428bca;
            --hover-color: #1d4b6f;
            --accent-color: #ffd700;
            --bg-light: #f8f9fa;
            --text-dark: #333;
            --text-light: #6c757d;
            --card-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --card-hover-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            --success-color: #28a745;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
            --info-color: #17a2b8;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
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

        .main-nav {
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 0;
            transition: all 0.3s ease;
        }

        .main-nav.scrolled {
            padding: 0.25rem 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .main-nav .navbar-brand img {
            height: 50px;
            transition: all 0.3s ease;
        }

        .main-nav.scrolled .navbar-brand img {
            height: 40px;
        }

        .main-nav .nav-link {
            color: var(--primary-blue);
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .main-nav .nav-link:hover,
        .main-nav .nav-link:focus,
        .main-nav .nav-link.active {
            color: white;
            background-color: var(--primary-blue);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .breadcrumb {
            background-color: transparent;
            padding: 1rem 0;
            margin-bottom: 0;
        }

        .breadcrumb-item {
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .breadcrumb-item a:hover {
            color: var(--hover-color);
            text-decoration: underline;
        }

        .breadcrumb-item.active {
            color: var(--text-light);
        }

        .document-header {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
            position: relative;
            overflow: hidden;
        }

        .document-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, var(--primary-blue), var(--secondary-blue));
        }

        .document-title {
            word-wrap: break-word;
            overflow-wrap: break-word;
            hyphens: auto;
            max-width: 100%;
            color: var(--primary-blue);
        }

        .document-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .document-meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .document-meta-item i {
            color: var(--primary-blue);
            font-size: 1.1rem;
        }

        .document-actions {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .btn-action {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        .btn-primary:hover {
            background-color: var(--hover-color);
            border-color: var(--hover-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-success {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-danger {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-warning {
            background-color: var(--warning-color);
            border-color: var(--warning-color);
            color: #212529;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-info {
            background-color: var(--info-color);
            border-color: var(--info-color);
            color: white;
        }

        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .document-content {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
        }

        .document-section {
            margin-bottom: 2rem;
        }

        .document-section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-blue);
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid rgba(0, 0, 0, 0.05);
        }

        .document-abstract {
            line-height: 1.8;
            text-align: justify;
        }

        .document-keywords {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .keyword-badge {
            background-color: rgba(66, 139, 202, 0.1);
            color: var(--primary-blue);
            border-radius: 20px;
            padding: 0.35rem 1rem;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .keyword-badge:hover {
            background-color: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
        }

        .document-metadata {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .metadata-item {
            display: flex;
            flex-direction: column;
        }

        .metadata-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-light);
            margin-bottom: 0.25rem;
        }

        .metadata-value {
            word-wrap: break-word;
            overflow-wrap: break-word;
            max-width: 100%;
        }

        .document-preview {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .preview-container {
            width: 100%;
            height: 500px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 1rem;
        }

        .preview-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            color: var(--text-light);
        }

        .preview-placeholder:hover {
            background-color: #e9ecef;
        }

        .preview-placeholder i {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: var(--primary-blue);
        }

        .document-comments {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
        }

        .comment {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .comment:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .comment-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--primary-blue);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .comment-content {
            flex-grow: 1;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .comment-author {
            font-weight: 600;
            color: var(--text-dark);
        }

        .comment-date {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .comment-text {
            line-height: 1.6;
            color: var(--text-dark);
        }

        .comment-form {
            margin-top: 2rem;
        }

        .comment-form textarea {
            border-radius: 10px;
            padding: 1rem;
            resize: vertical;
            min-height: 100px;
            border: 2px solid rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .comment-form textarea:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.2rem rgba(66, 139, 202, 0.25);
        }

        .related-documents {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: var(--card-shadow);
        }

        .related-document {
            display: flex;
            gap: 1rem;
            padding: 1rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
            color: var(--text-dark);
        }

        .related-document:hover {
            background-color: rgba(0, 0, 0, 0.03);
            transform: translateY(-2px);
        }

        .related-document-icon {
            width: 40px;
            height: 40px;
            border-radius: 5px;
            background-color: rgba(66, 139, 202, 0.1);
            color: var(--primary-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .related-document-info {
            flex-grow: 1;
            min-width: 0;
            /* Esto es importante para que text-overflow funcione */
        }

        .related-document-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: var(--primary-blue);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
        }

        .related-document-meta {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .badge {
            font-size: 0.75rem;
            font-weight: 500;
            padding: 0.35em 0.65em;
            border-radius: 30px;
        }

        .badge-primary {
            background-color: var(--primary-blue);
            color: white;
        }

        footer {
            background-color: var(--primary-blue);
            color: white;
            padding: 3rem 0;
            margin-top: 3rem;
        }

        footer h5 {
            color: var(--accent-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        footer ul {
            padding-left: 0;
            list-style-type: none;
        }

        footer ul li {
            margin-bottom: 0.75rem;
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
            transform: translateY(-3px) rotate(5deg);
        }

        .social-icons i {
            font-size: 1.2rem;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }

        /* Modal styles */
        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background-color: var(--primary-blue);
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 1.5rem;
        }

        .modal-title {
            font-weight: 600;
        }

        .modal-body {
            padding: 2rem;
        }

        .modal-footer {
            padding: 1.5rem;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        /* Remove the fullscreen related styles */
        .document-viewer-toolbar {
            display: none;
            /* Hide the toolbar since we don't need it anymore */
        }

        /* Keep the basic document viewer styles */
        .document-viewer {
            width: 100%;
        }

        .document-viewer iframe {
            width: 100%;
            height: 500px;
            border: none;
        }

        @media (max-width: 768px) {
            .document-title {
                font-size: 1.75rem;
            }

            .document-meta {
                flex-direction: column;
                gap: 0.75rem;
            }

            .document-actions {
                flex-wrap: wrap;
            }

            .btn-action {
                width: 100%;
                justify-content: center;
            }

            .document-metadata {
                grid-template-columns: 1fr;
            }

            .preview-container {
                height: 300px;
            }
        }

        .institutional-nav .dropdown-menu {
            background-color: white;
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            padding: 0.5rem 0;
            margin-top: 0.5rem;
            z-index: 1050;
        }

        .institutional-nav .dropdown-item {
            color: var(--primary-blue);
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: all 0.2s ease;
        }

        .institutional-nav .dropdown-item:hover,
        .institutional-nav .dropdown-item:focus {
            background-color: rgba(45, 93, 134, 0.1);
            color: var(--hover-color);
        }

        .institutional-nav .dropdown-divider {
            margin: 0.25rem 0;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .institutional-nav .nav-link.dropdown-toggle::after {
            display: inline-block;
            margin-left: 0.255em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0.3em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent;
        }
    </style>
</head>

<body>
    <!-- Institutional Navigation -->
    <nav class="institutional-nav">
        <div class="container d-flex justify-content-end py-2">
            <ul class="nav">
                <li class="nav-item"><a href="#" class="nav-link">Noticias</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Eventos</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Ayuda</a></li>
                @auth
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                <i class="fas fa-user me-2"></i>Ver Perfil
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Iniciar Sesión</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Main Navigation -->
    <nav class="main-nav sticky-top">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-2">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('udo.jpg') }}" alt="Logo Universidad" height="50">
                </a>
                <ul class="nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="/collection" class="nav-link active">Colecciones</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Acerca de</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                @if($document->document_type)
                @php
                $routeName = '';
                $typeName = '';

                switch($document->document_type) {
                case 'tesis':
                $routeName = 'tesis';
                $typeName = 'Tesis';
                break;
                case 'area_grado':
                $routeName = 'areas.grado';
                $typeName = 'Áreas de Grado';
                break;
                case 'pasantia':
                $routeName = 'pasantias';
                $typeName = 'Pasantías';
                break;
                case 'practicas_profesionales':
                $routeName = 'practicas.profesionales';
                $typeName = 'Prácticas Profesionales';
                break;
                case 'servicio_comunitario':
                $routeName = 'servicios.comunitarios';
                $typeName = 'Servicios Comunitarios';
                break;
                case 'lineas_investigacion':
                $routeName = 'lineas.investigacion';
                $typeName = 'Líneas de Investigación';
                break;
                default:
                $routeName = 'collection';
                $typeName = 'Colecciones';
                }
                @endphp
                <li class="breadcrumb-item"><a href="{{ route($routeName) }}">{{ $typeName }}</a></li>
                @else
                <li class="breadcrumb-item"><a href="{{ route('collection') }}">Colecciones</a></li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{ $document->title }}</li>
            </ol>
        </nav>
    </div>

    <!-- Main Content -->
    <main class="container">
        <!-- Document Header -->
        <section class="document-header fade-in">
            <h1 class="document-title">{{ $document->title }}</h1>

            <div class="document-meta">
                <div class="document-meta-item">
                    <i class="fas fa-user"></i>
                    <span>{{ $document->author }}</span>
                </div>
                <div class="document-meta-item">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Publicado: {{ $document->created_at->format('d/m/Y') }}</span>
                </div>
                @if($document->document_type)
                <div class="document-meta-item">
                    <i class="fas fa-file-alt"></i>
                    <span>
                        @php
                        $documentTypeLabels = [
                        'tesis' => 'Tesis',
                        'maestria' => 'Tesis de Maestría',
                        'licenciatura' => 'Tesis de Licenciatura',
                        'articulo' => 'Artículo de Investigación',
                        'area_grado' => 'Área de Grado',
                        'pasantia' => 'Pasantía',
                        'practicas_profesionales' => 'Prácticas Profesionales',
                        'servicio_comunitario' => 'Servicio Comunitario',
                        'lineas_investigacion' => 'Línea de Investigación'
                        ];
                        echo $documentTypeLabels[$document->document_type] ?? ucfirst($document->document_type);
                        @endphp
                    </span>
                </div>
                @endif
                @if($document->category)
                <div class="document-meta-item">
                    <i class="fas fa-folder"></i>
                    <span>{{ $document->category }}</span>
                </div>
                @endif
                <div class="document-meta-item">
                    <i class="fas fa-eye"></i>
                    <span>Vistas: {{ $document->views_count ?? 0 }}</span>
                </div>
                <div class="document-meta-item">
                    <i class="fas fa-download"></i>
                    <span>Descargas: {{ $document->downloads_count ?? 0 }}</span>
                </div>
            </div>

            <div class="d-flex gap-2 flex-wrap">
                @if($document->document_type)
                @php
                $documentTypeLabels = [
                'tesis' => 'Tesis Doctoral',
                'maestria' => 'Tesis de Maestría',
                'licenciatura' => 'Tesis de Licenciatura',
                'articulo' => 'Artículo de Investigación',
                'area_grado' => 'Área de Grado',
                'pasantia' => 'Pasantía',
                'practicas_profesionales' => 'Prácticas Profesionales',
                'servicio_comunitario' => 'Servicio Comunitario',
                'lineas_investigacion' => 'Línea de Investigación'
                ];
                $typeLabel = $documentTypeLabels[$document->document_type] ?? ucfirst($document->document_type);
                @endphp
                <span class="badge badge-primary">{{ $typeLabel }}</span>
                @endif

                @if($document->faculty)
                <span class="badge bg-secondary">{{ $document->faculty }}</span>
                @endif

                @if($document->category)
                <span class="badge bg-info">{{ $document->category }}</span>
                @endif

                @if($document->keywords)
                @php
                $keywordsArray = explode(',', $document->keywords);
                @endphp
                @foreach($keywordsArray as $keyword)
                @if(trim($keyword) !== '')
                <span class="badge bg-info">{{ trim($keyword) }}</span>
                @endif
                @endforeach
                @endif
            </div>

            <div class="document-actions">
                <button class="btn btn-primary btn-action" data-bs-toggle="modal" data-bs-target="#viewDocumentModal">
                    <i class="fas fa-eye"></i> Visualizar
                </button>
                @if(Auth::check() && Auth::user()->hasRole('admin') || Auth::user()->hasRole('profesor') || Auth::user()->hasRole('estudiante'))
                <a href="{{ route('documents.download', $document) }}" class="btn btn-success btn-action">
                    <i class="fas fa-download"></i> Descargar
                </a>
                @endif
                @can('update', $document)
                <button class="btn btn-warning btn-action" data-bs-toggle="modal" data-bs-target="#editDocumentModal">
                    <i class="fas fa-edit"></i> Editar
                </button>
                @endcan
                @can('delete', $document)
                <button class="btn btn-danger btn-action" data-bs-toggle="modal" data-bs-target="#deleteDocumentModal">
                    <i class="fas fa-trash-alt"></i> Eliminar
                </button>
                @endcan
                <button class="btn btn-info btn-action" data-bs-toggle="modal" data-bs-target="#shareDocumentModal">
                    <i class="fas fa-share-alt"></i> Compartir
                </button>
            </div>
        </section>

        <div class="row">
            <div class="col-lg-8">
                <!-- Document Content -->
                <section class="document-content fade-in">
                    <div class="document-section">
                        <h2 class="document-section-title">Resumen</h2>
                        <div class="document-abstract">
                            <p>{{ $document->description }}</p>
                        </div>
                    </div>

                    @if($document->keywords)
                    <div class="document-keywords mb-4">
                        @php
                        $keywordsArray = explode(',', $document->keywords);
                        @endphp
                        @foreach($keywordsArray as $keyword)
                        @if(trim($keyword) !== '')
                        <span class="keyword-badge">{{ trim($keyword) }}</span>
                        @endif
                        @endforeach
                    </div>
                    @endif

                    @php
                    // Check if any metadata fields are filled
                    $hasMetadata = $document->director || $document->co_director || $document->academic_degree ||
                    $document->institution || $document->department || $document->publication_date ||
                    $document->defense_date || $document->language || $document->page_count ||
                    $document->identifier || $document->rights;
                    @endphp

                    <div class="document-section">
                        <button class="document-section-title w-100 text-start border-0 bg-transparent d-flex justify-content-between align-items-center"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#metadataSection"
                            aria-expanded="{{ $hasMetadata ? 'true' : 'false' }}"
                            aria-controls="metadataSection">
                            <h2 class="m-0">Metadatos</h2>
                            <i class="fas fa-chevron-down"></i>
                        </button>

                        <div class="collapse {{ $hasMetadata ? 'show' : '' }}" id="metadataSection">
                            <div class="document-metadata mt-3">
                                @if($hasMetadata)
                                <div class="metadata-item">
                                    <span class="metadata-label">Título Original</span>
                                    <span class="metadata-value">{{ $document->title }}</span>
                                </div>
                                <div class="metadata-item">
                                    <span class="metadata-label">Autor</span>
                                    <span class="metadata-value">{{ $document->author }}</span>
                                </div>
                                @if($document->director)
                                <div class="metadata-item">
                                    <span class="metadata-label">Director de Tesis</span>
                                    <span class="metadata-value">{{ $document->director }}</span>
                                </div>
                                @endif
                                @if($document->co_director)
                                <div class="metadata-item">
                                    <span class="metadata-label">Co-Director</span>
                                    <span class="metadata-value">{{ $document->co_director }}</span>
                                </div>
                                @endif
                                @if($document->academic_degree)
                                <div class="metadata-item">
                                    <span class="metadata-label">Grado Académico</span>
                                    <span class="metadata-value">{{ $document->academic_degree }}</span>
                                </div>
                                @endif
                                @if($document->institution)
                                <div class="metadata-item">
                                    <span class="metadata-label">Institución</span>
                                    <span class="metadata-value">{{ $document->institution }}</span>
                                </div>
                                @endif
                                @if($document->faculty)
                                <div class="metadata-item">
                                    <span class="metadata-label">Facultad</span>
                                    <span class="metadata-value">{{ $document->faculty }}</span>
                                </div>
                                @endif
                                @if($document->department)
                                <div class="metadata-item">
                                    <span class="metadata-label">Departamento</span>
                                    <span class="metadata-value">{{ $document->department }}</span>
                                </div>
                                @endif
                                @if($document->publication_date)
                                <div class="metadata-item">
                                    <span class="metadata-label">Fecha de Publicación</span>
                                    <span class="metadata-value">{{ \Carbon\Carbon::parse($document->publication_date)->format('d \de F, Y') }}</span>
                                </div>
                                @endif
                                @if($document->defense_date)
                                <div class="metadata-item">
                                    <span class="metadata-label">Fecha de Defensa</span>
                                    <span class="metadata-value">{{ \Carbon\Carbon::parse($document->defense_date)->format('d \de F, Y') }}</span>
                                </div>
                                @endif
                                @if($document->language)
                                <div class="metadata-item">
                                    <span class="metadata-label">Idioma</span>
                                    <span class="metadata-value">{{ $document->language }}</span>
                                </div>
                                @endif
                                @if($document->page_count)
                                <div class="metadata-item">
                                    <span class="metadata-label">Número de Páginas</span>
                                    <span class="metadata-value">{{ $document->page_count }}</span>
                                </div>
                                @endif
                                @if($document->identifier)
                                <div class="metadata-item">
                                    <span class="metadata-label">Identificador</span>
                                    <span class="metadata-value">{{ $document->identifier }}</span>
                                </div>
                                @endif
                                @if($document->rights)
                                <div class="metadata-item">
                                    <span class="metadata-label">Derechos</span>
                                    <span class="metadata-value">{{ $document->rights }}</span>
                                </div>
                                @endif
                                @else
                                <div class="alert alert-info mt-3">
                                    No hay metadatos registrados para este documento.
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="document-section">
                        <button class="document-section-title w-100 text-start border-0 bg-transparent d-flex justify-content-between align-items-center"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#tocSection"
                            aria-expanded="{{ ($document->table_of_contents && ($toc = json_decode($document->table_of_contents)) && count($toc) > 0) ? 'true' : 'false' }}"
                            aria-controls="tocSection">
                            <h2 class="m-0">Tabla de Contenidos</h2>
                            <i class="fas fa-chevron-down"></i>
                        </button>

                        <div class="collapse {{ ($document->table_of_contents && ($toc = json_decode($document->table_of_contents)) && count($toc) > 0) ? 'show' : '' }}" id="tocSection">
                            @if($document->table_of_contents && ($toc = json_decode($document->table_of_contents)) && count($toc) > 0)
                            <ul class="list-group list-group-flush">
                                @foreach($toc as $entry)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $entry->number ? $entry->number . ' ' : '' }}{{ $entry->title }}</span>
                                    <span class="badge bg-secondary rounded-pill">Pág. {{ $entry->page }}</span>
                                </li>
                                @endforeach
                            </ul>
                            @else
                            <div class="alert alert-info mt-3">
                                No se pudo extraer la tabla de contenidos de este documento.
                            </div>
                            @endif
                        </div>
                    </div>
                </section>

                <!-- Document Preview -->
                <section class="document-preview fade-in">
                    <h2 class="document-section-title">Vista Previa</h2>
                    <div class="preview-container" id="previewContainer">
                        <div class="preview-placeholder" id="previewPlaceholder">
                            <i class="fas fa-file-pdf"></i>
                            <p>Haga clic aquí para ver una vista previa del documento</p>
                        </div>
                        <div class="document-viewer" id="documentViewer" style="display: none;">
                            <div class="document-viewer-toolbar">
                                <button id="fullscreenBtn" class="btn btn-sm btn-primary">
                                    <i class="fas fa-expand"></i> Pantalla Completa
                                </button>
                            </div>
                            <iframe id="documentFrame" width="100%" height="500px" frameborder="0"></iframe>
                        </div>
                    </div>
                </section>

                <!-- Document Comments -->
                <section class="document-comments fade-in">
                    <div class="comments-section mt-5">
                        <h3 class="mb-4">Comentarios</h3>

                        @auth
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="{{ route('documents.comments.store', $document) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="content">Deja tu comentario</label>
                                        <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-2">Enviar comentario</button>
                                </form>
                            </div>
                        </div>
                        @else
                        <div class="alert alert-info">
                            <a href="{{ route('login') }}">Inicia sesión</a> para dejar un comentario.
                        </div>
                        @endauth

                        <div class="comments-list">
                            @forelse($document->comments as $comment)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title">
                                            {{ $comment->user->name }}
                                            @if($comment->isFromAuthor())
                                            <span class="badge bg-primary">Autor</span>
                                            @endif
                                        </h5>
                                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="card-text">{{ $comment->content }}</p>

                                    @if(Auth::id() === $comment->user_id || Auth::id() === $document->user_id)
                                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este comentario?')">Eliminar</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                            @empty
                            <div class="alert alert-secondary">
                                No hay comentarios aún. ¡Sé el primero en comentar!
                            </div>
                            @endforelse
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-lg-4">
                <!-- Related Documents -->
                <section class="related-documents fade-in">
                    <h2 class="document-section-title">Documentos Relacionados</h2>

                    @forelse($relatedDocuments as $relatedDoc)
                    <a href="{{ route('documents.show', $relatedDoc) }}" class="related-document">
                        <div class="related-document-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="related-document-info">
                            <div class="related-document-title">{{ $relatedDoc->title }}</div>
                            <div class="related-document-meta">{{ $relatedDoc->author }} | {{ $relatedDoc->created_at->format('Y') }}</div>
                        </div>
                    </a>
                    @empty
                    <p class="text-muted">No hay documentos relacionados disponibles.</p>
                    @endforelse
                </section>
            </div>
        </div>
    </main>

    <!-- Modals -->
    <!-- View Document Modal -->
    <div class="modal fade" id="viewDocumentModal" tabindex="-1" aria-labelledby="viewDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-lg-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewDocumentModalLabel">{{ $document->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div style="height: 80vh;">
                        <iframe src="{{ route('documents.view', $document) }}" style="width: 100%; height: 100%; border: none;"></iframe>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    @if(Auth::check() && (Auth::user()->hasRole('admin') || Auth::user()->hasRole('profesor') || Auth::user()->hasRole('estudiante')))
                    <a href="{{ route('documents.download', $document) }}" class="btn btn-primary">
                        <i class="fas fa-download me-2"></i>Descargar
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Document Modal -->
    <div class="modal fade" id="editDocumentModal" tabindex="-1" aria-labelledby="editDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDocumentModalLabel">Editar Documento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editDocumentForm" action="{{ route('documents.update', $document) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="documentTitle" class="form-label">Título</label>
                            <input type="text" class="form-control" id="documentTitle" name="title" value="{{ $document->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="documentAuthor" class="form-label">Autor</label>
                            <input type="text" class="form-control" id="documentAuthor" name="author" value="{{ $document->author }}">
                        </div>
                        <div class="mb-3">
                            <label for="documentAbstract" class="form-label">Resumen</label>
                            <textarea class="form-control" id="documentAbstract" name="description" rows="5">{{ $document->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="documentKeywords" class="form-label">Palabras Clave</label>
                            <div id="keywordsContainer">
                                @if($document->keywords)
                                @php
                                $keywordsArray = explode(',', $document->keywords);
                                @endphp
                                @foreach($keywordsArray as $index => $keyword)
                                @if(trim($keyword) !== '')
                                <div class="input-group mb-2 keyword-input-group">
                                    <input type="text" class="form-control keyword-input" name="keywords[]" value="{{ trim($keyword) }}">
                                    @if($index === 0)
                                    <button type="button" class="btn btn-success add-keyword"><i class="fas fa-plus"></i></button>
                                    @else
                                    <button type="button" class="btn btn-danger remove-keyword"><i class="fas fa-minus"></i></button>
                                    @endif
                                </div>
                                @endif
                                @endforeach
                                @else
                                <div class="input-group mb-2 keyword-input-group">
                                    <input type="text" class="form-control keyword-input" name="keywords[]" value="">
                                    <button type="button" class="btn btn-success add-keyword"><i class="fas fa-plus"></i></button>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="documentType" class="form-label">Tipo de Documento</label>
                                <select class="form-select" id="documentType" name="document_type" required>
                                    <option value="">Seleccione el tipo de documento</option>
                                    <option value="area_grado" {{ $document->document_type == 'area_grado' ? 'selected' : '' }}>Área de Grado</option>
                                    <option value="tesis" {{ $document->document_type == 'tesis' ? 'selected' : '' }}>Tesis</option>
                                    <option value="pasantia" {{ $document->document_type == 'pasantia' ? 'selected' : '' }}>Pasantía</option>
                                    <option value="practicas_profesionales" {{ $document->document_type == 'practicas_profesionales' ? 'selected' : '' }}>Prácticas Profesionales</option>
                                    <option value="servicio_comunitario" {{ $document->document_type == 'servicio_comunitario' ? 'selected' : '' }}>Servicio Comunitario</option>
                                    <option value="lineas_investigacion" {{ $document->document_type == 'lineas_investigacion' ? 'selected' : '' }}>Líneas de Investigación</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="documentCategory" class="form-label">Categoría</label>
                                <select class="form-select" id="documentCategory" name="category">
                                    <option value="">Seleccione una categoría</option>
                                    <option value="Investigación" {{ $document->category == 'Investigación' ? 'selected' : '' }}>Investigación</option>
                                    <option value="Desarrollo" {{ $document->category == 'Desarrollo' ? 'selected' : '' }}>Desarrollo</option>
                                    <option value="Innovación" {{ $document->category == 'Innovación' ? 'selected' : '' }}>Innovación</option>
                                    <option value="Tecnología" {{ $document->category == 'Tecnología' ? 'selected' : '' }}>Tecnología</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="documentFile" class="form-label">Reemplazar Archivo</label>
                            <input type="file" class="form-control" id="documentFile" name="file">
                            <small class="form-text text-muted">Deje este campo vacío si no desea cambiar el archivo.</small>
                        </div>

                        <!-- Sección de metadatos colapsable -->
                        <div class="mb-3">
                            <button class="btn btn-outline-secondary w-100 d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#metadataFields" aria-expanded="false" aria-controls="metadataFields">
                                <span>Metadatos adicionales</span>
                                <i class="fas fa-chevron-down"></i>
                            </button>

                            <div class="collapse mt-3" id="metadataFields">
                                <div class="card card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="director" class="form-label">Director de Tesis</label>
                                            <input type="text" class="form-control" id="director" name="director" value="{{ $document->director ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="co_director" class="form-label">Co-Director</label>
                                            <input type="text" class="form-control" id="co_director" name="co_director" value="{{ $document->co_director ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="academic_degree" class="form-label">Grado Académico</label>
                                            <input type="text" class="form-control" id="academic_degree" name="academic_degree" value="{{ $document->academic_degree ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="institution" class="form-label">Institución</label>
                                            <input type="text" class="form-control" id="institution" name="institution" value="{{ $document->institution ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="department" class="form-label">Departamento</label>
                                            <input type="text" class="form-control" id="department" name="department" value="{{ $document->department ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="language" class="form-label">Idioma</label>
                                            <input type="text" class="form-control" id="language" name="language" value="{{ $document->language ?? 'Español' }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="publication_date" class="form-label">Fecha de Publicación</label>
                                            <input type="date" class="form-control" id="publication_date" name="publication_date" value="{{ $document->publication_date ? \Carbon\Carbon::parse($document->publication_date)->format('Y-m-d') : '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="defense_date" class="form-label">Fecha de Defensa</label>
                                            <input type="date" class="form-control" id="defense_date" name="defense_date" value="{{ $document->defense_date ? \Carbon\Carbon::parse($document->defense_date)->format('Y-m-d') : '' }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="page_count" class="form-label">Número de Páginas</label>
                                            <input type="number" class="form-control" id="page_count" name="page_count" value="{{ $document->page_count ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="identifier" class="form-label">Identificador</label>
                                            <input type="text" class="form-control" id="identifier" name="identifier" value="{{ $document->identifier ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="rights" class="form-label">Derechos</label>
                                        <input type="text" class="form-control" id="rights" name="rights" value="{{ $document->rights ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" form="editDocumentForm" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Document Modal -->
    <div class="modal fade" id="deleteDocumentModal" tabindex="-1" aria-labelledby="deleteDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteDocumentModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro de que desea eliminar este documento? Esta acción no se puede deshacer.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{ route('documents.destroy', $document) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Share Document Modal -->
    <div class="modal fade" id="shareDocumentModal" tabindex="-1" aria-labelledby="shareDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shareDocumentModalLabel">Compartir Documento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 class="mb-3">{{ $document->title }}</h6>

                    <div class="input-group mb-4">
                        <input type="text" id="shareUrl" class="form-control" value="{{ route('documents.show', $document) }}" readonly>
                        <button class="btn btn-outline-secondary" type="button" onclick="copyShareUrl()">
                            <i class="fas fa-copy"></i> Copiar
                        </button>
                    </div>

                    <h6 class="mb-3">Compartir en redes sociales:</h6>
                    <div class="d-flex justify-content-center gap-3 mb-4">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('documents.show', $document)) }}" target="_blank" class="btn btn-lg btn-outline-primary" title="Compartir en Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('documents.show', $document)) }}&text={{ urlencode($document->title) }}" target="_blank" class="btn btn-lg btn-outline-info" title="Compartir en Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('documents.show', $document)) }}" target="_blank" class="btn btn-lg btn-outline-primary" title="Compartir en LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($document->title . ' - ' . route('documents.show', $document)) }}" target="_blank" class="btn btn-lg btn-outline-success" title="Compartir en WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="mailto:?subject={{ urlencode($document->title) }}&body={{ urlencode('Mira este documento: ' . route('documents.show', $document)) }}" class="btn btn-lg btn-outline-secondary" title="Compartir por Email">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

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
            // Función para copiar la URL de compartir
            window.copyShareUrl = function() {
                const shareUrl = document.getElementById('shareUrl');
                shareUrl.select();
                document.execCommand('copy');
                alert('URL copiada al portapapeles');
            };

            // Manejar la adición y eliminación de palabras clave
            const keywordsContainer = document.getElementById('keywordsContainer');

            if (keywordsContainer) {
                // Agregar palabra clave
                keywordsContainer.addEventListener('click', function(e) {
                    if (e.target.classList.contains('add-keyword') || e.target.parentElement.classList.contains('add-keyword')) {
                        const btn = e.target.classList.contains('add-keyword') ? e.target : e.target.parentElement;
                        const inputGroup = btn.closest('.keyword-input-group');
                        const newInputGroup = inputGroup.cloneNode(true);
                        const input = newInputGroup.querySelector('input');
                        input.value = '';

                        // Cambiar el botón de agregar por uno de eliminar
                        const addBtn = newInputGroup.querySelector('.add-keyword');
                        addBtn.classList.remove('btn-success', 'add-keyword');
                        addBtn.classList.add('btn-danger', 'remove-keyword');
                        addBtn.innerHTML = '<i class="fas fa-minus"></i>';

                        keywordsContainer.appendChild(newInputGroup);
                    }

                    // Eliminar palabra clave
                    if (e.target.classList.contains('remove-keyword') || e.target.parentElement.classList.contains('remove-keyword')) {
                        const btn = e.target.classList.contains('remove-keyword') ? e.target : e.target.parentElement;
                        const inputGroup = btn.closest('.keyword-input-group');
                        inputGroup.remove();
                    }
                });
            }

            // Manejar el botón de compartir
            const shareButton = document.getElementById('shareButton');
            if (shareButton) {
                shareButton.addEventListener('click', function() {
                    // Ahora abrimos el modal en lugar de usar navigator.share
                    // El modal se abre automáticamente con data-bs-toggle="modal"
                });
            }

            // Handle edit form submission
            const editForm = document.getElementById('editDocumentForm');
            if (editForm) {
                // Manejar cambio de archivo para actualizar tabla de contenidos
                const fileInput = document.getElementById('documentFile');
                if (fileInput) {
                    fileInput.addEventListener('change', function() {
                        // Si se selecciona un nuevo archivo, mostrar mensaje de que la tabla de contenidos se actualizará
                        if (this.files.length > 0) {
                            // Verificar si existe la sección de tabla de contenidos
                            const tocSection = document.getElementById('tocSection');
                            if (tocSection) {
                                // Añadir un mensaje temporal
                                const messageDiv = document.createElement('div');
                                messageDiv.id = 'tocUpdateMessage';
                                messageDiv.className = 'alert alert-info mt-3';
                                messageDiv.innerHTML = 'La tabla de contenidos se actualizará automáticamente después de guardar el documento.';

                                // Eliminar mensaje anterior si existe
                                const existingMessage = document.getElementById('tocUpdateMessage');
                                if (existingMessage) {
                                    existingMessage.remove();
                                }

                                tocSection.appendChild(messageDiv);
                            }
                        }
                    });
                }

                editForm.addEventListener('submit', function(e) {
                    // Add loading state to button
                    const submitBtn = document.querySelector('button[form="editDocumentForm"]');
                    if (submitBtn) {
                        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Guardando...';
                        submitBtn.disabled = true;
                    }
                });
            }

            // Manejar la vista previa del documento
            const previewContainer = document.getElementById('previewContainer');
            const previewPlaceholder = document.getElementById('previewPlaceholder');
            const documentViewer = document.getElementById('documentViewer');
            const documentFrame = document.getElementById('documentFrame');

            if (previewContainer && previewPlaceholder && documentViewer && documentFrame) {
                previewPlaceholder.addEventListener('click', function() {
                    // Mostrar indicador de carga
                    previewPlaceholder.innerHTML = '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Cargando...</span></div><p>Cargando documento...</p>';

                    // Cargar el documento en el iframe
                    documentFrame.src = "{{ route('documents.view', $document) }}";

                    // Cuando el iframe termine de cargar, mostrar el visor y ocultar el placeholder
                    documentFrame.onload = function() {
                        documentViewer.style.display = 'block';
                        previewPlaceholder.style.display = 'none';
                    };

                    // Si hay un error al cargar el documento
                    documentFrame.onerror = function() {
                        previewPlaceholder.innerHTML = '<i class="fas fa-exclamation-triangle text-danger"></i><p>Error al cargar el documento. <a href="{{ route("documents.download", $document) }}">Descargar</a> en su lugar.</p>';
                    };
                });
            }

            // Simulación de envío de comentario
            const commentForm = document.querySelector('.comment-form form');
            if (commentForm) {
                commentForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const textarea = this.querySelector('textarea');
                    if (textarea.value.trim() !== '') {
                        alert('Comentario enviado con éxito. Será revisado antes de ser publicado.');
                        textarea.value = '';
                    }
                });
            }

            // Toggle chevron icon for collapsible sections
            document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(button => {
                button.addEventListener('click', function() {
                    const icon = this.querySelector('.fas.fa-chevron-down');
                    if (icon) {
                        if (this.getAttribute('aria-expanded') === 'true') {
                            icon.classList.replace('fa-chevron-down', 'fa-chevron-up');
                        } else {
                            icon.classList.replace('fa-chevron-up', 'fa-chevron-down');
                        }
                    }
                });

                // Set initial state
                const target = document.querySelector(button.getAttribute('data-bs-target'));
                const icon = button.querySelector('.fas.fa-chevron-down');
                if (icon && target && target.classList.contains('show')) {
                    icon.classList.replace('fa-chevron-down', 'fa-chevron-up');
                }
            });
        });
    </script>
</body>

</html>