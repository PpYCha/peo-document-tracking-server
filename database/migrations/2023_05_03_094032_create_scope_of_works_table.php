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
        Schema::create('scopeOfWorks', function (Blueprint $table) {
            $table->id();
            $table->string('sowStatus');
            $table->date('sowDate');
            $table->string('sow');
            $table->string('sowRemarks');
            $table->string('sowState');
            $table->bigInteger('document_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scopeOfWorks');
    }
};