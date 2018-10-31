<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->string('nombre');
            $table->integer('anio_nacimiento')->unsigned();
            $table->string('estatus');
            $table->string('procedencia')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('vacunas')->nullable();
            $table->integer('owner_id')->unsigned();
            $table->integer('organization_id')->unsigned();
            $table->timestamps();

            $table->foreign('owner_id', 'fk_animals_owners_id')
                ->references('id')->on('owners')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('organization_id', 'fk_animals_organizations_id')
                ->references('id')->on('organizations')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
