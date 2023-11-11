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
        Schema::create('api_key_authenticates', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->string('apiKey', 64)->unique();
            $table->boolean('active')->default(true);
            $table->date('expire')->nullable();
            $table->integer('requests')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_key_authenticates');
    }
};
