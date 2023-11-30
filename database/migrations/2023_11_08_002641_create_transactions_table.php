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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('userTo'); 
            $table->uuid('userFrom');
            $table->decimal('amount', 18, 10); // 18 int and 10 decimal cases
            $table->string("deacription", 100);
            $table->enum('state', ['created', 'sended', 'received', 'accepted', 'rejected', 'confirm']);
            $table->enum('network', ['lightning', 'bitcoin'])->default('bitcoin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
