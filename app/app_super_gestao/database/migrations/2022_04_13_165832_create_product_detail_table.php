<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_detail', function (Blueprint $table) {

            // colunas padrão do laravel
            $table->id();
            $table->timestamps();

            // colunas personalizadas da tabela
            $table->float('lenght', 8, 2);
            $table->float('width', 8, 2);
            $table->float('height', 8, 2);

            // configuração da chave estrangeira para a tabela product (um para um):
            //// criação da coluna
            $table->integer('product_id');
            //// adição da restrição de integridade referencial
            $table->foreign('product_id')->references('id')->on('products');
            //// adição da restrição de unicidade
            $table->unique('product_id');

            // configuração da chave estrangeira para a tabela units (um para muitos):
            //// criação da coluna
            $table->integer('unit_id');
            //// adição da restrição de integridade referencial
            $table->foreign('unit_id')->references('id')->on('units');

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
        Schema::dropIfExists('product_detail');
    }
}
