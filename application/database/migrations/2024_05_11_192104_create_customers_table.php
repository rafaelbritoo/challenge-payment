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
            $table->id()->primary();
            $table->string('full_name');
            $table->string('cpf',14)->unique();
            $table->string('cnpj',18)->unique();
            $table->string('email')->unique();
            $table->string('password',255);
            $table->enum('user_type', ['common', 'reteailer'])->default('common');
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
