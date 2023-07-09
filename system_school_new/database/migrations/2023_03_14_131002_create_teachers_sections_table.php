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
        Schema::create('teachers_sections', function (Blueprint $table) {
            $table->id();
           $table->unsignedBigInteger('sections_id');
           $table->unsignedBigInteger('teachers_id');
           $table->foreign('sections_id')->references('id')->on('sections')->onDelete('cascade');
           $table->foreign('teachers_id')->references('id')->on('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers_sections');
    }
};
