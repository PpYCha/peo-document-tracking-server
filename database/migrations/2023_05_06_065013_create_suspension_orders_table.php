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
        Schema::create('suspensionOrders', function (Blueprint $table) {
            $table->id();
            $table->string('soStatus');
            $table->date('soDate');
            $table->string('soNumbers');
            $table->string('soReasons');
            $table->string('soRemarks');
            $table->string('soState');
            $table->bigInteger('document_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suspensionOrders');
    }
};