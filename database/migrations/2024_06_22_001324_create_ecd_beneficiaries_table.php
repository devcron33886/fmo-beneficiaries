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
        Schema::create('ecd_beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('grade');
            $table->string('gender')->nullable();
            $table->string('academic_year');
            $table->string('father_name')->nullable();
            $table->integer('father_id')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('sector')->nullable();
            $table->string('cell')->nullable();
            $table->string('village')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecd_beneficiaries');
    }
};
