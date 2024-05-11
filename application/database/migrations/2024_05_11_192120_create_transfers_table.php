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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('payed_id')->constrained('wallet');
            $table->foreignId('payee_id')->constrained('wallet');
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['pending', 'accepted', 'rejected', 'done'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
