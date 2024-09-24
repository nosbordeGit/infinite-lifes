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
        Schema::create('transportadora', function (Blueprint $table) {
            $table->id();
            $table->string('empresa', 100);
            $table->string('cnpj', 255);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('administrador_id')->constrained('administrador');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportadora');
    }
};
