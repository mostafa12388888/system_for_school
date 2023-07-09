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
        Schema::create('processingfees', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('Student_id')->references('id')->on('students')->cascadeOnDelete();
            $table->decimal('amount')->nullable();
            $table->string('descrption')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processingfees');
    }
};
