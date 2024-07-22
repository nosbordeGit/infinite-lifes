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
        Schema::create('cartao', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 20);
            $table->string('cvc', 5);
            $table->string('tipo', 20);
            $table->date('validade');
            $table->tinyInteger('status')->default(1);
            $table->foreignId('cliente_id')->constrained('cliente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartao');
    }
};
