<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Suppliers extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        
        Schema::create('suppliers', function($table) {

            $table->engine = 'InnoDB';

            $table->increments('id', TRUE);
            $table->string('nome_emp', 120)->nullable();
            $table->string('razao_social', 120);
            $table->bigInteger('cnpj');
            $table->integer('ie')->nullable();
            $table->integer('cep');
            $table->string('endereco', 120);
            $table->string('complemento', 35)->nullable();
            $table->string('bairro', 20)->nullable();
            $table->string('cidade', 35)->nullable();
            $table->char('estado', 2)->nullable();
            $table->char('pais', 3)->nullable();
            $table->string('email', 120);
            $table->string('nome_resp', 60);
            $table->bigInteger('celular')->nullable();
            $table->integer('telefone1');
            $table->integer('telefone2')->nullable();
            $table->boolean('ativo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        
        Schema::dropIfExists('suppliers');
    }

}
