<?php

use App\Status;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Status::create([
            'nome' => 'Pedido Efetuado',
            'porcentagem' => 10,
        ]);

        Status::create([
            'nome' => 'Em Preparação',
            'porcentagem' => 30,
        ]);

        Status::create([
            'nome' => 'Lanche está na Chapa',
            'porcentagem' => 50,
        ]);

        Status::create([
            'nome' => 'Embalando o Pedido',
            'porcentagem' => 70,
        ]);

        Status::create([
            'nome' => 'Saiu para Entrega',
            'porcentagem' => 100,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
