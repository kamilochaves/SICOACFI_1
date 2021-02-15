<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->id();
            $table->date('FechaAsignacion');
            $table->enum('Estado',['Activo','Inactivo']);

            $table->bigInteger('idAmbientes')->unsigned();
            $table->bigInteger('idProfesor')->unsigned();
            $table->bigInteger('idActivo')->unsigned();
            $table->bigInteger('idAdministrador')->unsigned();

            $table->foreign('idAmbientes')->references('id')->on('ambientes');
            $table->foreign('idProfesor')->references('id')->on('profesores');
            $table->foreign('idActivo')->references('id')->on('activos');
            $table->foreign('idAdministrador')->references('id')->on('administradores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignaciones');
    }
}
