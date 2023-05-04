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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('vendedor_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('vendedor_id')->references('id')->on('vendedores')->onDelete('cascade');
            $table->string('tipo');
            $table->float('costo');
            $table->float('comision');
            $table->integer('sucursal');
            $table->timestamp('fecha');
            $table->integer('semana');
/* 
            $table->string('nombre');
            $table->string('apellido_p');
            $table->string('apellido_m');
            $table->timestamp('fecha_nacimiento');
            $table->string('rfc');
            $table->string('direccion');
            $table->integer('sucursal');
            $table->string('tipo_cliente'); */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
