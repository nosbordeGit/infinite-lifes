<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('livro', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 90);
            $table->text('resumo');
            $table->integer('quantidade_paginas');
            $table->string('autor', 100);
            $table->decimal('valor', 8, 2);
            $table->integer('estoque');
            $table->string('isbn13', 18);
            $table->string('idioma', 100);
            $table->integer('edicao');
            $table->string('editora', 100);
            $table->string('dimensao', 10);
            $table->integer('idade');
            $table->date('data_publicacao');
            $table->string('imagem');
            $table->foreignId('genero_id')->constrained('genero');
            $table->foreignId('vendedor_id')->constrained('vendedor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livro');
    }
};
