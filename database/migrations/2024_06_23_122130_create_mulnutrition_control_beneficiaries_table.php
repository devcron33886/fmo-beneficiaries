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
        Schema::create('mulnutrition_control_beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->nullable()->constrained();
            $table->string('name');
            $table->string('gender')->nullable();
            $table->string('age_or_months')->nullable();
            $table->string('associated_health_center')->nullable();
            $table->string('sector')->nullable();
            $table->string('cell')->nullable();
            $table->string('village')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('home_tel')->nullable();
            $table->date('package_reception_date')->nullable();
            $table->float('entry_muac')->nullable();
            $table->float('current_muac')->nullable();
            $table->string('nutrition_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mulnutrition_control_beneficiaries');
    }
};
