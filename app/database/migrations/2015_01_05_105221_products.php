<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('products', function($table) {

            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('suppliers_id')->unsigned();
            $table->string('nome', 30);
            $table->string('descricao')->nullable();
            $table->string('marca', 30)->nullable();
            $table->string('modelo', 30)->nullable();
            $table->integer('quantidade');
            $table->decimal('valor_uni', 8, 2);

            $table->foreign('suppliers_id')->references('id')->on('suppliers')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        Schema::dropIfExists('products');
    }

}
