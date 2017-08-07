<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\ProductTag;

class CreateProductTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
            $table->integer('tag_id')->unsigned();
            $table->integer('product_id')->unsigned();
            
            $table->index('tag_id');
            $table->index('product_id');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
        
        ProductTag::create(['tag_id' => 1, 'product_id' => 1]);
        ProductTag::create(['tag_id' => 3, 'product_id' => 1]);
        ProductTag::create(['tag_id' => 5, 'product_id' => 1]);
        
        ProductTag::create(['tag_id' => 7, 'product_id' => 2]);
        ProductTag::create(['tag_id' => 9, 'product_id' => 2]);
        ProductTag::create(['tag_id' => 11, 'product_id' => 2]);
        
        ProductTag::create(['tag_id' => 2, 'product_id' => 3]);
        ProductTag::create(['tag_id' => 4, 'product_id' => 3]);
        ProductTag::create(['tag_id' => 6, 'product_id' => 3]);
        
        ProductTag::create(['tag_id' => 8, 'product_id' => 4]);
        ProductTag::create(['tag_id' => 10, 'product_id' => 4]);
        ProductTag::create(['tag_id' => 10, 'product_id' => 4]);
        
        ProductTag::create(['tag_id' => 1, 'product_id' => 5]);
        ProductTag::create(['tag_id' => 2, 'product_id' => 5]);
        ProductTag::create(['tag_id' => 3, 'product_id' => 5]);
        
        ProductTag::create(['tag_id' => 4, 'product_id' => 6]);
        ProductTag::create(['tag_id' => 5, 'product_id' => 6]);
        ProductTag::create(['tag_id' => 6, 'product_id' => 6]);
        
        ProductTag::create(['tag_id' => 7, 'product_id' => 7]);
        ProductTag::create(['tag_id' => 8, 'product_id' => 7]);
        ProductTag::create(['tag_id' => 9, 'product_id' => 7]);
        
        ProductTag::create(['tag_id' => 10, 'product_id' => 8]);
        ProductTag::create(['tag_id' => 11, 'product_id' => 8]);
        ProductTag::create(['tag_id' => 12, 'product_id' => 8]);
        
        ProductTag::create(['tag_id' => 5, 'product_id' => 10]);
        ProductTag::create(['tag_id' => 9, 'product_id' => 10]);
        
        ProductTag::create(['tag_id' => 2, 'product_id' => 11]);
        ProductTag::create(['tag_id' => 8, 'product_id' => 11]);
        
        ProductTag::create(['tag_id' => 11, 'product_id' => 13]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_tag');
    }
}
