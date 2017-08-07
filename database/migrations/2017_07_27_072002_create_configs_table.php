<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Config;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->string('name', 64)->primary();
            $table->string('value', 255);
        });
        
        Config::create(['name' => 'index_offers_category', 'value' => 11]);
        Config::create(['name' => 'index_products_category', 'value' => 1]);
        Config::create(['name' => 'address', 'value' => '12th Avenue, 5th block, Sydney.']);
        Config::create(['name' => 'email', 'value' => 'info@example.com']);
        Config::create(['name' => 'phone_full', 'value' => '+1234 567 567']);
        Config::create(['name' => 'phone_short', 'value' => '085 596 234']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
