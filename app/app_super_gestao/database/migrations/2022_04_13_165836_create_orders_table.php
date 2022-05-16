<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

            // colunas padrão do laravel
            $table->id();
            $table->timestamps();
            
            // configuração da chave estrangeira para a tabela clients (um para muitos):
            //// criação da coluna
            $table->integer('client_id');
            //// adição da restrição de integridade referencial
            $table->foreign('client_id')->references('id')->on('clients');
            
            // coluna para permitir o soft delete
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
