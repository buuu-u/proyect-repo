<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Líneas de Investigación - Repositorio Académico Digital</title>
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

        .hero-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 5rem 0;
            margin-bottom: 3rem;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            animation: fadeInUp 1s ease-out;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease-out 0.5s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .search-form {
            max-width: 600px;
            margin: 0 auto;
        }

        .search-input {
            border: none;
            border-radius: 30px;
            padding: 1rem 1.5rem;
            font-size: 1.1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .search-input:focus {
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .search-btn {
            border-radius: 30px;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .document-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .document-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-hover-shadow);
        }

        .document-card-body {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .document-card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--primary-blue);
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .document-card-text {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-bottom: 1rem;
            flex-grow: 1;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        .document-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.5rem;
            background-color: rgba(0, 0, 0, 0.02);
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        .document-card-meta {
            font-size: 0.8rem;
            color: var(--text-light);
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            max-width: 65%;
        }

        .document-card-meta i {
            margin-right: 0.25rem;
            color: var(--primary-blue);
        }

        .document-card-meta span {
            margin-right: 1rem;
            display: inline-block;
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .document-stats {
            display: flex;
            gap: 1rem;
            font-size: 0.85rem;
            color: var(--text-light);
            margin-top: 0.5rem;
        }

        .document-stats i {
            margin-right: 0.25rem;
            color: var(--primary-blue);
        }

        .btn-primary {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: var(--hover-color);
            border-color: var(--hover-color);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }

        .filters {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            margin-bottom: 2rem;
            position: sticky;
            top: 100px;
        }

        .filters h4 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--primary-blue);
        }

        .form-check-label {
            font-size: 0.9rem;
            color: var(--text-dark);
        }

        .form-check-input:checked {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        .pagination {
            justify-content: center;
            margin-top: 2rem;
        }

        .page-link {
            color: var(--primary-blue);
            border-radius: 5px;
            margin: 0 0.2rem;
            transition: all 0.3s ease;
        }

        .page-link:hover {
            background-color: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
        }

        .page-item.active .page-link {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
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

        .stats-container {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .stat-item {
            background-color: rgba(0, 0, 0, 0.03);
            border-radius: 8px;
            padding: 0.5rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .stat-item i {
            color: var(--primary-blue);
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

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }
        }

        .notification-toast {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeOut 0.5s 5s forwards;
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
                display: none;
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
                <div class="d-flex align-items-center">
                    <ul class="nav me-3">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('collection') }}" class="nav-link">Colecciones</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('lineas.investigacion') }}" class="nav-link active">Líneas de Investigación</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('about') }}" class="nav-link">Acerca de</a>
                        </li>
                    </ul>
                    @if(Auth::check() && (Auth::user()->hasRole('admin') || Auth::user()->hasRole('profesor')))
                    <a href="{{ route('register-document') }}" class="btn btn-success">
                        <i class="fas fa-upload me-2"></i>Subir Documento
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <!-- Mensaje de éxito -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show notification-toast" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="container text-center">
            <h1 class="hero-title">Líneas de Investigación</h1>
            <p class="hero-subtitle">Explora las principales áreas de investigación académica y sus contribuciones al conocimiento</p>
            <form class="search-form" action="{{ route('lineas.investigacion') }}" method="GET">
                <div class="input-group input-group-lg">
                    <input type="search" name="search" class="form-control search-input" placeholder="Buscar líneas de investigación..." value="{{ request('search') }}">
                    <button class="btn btn-primary search-btn" type="submit">Buscar</button>
                </div>
                <!-- Mantener los filtros actuales en la búsqueda -->
                @if(request()->has('category'))
                @foreach(request('category') as $category)
                <input type="hidden" name="category[]" value="{{ $category }}">
                @endforeach
                @endif
                @if(request()->has('year'))
                @foreach(request('year') as $year)
                <input type="hidden" name="year[]" value="{{ $year }}">
                @endforeach
                @endif
            </form>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container">
        <div class="row">
            <!-- Filters Sidebar -->
            <div class="col-md-3">
                <div class="filters">
                    <h4>Filtros</h4>
                    <form action="{{ route('lineas.investigacion') }}" method="GET">
                        @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif

                        <div class="mb-3">
                            <h5 class="h6">Categoría</h5>
                            @foreach($categories as $category)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="category[]" value="{{ $category }}"
                                    id="filter{{ Str::slug($category) }}"
                                    {{ (request()->has('category') && in_array($category, request()->category)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="filter{{ Str::slug($category) }}">
                                    {{ $category }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <div class="mb-3">
                            <h5 class="h6">Año</h5>
                            @foreach($years as $year)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="year[]" value="{{ $year }}"
                                    id="filter{{ $year }}"
                                    {{ (request()->has('year') && in_array($year, request()->year)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="filter{{ $year }}">
                                    {{ $year }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Aplicar Filtros</button>
                        @if(request()->has('category') || request()->has('year'))
                        <a href="{{ route('lineas.investigacion') }}" class="btn btn-outline-secondary w-100 mt-2">Limpiar Filtros</a>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Documents Grid -->
            <div class="col-md-9">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @forelse($documents as $document)
                    <div class="col">
                        <div class="document-card">
                            <div class="document-card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Logo Líneas de Investigación" class="company-logo" style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%; border: 2px solid var(--primary-blue); margin-right: 1rem;">
                                    <h5 class="document-card-title mb-0" title="{{ $document->title }}">{{ $document->title }}</h5>
                                </div>
                                <p class="document-card-text" title="{{ $document->description ?? '' }}">{{ Str::limit($document->description ?? '', 150) }}</p>
                                <div class="mb-2">
                                    <span class="badge bg-primary">{{ ucfirst(str_replace('_', ' ', $document->document_type)) }}</span>
                                    @if($document->category)
                                    <span class="badge badge-primary">{{ $document->category }}</span>
                                    @endif
                                    <span class="badge bg-secondary">{{ $document->created_at->format('Y') }}</span>
                                </div>
                                <div class="document-stats">
                                    <span><i class="fas fa-eye"></i> {{ $document->views_count ?? 0 }} vistas</span>
                                    <span><i class="fas fa-download"></i> {{ $document->downloads_count ?? 0 }} descargas</span>
                                </div>
                            </div>
                            <div class="document-card-footer">
                                <div class="document-card-meta">
                                    <span title="{{ $document->author }}"><i class="fas fa-user"></i> {{ $document->author }}</span>
                                </div>
                                <a href="{{ route('documents.show', $document) }}" class="btn btn-sm btn-primary">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-info">
                            No se encontraron documentos de Líneas de Investigación.
                        </div>
                    </div>
                    @endforelse
                </div>

                <!-- Paginación -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $documents->links() }}
                </div>
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

            // Auto-dismiss notifications after 5 seconds
            const notifications = document.querySelectorAll('.notification-toast');
            notifications.forEach(notification => {
                setTimeout(() => {
                    notification.classList.remove('show');
                    setTimeout(() => {
                        notification.remove();
                    }, 500);
                }, 5000);
            });

            // Animación para las tarjetas de documentos
            const documentCards = document.querySelectorAll('.document-card');
            documentCards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
                card.classList.add('fade-in');
            });

            // Funcionalidad de filtrado
            const filterCheckboxes = document.querySelectorAll('.filters input[type="checkbox"]');
            filterCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    // Aquí iría la lógica de filtrado real
                    // Por ahora, solo mostramos un mensaje en consola
                    console.log(`Filtro ${this.id} cambiado a: ${this.checked}`);

                    // Simulación de filtrado con animación
                    documentCards.forEach(card => {
                        card.style.opacity = '0.5';
                        card.style.transform = 'scale(0.95)';
                    });

                    setTimeout(() => {
                        documentCards.forEach(card => {
                            card.style.opacity = '1';
                            card.style.transform = 'scale(1)';
                        });
                    }, 500);
                });
            });
        });
    </script>
</body>

</html>