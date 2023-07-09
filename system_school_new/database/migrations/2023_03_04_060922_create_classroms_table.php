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
        Schema::create('classroms', function (Blueprint $table) {
            $table->id();
            $table->string('Name_Class');
            $table->bigInteger('Grate_id')->unsigned();
            $table->foreign('Grate_id')->references('id')->on('grates')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classroms');
    }
};
