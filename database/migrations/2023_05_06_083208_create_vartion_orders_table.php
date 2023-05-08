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
        Schema::create('variationOrders', function (Blueprint $table) {
            $table->id();
            $table->string('voStatus');
            $table->date('voDate');
            $table->string('voNumbers');
            $table->string('voReasons');
            $table->string('voRemarks');
            $table->string('voScope');
            $table->string('voState');
            $table->bigInteger('document_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variationOrders');
    }
};