<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('priority', ['low', 'middle', 'high'])->default('low');
            $table->enum('status', ['waiting', 'progress', 'done'])->default('waiting');
            $table->foreignId('developer_id')->constrained('developers')->noActionOnUpdate()->noActionOnDelete();
            $table->json('tags');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
