<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda Avanzada - Repositorio Académico Digital</title>
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

        .breadcrumb-item a {
            color: var(--primary-blue);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: var(--hover-color);
            text-decoration: underline;
        }

        .breadcrumb-item.active {
            color: var(--text-light);
        }

        .search-header {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
        }

        .search-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 1.5rem;
        }

        .search-form {
            margin-bottom: 1.5rem;
        }

        .search-input {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        .search-input:focus {
            border-color: var(--secondary-blue);
            box-shadow: 0 0 0 0.2rem rgba(66, 139, 202, 0.25);
            background-color: white;
        }

        .search-btn {
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            background-color: var(--hover-color);
            border-color: var(--hover-color);
            transform: translateY(-2px);
        }

        .advanced-search-toggle {
            color: var(--primary-blue);
            font-weight: 500;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .advanced-search-toggle:hover {
            color: var(--hover-color);
        }

        .advanced-search-toggle i {
            transition: all 0.3s ease;
        }

        .advanced-search-toggle.active i {
            transform: rotate(180deg);
        }

        .advanced-search-panel {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin-top: 1rem;
            display: none;
        }

        .advanced-search-panel.active {
            display: block;
        }

        .advanced-search-row {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
            align-items: flex-end;
        }

        .advanced-search-field {
            flex: 1;
        }

        .advanced-search-field label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            color: var(--text-dark);
            font-weight: 500;
        }

        .advanced-search-field select,
        .advanced-search-field input {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            background-color: white;
            transition: all 0.3s ease;
        }

        .advanced-search-field select:focus,
        .advanced-search-field input:focus {
            border-color: var(--secondary-blue);
            box-shadow: 0 0 0 0.2rem rgba(66, 139, 202, 0.25);
            outline: none;
        }

        .remove-field-btn {
            background-color: transparent;
            border: none;
            color: var(--text-light);
            cursor: pointer;
            transition: all 0.3s ease;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
        }

        .remove-field-btn:hover {
            background-color: rgba(0, 0, 0, 0.05);
            color: var(--primary-blue);
        }

        .add-field-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary-blue);
            background-color: transparent;
            border: 1px dashed #e0e0e0;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            width: 100%;
            justify-content: center;
            transition: all 0.3s ease;
            cursor: pointer;
            margin-bottom: 1.5rem;
        }

        .add-field-btn:hover {
            background-color: rgba(0, 0, 0, 0.02);
            border-color: var(--primary-blue);
        }

        .advanced-search-actions {
            display: flex;
            gap: 1rem;
        }

        .btn-search-advanced {
            background-color: var(--primary-blue);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-search-advanced:hover {
            background-color: var(--hover-color);
            transform: translateY(-2px);
        }

        .btn-search-reset {
            background-color: transparent;
            color: var(--text-light);
            border: 1px solid #e0e0e0;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-search-reset:hover {
            background-color: rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
        }

        .filter-panel {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            margin-bottom: 2rem;
        }

        .filter-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-blue);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
        }

        .filter-title i {
            transition: all 0.3s ease;
        }

        .filter-title.collapsed i {
            transform: rotate(-90deg);
        }

        .filter-section {
            margin-bottom: 1.5rem;
        }

        .filter-section:last-child {
            margin-bottom: 0;
        }

        .form-check-label {
            font-size: 0.9rem;
            color: var(--text-dark);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-check-label:hover {
            color: var(--primary-blue);
        }

        .form-check-input:checked {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        .filter-badge {
            background-color: rgba(66, 139, 202, 0.1);
            color: var(--primary-blue);
            font-size: 0.8rem;
            padding: 0.25rem 0.5rem;
            border-radius: 20px;
            margin-left: 0.5rem;
        }

        .active-filters {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .active-filter {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background-color: rgba(66, 139, 202, 0.1);
            color: var(--primary-blue);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .active-filter:hover {
            background-color: rgba(66, 139, 202, 0.2);
        }

        .active-filter i {
            cursor: pointer;
        }

        .active-filter i:hover {
            color: #dc3545;
        }

        .clear-filters {
            color: #dc3545;
            background-color: rgba(220, 53, 69, 0.1);
            cursor: pointer;
        }

        .clear-filters:hover {
            background-color: rgba(220, 53, 69, 0.2);
        }

        .results-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .results-count {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .results-count span {
            color: var(--primary-blue);
        }

        .results-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .results-sort {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .results-sort label {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-bottom: 0;
        }

        .results-sort select {
            border-radius: 10px;
            padding: 0.5rem;
            border: 1px solid rgba(0, 0, 0, 0.1);
            font-size: 0.9rem;
            color: var(--text-dark);
            background-color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .results-sort select:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.2rem rgba(66, 139, 202, 0.25);
        }

        .results-view {
            display: flex;
            gap: 0.5rem;
        }

        .view-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background-color: white;
            border: 1px solid rgba(0, 0, 0, 0.1);
            color: var(--text-light);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .view-btn:hover {
            background-color: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
        }

        .view-btn.active {
            background-color: var(--primary-blue);
            color: white;
        }

        .document-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .document-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-hover-shadow);
        }

        .document-card-body {
            padding: 1.5rem;
        }

        .document-card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: var(--primary-blue);
        }

        .document-card-title a {
            color: var(--primary-blue);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .document-card-title a:hover {
            color: var(--hover-color);
        }

        .document-card-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .document-card-meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .document-card-meta-item i {
            color: var(--primary-blue);
        }

        .document-card-text {
            margin-bottom: 1.5rem;
            color: var(--text-dark);
            line-height: 1.6;
        }

        .document-card-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .document-card-tag {
            background-color: rgba(66, 139, 202, 0.1);
            color: var(--primary-blue);
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .document-card-tag:hover {
            background-color: rgba(66, 139, 202, 0.2);
        }

        .document-card-actions {
            display: flex;
            gap: 1rem;
        }

        .btn-card-action {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-card-action:hover {
            transform: translateY(-2px);
        }

        .btn-view {
            background-color: var(--primary-blue);
            color: white;
            border: none;
        }

        .btn-view:hover {
            background-color: var(--hover-color);
        }

        .btn-download {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .btn-download:hover {
            background-color: #218838;
        }

        .btn-save {
            background-color: transparent;
            color: var(--text-light);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .btn-save:hover {
            background-color: rgba(0, 0, 0, 0.05);
            color: var(--primary-blue);
        }

        .pagination-container {
            margin-top: 2rem;
            display: flex;
            justify-content: center;
        }

        .pagination {
            display: flex;
            gap: 0.5rem;
        }

        .page-item .page-link {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            color: var(--text-dark);
            border: 1px solid rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .page-item .page-link:hover {
            background-color: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
        }

        .page-item.active .page-link {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
            color: white;
        }

        .page-item.disabled .page-link {
            color: var(--text-light);
            pointer-events: none;
            background-color: rgba(0, 0, 0, 0.05);
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

        @media (max-width: 992px) {
            .advanced-search-row {
                flex-direction: column;
                gap: 1rem;
            }

            .results-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .results-actions {
                width: 100%;
                justify-content: space-between;
            }
        }

        @media (max-width: 768px) {
            .search-header {
                padding: 1.5rem;
            }

            .search-title {
                font-size: 1.5rem;
            }

            .advanced-search-actions {
                flex-direction: column;
                gap: 1rem;
            }

            .document-card-actions {
                flex-direction: column;
            }

            .btn-card-action {
                width: 100%;
                justify-content: center;
            }
        }

        .document-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            background-color: rgba(0, 0, 0, 0.02);
        }

        .document-type {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .document-date {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .document-actions {
            display: flex;
            gap: 0.5rem;
        }

        .document-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: var(--primary-blue);
        }

        .document-title a {
            color: var(--primary-blue);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .document-title a:hover {
            color: var(--hover-color);
        }

        .document-authors {
            color: var(--text-light);
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .document-abstract {
            margin-bottom: 1.5rem;
            color: var(--text-dark);
            line-height: 1.6;
        }

        .document-keywords {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .keyword-badge {
            background-color: rgba(66, 139, 202, 0.1);
            color: var(--primary-blue);
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .keyword-badge:hover {
            background-color: rgba(66, 139, 202, 0.2);
        }

        .document-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.5rem;
            background-color: rgba(0, 0, 0, 0.02);
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        .document-metrics {
            display: flex;
            gap: 1rem;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .document-metrics span {
            display: flex;
            align-items: center;
            gap: 0.25rem;
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
                        <a href="{{ route('home') }}" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('collection') }}" class="nav-link">Colecciones</a>
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
                <li class="breadcrumb-item active" aria-current="page">Búsqueda Avanzada</li>
            </ol>
        </nav>
    </div>

    <!-- Main Content -->
    <main class="container">
        <!-- Search Header -->
        <div class="search-header">
            <h1 class="search-title">Búsqueda Avanzada</h1>

            <div class="search-form">
                <form action="{{ route('search.advanced') }}" method="GET">
                    <!-- Mantener los filtros actuales -->
                    @if(request()->has('type'))
                    @foreach((array)request('type') as $type)
                    <input type="hidden" name="type[]" value="{{ $type }}">
                    @endforeach
                    @endif

                    @if(request()->has('year_from'))
                    <input type="hidden" name="year_from" value="{{ request('year_from') }}">
                    @endif

                    @if(request()->has('year_to'))
                    <input type="hidden" name="year_to" value="{{ request('year_to') }}">
                    @endif

                    @if(request()->has('keywords'))
                    @foreach((array)request('keywords') as $keyword)
                    <input type="hidden" name="keywords[]" value="{{ $keyword }}">
                    @endforeach
                    @endif

                    @if(request()->has('sort'))
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                    @endif

                    <div class="input-group mb-3">
                        <input type="search" name="query" class="form-control search-input"
                            placeholder="Buscar por título, autor, palabras clave..."
                            value="{{ request('query') }}">
                        <button class="btn btn-primary search-btn" type="submit">
                            <i class="fas fa-search me-2"></i> Buscar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Active Filters Section -->
        <div class="active-filters">
            @if(request()->has('query'))
            <div class="active-filter" data-type="query" data-value="{{ request('query') }}">
                <span>Búsqueda: {{ request('query') }}</span>
                <i class="fas fa-times"></i>
            </div>
            @endif

            @if(request()->has('type'))
            @php
            // Fix: Properly handle type parameter which could be an array or string
            $types = request()->get('type');
            $types = is_array($types) ? $types : [$types];
            @endphp
            @foreach($types as $type)
            <div class="active-filter" data-type="type" data-value="{{ $type }}">
                <span>Tipo:
                    @php
                    $docType = $type;
                    switch(strtolower($docType)) {
                    case 'area_grado':
                    echo 'Área de Grado';
                    break;
                    case 'tesis':
                    echo 'Tesis';
                    break;
                    case 'pasantía':
                    echo 'Pasantía';
                    break;
                    case 'practicas_profesionales':
                    echo 'Prácticas Profesionales';
                    break;
                    case 'servicio_comunitario':
                    echo 'Servicio Comunitario';
                    break;
                    case 'lineas_investigacion':
                    echo 'Línea de Investigación';
                    break;
                    default:
                    echo ucfirst(str_replace('_', ' ', $docType));
                    }
                    @endphp
                </span>
                <i class="fas fa-times"></i>
            </div>
            @endforeach
            @endif

            @if(request()->has('year_from') || request()->has('year_to'))
            <div class="active-filter" data-type="year">
                <span>Año:
                    @if(request()->has('year_from') && request()->has('year_to'))
                    {{ request('year_from') }} - {{ request('year_to') }}
                    @elseif(request()->has('year_from'))
                    Desde {{ request('year_from') }}
                    @elseif(request()->has('year_to'))
                    Hasta {{ request('year_to') }}
                    @endif
                </span>
                <i class="fas fa-times"></i>
            </div>
            @endif

            @if(request()->has('keywords'))
            @php
            // Fix: Properly handle keywords parameter which could be an array or string
            $keywords = request()->get('keywords');
            $keywords = is_array($keywords) ? $keywords : [$keywords];
            @endphp
            @foreach($keywords as $keyword)
            <div class="active-filter" data-type="keyword" data-value="{{ $keyword }}">
                <span>Palabra clave: {{ $keyword }}</span>
                <i class="fas fa-times"></i>
            </div>
            @endforeach
            @endif

            @if(request()->has('query') || request()->has('type') || request()->has('year_from') ||
            request()->has('year_to') || request()->has('keywords'))
            <div class="active-filter clear-filters">
                <span>Limpiar todos los filtros</span>
                <i class="fas fa-trash-alt"></i>
            </div>
            @endif
        </div>

        <div class="row">
            <!-- Filters Panel -->
            <div class="col-lg-3">
                <div class="filter-panel">
                    <h3 class="h5 mb-4">Refinar Resultados</h3>

                    <form id="filter-form" action="{{ route('search.advanced') }}" method="GET">
                        <!-- Mantener la consulta de búsqueda actual -->
                        @if(request()->has('query'))
                        <input type="hidden" name="query" value="{{ request('query') }}">
                        @endif

                        <!-- Mantener el ordenamiento actual -->
                        @if(request()->has('sort'))
                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                        @endif

                        <div class="filter-section">
                            <div class="filter-title" data-bs-toggle="collapse" data-bs-target="#filterType">
                                <span>Tipo de Documento</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="filter-content collapse show" id="filterType">
                                @foreach($documentTypes as $type)
                                <div class="form-check mb-2">
                                    <input class="form-check-input filter-checkbox" type="checkbox"
                                        name="type[]" id="type{{ \Illuminate\Support\Str::slug($type->document_type) }}"
                                        value="{{ $type->document_type }}"
                                        {{ (is_array(request('type')) && in_array($type->document_type, request('type'))) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="type{{ \Illuminate\Support\Str::slug($type->document_type) }}">
                                        @php
                                        $docType = $type->document_type;
                                        switch(strtolower($docType)) {
                                        case 'area_grado':
                                        $displayType = 'Área de Grado';
                                        break;
                                        case 'tesis':
                                        $displayType = 'Tesis';
                                        break;
                                        case 'pasantía':
                                        $displayType = 'Pasantía';
                                        break;
                                        case 'practicas_profesionales':
                                        $displayType = 'Prácticas Profesionales';
                                        break;
                                        case 'servicio_comunitario':
                                        $displayType = 'Servicio Comunitario';
                                        break;
                                        case 'lineas_investigacion':
                                        $displayType = 'Línea de Investigación';
                                        break;
                                        default:
                                        $displayType = ucfirst(str_replace('_', ' ', $docType));
                                        }
                                        @endphp
                                        {{ $displayType }} <span class="filter-badge">{{ $type->count }}</span>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="filter-section">
                            <div class="filter-title" data-bs-toggle="collapse" data-bs-target="#filterYear">
                                <span>Año de Publicación</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="filter-content collapse show" id="filterYear">
                                <div class="year-range-inputs mb-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="year_from" class="form-label">Desde</label>
                                            <select name="year_from" id="year_from" class="form-select filter-select">
                                                <option value="">Seleccionar</option>
                                                @foreach($years as $year)
                                                <option value="{{ $year }}" {{ request('year_from') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="year_to" class="form-label">Hasta</label>
                                            <select name="year_to" id="year_to" class="form-select filter-select">
                                                <option value="">Seleccionar</option>
                                                @foreach($years as $year)
                                                <option value="{{ $year }}" {{ request('year_to') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="filter-section">
                            <div class="filter-title" data-bs-toggle="collapse" data-bs-target="#filterKeywords">
                                <span>Palabras Clave</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="filter-content collapse show" id="filterKeywords">
                                @if(isset($keywordsData) && count($keywordsData) > 0)
                                @foreach(array_slice($keywordsData, 0, 10) as $keywordData)
                                <div class="form-check mb-2">
                                    <input class="form-check-input filter-checkbox" type="checkbox"
                                        name="keywords[]" id="keyword{{ \Illuminate\Support\Str::slug($keywordData['keyword']) }}"
                                        value="{{ $keywordData['keyword'] }}"
                                        {{ (is_array(request('keywords')) && in_array($keywordData['keyword'], request('keywords'))) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="keyword{{ \Illuminate\Support\Str::slug($keywordData['keyword']) }}">
                                        {{ $keywordData['keyword'] }} <span class="filter-badge">{{ $keywordData['count'] }}</span>
                                    </label>
                                </div>
                                @endforeach
                                @else
                                <p>No hay palabras clave disponibles.</p>
                                @endif
                            </div>
                        </div>

                        <div class="filter-actions mt-4">
                            <button type="submit" class="btn btn-primary w-100 mb-2">
                                <i class="fas fa-filter me-2"></i> Aplicar Filtros
                            </button>
                            <a href="{{ route('search.advanced') }}" class="btn btn-outline-secondary w-100">
                                <i class="fas fa-undo me-2"></i> Limpiar Filtros
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Results -->
            <div class="col-lg-9">
                <div class="results-header">
                    @if(isset($documents) && $documents->count() > 0)
                    <div class="results-count">
                        <span>{{ $resultsCount }}</span> resultados encontrados
                    </div>
                    <div class="results-actions">
                        <div class="results-sort">
                            <label for="sort">Ordenar por:</label>
                            <select id="sort" class="form-select" onchange="updateSort(this.value)">
                                <option value="date_desc" {{ request('sort') == 'date_desc' ? 'selected' : '' }}>Más recientes</option>
                                <option value="date_asc" {{ request('sort') == 'date_asc' ? 'selected' : '' }}>Más antiguos</option>
                                <option value="title_asc" {{ request('sort') == 'title_asc' ? 'selected' : '' }}>Título (A-Z)</option>
                                <option value="author_asc" {{ request('sort') == 'author_asc' ? 'selected' : '' }}>Autor (A-Z)</option>
                            </select>
                        </div>
                        <div class="results-view">
                            <button class="view-btn active">
                                <i class="fas fa-th-list"></i>
                            </button>
                            <button class="view-btn">
                                <i class="fas fa-th"></i>
                            </button>
                        </div>
                    </div>
                    @elseif(request()->has('query') || request()->has('type') || request()->has('year_from') ||
                    request()->has('year_to') || request()->has('keywords'))
                    <h3>No se encontraron resultados para tu búsqueda</h3>
                    <p>Intenta con otros términos o filtros de búsqueda</p>
                    @else
                    <h3>Realiza una búsqueda para ver resultados</h3>
                    @endif
                </div>

                @if(isset($documents) && $documents->count() > 0)
                <div class="row">
                    @foreach($documents as $document)
                    <div class="col-12 mb-4">
                        <div class="document-card">
                            <div class="document-card-header">
                                <div class="document-type">
                                    <span class="badge bg-primary">
                                        @php
                                        $docType = $document->document_type ?? $document->type ?? '';
                                        // Format document type for better readability
                                        switch(strtolower($docType)) {
                                        case 'area_grado':
                                        echo 'Área de Grado';
                                        break;
                                        case 'tesis':
                                        echo 'Tesis';
                                        break;
                                        case 'pasantía':
                                        echo 'Pasantía';
                                        break;
                                        case 'practicas_profesionales':
                                        echo 'Prácticas Profesionales';
                                        break;
                                        case 'servicio_comunitario':
                                        echo 'Servicio Comunitario';
                                        break;
                                        case 'lineas_investigacion':
                                        echo 'Línea de Investigación';
                                        break;
                                        default:
                                        echo ucfirst(str_replace('_', ' ', $docType));
                                        }
                                        @endphp
                                    </span>
                                    <span class="document-date">{{ \Carbon\Carbon::parse($document->publication_date)->format('d M, Y') }}</span>
                                </div>
                                <div class="document-actions">
                                    @if(Auth::check() && (Auth::user()->hasRole('admin') || Auth::user()->hasRole('profesor')))
                                    <a href="{{ route('documents.download', $document->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    @endif
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="far fa-bookmark"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="document-card-body">
                                <h4 class="document-title">
                                    <a href="{{ route('documents.show', $document->id) }}">{{ $document->title }}</a>
                                </h4>
                                <div class="document-authors">
                                    <i class="fas fa-user-edit me-2"></i> {{ $document->author }}
                                </div>
                                <p class="document-abstract">
                                    {{ \Illuminate\Support\Str::limit($document->description, 150) }}
                                </p>
                                @if(!empty($document->keywords))
                                <div class="document-keywords">
                                    @foreach(explode(',', $document->keywords) as $keyword)
                                    <span class="keyword-badge">{{ trim($keyword) }}</span>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            <div class="document-card-footer">
                                <div class="document-metrics">
                                    <span><i class="fas fa-eye me-1"></i> {{ $document->views_count ?? 0 }}</span>
                                    <span><i class="fas fa-download me-1"></i> {{ $document->downloads_count ?? 0 }}</span>
                                    <span><i class="fas fa-comment me-1"></i> {{ $document->comments_count ?? 0 }}</span>
                                </div>
                                <a href="{{ route('documents.show', $document->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye me-1"></i> Ver documento
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Paginación -->
                <div class="pagination-container">
                    {{ $documents->links() }}
                </div>
                @endif
            </div>
        </div>
    </main>

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
            // Efecto de scroll en la barra de navegación
            const mainNav = document.querySelector('.main-nav');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 100) {
                    mainNav.classList.add('scrolled');
                } else {
                    mainNav.classList.remove('scrolled');
                }
            });

            // Animación para los filtros
            const filterTitles = document.querySelectorAll('.filter-title');
            filterTitles.forEach(title => {
                title.addEventListener('click', function() {
                    this.classList.toggle('collapsed');
                });
            });

            // Función para actualizar el ordenamiento
            window.updateSort = function(sortValue) {
                // Obtener la URL actual
                const url = new URL(window.location.href);

                // Actualizar o agregar el parámetro de ordenamiento
                url.searchParams.set('sort', sortValue);

                // Redirigir a la nueva URL
                window.location.href = url.toString();
            };

            // Inicializar los filtros activos
            const activeFilters = document.querySelectorAll('.active-filter');
            activeFilters.forEach(filter => {
                const closeIcon = filter.querySelector('i');
                if (closeIcon) {
                    closeIcon.addEventListener('click', function() {
                        const filterType = filter.dataset.type;
                        const filterValue = filter.dataset.value;

                        // Obtener la URL actual
                        const url = new URL(window.location.href);

                        // Eliminar el filtro específico
                        if (filterType === 'query') {
                            url.searchParams.delete('query');
                        } else if (filterType === 'type') {
                            const types = url.searchParams.getAll('type');
                            url.searchParams.delete('type');
                            types.forEach(type => {
                                if (type !== filterValue) {
                                    url.searchParams.append('type', type);
                                }
                            });
                        } else if (filterType === 'year') {
                            url.searchParams.delete('year_from');
                            url.searchParams.delete('year_to');
                        } else if (filterType === 'keyword') {
                            const keywords = url.searchParams.getAll('keywords');
                            url.searchParams.delete('keywords');
                            keywords.forEach(keyword => {
                                if (keyword !== filterValue) {
                                    url.searchParams.append('keywords', keyword);
                                }
                            });
                        }

                        // Redirigir a la nueva URL
                        window.location.href = url.toString();
                    });
                }
            });

            // Limpiar todos los filtros
            const clearFiltersBtn = document.querySelector('.clear-filters');
            if (clearFiltersBtn) {
                clearFiltersBtn.addEventListener('click', function() {
                    // Redirigir a la página de búsqueda sin parámetros
                    window.location.href = "{{ route('search.advanced') }}";
                });
            }

            // Añadir campo de búsqueda avanzada
            const addFieldBtn = document.querySelector('.add-field-btn');
            if (addFieldBtn) {
                addFieldBtn.addEventListener('click', function() {
                    const newRow = document.createElement('div');
                    newRow.className = 'advanced-search-row';
                    newRow.innerHTML = `
                <div class="advanced-search-field">
                    <label>Buscar en</label>
                    <select>
                        <option>Todos los campos</option>
                        <option>Título</option>
                        <option>Autor</option>
                        <option>Resumen</option>
                        <option>Palabras clave</option>
                        <option>Texto completo</option>
                    </select>
                </div>
                <div class="advanced-search-field">
                    <label>Término</label>
                    <input type="text" placeholder="Término de búsqueda">
                </div>
                <div class="advanced-search-field">
                    <label>Operador</label>
                    <select>
                        <option>Y (AND)</option>
                        <option>O (OR)</option>
                        <option>NO (NOT)</option>
                    </select>
                </div>
                <button class="remove-field-btn">
                    <i class="fas fa-times"></i>
                </button>
            `;

                    // Insertar antes del botón de añadir
                    addFieldBtn.parentNode.insertBefore(newRow, addFieldBtn);

                    // Añadir evento para eliminar el campo
                    const removeBtn = newRow.querySelector('.remove-field-btn');
                    removeBtn.addEventListener('click', function() {
                        newRow.remove();
                    });
                });
            }

            // Inicializar los botones de eliminar campo
            const removeFieldBtns = document.querySelectorAll('.remove-field-btn');
            removeFieldBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const row = this.closest('.advanced-search-row');
                    if (row) {
                        row.remove();
                    }
                });
            });

            // Manejar cambios en los filtros de tipo de documento
            const typeCheckboxes = document.querySelectorAll('#filterType .form-check-input');
            typeCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const url = new URL(window.location.href);
                    url.searchParams.delete('type');

                    // Recopilar todos los tipos seleccionados
                    typeCheckboxes.forEach(cb => {
                        if (cb.checked) {
                            // Obtener el valor directamente del atributo value del checkbox
                            url.searchParams.append('type', cb.value);
                        }
                    });

                    // Redirigir a la nueva URL
                    window.location.href = url.toString();
                });
            });

            // Manejar cambios en los filtros de palabras clave
            const keywordCheckboxes = document.querySelectorAll('#filterKeywords .form-check-input');
            keywordCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const url = new URL(window.location.href);
                    url.searchParams.delete('keywords');

                    // Recopilar todas las palabras clave seleccionadas
                    keywordCheckboxes.forEach(cb => {
                        if (cb.checked) {
                            // Obtener el valor directamente del atributo value del checkbox
                            url.searchParams.append('keywords', cb.value);
                        }
                    });

                    // Redirigir a la nueva URL
                    window.location.href = url.toString();
                });
            });

            // Manejar cambios en los selectores de año
            const yearSelects = document.querySelectorAll('#year_from, #year_to');
            yearSelects.forEach(select => {
                select.addEventListener('change', function() {
                    // Enviar el formulario cuando cambia el valor
                    document.getElementById('filter-form').submit();
                });
            });

            // Manejar cambio de vista (lista/cuadrícula)
            const viewButtons = document.querySelectorAll('.view-btn');
            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remover la clase active de todos los botones
                    viewButtons.forEach(btn => btn.classList.remove('active'));

                    // Añadir la clase active al botón clickeado
                    this.classList.add('active');

                    // Aquí puedes añadir lógica para cambiar la vista
                    // Por ejemplo, cambiar clases en el contenedor de resultados
                });
            });
        });
    </script>
</body>

</html>