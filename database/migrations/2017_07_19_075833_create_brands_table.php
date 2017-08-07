<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Brand;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
            $table->string('name', 128);
        });
        
        Brand::create(['id' => 1, 'name' => 'Adidas']);
        Brand::create(['id' => 2, 'name' => 'Puma']);
        Brand::create(['id' => 3, 'name' => 'Levis']);
        Brand::create(['id' => 4, 'name' => 'Gucci']);
        Brand::create(['id' => 5, 'name' => 'Nike']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
