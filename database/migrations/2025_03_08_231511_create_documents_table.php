<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('author');
            $table->enum('document_type', [
                'area_grado',
                'tesis',
                'pasantia',
                'proyecto_investigacion',
                'practicas_profesionales',
                'servicio_comunitario',
                'lineas_investigacion'
            ]);
            $table->string('file_path');
            $table->string('file_type');
            $table->integer('file_size');
            $table->integer('views_count')->default(0);
            $table->integer('downloads_count')->default(0);
            
            // Fields for Areas de Grado
            $table->string('category')->nullable();
            $table->string('status')->nullable();
            
            // Fields for Tesis
            $table->string('level')->nullable();
            $table->string('faculty')->nullable();
            
            // Fields for Pasantias
            $table->string('sector')->nullable();
            $table->string('duration')->nullable();
            $table->string('company')->nullable();
            $table->string('career')->nullable();
            
            // Fields for Practicas Profesionales
            $table->string('area')->nullable();
            
            // Fields for Servicios Comunitarios
            $table->string('community_type')->nullable();
            $table->string('impact_area')->nullable();
            $table->string('location')->nullable();
            
            // Fields for Lineas de Investigacion
            $table->string('research_area')->nullable();
            
            // $table->foreignId('collection_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};