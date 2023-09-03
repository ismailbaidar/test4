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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('NumeroConsultation');
            $table->string('Objet');
            $table->string('Observation');
            $table->date('Date_consultation');
            $table->foreignId('patient_id')->constrained();
            $table->enum('TypeCosultation',['operation','Consultationgénéral']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};