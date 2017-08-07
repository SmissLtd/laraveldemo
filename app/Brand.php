<?php

namespace App;

/**
 * @property integer $id
 * @property datetime $created_at
 * @property datetime $updated_at
 * @property datetime $deleted_at
 * @property string $name
 * 
 * @property-read App\Product[] $products
 */
class Brand extends \Illuminate\Database\Eloquent\Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $fillable = ['id', 'name'];
    
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
