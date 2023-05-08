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
        Schema::create('firstBillings', function (Blueprint $table) {
            $table->id();
            $table->string('fbStatus');
            $table->date('fbDate');
            $table->string('fbAmount');
            $table->string('fbRemarks');
            $table->string('fbState');
            $table->bigInteger('document_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firstBillings');
    }
};