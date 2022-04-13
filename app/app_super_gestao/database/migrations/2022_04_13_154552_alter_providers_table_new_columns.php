<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProvidersTableNewColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // método para inclusão de novas colunas em tabela já existente
        Schema::table('providers', function (Blueprint $table) {

            // colunas adicionadas à tabela
            $table->string('uf', 2)->nullable();
            $table->string('email', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // método para remoção das novas colunas em tabela já existente
        Schema::table('providers', function (Blueprint $table) {

            // colunas removidas da tabela
            $table->dropColumn('uf', 'email');
        });
    }
}
