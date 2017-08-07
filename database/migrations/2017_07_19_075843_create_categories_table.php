<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Category;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
            $table->string('name', 128);
            $table->boolean('is_special')->default(false);
            $table->integer('discount')->nullable();
            $table->string('photo', 255)->nullable();
            $table->string('photo_big', 255)->nullable();
            
            $table->index('is_special');
            $table->index('discount');
        });
        
        Category::create(['id' => 1, 'name' => 'Men']);
        Category::create(['id' => 2, 'name' => 'Women']);
        Category::create(['id' => 3, 'name' => 'Kids']);
        Category::create(['id' => 4, 'name' => 'Accessories']);
        Category::create(['id' => 5, 'name' => 'Shoes']);
        
        Category::create(['id' => 6, 'name' => '25% Offer', 'is_special' => true, 'discount' => 25, 'photo' => '12.jpg']);
        Category::create(['id' => 7, 'name' => '30% Offer', 'is_special' => true, 'discount' => 30, 'photo' => '6.jpg']);
        Category::create(['id' => 8, 'name' => '35% Offer', 'is_special' => true, 'discount' => 35, 'photo' => '14.jpg']);
        Category::create(['id' => 9, 'name' => '40% Offer', 'is_special' => true, 'discount' => 40, 'photo' => '13.jpg']);
        Category::create(['id' => 10, 'name' => '45% Offer', 'is_special' => true, 'discount' => 45, 'photo' => '10.jpg']);
        Category::create(['id' => 11, 'name' => '50% Offer', 'is_special' => true, 'discount' => 50, 'photo' => '9.jpg', 'photo_big' => '11.jpg']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
