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
        Schema::create('otherDocuments', function (Blueprint $table) {
            $table->id();
            $table->string('odStatus');
            $table->date('odDate');
            $table->string('odDocumentType');
            $table->string('odRemarks');
            $table->string('odState');
            $table->bigInteger('document_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otherDocuments');
    }
};