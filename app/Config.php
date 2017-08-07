<?php

namespace App;

/**
 * @property string $name
 * @property string $value
 */
class Config extends \Illuminate\Database\Eloquent\Model
{
    const INDEX_OFFERS_CATEGORY = 'index_offers_category';
    const INDEX_PRODUCTS_CATEGORY = 'index_products_category';
    
    const ADMIN_PAGE_SIZE = 20;
    
    protected $fillable = ['name', 'value'];
    protected $primaryKey = 'name';
    public $incrementing = false;
    public $timestamps = false;
    
    public static function getValue($name, $default = null)
    {
        if ($model = Config::find($name))
            return $model->value;
        return $default;
    }
}
