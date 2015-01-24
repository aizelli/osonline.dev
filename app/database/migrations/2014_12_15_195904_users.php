<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        
        Schema::create('users', function($table) {

            $table->engine = 'InnoDB';

            $table->increments('id', TRUE);
            $table->string('nome', 60);
            $table->string('email', 120)->unique()->nullable;
            $table->string('usuario', 10)->unique();
            $table->string('password');
            $table->integer('telefone_cont')->nullable();
            $table->boolean('ativo');
            $table->tinyInteger('tipo');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        
        Schema::dropIfExists('users');
    }

}
