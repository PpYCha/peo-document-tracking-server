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
        Schema::create('finalBillings', function (Blueprint $table) {
            $table->id();
            $table->string('finalBilling_Status');
            $table->date('finalBilling_Date');
            $table->string('finalBilling_Amount');
            $table->string('finalBilling_Remarks');
            $table->string('finalBilling_State');
            $table->bigInteger('document_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finalBillings');
    }
};