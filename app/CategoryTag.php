<?php

namespace App;

/**
 * @property integer $tag_id
 * @property integer $category_id
 */
class CategoryTag extends \Illuminate\Database\Eloquent\Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $fillable = ['category_id', 'tag_id'];
    protected $table = 'category_tag';
}
