<?php

namespace App;

/**
 * @property integer $id
 * @property datetime $created_at
 * @property datetime $updated_at
 * @property datetime $deleted_at
 * @property string $name
 * @property string $name_long
 * @property text $description
 * @property double $price
 * @property integer $brand_id
 * @property string $photo
 * @property integer $sold
 * @property string $photo_big1
 * @property string $photo_big2
 * @property string $photo_big3
 * 
 * @property-read App\Brand $brand
 * @property-read App\Category[] $categories
 * @property-read App\Tag[] $tags
 */
class Product extends \Illuminate\Database\Eloquent\Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $fillable = ['id', 'name', 'name_long', 'description', 'price', 'brand_id', 'photo', 'sold', 'photo_big1', 'photo_big2', 'photo_big3'];
    
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
    
    public function categories()
    {
        return $this->belongsToMany('App\Category')->whereNull('category_product.deleted_at');
    }
    
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->whereNull('product_tag.deleted_at');
    }
}
