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
        Schema::create('teacher_repositories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('repository_id');
            $table->foreignId('teachers_id');
            $table->boolean('is_adviser')->default(false);
            $table->boolean('is_panel')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_repositories');
    }
};
