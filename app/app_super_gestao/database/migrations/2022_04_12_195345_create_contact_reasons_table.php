<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_reasons', function (Blueprint $table) {

            // colunas padrão do laravel
            $table->id();
            $table->timestamps();

            // colunas personalizadas da tabela
            $table->string('reason', 20);

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
        Schema::dropIfExists('contact_reasons');
    }
}
