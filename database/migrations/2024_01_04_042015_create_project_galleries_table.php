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
        Schema::create('project_galleries', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Menggunakan UUID sebagai primary key
            $table->uuid('project_id')->index(); // Menggunakan UUID sebagai foreign key
            $table->foreign('project_id')->references('id')->on('projects');
            $table->string('image_project');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_galleries');
    }
};
