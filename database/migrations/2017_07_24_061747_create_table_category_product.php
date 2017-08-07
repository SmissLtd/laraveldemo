<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\CategoryProduct;

class CreateTableCategoryProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_product', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('product_id')->unsigned();
            
            $table->index('category_id');
            $table->index('product_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
        
        // Max discount
        CategoryProduct::create(['category_id' => 11, 'product_id' => 1]);
        CategoryProduct::create(['category_id' => 11, 'product_id' => 2]);
        CategoryProduct::create(['category_id' => 11, 'product_id' => 3]);
        CategoryProduct::create(['category_id' => 11, 'product_id' => 4]);
        CategoryProduct::create(['category_id' => 11, 'product_id' => 5]);
        CategoryProduct::create(['category_id' => 11, 'product_id' => 6]);
        
        // Man
        CategoryProduct::create(['category_id' => 1, 'product_id' => 7]);
        CategoryProduct::create(['category_id' => 1, 'product_id' => 8]);
        CategoryProduct::create(['category_id' => 1, 'product_id' => 9]);
        CategoryProduct::create(['category_id' => 1, 'product_id' => 10]);
        
        // Woman
        CategoryProduct::create(['category_id' => 2, 'product_id' => 1]);
        CategoryProduct::create(['category_id' => 2, 'product_id' => 2]);
        CategoryProduct::create(['category_id' => 2, 'product_id' => 3]);
        CategoryProduct::create(['category_id' => 2, 'product_id' => 4]);
        CategoryProduct::create(['category_id' => 2, 'product_id' => 5]);
        CategoryProduct::create(['category_id' => 2, 'product_id' => 6]);
        CategoryProduct::create(['category_id' => 2, 'product_id' => 11]);
        CategoryProduct::create(['category_id' => 2, 'product_id' => 12]);
        CategoryProduct::create(['category_id' => 2, 'product_id' => 13]);
        
        // Kids
        CategoryProduct::create(['category_id' => 3, 'product_id' => 1]);
        
        // Accessories
        CategoryProduct::create(['category_id' => 4, 'product_id' => 1]);
        
        // Shoes
        CategoryProduct::create(['category_id' => 5, 'product_id' => 1]);
        
        // 25% offer
        CategoryProduct::create(['category_id' => 6, 'product_id' => 3]);
        
        // 30% offer
        CategoryProduct::create(['category_id' => 7, 'product_id' => 3]);
        
        // 35% offer
        CategoryProduct::create(['category_id' => 8, 'product_id' => 3]);
        
        // 40% offer
        CategoryProduct::create(['category_id' => 9, 'product_id' => 3]);
        
        // 45% offer
        CategoryProduct::create(['category_id' => 10, 'product_id' => 3]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
