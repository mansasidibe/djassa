<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_description');
            $table->integer('product_price');
            $table->integer('product_remise')->default(0);
            $table->string('product_disponibilite');
            $table->string('category');
            $table->string('product_photo');
            $table->string('proprietaire');
            $table->integer('num_proprietaire');
            $table->string('client_name');
            $table->integer('client_numero');
            $table->string('client_adresse');
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
        Schema::dropIfExists('orders');
    }
}
