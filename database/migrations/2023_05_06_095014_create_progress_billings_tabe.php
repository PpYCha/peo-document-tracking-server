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
        Schema::create('progessBillings', function (Blueprint $table) {
            $table->id();
            $table->string('pgStatus');
            $table->date('pgDate');
            $table->string('pgNumbers');
            $table->string('pgAmount');
            $table->string('pgRemarks');
            $table->string('pgState');
            $table->bigInteger('document_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progessBillings');
    }
};