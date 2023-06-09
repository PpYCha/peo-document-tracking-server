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
        Schema::create('abcs', function (Blueprint $table) {
            $table->id();
            $table->string('abcStatus');
            $table->date('abcDate');
            $table->string('abc');
            $table->string('abcRemarks');
            $table->string('abcState');
            $table->bigInteger('document_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abc');
    }
};