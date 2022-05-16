<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {

            // colunas padrão do laravel
            $table->id();
            $table->timestamps();
            
            // configuração da chave estrangeira para a tabela orders (um para muitos):
            //// criação da coluna
            $table->integer('order_id');
            //// adição da restrição de integridade referencial
            $table->foreign('order_id')->references('id')->on('orders');
            
            // configuração da chave estrangeira para a tabela products (um para muitos):
            //// criação da coluna
            $table->integer('product_id');
            //// adição da restrição de integridade referencial
            $table->foreign('product_id')->references('id')->on('products');
            
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
        Schema::dropIfExists('order_products');
    }
}
