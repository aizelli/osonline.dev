<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Customers extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        
        Schema::create('customers', function($table) {

            $table->engine = 'InnoDB';

            $table->increments('id', TRUE);
            $table->string('nome', 60);
            $table->bigInteger('cpf');
            $table->integer('rg')->nullable();
            $table->date('data_nasc')->nullable();
            $table->char('sexo', 1)->nullable();
            $table->integer('cep')->nullable();
            $table->string('endereco', 120)->nullable();
            $table->string('complemento', 35)->nullable();
            $table->string('bairro', 20)->nullable();
            $table->string('cidade', 35)->nullable();
            $table->char('estado', 2)->nullable();
            $table->char('pais', 3)->nullable();
            $table->string('email', 120)->nullable();
            $table->bigInteger('celular')->nullable();
            $table->integer('telefone_res')->nullable();
            $table->integer('telefone_com')->nullable();
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
        
        Schema::dropIfExists('customers');
    }

}
