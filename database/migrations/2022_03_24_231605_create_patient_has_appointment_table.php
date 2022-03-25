<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientHasAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_has_appointment', function (Blueprint $table) {
            $table->id();
            $table->integer('specialty_id')
            ->unsigned()
            ->nullable(false);

            $table->integer('professional_id')
            ->unsigned()
            ->nullable(false);

            $table->string('name')->nullable(false);
            $table->string('cpf')->nullable(false);
            $table->integer('source_id')
            ->unsigned()
            ->nullable(false);

            $table->date('birthdate')->nullable(false);
            $table->datetime('date_time');

            // foreign keys abaixo caso existissem outras tabelas...
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_has_appointment');
    }
}
