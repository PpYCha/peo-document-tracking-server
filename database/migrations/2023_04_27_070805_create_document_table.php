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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('projectId')->unique();
            $table->string('controlNumber')->uniqe();
            $table->string('projectTitle')->require();
            $table->string('contractor')->nullable();
            $table->string('barangayDocument')->nullable();
            $table->string('municipalityDocument')->require();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};