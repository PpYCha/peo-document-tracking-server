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
        Schema::create('extensionResumptions', function (Blueprint $table) {
            $table->id();
            $table->string('erStatus');
            $table->date('erDate');
            $table->string('erNumbers');
            $table->string('erReasons');
            $table->string('erRemarks');
            $table->string('erState');
            $table->bigInteger('document_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extensionResumptions');
    }
};