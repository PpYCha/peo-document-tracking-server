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
        Schema::create('extensionOrders', function (Blueprint $table) {
            $table->id();
            $table->string('eoStatus');
            $table->date('eoDate');
            $table->string('eoNumbers');
            $table->string('eoReasons');
            $table->string('eoRemarks');
            $table->string('eoState');
            $table->bigInteger('document_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extensionOrders');
    }
};