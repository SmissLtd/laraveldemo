<?php

namespace App;

/**
 * @property integer $id
 * @property datetime $created_at
 * @property datetime $updated_at
 * @property datetime $deleted_at
 * @property integer $category_id
 * @property integer $product_id
 */
class CategoryProduct extends \Illuminate\Database\Eloquent\Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $fillable = ['category_id', 'product_id'];
    protected $table = 'category_product';
}