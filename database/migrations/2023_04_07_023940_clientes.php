<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        //	fecha_nacimiento	rfc	direccion	sucursal	tipo_cliente	saldo_p	monto_p

        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido_p');
            $table->string('apellido_m');
            $table->timestamp('fecha_nacimiento');
            $table->string('rfc');
            $table->string('direccion');
            $table->integer('sucursal');
            $table->string('tipo_cliente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
