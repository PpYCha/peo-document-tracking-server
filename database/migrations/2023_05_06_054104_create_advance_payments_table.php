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
        Schema::create('advancePayments', function (Blueprint $table) {
            $table->id();
            $table->string('apStatus');
            $table->date('apDate');
            $table->string('ap');
            $table->string('apRemarks');
            $table->string('apState');
            $table->bigInteger('document_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advancePayments');
    }
};