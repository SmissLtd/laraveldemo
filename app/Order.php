<?php

namespace App;

/**
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $message
 * @property enum $status
 * 
 * @property-read App\OrderProduct[] $products
 */
class Order extends \Illuminate\Database\Eloquent\Model
{
    const STATUS_NEW = 'new';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_PAID = 'paid';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_RECEIVED = 'received';
    
    use \Illuminate\Database\Eloquent\SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function products()
    {
        return $this->hasMany('App\OrderProduct');
    }
    
    public function total()
    {
        $result = 0;
        foreach ($this->products as $product)
            $result += $product->count * $product->price;
        return $result;
    }
    
    public function count()
    {
        $result = 0;
        foreach ($this->products as $product)
            $result += $product->count;
        return $result;
    }
}