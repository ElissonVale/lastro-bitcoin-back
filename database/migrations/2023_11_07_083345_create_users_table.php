<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->ulid('id');
            $table->ulid('userName', 100);
            $table->ulid('walletAddress', 100);
            $table->string('publicKey', 2500);
            $table->decimal('funds', 18, 10); // 18 int and 10 decimal cases
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
