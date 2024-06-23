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
        Schema::create('microcredit_beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string('vsla_name')->nullable();
            $table->string('name');
            $table->string('gender')->nullable();
            $table->string('id_number')->nullable();
            $table->string('sector')->nullable();
            $table->string('cell')->nullable();
            $table->string('village')->nullable();
            $table->string('requested_loan')->nullable();
            $table->string('approved_loan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('microcredit_beneficiaries');
    }
};
