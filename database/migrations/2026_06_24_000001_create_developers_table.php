<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('developers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->enum('status', ['front-end', 'back-end', 'full-stack'])->default('front-end');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('developers');
    }
};
