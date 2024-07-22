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
        Schema::create('endereco', function (Blueprint $table) {
            $table->id();
            $table->string('cep', 10);
            $table->string('pais', 90);
            $table->string('estado', 90);
            $table->string('cidade', 90);
            $table->string('bairro', 90);
            $table->string('endereco', 90);
            $table->text('complemento')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('endereco');
    }
};
