<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_contacts', function (Blueprint $table) {

            // colunas padrão do laravel
            $table->id();
            $table->timestamps();

            // colunas personalizadas da tabela
            $table->string('name', 50);
            $table->string('phone', 20);
            $table->string('email', 80);
            $table->text('message');

            // configuração da chave estrangeira para a tabela contact_reasons (um para muitos):
            //// criação da coluna
            $table->integer('contact_reasons_id');
            //// adição da restrição de integridade referencial
            $table->foreign('contact_reasons_id')->references('id')->on('contact_reasons');

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
        Schema::dropIfExists('site_contacts');
    }
}
