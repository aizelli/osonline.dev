<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Jobs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('jobs', function($table){
            
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('titulo', 20);
                $table->string('descricao', 120)->nullable();
                $table->decimal('valor_uni', 6,2);
                $table->boolean('ativo');
                
                $table->timestamps();
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::dropIfexists('jobs');
	}

}
