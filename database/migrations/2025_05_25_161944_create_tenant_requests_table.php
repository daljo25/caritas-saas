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
        Schema::create('tenant_requests', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('parish_name');
            $table->string('parish_address')->nullable();
            $table->string('parish_city')->nullable();
            $table->string('parish_website')->nullable();
            $table->string('parish_diocese')->nullable();
            $table->string('plan');
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->text('mensaje')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant_requests');
    }
};
