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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location')->nullable();
            $table->string('password');
            $table->string('documentation')->nullable();
            $table->string('owner')->nullable();
            $table->string('architect')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('youtube')->nullable();
            $table->string('sm')->nullable();
            $table->string('supervisor')->nullable();
            $table->string('drafter')->nullable();
            $table->string('progress_project')->nullable();
            $table->enum('status' ,['done' , 'progress', 'hold' , 'cancelled'])->default('progress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
