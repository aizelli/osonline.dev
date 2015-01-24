<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('orders', function($table) {
            
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('customers_id')->unsigned();
            $table->integer('employees_id')->unsigned();
            $table->string('usuario', 10)->nullable();
            $table->string('observacao', 120)->nullable();
            $table->decimal('total', 8,2);
            $table->boolean('aberta');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        
        Schema::dropIfExists('orders');
    }

}
