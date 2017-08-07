<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Tag;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
            $table->string('name', 128);
        });
        
        Tag::create(['id' => 1, 'name' => 'design']);
        Tag::create(['id' => 2, 'name' => 'fashion']);
        Tag::create(['id' => 3, 'name' => 'lorem']);
        Tag::create(['id' => 4, 'name' => 'dress']);
        Tag::create(['id' => 5, 'name' => 'shoe']);
        Tag::create(['id' => 6, 'name' => 'tie']);
        Tag::create(['id' => 7, 'name' => 'offer']);
        Tag::create(['id' => 8, 'name' => 'special']);
        Tag::create(['id' => 9, 'name' => 'hats']);
        Tag::create(['id' => 10, 'name' => 'trousers']);
        Tag::create(['id' => 11, 'name' => 'shirt']);
        Tag::create(['id' => 12, 'name' => 'garmet']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
