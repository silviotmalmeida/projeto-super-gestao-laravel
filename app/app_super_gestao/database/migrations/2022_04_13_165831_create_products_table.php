<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

            // colunas padrão do laravel
            $table->id();
            $table->timestamps();

            // colunas personalizadas da tabela
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->float('weight', 8, 2)->nullable();
            
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
        Schema::dropIfExists('products');
    }
}
