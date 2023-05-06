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
        Schema::create('obrs', function (Blueprint $table) {
            $table->id();
            $table->string('obrStatus');
            $table->date('obrDate');
            $table->string('obr');
            $table->string('obrRemarks');
            $table->string('obrNumbers');
            $table->string('obrState');
            $table->bigInteger('document_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obrs');
    }
};