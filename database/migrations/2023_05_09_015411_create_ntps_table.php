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
        Schema::create('ntps', function (Blueprint $table) {
            $table->id();
            $table->string('ntpStatus');
            $table->date('ntpDate');
            $table->date('ntp');
            $table->string('ntpProjectEngineer');
            $table->string('ntpContractor');
            $table->string('ntpContractAmount');
            $table->string('ntpContractDuration');
            $table->string('ntpRevisedContactAmount');
            $table->string('ntpRevisedContractDuration');
            $table->string('ntpState');
            $table->bigInteger('document_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ntps');
    }
};