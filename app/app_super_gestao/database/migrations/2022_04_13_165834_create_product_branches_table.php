<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_branches', function (Blueprint $table) {

            // colunas padrão do laravel
            $table->id();
            $table->timestamps();

            // colunas personalizadas da tabela
            $table->float('price', 8, 2)->default(0.01);
            $table->integer('minimum_stock')->default(1);
            $table->integer('maximum_stock')->default(1);

            // configuração da chave estrangeira para a tabela products (um para muitos):
            //// criação da coluna
            $table->integer('product_id');
            //// adição da restrição de integridade referencial
            $table->foreign('product_id')->references('id')->on('products');

            // configuração da chave estrangeira para a tabela branches (um para muitos):
            //// criação da coluna
            $table->integer('branch_id');
            //// adição da restrição de integridade referencial
            $table->foreign('branch_id')->references('id')->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_branches');
    }
}
