<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('userName', 250)->unique();
            $table->string('surName', 100)->nullable();
            $table->string('avatarUrl', 250)->nullable();
            $table->string('walletAddress', 250)->nullable();
            $table->string('publicKey', 1250);
            $table->string('publicHash', 64);
            $table->decimal('funds', 18, 10)->nullable(); // 18 int and 10 decimal cases
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
