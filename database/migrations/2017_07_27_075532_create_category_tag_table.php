<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\CategoryTag;

class CreateCategoryTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
            $table->integer('tag_id')->unsigned();
            $table->integer('category_id')->unsigned();
            
            $table->index('tag_id');
            $table->index('category_id');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
        
        // Men
        CategoryTag::create(['tag_id' => 1, 'category_id' => 1]);
        CategoryTag::create(['tag_id' => 2, 'category_id' => 1]);
        CategoryTag::create(['tag_id' => 3, 'category_id' => 1]);
        CategoryTag::create(['tag_id' => 4, 'category_id' => 1]);
        CategoryTag::create(['tag_id' => 5, 'category_id' => 1]);
        CategoryTag::create(['tag_id' => 6, 'category_id' => 1]);
        CategoryTag::create(['tag_id' => 7, 'category_id' => 1]);
        CategoryTag::create(['tag_id' => 8, 'category_id' => 1]);
        CategoryTag::create(['tag_id' => 9, 'category_id' => 1]);
        CategoryTag::create(['tag_id' => 10, 'category_id' => 1]);
        CategoryTag::create(['tag_id' => 11, 'category_id' => 1]);
        CategoryTag::create(['tag_id' => 12, 'category_id' => 1]);
        
        // Women
        CategoryTag::create(['tag_id' => 1, 'category_id' => 2]);
        CategoryTag::create(['tag_id' => 2, 'category_id' => 2]);
        CategoryTag::create(['tag_id' => 3, 'category_id' => 2]);
        CategoryTag::create(['tag_id' => 4, 'category_id' => 2]);
        
        // Kids
        CategoryTag::create(['tag_id' => 5, 'category_id' => 3]);
        CategoryTag::create(['tag_id' => 6, 'category_id' => 3]);
        CategoryTag::create(['tag_id' => 7, 'category_id' => 3]);
        CategoryTag::create(['tag_id' => 8, 'category_id' => 3]);
        
        // Accessories
        CategoryTag::create(['tag_id' => 9, 'category_id' => 4]);
        
        // Shoes
        CategoryTag::create(['tag_id' => 10, 'category_id' => 5]);
        
        // 45% Offer
        CategoryTag::create(['tag_id' => 7, 'category_id' => 10]);
        
        // 50% Offer
        CategoryTag::create(['tag_id' => 8, 'category_id' => 11]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_tag');
    }
}
