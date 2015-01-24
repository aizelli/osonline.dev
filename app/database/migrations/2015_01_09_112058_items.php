<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Items extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        
        Schema::create('items', function($table) {
            
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->Integer('jobs_id')->unsigned()->nullable();
            $table->Integer('products_id')->unsigned()->nullable();
            $table->Integer('orders_id')->unsigned();
            $table->string('descricao', 120);
            $table->Integer('quantidade');
            $table->char('tipo', 1);
            
            $table->foreign('orders_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jobs_id')->references('id')->on('jobs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        
        Schema::dropIfExists('items');
    }

}
