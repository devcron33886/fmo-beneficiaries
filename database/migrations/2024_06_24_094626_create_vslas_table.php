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
        Schema::create('vslas', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('represeter_name')->nullable();
            $table->string('representer_id_number')->nullable();
            $table->string('represnter_phone');
            $table->string('sector');
            $table->string('cell');
            $table->string('village')->nullable();
            $table->year('year_of_entry');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vslas');
    }
};
