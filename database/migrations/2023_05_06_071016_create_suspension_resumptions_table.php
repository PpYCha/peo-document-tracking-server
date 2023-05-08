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
        Schema::create('suspensionResumptions', function (Blueprint $table) {
            $table->id();
            $table->string('srStatus');
            $table->date('srDate');
            $table->string('srNumbers');
            $table->string('srReasons');
            $table->string('srRemarks');
            $table->string('srState');
            $table->bigInteger('document_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suspensionResumptions');
    }
};