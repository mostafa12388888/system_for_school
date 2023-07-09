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
        Schema::create('my_parnts', function (Blueprint $table) {
            $table->id();
            // informethin for father
            $table->string('email')->unique();
            $table->string('password');
            $table->string('Name_father');
            $table->string('Nationan_id_father');
            $table->string('passpord_id_father');
            $table->string('phone_father');
            $table->string('job_father');
            $table->string('addres_father');
            $table->bigInteger('National_id_father')->unsigned();
            $table->bigInteger('Blood_id_father')->unsigned();
            $table->bigInteger('Religion_father_id')->unsigned();
            $table->foreign('National_id_father')->references('id')->on('nationals')->cascadeOnDelete();
            $table->foreign('Blood_id_father')->references('id')->on('type__bloods')->cascadeOnDelete();
            $table->foreign('Religion_father_id')->references('id')->on('religions')->cascadeOnDelete();
           //information for mather
            $table->string('Name_mather');
            $table->string('Nationan_id_mather');
            $table->string('passpord_id_mather');
            $table->string('phone_mather');
            $table->string('job_mather');
            $table->string('addres_mather');
            $table->bigInteger('National_id_mather')->unsigned();
            $table->bigInteger('Blood_id_mather')->unsigned();
            $table->bigInteger('Religion_mather_id')->unsigned();
            $table->foreign('National_id_mather')->references('id')->on('nationals')->cascadeOnDelete();
            $table->foreign('Blood_id_mather')->references('id')->on('type__bloods')->cascadeOnDelete();
            $table->foreign('Religion_mather_id')->references('id')->on('religions')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_parnts');
    }
};
