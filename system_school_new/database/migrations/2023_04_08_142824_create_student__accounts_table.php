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
        Schema::create('student__accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->cascadeOnDelete();
            $table->foreignId('fee_invoices_id')->nullable()->references('id')->on('fee_invoices')->cascadeOnDelete();
        $table->foreignId('receipt_id')->nullable()->references('id')->on('receipt__students')->cascadeOnDelete();
        $table->foreignId('processingfees_id')->nullable()->references('id')->on('processingfees')->cascadeOnDelete();
        $table->foreignId('Payment_id')->nullable()->references('id')->on('payment_students')->cascadeOnDelete();
            $table->date('date');
          $table->string('type');
            // $table->foreignId('Grade_id')->references('id')->on('grates')->cascadeOnDelete();
           $table->decimal('Debit')->nullable();
           $table->decimal('Credit')->nullable();
           $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student__accounts');
    }
};
