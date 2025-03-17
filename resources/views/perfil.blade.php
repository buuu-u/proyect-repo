<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario - Repositorio Académico Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        :root {
            --primary-blue: #2d5d86;
            --secondary-blue: #428bca;
            --hover-color: #1d4b6f;
            --bg-light: #f8f9fa;
            --text-dark: #333;
            --text-light: #6c757d;
            --card-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
        }

        .main-nav {
            background-color: white;
            box-shadow: var(--card-shadow);
            padding: 0.5rem 0;
        }

        .main-nav .navbar-brand img {
            height: 50px;
        }

        .main-nav .nav-link {
            color: var(--primary-blue);
            font-weight: 500;
            padding: 0.5rem 1rem;
        }

        .main-nav .nav-link:hover,
        .main-nav .nav-link:focus,
        .main-nav .nav-link.active {
            color: var(--hover-color);
        }

        .profile-header {
            background-color: white;
            border-radius: 8px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
        }

        .profile-content {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: var(--primary-blue);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 600;
        }

        .profile-info {
            flex: 1;
        }

        .profile-name {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.25rem;
        }

        .profile-role {
            font-size: 1rem;
            color: var(--text-light);
            margin-bottom: 0.5rem;
        }

        .profile-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .profile-stats {
            display: flex;
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .profile-stat {
            text-align: center;
        }

        .profile-stat-value {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-blue);
        }

        .profile-stat-label {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .btn-edit {
            background-color: var(--primary-blue);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-size: 0.9rem;
        }

        .btn-edit:hover {
            background-color: var(--hover-color);
        }

        .nav-tabs {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }

        .nav-tabs .nav-link {
            color: var(--text-light);
            font-weight: 500;
            padding: 0.75rem 1rem;
            border: none;
            border-bottom: 2px solid transparent;
        }

        .nav-tabs .nav-link:hover {
            color: var(--primary-blue);
        }

        .nav-tabs .nav-link.active {
            color: var(--primary-blue);
            border-bottom-color: var(--primary-blue);
            background-color: transparent;
        }

        .document-card {
            background-color: white;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: var(--card-shadow);
        }

        .document-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .document-title a {
            color: var(--primary-blue);
            text-decoration: none;
        }

        .document-title a:hover {
            color: var(--hover-color);
            text-decoration: underline;
        }

        .document-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 0.75rem;
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .document-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.85rem;
        }

        .activity-item {
            padding: 1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-text {
            margin-bottom: 0.25rem;
        }

        .activity-text a {
            color: var(--primary-blue);
            text-decoration: none;
        }

        .activity-text a:hover {
            text-decoration: underline;
        }

        .activity-date {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        footer {
            background-color: var(--primary-blue);
            color: white;
            padding: 2rem 0;
            margin-top: 3rem;
            font-size: 0.9rem;
        }

        footer a {
            color: white;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .profile-content {
                flex-direction: column;
                text-align: center;
            }

            .profile-meta {
                justify-content: center;
            }

            .profile-stats {
                justify-content: center;
            }
        }
    </style>
</head>

<body>
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
                        <a href="/collection" class="nav-link">Colecciones</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Ayuda</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container py-4">
        <!-- Mensajes de alerta -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Profile Header -->
        <div class="profile-header">
            <div class="profile-content">
                <div class="profile-avatar">
                    {{ substr(Auth::user()->name ?? 'RM', 0, 2) }}
                </div>
                <div class="profile-info">
                    <h1 class="profile-name">{{ Auth::user()->name ?? 'Dr. Roberto Méndez' }}</h1>
                    <div class="profile-role">
                        @if(Auth::user() && Auth::user()->user_type == 'profesor')
                        Profesor Investigador - Facultad de Medicina
                        @elseif(Auth::user() && Auth::user()->user_type == 'estudiante')
                        Estudiante - {{ Auth::user()->carrera ?? 'Universidad' }}
                        @elseif(Auth::user() && Auth::user()->user_type == 'externo')
                        {{ Auth::user()->profesion ?? 'Profesional' }} - {{ Auth::user()->institucion ?? 'Externo' }}
                        @else
                        Usuario
                        @endif
                    </div>
                    <div class="profile-meta">
                        <span>{{ Auth::user()->email ?? 'roberto.mendez@universidad.edu' }}</span>
                        @if(Auth::user() && Auth::user()->user_type == 'profesor')
                        <span>{{ Auth::user()->departamento ?? 'Departamento de Neurología' }}</span>
                        @elseif(Auth::user() && Auth::user()->user_type == 'estudiante')
                        <span>Matrícula: {{ Auth::user()->matricula ?? 'N/A' }}</span>
                        @endif
                    </div>
                    <button class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="fas fa-edit me-1"></i> Editar Perfil
                    </button>
                </div>
            </div>
            <div class="profile-stats">
                <div class="profile-stat">
                    <div class="profile-stat-value">{{ Auth::user()->documents->count() ?? '24' }}</div>
                    <div class="profile-stat-label">Documentos</div>
                </div>
                <div class="profile-stat">
                    <div class="profile-stat-value">{{ Auth::user()->profile_data['views'] ?? '1,245' }}</div>
                    <div class="profile-stat-label">Vistas</div>
                </div>
                <div class="profile-stat">
                    <div class="profile-stat-value">{{ Auth::user()->profile_data['downloads'] ?? '245' }}</div>
                    <div class="profile-stat-label">Descargas</div>
                </div>
            </div>
        </div>

        <!-- Profile Tabs -->
        <ul class="nav nav-tabs" id="profileTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents" type="button" role="tab" aria-controls="documents" aria-selected="true">
                    Mis Documentos
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="activity-tab" data-bs-toggle="tab" data-bs-target="#activity" type="button" role="tab" aria-controls="activity" aria-selected="false">
                    Actividad Reciente
                </button>
            </li>
        </ul>

        <div class="tab-content" id="profileTabsContent">
            <!-- My Documents Tab -->
            <div class="tab-pane fade show active" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                @if(Auth::user() && Auth::user()->documents->count() > 0)
                @foreach(Auth::user()->documents as $document)
                <div class="document-card">
                    <h3 class="document-title">
                        <a href="{{ route('documents.show', $document->id) }}">{{ $document->title }}</a>
                    </h3>
                    <div class="document-meta">
                        <span>{{ $document->type }}</span>
                        <span>Publicado: {{ $document->created_at->format('d \d\e F, Y') }}</span>
                        <span>{{ $document->views_count ?? 0 }} vistas</span>
                    </div>
                    <p class="mb-0">{{ Str::limit($document->abstract, 150) }}</p>
                    <div class="document-actions">
                        <a href="{{ route('documents.show', $document->id) }}" class="btn btn-primary btn-sm">Ver</a>
                        <form action="{{ route('documents.destroy', $document->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="redirect_to" value="profile">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este documento?')">Eliminar</button>
                        </form>
                    </div>
                </div>
                @endforeach
                @else
                <div class="alert alert-info">
                    No has subido ningún documento aún.
                    <a href="{{ route('register-document') }}" class="alert-link">¡Sube tu primer documento ahora!</a>
                </div>
                @endif
            </div>

            <!-- Saved Documents Tab -->
            <div class="tab-pane fade" id="saved" role="tabpanel" aria-labelledby="saved-tab">
                <!-- Saved Document Card 1 -->
                <div class="document-card">
                    <h3 class="document-title">
                        <a href="#">Modelos de Deep Learning para la Detección de Patrones en Imágenes Médicas</a>
                    </h3>
                    <div class="document-meta">
                        <span>Dra. María González</span>
                        <span>Tesis Doctoral</span>
                        <span>2022</span>
                    </div>
                    <p class="mb-0">Investigación sobre el uso de redes neuronales profundas para la detección automática de patrones anómalos en imágenes médicas.</p>
                    <div class="document-actions">
                        <a href="#" class="btn btn-primary btn-sm">Ver</a>
                        <button class="btn btn-success btn-sm">Descargar</button>
                        <button class="btn btn-secondary btn-sm">Quitar</button>
                    </div>
                </div>

                <!-- Saved Document Card 2 -->
                <div class="document-card">
                    <h3 class="document-title">
                        <a href="#">Ética y Regulación de la Inteligencia Artificial en Medicina</a>
                    </h3>
                    <div class="document-meta">
                        <span>Dra. Ana Torres</span>
                        <span>Artículo</span>
                        <span>2023</span>
                    </div>
                    <p class="mb-0">Análisis de los desafíos éticos, legales y regulatorios asociados con la implementación de sistemas de inteligencia artificial en el ámbito médico.</p>
                    <div class="document-actions">
                        <a href="#" class="btn btn-primary btn-sm">Ver</a>
                        <button class="btn btn-success btn-sm">Descargar</button>
                        <button class="btn btn-secondary btn-sm">Quitar</button>
                    </div>
                </div>
            </div>

            <!-- Activity Tab -->
            <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
                @if(isset(Auth::user()->profile_data['activities']) && count(Auth::user()->profile_data['activities']) > 0)
                @foreach(Auth::user()->profile_data['activities'] as $activity)
                <div class="activity-item">
                    <div class="activity-text">
                        {{ $activity['description'] }}
                        @if(isset($activity['document_id']))
                        <a href="{{ route('documents.show', $activity['document_id']) }}">{{ $activity['document_title'] }}</a>
                        @endif
                    </div>
                    <div class="activity-date">{{ \Carbon\Carbon::parse($activity['date'])->format('d \d\e F, Y') }}</div>
                </div>
                @endforeach
                @else
                <div class="alert alert-info">No hay actividad reciente para mostrar.</div>
                @endif
            </div>
        </div>
    </main>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Editar Perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="profileEditForm" action="/profile" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="user_type" value="{{ Auth::user()->user_type ?? 'profesor' }}">

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre completo</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name ?? 'Dr. Roberto Méndez' }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email ?? 'roberto.mendez@universidad.edu' }}" required>
                            </div>
                        </div>

                        @if(Auth::user() && Auth::user()->user_type == 'profesor')
                        <div class="mb-3">
                            <label for="departamento" class="form-label">Departamento</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                <input type="text" class="form-control" id="departamento" name="departamento" value="{{ Auth::user()->departamento ?? 'Departamento de Neurología' }}">
                            </div>
                        </div>
                        @endif

                        @if(Auth::user() && Auth::user()->user_type == 'estudiante')
                        <div class="mb-3">
                            <label for="carrera" class="form-label">Carrera</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                <input type="text" class="form-control" id="carrera" name="carrera" value="{{ Auth::user()->carrera ?? '' }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="matricula" class="form-label">Número de matrícula</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                <input type="text" class="form-control" id="matricula" name="matricula" value="{{ Auth::user()->matricula ?? '' }}">
                            </div>
                        </div>
                        @endif

                        @if(Auth::user() && Auth::user()->user_type == 'externo')
                        <div class="mb-3">
                            <label for="institucion" class="form-label">Institución o empresa</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                <input type="text" class="form-control" id="institucion" name="institucion" value="{{ Auth::user()->institucion ?? '' }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="ocupacion" class="form-label">Ocupación o cargo</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                <input type="text" class="form-control" id="ocupacion" name="ocupacion" value="{{ Auth::user()->ocupacion ?? '' }}">
                            </div>
                        </div>
                        @endif

                        <div class="mb-3">
                            <label for="bio" class="form-label">Biografía</label>
                            <textarea class="form-control" id="bio" name="bio" rows="4">{{ Auth::user()->bio ?? 'Profesor investigador especializado en neurología con enfoque en enfermedades neurodegenerativas y aplicaciones de inteligencia artificial en medicina.' }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Nueva contraseña (dejar en blanco para mantener la actual)</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmar nueva contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" form="profileEditForm" class="btn btn-primary">Guardar cambios</button>
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
</body>

</html>