<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->string('director')->nullable();
            $table->string('co_director')->nullable();
            $table->string('academic_degree')->nullable();
            $table->string('institution')->nullable();
            $table->string('department')->nullable();
            $table->date('publication_date')->nullable();
            $table->date('defense_date')->nullable();
            $table->string('language')->nullable()->default('Español');
            $table->integer('page_count')->nullable();
            $table->string('identifier')->nullable();
            $table->string('rights')->nullable();
        });
    }

    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn([
                'director', 'co_director', 'academic_degree', 'institution',
                'department', 'publication_date', 'defense_date', 'language',
                'page_count', 'identifier', 'rights'
            ]);
        });
    }
};