<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
            $table->string('name', 64);
            $table->string('email', 255);
            $table->string('phone', 32);
            $table->string('address', 255);
            $table->text('message')->nullable();
            $table->enum('status', ['new', 'cancelled', 'paid', 'delivered', 'received'])->default('new');
            $table->integer('user_id')->unsigned()->nullable();
            
            $table->index('status');
            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
