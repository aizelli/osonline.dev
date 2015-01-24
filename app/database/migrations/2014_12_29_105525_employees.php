<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Employees extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('employees', function($table) {

            $table->engine = 'InnoDB';

            $table->increments('id', TRUE);
            $table->string('nome', 30);
            $table->string('cargo', 30)->nullable();
            $table->bigInteger('cpf')->nullable();
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
        
        Schema::dropIfExists('employees');
    }

}
