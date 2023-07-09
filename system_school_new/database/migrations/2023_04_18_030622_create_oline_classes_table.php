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
        Schema::create('oline_classes', function (Blueprint $table) {
            $table->id();
            $table->boolean('integration');
            $table->foreignId('Grade_id')->references('id')->on('grates')->cascadeOnDelete();
            $table->foreignId('section_id')->references('id')->on('sections')->cascadeOnDelete();
            // $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('created_by');
            $table->foreignId('Classrom_id')->references('id')->on('classroms')->cascadeOnDelete();
            $table->string('meeting_id');
            $table->string('topic');
            $table->dateTime('State_at');
            $table->integer('duration')->comment('minutes');
            $table->string('password')->comment('meeting_passowrd');
            $table->text('start_url');
            $table->text('join_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oline_classes');
    }
};
