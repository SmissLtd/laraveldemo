<?php

namespace App;

/**
 * @property integer $tag_id
 * @property integer $product_id
 */
class ProductTag extends \Illuminate\Database\Eloquent\Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $fillable = ['tag_id', 'product_id'];
    protected $table = 'product_tag';
}
