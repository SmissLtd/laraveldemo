<?php

namespace App;

/**
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $count
 * @property double $price
 * 
 * @property-read App\Order $order
 * @property-read App\Product $product
 */
class OrderProduct extends \Illuminate\Database\Eloquent\Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $table = 'order_product';
    
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
    
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}