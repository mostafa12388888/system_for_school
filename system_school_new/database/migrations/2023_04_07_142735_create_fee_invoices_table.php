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
        Schema::create('fee_invoices', function (Blueprint $table) {
            $table->id();
            $table->date('invoice_date');
            $table->foreignId('Student_id')->references('id')->on('students')->cascadeOnDelete();
            $table->foreignId('Grade_id')->references('id')->on('grates')->cascadeOnDelete();
            $table->foreignId('Fee_id')->references('id')->on('fees')->cascadeOnDelete();
            $table->foreignId('classrom_id')->references('id')->on('classroms')->cascadeOnDelete();
           $table->decimal('amount');
           $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_invoices');
    }
};
