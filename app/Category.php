<?php

namespace App;

/**
 * @property integer $id
 * @property datetime $created_at
 * @property datetime $updated_at
 * @property datetime $deleted_at
 * @property string $name
 * @property boolean $is_special
 * @property integer $discount in %
 * @property string $photo For section with categories
 * @property string $photo_big For section with max discount category
 * 
 * @property-read App\Product[] $products
 * @property-read App\Tag[] $tags
 */
class Category extends \Illuminate\Database\Eloquent\Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $fillable = ['id', 'name', 'is_special', 'discount', 'photo', 'photo_big'];
    
    public function products()
    {
        return $this->belongsToMany('App\Product')->whereNull('category_product.deleted_at');
    }
    
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->whereNull('category_tag.deleted_at');
    }
}
