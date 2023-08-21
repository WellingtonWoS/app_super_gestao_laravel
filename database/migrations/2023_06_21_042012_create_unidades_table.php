<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);
            $table->string('descricao', 30);
            $table->timestamps();
        });
            //Adicionar relacionamento com a tabela produto
        Schema::table('produto', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');            
        });

            //Adicionar relacionamento com a tabela produto_detalhe
        Schema::table('produto_detalhe', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produto_detalhe', function(Blueprint $table){
            //Remove a Foreign Key(FK)
            $table->dropForeign('produto_detalhe_unidade_id_foreign'); //Remove a Table / Coluna / Foreign
            //Remover a coluna
            $table->dropColumn('unidade_id');
        });

        Schema::table('produto', function(Blueprint $table){
            //Remove a Foreign Key(FK)
            $table->dropForeign('produto_unidade_id_foreign'); //Remove a Table / Coluna / Foreign
            //Remover a coluna
            $table->dropColumn('unidade_id');
        });
        
        Schema::dropIfExists('unidades');
    }
}
