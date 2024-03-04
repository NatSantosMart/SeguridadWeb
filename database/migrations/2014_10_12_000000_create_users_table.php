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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20); 
            $table->string('surnames', 40); 
            $table->string('dni', 9); 
            $table->string('email')->unique();
            $table->string('password'); 
            $table->string('phone', 12)->nullable(); 
            $table->string('country')->nullable(); 
            $table->string('IBAN', 24); 
            $table->string('aboutYou', 250)->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
