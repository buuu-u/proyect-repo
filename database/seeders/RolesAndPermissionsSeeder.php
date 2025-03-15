<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Crear permisos
        $permissions = [
            ['name' => 'Crear colecciones', 'slug' => 'create-collections'],
            ['name' => 'Editar cualquier colección', 'slug' => 'edit-any-collection'],
            ['name' => 'Eliminar cualquier colección', 'slug' => 'delete-any-collection'],
            ['name' => 'Crear documentos', 'slug' => 'create-documents'],
            ['name' => 'Editar cualquier documento', 'slug' => 'edit-any-document'],
            ['name' => 'Eliminar cualquier documento', 'slug' => 'delete-any-document'],
            ['name' => 'Gestionar categorías', 'slug' => 'manage-categories'],
            ['name' => 'Descargar documentos', 'slug' => 'download-documents'],
            ['name' => 'Ver documentos privados', 'slug' => 'view-private-documents'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        // Crear roles específicos para el repositorio UDO
        $adminRole = Role::create([
            'name' => 'Administrador',
            'slug' => 'admin',
            'description' => 'Acceso completo a todas las funcionalidades del sistema',
        ]);

        $profesorRole = Role::create([
            'name' => 'Profesor',
            'slug' => 'profesor',
            'description' => 'Puede subir, modificar y actualizar documentos en el repositorio',
        ]);

        $estudianteRole = Role::create([
            'name' => 'Estudiante',
            'slug' => 'estudiante',
            'description' => 'Puede ver y descargar documentos, sin permisos de modificación o carga',
        ]);

        $externoRole = Role::create([
            'name' => 'Usuario Externo',
            'slug' => 'externo',
            'description' => 'Puede ver los documentos públicos del repositorio, sin opción de descarga o modificación',
        ]);

        // Asignar permisos a roles
        $adminRole->permissions()->attach(Permission::all());

        $profesorRole->permissions()->attach(
            Permission::whereIn('slug', [
                'create-collections',
                'edit-any-collection',
                'create-documents',
                'edit-any-document',
                'delete-any-document',
                'download-documents',
                'view-private-documents',
            ])->get()
        );

        $estudianteRole->permissions()->attach(
            Permission::whereIn('slug', [
                'download-documents',
                'view-private-documents',
            ])->get()
        );

        // Los usuarios externos no tienen permisos especiales
        // Solo pueden ver documentos públicos (comportamiento por defecto)

        // Crear usuario administrador
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'user_type' => 'admin', // Añadimos el campo user_type
            'remember_token' => Str::random(10),
        ]);
        
        // Asignar rol de administrador
        $admin->roles()->attach($adminRole);

        // Crear categorías principales para el repositorio UDO
        $categories = [
            [
                'name' => 'Áreas de Grado',
                'description' => 'Organización de los temas de grado para orientar y dar referencia a futuros estudiantes e investigadores',
                'slug' => 'areas-de-grado',
            ],
            [
                'name' => 'Trabajos de Grado',
                'description' => 'Almacenamiento de tesis y pasantías de los estudiantes, con información detallada y fácil acceso para consultas académicas',
                'slug' => 'trabajos-de-grado',
                'children' => [
                    [
                        'name' => 'Tesis',
                        'description' => 'Trabajos de investigación para obtención de título',
                        'slug' => 'tesis',
                    ],
                    [
                        'name' => 'Pasantías',
                        'description' => 'Informes de pasantías realizadas por estudiantes',
                        'slug' => 'pasantias',
                    ],
                ]
            ],
            [
                'name' => 'Prácticas Profesionales',
                'description' => 'Documentación de prácticas realizadas por los estudiantes en entornos profesionales',
                'slug' => 'practicas-profesionales',
            ],
            [
                'name' => 'Servicios Comunitarios',
                'description' => 'Proyectos de servicio comunitario realizados por los estudiantes, destacando el impacto comunitario del departamento',
                'slug' => 'servicios-comunitarios',
            ],
            [
                'name' => 'Líneas de Investigación',
                'description' => 'Registro de las líneas de investigación desarrolladas o en desarrollo en el departamento',
                'slug' => 'lineas-de-investigacion',
            ],
        ];

        foreach ($categories as $categoryData) {
            $children = $categoryData['children'] ?? null;
            unset($categoryData['children']);
            
            $category = Category::create($categoryData);
            
            if ($children) {
                foreach ($children as $childData) {
                    $childData['parent_id'] = $category->id;
                    Category::create($childData);
                }
            }
        }
    }
}