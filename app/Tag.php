<?php

namespace App;

/**
 * @property string $name
 * 
 * @property-read App\Category[] $categories
 * @property-read App\Product[] $products
 */
class Tag extends \Illuminate\Database\Eloquent\Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $fillable = ['id', 'name'];
    
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
