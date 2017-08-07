<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Product;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
            $table->string('name', 64);
            $table->string('name_long', 255)->comment('Displayed on product page');
            $table->text('description')->nullable();
            $table->double('price');
            $table->integer('brand_id')->unsigned();
            $table->string('photo', 255)->nullable();
            $table->integer('sold')->unsigned()->default(0)->comment('How much times product was sold');
            $table->string('photo_big1', 255)->nullable();
            $table->string('photo_big2', 255)->nullable();
            $table->string('photo_big3', 255)->nullable();
            
            $table->index('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->index('sold');
        });
        
        Product::create(['id' => 1, 'name' => 'Palazzo', 'name_long' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'description' => 'Lorem ipsum dolor sitamet consectetuer', 'price' => 450, 'brand_id' => 1, 'photo' => 'pi5.png', 'sold' => 0, 'photo_big1' => 'si.jpg', 'photo_big2' => 'si1.jpg', 'photo_big3' => 'si2.jpg']);
        Product::create(['id' => 2, 'name' => 'Pant', 'name_long' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'description' => 'Lorem ipsum dolor sitamet consectetuer', 'price' => 300, 'brand_id' => 2, 'photo' => 'pi4.png', 'sold' => 5, 'photo_big1' => 'si.jpg', 'photo_big2' => 'si1.jpg', 'photo_big3' => 'si2.jpg']);
        Product::create(['id' => 3, 'name' => 'Palazzo', 'name_long' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'description' => 'Lorem ipsum dolor sitamet consectetuer', 'price' => 300, 'brand_id' => 3, 'photo' => 'pi3.png', 'sold' => 6, 'photo_big1' => 'si.jpg', 'photo_big2' => 'si1.jpg', 'photo_big3' => 'si2.jpg']);
        Product::create(['id' => 4, 'name' => 'Trouser', 'name_long' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'description' => 'Lorem ipsum dolor sitamet consectetuer', 'price' => 300, 'brand_id' => 4, 'photo' => 'pi2.png', 'sold' => 2, 'photo_big1' => 'si.jpg', 'photo_big2' => 'si1.jpg', 'photo_big3' => 'si2.jpg']);
        Product::create(['id' => 5, 'name' => 'Trouser', 'name_long' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'description' => 'Lorem ipsum dolor sitamet consectetuer', 'price' => 300, 'brand_id' => 5, 'photo' => 'pi6.png', 'sold' => 11, 'photo_big1' => 'si.jpg', 'photo_big2' => 'si1.jpg', 'photo_big3' => 'si2.jpg']);
        Product::create(['id' => 6, 'name' => 'Palazzo', 'name_long' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'description' => 'Lorem ipsum dolor sitamet consectetuer', 'price' => 300, 'brand_id' => 1, 'photo' => 'pi8.png', 'sold' => 3, 'photo_big1' => 'si.jpg', 'photo_big2' => 'si1.jpg', 'photo_big3' => 'si2.jpg']);
        Product::create(['id' => 7, 'name' => 'Trousers', 'name_long' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'description' => 'Lorem ipsum dolor sitamet consectetuer', 'price' => 300, 'brand_id' => 2, 'photo' => 'pi9.png', 'sold' => 1, 'photo_big1' => 'si.jpg', 'photo_big2' => 'si1.jpg', 'photo_big3' => 'si2.jpg']);
        Product::create(['id' => 8, 'name' => 'Formal', 'name_long' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'description' => 'Lorem ipsum dolor sitamet consectetuer', 'price' => 450, 'brand_id' => 3, 'photo' => 'pi10.png', 'sold' => 8, 'photo_big1' => 'si.jpg', 'photo_big2' => 'si1.jpg', 'photo_big3' => 'si2.jpg']);
        Product::create(['id' => 9, 'name' => 'Trousers', 'name_long' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'description' => 'Lorem ipsum dolor sitamet consectetuer', 'price' => 350, 'brand_id' => 4, 'photo' => 'pi11.png', 'sold' => 15, 'photo_big1' => 'si.jpg', 'photo_big2' => 'si1.jpg', 'photo_big3' => 'si2.jpg']);
        Product::create(['id' => 10, 'name' => 'Formal', 'name_long' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'description' => 'Lorem ipsum dolor sitamet consectetuer', 'price' => 400, 'brand_id' => 5, 'photo' => 'pi12.png', 'sold' => 4, 'photo_big1' => 'si.jpg', 'photo_big2' => 'si1.jpg', 'photo_big3' => 'si2.jpg']);
        Product::create(['id' => 11, 'name' => 'Trouser', 'name_long' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'description' => 'Lorem ipsum dolor sitamet consectetuer', 'price' => 300, 'brand_id' => 1, 'photo' => 'pi.png', 'sold' => 0, 'photo_big1' => 'si.jpg', 'photo_big2' => 'si1.jpg', 'photo_big3' => 'si2.jpg']);
        Product::create(['id' => 12, 'name' => 'Trouser', 'name_long' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'description' => 'Lorem ipsum dolor sitamet consectetuer', 'price' => 300, 'brand_id' => 2, 'photo' => 'pi1.png', 'sold' => 3, 'photo_big1' => 'si.jpg', 'photo_big2' => 'si1.jpg', 'photo_big3' => 'si2.jpg']);
        Product::create(['id' => 13, 'name' => 'Jeans', 'name_long' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'description' => 'Lorem ipsum dolor sitamet consectetuer', 'price' => 300, 'brand_id' => 3, 'photo' => 'pi7.png', 'sold' => 0, 'photo_big1' => 'si.jpg', 'photo_big2' => 'si1.jpg', 'photo_big3' => 'si2.jpg']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
